<?php

namespace App\Models\Loginserver;

use Illuminate\Database\Eloquent\Model;

class AccountData extends Model {

    protected $table        = 'account_data';
    protected $connection   = 'loginserver';
    protected $fillable     = ['id', 'name', 'password', 'email', 'real', 'vote', 'pseudo'];
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
     * Increment Reals
     *
     * @param $query
     * @param $accountId
     * @param $quantity
     *
     * @return
     */
    public function scopeAddReal($query, $accountId, $quantity)
    {
        return $query->where('id', $accountId)->increment('real', $quantity);
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

    /**
     * Get players of account
     */
    public function players()
    {
        return $this->hasMany('App\Models\Gameserver\Player', 'account_id', 'id');
    }

}
