<?php

namespace App\Models\Gameserver;

use Illuminate\Database\Eloquent\Model;

class Ladder extends Model {

    protected $table        = 'ladder_player';
    protected $connection   = 'gameserver';

}
