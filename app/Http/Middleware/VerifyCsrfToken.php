<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		// Hack for Paypal IPN
		if ($request->method() == 'POST' && $request->header('User-Agent') == 'PayPal IPN ( https://www.paypal.com/ipn )') {
			return $next($request);
		}

		return parent::handle($request, $next);
	}

}
