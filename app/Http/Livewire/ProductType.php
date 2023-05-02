<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;

use Auth;

class ProductType extends Component
{
    public string $name = '';
    public mixed $iconCode = false, $viewBox = false;
    public array $attributes, $attribute = ['name' => '', 'type' => 'default', 'location' => 'default'];

    public function mount()
    {
        $this->attributes = [['name' => '', 'type' => 'default', 'location' => 'default']];
    }
    
    public function addRowToAttributes()
    {
        $this->validate(
            [
                'attribute.name' => 'required',
                'attribute.type' => [ 'required', Rule::in(['string', 'float', 'array']) ],
                'attribute.location' => [ 'required', Rule::in(['primary', 'labeled', 'unlabeled']) ],
            ], [
                'attribute.name.required' => 'Please enter a name for the attribute',
                'attribute.type.*' => 'Please select a type',
                'attribute.location.*' => 'Please select a location',
            ]
        );


        $this->attributes = array_filter($this->attributes, function($v) { return $v['type'] != "default"; });
        array_push($this->attributes, $this->attribute);
        $this->reset('attribute');
    }

    public function createNewType()
    {
        $this->validate(
            [
                'name' => 'required',
                'iconCode' => 'required_with:viewBox',
                'viewBox' => 'required_with:iconCode',
            ]
        );

        $type = Auth::user()->type()->create([
            'name' => $this->name,
            'icon' => json_encode(['code' => $this->iconCode, 'viewbox' => $this->viewBox]),
        ]);
        $type->attributes()->createMany($this->attributes);

        $this->reset(['name', 'iconCode', 'viewBox']);
        $this->attributes = [['name' => '', 'type' => 'default', 'location' => 'default']];

        $this->emit('saved');
        session()->flash('message', 'Type successfully created.');
    }

    public function render()
    {
        return view('livewire.product-type');
    }
}
