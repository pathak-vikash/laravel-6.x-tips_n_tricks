<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    protected $fillable = ['title', 'description'];
    protected $appends = [ 'hash' ];

    /**
     * @return hash string
     */
    public function getHashAttribute()
    {
        return encrypt( $this->id );
    }

    # order by global scope
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope("order", function(Builder $builder) {
            $builder->orderBy('title', 'asc');
        });
    }
    
}
