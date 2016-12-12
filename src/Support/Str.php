<?php

namespace KilroyWeb\Cruddy\Support;

use Illuminate\Support\Pluralizer;

class Str{

    public static function classShortName($class){
        return (new \ReflectionClass($class))->getShortName();
    }

    public static function pluralVariable($string){
        $variableName = camel_case($string);
        $variableName = Pluralizer::plural($variableName);
        return $variableName;
    }

    public static function singularVariable($string){
        $variableName = camel_case($string);
        $variableName = Pluralizer::singular($variableName);
        return $variableName;
    }

    public static function viewPath($string){
        return static::hyphenateFromCamelCase($string);
    }

    public static function routePath($string){
        return static::hyphenateFromCamelCase($string);
    }

    public static function hyphenateFromCamelCase($string){
        return str_replace('_','-',static::underscoreFromCamelCase($string));
    }

    public static function underscoreFromCamelCase($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

}