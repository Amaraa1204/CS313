<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
	 use AuthenticatesAndRegistersUsers, ThrottlesLogins;
     protected function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);
        
        //Here's the custom SQL, so you can retrieve a "user" and "pass" from anywhere in the DB
        /*$usuario = \DB::select('
                SELECT
                    persona.nombre,
                    usuario.password
                FROM
                    persona
                INNER JOIN
                    usuario ON persona.id_persona = usuario.id_persona
                WHERE
                    persona.email = ?
                LIMIT 1', array($credentials['email']));

        // Instead of:
        // if (Auth::attempt($credentials, $request->has('remember'))) {
        if ($usuario && Hash::check($credentials['password'], $usuario[0]->password)) {
            Auth::loginUsingId($usuario[0]->id_persona, $request->has('remember'));

            // Put any custom data you need for the user/session
            Session::put('nombre', $usuario[0]->nombre);

            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);*/
    }
}
