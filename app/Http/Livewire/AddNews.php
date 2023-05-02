<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use App\Models\Type;

class AddNews extends Component
{
    use WithFileUploads;

    public News $news;
    public $types, $type, $image;
    public bool $addingNews = false;

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

    public function closeModal()
    {
        $this->addingNews = false;
        $this->product = new News();
        $this->types = Type::all();

        $this->emit('modalClosed');
    }

    public function addNews()
    {
        $this->validate();

        $this->image->store();
        $this->news->type_id = $this->type;
        $this->news->save();
        $this->news->image()->create([
            'image' => $this->image->hashName(),
        ]);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-news');
    }
}
