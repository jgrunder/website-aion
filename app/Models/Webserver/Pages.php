<?php

namespace App\Models\Webserver;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Watson\Rememberable\Rememberable;

class Pages extends Model {

    use Rememberable;

    public function __construct()
    {
        parent::__construct();
        DB::disableQueryLog();
    }

    protected $table        = 'pages';
    protected $connection   = 'webserver';
    protected $fillable     = ['page_name', 'fr', 'en'];
    public $timestamps      = false;

}
