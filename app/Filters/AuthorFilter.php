<?php

// AuthorFilter.php

namespace App\Filters;

class AuthorFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('user_id', $value);
    }
}