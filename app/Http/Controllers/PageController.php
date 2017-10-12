<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    //home page of the shop
    public function index()
    {
        // getting 3 latest articles to display in a slider
        $articles = DB::table('articles')
                            ->latest()
                            ->limit(3)
                            ->get();
        $products = DB::table('products')
            ->latest()
            ->limit(3)
            ->get();
        return view('pages.index', compact('articles', 'products'));
    }

    // About page
    public function about()
    {
        return view('pages.about');
    }

    // Contact Us page
    public function contactUs()
    {
        return view('pages.contact');
    }

    //Shop page
    public function getCategory($id)
    {
        $categories = Category::all();
        $category = '';

        if ($id === 'all')
        {
            $products = Product::paginate(6);
        }
        else {
            $category = Category::find($id);
            $products = $category->products()->paginate(6);
        }

        return view('pages.category', compact('categories', 'category', 'products'));

    }

    public function searchValidation(Request $request)
    {
        // Validating user search input before actually performing query
        $this->validate($request, array(
           'search_string' => 'required|min:3'
        ));
        $search_string = $request->search_string;

        return redirect()->route('search_result', $search_string);
    }

    //Action for handling search request
    public function showSearchResult($search_string)
    {
        $categories = Category::all();
        //split search string into keywords array
        $keywords = preg_split('/\s+/', $search_string, -1, PREG_SPLIT_NO_EMPTY);
        //perform search in 'title' and 'author' fields only
        $products = Product::where(function ($q) use ($keywords) {
            foreach ($keywords as $keyword) {
                $q->orWhere('title', 'like', "%{$keyword}%")->orWhere('author', 'like', "%{$keyword}%");
            }
        })->paginate(6);
        //display result if the search was successful, otherwise display message
        if(count($products) > 0)
        {
            return view('pages.search', compact('products', 'categories'));
        }
        else
        {
            $message = 'Sorry, no results for your request were found.';
            return view('pages.search', compact('message', 'categories'));
        }
    }

    //News Page
    public function news()
    {
        $articles = Article::orderBy('created_at', 'desc')->simplePaginate(3);
        return view('news.index', compact('articles'));
    }

    //Single Article page
    public function article($id)
    {
        $article = Article::find($id);
        return view('news.single', compact('article'));
    }

    //Single Product page
    public function product($id)
    {
        $product = Product::find($id);
        return view('shop.show', compact('product'));
    }
}
