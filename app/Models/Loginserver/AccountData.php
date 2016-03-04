<?php

namespace App\Models\Loginserver;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class AccountData extends Model {

    use Rememberable;

    protected $table        = 'account_data';
    protected $connection   = 'loginserver';
    protected $fillable     = ['id', 'name', 'password', 'email', 'real', 'vote', 'pseudo', 'token', 'pushbullet'];
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
     * Add in Scope function for vote
     *
     * @param $query
     *
     * @param $accountId
     *
     * @return
     */
    public function scopeIncrementVoteCount($query, $accountId)
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

    /**
     * Get players of account
     */
    public function players()
    {
        return $this->hasMany('App\Models\Gameserver\Player', 'account_id', 'id');
    }

    /**
     * Return account level
     */
    public function level()
    {
        return $this->belongsTo('App\Models\LoginServer\AccountLevel', 'account_id', 'id');
    }

}
