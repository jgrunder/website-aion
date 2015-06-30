<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Loginserver\AccountData;

class ConnectUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $user = AccountData::activated()
                    ->where('name', $this->username)
                    ->where('password', base64_encode(sha1($this->password, true)))
                    ->first();

        if($user !== null){
            return true;
        } else {
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
			'username' => 'required',
      'password' => 'required'
		];
	}

}
