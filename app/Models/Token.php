<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token', 'user_id'
    ];

    /**
     * Owner of the token
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
