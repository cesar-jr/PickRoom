<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function oAuthRedirect(string $provider)
    {
        switch ($provider) {
            // case 'facebook':
            //     return Socialite::driver('facebook')->redirect();
            //     break;

            case 'x':
                /** @disregard P1013 Undefined method */
                return Socialite::driver('x')
                    ->scopes(['users.email'])
                    ->redirect();
                break;

            case 'google':
                return Socialite::driver('google')->redirect();
                break;

            case 'github':
                return Socialite::driver('github')->redirect();
                break;

            default:
                abort(400);
                break;
        }
    }

    public function oAuthCallback(Request $request, string $provider)
    {
        if (!$request->input('code'))
            return redirect()->intended();
        try {
            switch ($provider) {
                // case 'facebook': //16 dígitos de id
                //     $userSocial = Socialite::driver('facebook')->user();
                //     break;

                case 'x': //10 dígitos de id
                    $userSocial = Socialite::driver('x')->user();
                    break;

                case 'google': //21 dígitos de id
                    $userSocial = Socialite::driver('google')->user();
                    break;

                case 'github': //8 dígitos de id
                    $userSocial = Socialite::driver('github')->user();
                    break;

                default:
                    abort(400);
                    break;
            }
            if (!$userSocial->getId())
                throw new Exception("Social without ID");
        } catch (\Throwable $th) {
            $this->toast(__("There was an error!"), "error");
            return redirect()->intended();
        }

        $user = User::where($provider . "_id", $userSocial->getId())
            ->orWhere('email', $userSocial->getEmail())->first();

        if (!$user) {

            if (!$userSocial->getEmail()) {
                $this->toast(__("Your account needs an e-mail address to be registered"), "error");
                return redirect()->intended();
            }

            $name = $userSocial->getName() ?: $userSocial->getNickname() ?: "New User";
            if (strlen($name) > 255) $name = substr($name, 0, 255);

            $user = User::create([
                'name' => $name,
                'email' => $userSocial->getEmail(),
                $provider . "_id" => $userSocial->getId(),
            ]);
        }

        if (!$user->{$provider . "_id"}) {
            $user->{$provider . "_id"} = $userSocial->getId();
            $user->save();
        }

        Auth::login($user, remember: true);

        $request->session()->regenerate();

        return redirect()->intended();
    }
}
