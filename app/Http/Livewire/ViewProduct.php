<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ViewProduct extends Component
{
    public Product $product;

    public function mount($content)
    {
        $this->product = Product::where('slug', $content)->first();
    }

    public function render()
    {
        return view('livewire.view-product');
    }
}
