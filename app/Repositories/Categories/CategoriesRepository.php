<?php

namespace App\Repositories\Categories;

use App\Models\Category;
use App\Repositories\Categories\Scopes\CategoriesScopes;
use AwesIO\Repository\Eloquent\BaseRepository;

class CategoriesRepository extends BaseRepository
{
    /**
     * The attributes that can be searched by.
     *
     * @var array
     */
    protected $searchable = [];

    public function entity()
    {
        return Category::class;
    }

    public function scope($request)
    {
        parent::scope($request);
        $this->entity = (new CategoriesScopes($request))->scope($this->entity);
        return $this;
    }
}
