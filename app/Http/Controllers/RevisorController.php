<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index() {
        $article_to_check = Article::where('is_accepted', null)->first();
        $lastArticle= Article::where('is_accepted', true)->orwhere('is_accepted', false)->take(1)->latest('id')->get();
        return view('revisor.index', compact('article_to_check', 'lastArticle'));
    }

    public function undo(Article $article){
        $article->setAccepted(null);
        return redirect(route('revisor.index'))->with('success', "Articolo $article->title resettato");
    } 


    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect(route('revisor.index'))->with('success', "Articolo $article->title accettato");
    } 

    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect(route('revisor.index', compact('article')))->with('notSuccess', "Articolo $article->title rifiutato");
    } 

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('welcome')->with('success', "Richiesta di revisione inviata correttamente");
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->route('welcome')->with('success', "Utente {$user->name} ora revisore");
    }
}
