<?php

namespace KilroyWeb\Cruddy\Facades;

use Illuminate\Support\Facades\Facade;

class Cruddy extends Facade
{
    protected static function getFacadeAccessor() {
        return 'cruddy';
    }
}
