<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class Pages extends Model {

    use Rememberable;

    protected $table        = 'pages';
    protected $connection   = 'webserver';
    protected $fillable     = ['page_name', 'fr', 'en'];
    public $timestamps      = false;

}
