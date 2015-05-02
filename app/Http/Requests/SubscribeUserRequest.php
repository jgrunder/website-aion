<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Loginserver\AccountData;

class SubscribeUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

        $email      = AccountData::where('email', $this->email)->first();
        $account    = AccountData::where('name', $this->username)->first();

        if($account === null) {
            if($email === null) {
                if($this->password === $this->repeat_password){
                    return true;
                } else {
                    // TODO Send : Both password must be the same
                    return false;
                }
            } else {
                // TODO Send : There are a account with this email
                return false;
            }
        } else {
            // TODO Send : There are a account with this username
            return false;
        }

	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username'          => 'required|unique',
            'password'          => 'required',
            'repeat_password'   => 'required',
            'email'             => 'email'
		];
	}

}
