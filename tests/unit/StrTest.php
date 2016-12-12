<?php

use \KilroyWeb\Cruddy\Support\Str;

class StrTest extends TestCase
{

    public function test_class_short_name()
    {
        $class = TestCase::class;
        $result = Str::classShortName($class);
        $this->assertEquals('TestCase', $result);
    }

    public function test_plural_variable(){
        $string = 'user';
        $this->assertEquals('users', Str::pluralVariable($string));
        $string = 'users';
        $this->assertEquals('users', Str::pluralVariable($string));
        $string = 'allUsers';
        $this->assertEquals('allUsers', Str::pluralVariable($string));
        $string = 'all_user';
        $this->assertEquals('allUsers', Str::pluralVariable($string));
    }

    public function test_singular_variable(){
        $string = 'user';
        $this->assertEquals('user', Str::singularVariable($string));
        $string = 'users';
        $this->assertEquals('user', Str::singularVariable($string));
        $string = 'allUsers';
        $this->assertEquals('allUser', Str::singularVariable($string));
        $string = 'all_user';
        $this->assertEquals('allUser', Str::singularVariable($string));
    }

    public function test_view_path(){
        $string = 'user';
        $this->assertEquals('user', Str::viewPath($string));
        $string = 'users';
        $this->assertEquals('users', Str::viewPath($string));
        $string = 'allUsers';
        $this->assertEquals('all-users', Str::viewPath($string));
    }

    public function test_route_path(){
        $string = 'user';
        $this->assertEquals('user', Str::routePath($string));
        $string = 'users';
        $this->assertEquals('users', Str::routePath($string));
        $string = 'allUsers';
        $this->assertEquals('all-users', Str::routePath($string));
    }
}
