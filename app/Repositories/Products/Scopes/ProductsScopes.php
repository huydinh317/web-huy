<?php

namespace App\Repositories\Products\Scopes;

use AwesIO\Repository\Scopes\ScopesAbstract;

class ProductsScopes extends ScopesAbstract
{
    protected $scopes = [
        'search' => SearchProductsScope::class,
    ];
}