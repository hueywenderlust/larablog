<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    //
    public function getArticles(){

        $article = Article::all();

        return view('about', compact('article'));
    }


    // index to list everything 
    public function index(){

        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;

        } else {
            $articles = Article::latest()->get();

        }

        // return view('article.index', ['articles'=>$articles]);
        return view('article.index', compact('articles'));
    }

    // show to display specific item from the list  
    // public function show($id){
    //     $article = Article::find($id);

    //     return view('article.show', ['article'=>$article]);
    // }

        // alternative way to write it
        // ** naming is important need to be same as the route
        public function show(Article $article){
            return view('article.show', compact('article'));
        }

    // create a record
    public function create(){

        $tags = Tag::get();

        return view('article.create', compact('tags'));

    }


    // store/persist the record
    public function store(){

        // dd(request()->all());

        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // die('store');
        // $article = new Article();
        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        // alternative way to create
        // Article::create([
        //     'title' => request('title'),
        //     'excerpt' => request('excerpt'),
        //     'body' => request('body')
        // ]);

        Article::create(
            request()->validate([
                'title' => 'required',
                'excerpt' => 'required',
                'body' => 'required'
            ]));

        return redirect('/articles');

    }

    // edit the record
    // public function edit($id){
    //     $article = Article::find($id);
    //     return view('article.edit', compact('article'));
    // }

    // alternative way to write it
        // ** naming is important need to be same as the route
    public function edit(Article $article){
        return view('article.edit', compact('article'));
    }
    

    // save/presits the updated record
    public function update(Article $article){

        $article->update(
            request()->validate([
                'title' => 'required',
                'excerpt' => 'required',
                'body' => 'required'
            ]));

        // request()->validate([
        //     'title' => 'required',
        //     'excerpt' => 'required',
        //     'body' => 'required'
        // ]);

        // $article = Article::find($id);

        // $article->title = request('title');
        // $article->excerpt = request('excerpt');
        // $article->body = request('body');

        // $article->save();

        return redirect('/articles/' . $article->id);

    }

    // delete the record
    public function destroy(){

    }

}
