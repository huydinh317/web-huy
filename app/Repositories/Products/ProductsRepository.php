<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Products\Scopes\ProductsScopes;
use AwesIO\Repository\Eloquent\BaseRepository;
use AwesIO\Repository\Contracts\CriterionInterface;
use AwesIO\Repository\Scopes\ScopesAbstract;

class ProductsRepository extends BaseRepository
{
    /**
     * The attributes that can be searched by.
     *
     * @var array
     */
    protected $searchable = [
        'id',
        'name',
        'slug',
        'code',
        'price',
    ];
    protected $scope = [
        'orderBy' => OrderByScope::class,
        // where created_at date is after
        'begin' => WhereDateGreaterScope::class,
        // where created_at date is before
        'end' => WhereDateLessScope::class,
    ];
    public function entity()
    {
        return Product::class;
    }

    public function scope($request)
    {
        parent::scope($request);
        $this->entity = (new ProductsScopes($request))->scope($this->entity);
        return $this;
    }
    public function whereBetween($col, $conditions)
    {
        return Product::whereBetween($col, $conditions);
    }
}
class ProductCriteria implements CriterionInterface
{

    protected $conditions;

    public function __construct(array $conditions)
    {
        $this->conditions = $conditions;
    }

    public function apply($entity)
    {
        foreach ($this->conditions as $field => $value) {
            $entity = $entity->where($field, '=', $value);
        }
        return $entity;
    }
}
