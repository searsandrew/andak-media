<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\Type;

class AddProduct extends Component
{
    public bool $addingProduct = false;
    public string $name, $content, $type;
    public array $attribute;
    public Collection $attributes;
    public Collection $types;
    public Product $product;

    protected $rules = [
        'name' => 'required',
        'type' => 'required',
    ];

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function mount()
    {
        $this->attribute = [];
        $this->attributes = new Collection();
        $this->product = new Product();
        $this->types = Type::all();
    }

    public function updatedType($value)
    {
        $this->attributes = Attribute::where('type_id', $this->type)->get();
    }

    public function trix_value_updated($value){
        $this->content = $value;
    }

    public function closeModal()
    {
        $this->addingProduct = false;
        $this->attribute = [];
        $this->attributes = new Collection();
        $this->product = new Product();
        $this->types = Type::all();

        $this->emit('modalClosed');
    }

    public function addProduct()
    {
        $this->validate(
            [
                'name' => 'required',
                'content' => 'required',
            ]
        );

        $product = Product::create([
            'type_id' => $this->type,
            'name' => $this->name,
            'content' => $this->content,
        ]);

        $i = 0;
        foreach($this->attribute as $attribute)
        {
            $product->attributes()->attach($this->attributes[$i], ['value' => $attribute]);
            $i++;
        }

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.add-product');
    }
}
