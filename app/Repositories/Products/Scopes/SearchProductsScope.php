<?php

namespace App\Repositories\Products\Scopes;

use AwesIO\Repository\Scopes\ScopeAbstract;

class SearchProductsScope extends ScopeAbstract
{
    public function scope($builder, $value, $scope)
    {
        return $builder->where($scope, $value);
    }
}