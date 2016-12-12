#Cruddy

A simple Laravel CRUD helper

## Install

``` bash
composer require kilroyweb/cruddy
```

In config/app.php 'providers':

```php
KilroyWeb\Cruddy\CruddyServiceProvider::class,
```

In config/app.php 'facades':

```php
'Cruddy'=> KilroyWeb\Cruddy\Facades\Cruddy::class,
```

## Usage

### Controllers:

Create new controllers extending the CruddyController via:

```php

<?php

namespace App\Http\Controllers\Books;

use KilroyWeb\Cruddy\Controllers\CruddyController;

class BookController extends CruddyController{

    protected $model = \App\Book::class;

}

```

This will create a controller with the following: methods

- index: returns a variable with all models with a plural name of the model (ie: $books)
- create
- store: stores the model and redirects to /index with a success message
- edit: returns a variable with the given model id with a singular name of the model (ie: $book)
- update: updates the model and redirects to /index with a success message
- destroy: deletes the model and redirects to /index with a success message