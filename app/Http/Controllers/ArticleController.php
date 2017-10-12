<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'title' => 'required|max:255|min:3',
            'summary' => 'required|max:255',
            'article_picture' => 'required|image|max:5000',
            'body' => 'required|min:5'
        ));

        $article = new Article();
        $article->title = $request->title;
        $article->summary = $request->summary;
        //Clean all malicious input from article body with Purifier::clean()
        $article->body = Purifier::clean($request->body);

        $image = $request->file('article_picture');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/articles/' . $filename);
        Image::make($image)->resize(1000,500)->save($location);

        $article->article_picture = $filename;

        $article->save();

        session()->flash('success', 'The new article was successfully saved!');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
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
            'title' => 'required|max:255|min:3',
            'summary' => 'required|max:255',
            'article_picture' => 'image|max:5000',
            'body' => 'required|min:5'
        ));

        $article = Article::find($id);
        $article->title = $request->title;
        $article->summary = $request->summary;
        //Clean all malicious input from article body with Purifier::clean()
        $article->body = Purifier::clean($request->body);

        //If a new article picture was uploaded, delete old image from storage and replace it with a new one
        if ($request->hasFile('article_picture'))
        {
            $image = $request->file('article_picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/articles/' . $filename);
            Image::make($image)->resize(1000,500)->save($location);
            $old_filename = $article->image;
            $article->image = $filename;
            Storage::delete('images/articles/' . $old_filename);
        }

        $article->save();

        session()->flash('success', 'Successfully updated');

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        //Deleting image from storage before deleting an article
        Storage::delete('images/articles/' . $article->article_picture);

        $article->delete();

        session()->flash('success','Article was successfully deleted.');

        return redirect()->route('articles.index');
    }
}
