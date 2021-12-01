<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }


    public function api(){
        $arr = Article::all();
        return response($arr,200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with("category")->get();
        return view("article.index",compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::id();
        $article->description = $request->description;
        $article->save();

        foreach ($request->photo as $photo) {
            $ext = $photo->getClientOriginalExtension();
            $newName = uniqid()."_photo.".$ext;
            $photo = $photo->storeAs("public/images",$newName);
            $p = new Photo();
            $p->name = $newName;
            $p->user_id = Auth::id();
            $p->article_id = $article->id;
            $p->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("article.detai",compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("article.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::id();
        $article->description = $request->description;
        $article->update();
        return redirect()->route("article.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back();
    }
}
