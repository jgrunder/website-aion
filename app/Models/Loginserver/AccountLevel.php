<?php

namespace App\Models\Loginserver;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class AccountLevel extends Model {

    use Rememberable;

    protected $table        = 'account_level';
    protected $connection   = 'loginserver';
    protected $fillable     = ['id', 'account_id', 'total', 'level'];
    public $timestamps      = false;


}
