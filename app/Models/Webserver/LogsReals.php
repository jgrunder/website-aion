<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class LogsReals extends Model {

    protected $table        = 'logs_reals';
    protected $connection   = 'webserver';
    protected $fillable     = ['id', 'sender_name', 'receiver_name', 'reals', 'reason', 'created_at', 'updated_at'];

}
