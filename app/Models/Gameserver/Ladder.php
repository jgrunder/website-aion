<?php

namespace App\Models\Gameserver;

use Illuminate\Database\Eloquent\Model;

class Ladder extends Model {

    protected $table        = 'ladder_player';
    protected $connection   = 'gameserver';

    public function name(){
        return $this->belongsTo('App\Models\Gameserver\Player', 'player_id', 'id');
    }

}
