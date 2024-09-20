<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|numeric')]
    public $price;
    #[Validate('required')]
    public $category;
    
    public $article;

    public function messages() :array{
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'price.required' => 'Il prezzo è obbligatorio',
            'category.required' => 'La categoria è obbligatoria',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri',
            'description.min' => 'La descrizione deve avere almeno 10 caratteri',
            'price.numeric' => 'Il prezzo deve essere un numero',
        ];
    }
    public function save()
    {
        $this->validate();
        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::user()->id
        ]);
        $this->reset();
        session()->flash('created', 'Articolo creato con successo');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
