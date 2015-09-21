<?php

namespace App\Models\Gameserver;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Player extends Model {

    use Rememberable;

    protected $table        = 'players';
    protected $connection   = 'gameserver';
    protected $fillable     = ['account_name'];

    /**
     * Add in Scope function for select player online
     */
    public function scopeOnline($query)
    {
        return $query->where('online', 1);
    }

}
