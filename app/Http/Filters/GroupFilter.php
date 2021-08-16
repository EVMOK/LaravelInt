<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends QueryFilter
{
    /**
     * @param string $name
     */
    public function name(string $name)
    {
        $words = array_filter(explode(' ', $name));

        $this->builder->where(function (Builder $query) use ($words) {
            foreach ($words as $word) {
                $query->where('post_title', 'like', "%$word%");
            }
        });
    }
}
