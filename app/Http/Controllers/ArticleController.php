<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    //Show all articles
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->paginate(5); //Show only 5 Article from our Model article
        //Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    //Create and Update Article if exist
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Article::findOrFail
        ($request->article_id) : new Article;
        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        if($article->save()){
            return new ArticleResource($article);
        }
    }

    //Show only one article
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return new ArticleResource($article);
    }

    //Delete article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->delete()){
            return new ArticleResource($article);
        }
    }
}
