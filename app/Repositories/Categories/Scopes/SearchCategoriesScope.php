<?php

namespace App\Repositories\Categories\Scopes;

use AwesIO\Repository\Scopes\ScopeAbstract;

class SearchCategoriesScope extends ScopeAbstract
{
    public function scope($builder, $value, $scope)
    {
        return $builder->where($scope, $value);
    }
}