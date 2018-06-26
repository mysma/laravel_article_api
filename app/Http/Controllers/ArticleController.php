<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;
use App\Policies\ArticlePolicy;

class ArticleController extends Controller
{
  public function index()
  {
      return Article::all();
  }
  public function show(Article $article)
  {
    $this->authorize('view', $article);
      return $article;
  }
  public function store(Request $request)
  {
    /*$request->validate([
      'title' => 'required | min:3 | max:100',
      'subtitle' => 'required',
      'author' => 'required | min:2 | max:30',
      'content' => 'required | min:100'
    ]);*/
      $user = Auth::user()->name;
      $input = $request->all();
      $input['author'] = $user;
      return Article::create($input);

  }

  public function update(Request $request, Article $article)
  {
    /*$request->validate([
      'title' => 'required | min:3 | max:100',
      'subtitle' => 'required',
      'author' => 'required | min:2 | max:30',
      'content' => 'required | min:100'
    ]);*/
      $this->authorize('update', $article);
      return $article->update($request->all());
  }

  public function delete(Article $article)
  {
    $this->authorize('delete', $article);
    return $article->delete();
  }
  public function viewindex()
  {
    return view('articleslist', [
    'article' => Article::paginate(4)
    ]);
  }
  public function viewArts(Request $request)
  {
    return $request->user()->arts;
  }
}
