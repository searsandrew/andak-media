<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;

class NewsCreate extends Component
{
    use WithFileUploads;

    public News $news;
    public $image;

    protected $rules = [
        'news.title' => 'required',
        'news.content' => 'nullable',
        'image' => 'image|max:1024',
    ];

    public function mount()
    {
         $this->news = new News();
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

    public function render()
    {
        return view('livewire.news-create');
    }
}
