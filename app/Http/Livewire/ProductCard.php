<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Type;

use Helper;

class ProductCard extends Component
{
    public $type, $content, $products;

    public function mount($content)
    {
        $this->type = Type::where('slug', Str::of($content)->singular())->first();
        $this->products = $this->type->products;
    }

    function convertVariableToModelName($modelName='',$nameSpace='')
    {
        //if the given name space iin array the implode to string with \\
        if (is_array($nameSpace))
        {
            $nameSpace =  implode('\\', $nameSpace);
        }
        //by default laravel ships with name space App so while is $nameSpace is not passed considering the
        // model namespace as App
        if (empty($nameSpace) || is_null($nameSpace) || $nameSpace === "") 
        {                
            $modelNameWithNameSpace = "App".'\\'.$modelName;
        }
        //if you are using custom name space such as App\Models\Base\Country.php
        //$namespce must be ['App','Models','Base']
        if (is_array($nameSpace)) 
        {
            $modelNameWithNameSpace = $nameSpace.'\\'.$modelName;

        }
        //if you are passing Such as App in name space
        elseif (!is_array($nameSpace) && !empty($nameSpace) && !is_null($nameSpace) && $nameSpace !== "") 
        {
            $modelNameWithNameSpace = $nameSpace.'\\'.$modelName;

        }
        //if the class exist with current namespace convert to container instance.
        if (class_exists($modelNameWithNameSpace)) 
        {
                // $currentModelWithNameSpace = Container::getInstance()->make($modelNameWithNameSpace);
                // use Illuminate\Container\Container;
                $currentModelWithNameSpace = app($modelNameWithNameSpace);
        }
        //else throw the class not found exception
        else
        {
            throw new \Exception("Unable to find Model : $modelName With NameSpace $nameSpace", E_USER_ERROR);
        }

        return $currentModelWithNameSpace;
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}