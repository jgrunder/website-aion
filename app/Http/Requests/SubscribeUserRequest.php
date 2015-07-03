<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Loginserver\AccountData;
use Illuminate\Validation\Factory;

class SubscribeUserRequest extends Request {


	public function __construct(Factory $factory)
  {
			// Rule for check Account usage
      $factory->extend('notUseAccount', function ($attribute, $value, $parameters){

				$account = AccountData::where('name', $value)->first();

				if($account !== null) {
					return false;
				} else {
					return true;
				}

      }, 'The account is already token');

			// Rule for check Email usage
			$factory->extend('notUseEmail', function ($attribute, $value, $parameters){

				$email = AccountData::where('email', $value)->first();

				if($email !== null) {
					return false;
				} else {
					return true;
				}

      }, 'The email is already token');

			// Rule for check Pseudo usage
			$factory->extend('notUsePseudo', function ($attribute, $value, $parameters){

				$pseudo = AccountData::where('pseudo', $value)->first();

				if($pseudo !== null) {
					return false;
				} else {
					return true;
				}

      }, 'The pseudo is already token');
  }

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
      'username'              => 'required|notUseAccount',
      'pseudo'                => 'required|notUsePseudo',
      'password'              => 'required|case_diff|numbers|letters|confirmed',
      'password_confirmation' => 'required',
      'email'                 => 'email|notUseEmail',
      'g-recaptcha-response' => 'required|captcha'
		];
	}

}
