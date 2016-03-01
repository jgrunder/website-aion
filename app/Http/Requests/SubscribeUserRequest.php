<?php

namespace App\Http\Requests;

class SubscribeUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username'              => 'required|unique:account_data,name',
			'pseudo'                => 'required|unique:account_data,pseudo',
			'password'              => 'required|case_diff|numbers|letters|confirmed',
			'password_confirmation' => 'required',
			'email'                 => 'required|email|unique:account_data,email'
		];
	}

}
