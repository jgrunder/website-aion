<?php

namespace App\Models\Loginserver;

use Illuminate\Database\Eloquent\Model;

class AccountData extends Model {

    protected $table        = 'account_data';
    protected $connection   = 'loginserver';
    protected $fillable     = ['name', 'password', 'email', 'toll'];
    public $timestamps      = false;

    /**
     * Add in Scope function for select account acivated
     */
    public function scopeActivated($query)
    {
        return $query->where('activated', 1);
    }

    /**
     * Add in Scope function for vote
     */
    public function scopeVote($query, $accountId, $tollPerVote)
    {
        return $query->where('id', $accountId)->increment('vote', 1)->increment('toll', $tollPerVote);
    }

}
