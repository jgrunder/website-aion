<?php

namespace App\Models\Gameserver;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Ladder extends Model {

    use Rememberable;

    protected $table        = 'ladder_player';
    protected $connection   = 'gameserver';

    public function name(){
        return $this->belongsTo('App\Models\Gameserver\Player', 'player_id', 'id');
    }

}
