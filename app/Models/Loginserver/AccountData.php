<?php

namespace App\Models\Loginserver;

use Illuminate\Database\Eloquent\Model;

class AccountData extends Model {

    protected $table        = 'account_data';
    protected $connection   = 'loginserver';
    protected $fillable     = ['id', 'name', 'password', 'email', 'toll', 'vote', 'pseudo'];
    public $timestamps      = false;

    /**
     * Add in Scope function for select account acivated
     *
     * @param $query
     *
     * @return
     */
    public function scopeActivated($query)
    {
        return $query->where('activated', 1);
    }

    /**
     * Add in Scope function for vote
     *
     * @param $query
     * @param $accountId
     * @param $tollPerVote
     *
     * @return
     */
    public function scopeAddToll($query, $accountId, $tollPerVote)
    {
        return $query->where('id', $accountId)->increment('toll', $tollPerVote);
    }

    /**
     * Add in Scope function for vote
     *
     * @param $query
     *
     * @param $accountId
     *
     * @return
     */
    public function scopeAddNewVote($query, $accountId)
    {
        return $query->where('id', $accountId)->increment('vote');
    }

    /**
     * Add in Scope function for select Me account
     *
     * @param $query
     * @param $accountId
     *
     * @return
     */
    public function scopeMe($query, $accountId)
    {
        return $query->where('id', $accountId);
    }

}
