<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use App\Models\Type;

class NewsCreate extends Component
{
    use WithFileUploads;

    public News $news;
    public Collection $types;
    public $image;

    protected $rules = [
        'news.title' => 'required',
        'news.content' => 'nullable',
        'image' => 'image|max:1024',
    ];

    public function mount()
    {
         $this->news = new News();
         $this->types = Type::all();
    }

    public function save()
    {
        $this->validate();

        $this->image->store();
        $this->news->save();
        $this->news->image()->create([
            'image' => $this->image->hashName(),
        ]);

        $this->emit('saved');
    }

    public function render() : View
    {
        return view('livewire.news-create');
    }
}
