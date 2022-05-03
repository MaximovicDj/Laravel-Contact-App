<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class FilterScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
          foreach ($model->filterColumns as $column)
          {
              if($search = request()->query($column))
              {
                  $builder->where($column, 'LIKE', "%{$search}%");
              }
          }
    }
}
