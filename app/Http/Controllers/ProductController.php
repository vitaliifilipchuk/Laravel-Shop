<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('addToCart', 'getCart');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|min:3',
            'cover_image' => 'required|image|max:512',
            'price' => 'required|integer'
        ));

        $product = new Product();
        $product->title = $request->title;
        $product->author = $request->author;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;

        $image = $request->file('cover_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);

        $product->image = $filename;

        $product->save();

        session()->flash('success', 'The new product was successfully saved!');

        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|min:2|max:255',
            'author' => 'required|min:2|max:255',
            'category_id' => 'required|integer',
            'description' => 'required|min:3',
            'cover_image' => 'image|max:512',
            'price' => 'required|integer'
        ));

        $product = Product::find($id);

        $product->title = $request->title;
        $product->author = $request->author;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;

        // if request has new image, delete an old one and replace it with new
        if ($request->hasFile('cover_image'))
        {
            $image = $request->file('cover_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $old_filename = $product->image;
            $product->image = $filename;
            Storage::delete('images/' . $old_filename);
        }

        $product->save();

        session()->flash('success', 'Successfully updated');

        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // Delete product image from storage before deleting a product
        Storage::delete('images/' . $product->image);

        $product->delete();

        session()->flash('success','This product was successfully deleted.');

        return redirect()->route('products.index');
    }

    // Adding a product to a customer's cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    // Reduce an amount of specific product in cart by one
    public function getReduceByOne($id)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    //Remove specific product from cart
    public function getRemoveItem($id)
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            session()->put('cart', $cart);
        } else {
            session()->forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    // Displaying a Cart page
    public function getCart()
    {
        if (!session()->has('cart'))
        {
            return view('shop.shopping-cart');
        }

        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('shop.shopping-cart', compact('products', 'totalPrice'));
    }

    // Displaying Checkout page
    public function getCheckout()
    {
        if (!session()->has('cart'))
        {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;

        return view('shop.checkout', compact('totalPrice'));
    }

    // Sending form data from Checkout page
    public function postCheckout(Request $request)
    {
        if (!session()->has('cart'))
        {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_LIEw5jcQdKx51669DEWTl5yk');
        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice*100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Test Charge"
            ));
        } catch(\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $order = new Order();
        // Serialize cart object to store it in a database
        $order->cart = serialize($cart);
        $order->address = $request->address;
        $order->name = $request->name;
        $order->payment_id = $charge->id;
        Auth::user()->orders()->save($order);

        session()->forget('cart');

        return redirect('/')->with('success', 'Successfully purchased products!');
    }
}
