<?php

namespace App\Models\Gameserver;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {

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
