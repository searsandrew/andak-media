<?php

namespace App\Helpers;

class Helper
{
    static function convertVariableToModelName($modelName = '', $nameSpace = '')
    {
        if (is_array($nameSpace))
        {
            $nameSpace =  implode('\\', $nameSpace);
        }

        if (empty($nameSpace) || is_null($nameSpace) || $nameSpace === "") 
        {                
            $modelNameWithNameSpace = "App".'\\Models\\'.$modelName;
        }

        if (is_array($nameSpace)) 
        {
            $modelNameWithNameSpace = $nameSpace.'\\'.$modelName;

        } elseif (!is_array($nameSpace) && !empty($nameSpace) && !is_null($nameSpace) && $nameSpace !== "") {
            $modelNameWithNameSpace = $nameSpace.'\\'.$modelName;
        }

        if (class_exists($modelNameWithNameSpace)) 
        {
                // $currentModelWithNameSpace = Container::getInstance()->make($modelNameWithNameSpace);
                // use Illuminate\Container\Container;
                $currentModelWithNameSpace = app($modelNameWithNameSpace);
        } else {
            throw new \Exception("Unable to find Model : $modelName With NameSpace $nameSpace", E_USER_ERROR);
        }

        return $currentModelWithNameSpace;
    }
}