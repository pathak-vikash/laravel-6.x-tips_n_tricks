<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
