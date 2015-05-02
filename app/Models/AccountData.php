<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountData extends Model {

    protected $table        = 'account_data';
    protected $connection   = 'loginserver';

    /**
     * Add in Scope function for select account acivated
     */
    public function scopeAcivated($query)
    {
        return $query->where('activated', 1);
    }

}
