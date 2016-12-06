<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $articles;

    public function __construct(ArticleRepository $article)
    {
        $this->articles = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('articles.index', [
            'articles' => $this->articles->forUser($request->user())
        ]);
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
    public function store(ArticleRequest $request)
    {
        /*$request->user()->articles()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);*/

        $request->user()->articles()->create($request->all());

        return redirect('/articles')->with('success', 'Article Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('owner', $article);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('owner', $article);
        $article->update($request->all());
        return redirect('/articles')->with('success', 'Article Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('owner', $article);
        $article->delete();
        return redirect('/articles')->with('success', 'Article Deleted');
    }
}
