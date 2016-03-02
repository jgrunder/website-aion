<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;

class ConfigSlider extends Model {

    protected $table        = 'config_slider';
    protected $connection   = 'webserver';
    protected $fillable     = ['title', 'path'];
    public $timestamps      = false;

}
