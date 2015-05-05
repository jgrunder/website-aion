<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table        = 'news';
    protected $connection   = 'webserver';
    protected $fillable     = ['title'];

}