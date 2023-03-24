<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Type;

class AddProduct extends Component
{
    public bool $addingProduct = false;
    public Collection $types;

    protected $rules = [
        'product.name' => 'required',
        'product.type_id' => 'required',
    ];

    public function mount()
    {
        $this->types = Type::all();
    }

    public function addProduct()
    {
        
    }

    public function render()
    {
        return view('livewire.add-product');
    }
}
