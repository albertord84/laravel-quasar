<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Library\Master;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

// class LoginController extends AccessTokenController
class LoginController extends Controller
{
    public function login(Request $request, ServerRequestInterface $server)
    {
        // validator($request->all(), User::loginRules())
        //     ->validate();
        // $tokenResponse = parent::issueToken($server);
        // $content = $tokenResponse->getContent();
        // $data = json_decode($content, true);
        // if(isset($data["error"])) {
        //     return response()->json([
        //         'error' => 'invalid_credentials',
        //         'message' => 'The user credentials were incorrect.',
        //         'errors' => [
        //             'username' => ['Incorrect username or password'],
        //             'password' => ['Incorrect username or password']
        //         ]
        //     ], 401);
        // }
        // if (isset($data['access_token'])) {
            $user = new User();
            $username = $request->input('username');
            $data['user_data'] = UserResource::make($user->findForPassport($request->input($username)));
            // return json_encode($data);

            Log::debug("Login: ", [Users::where('email', $username)
              ->orWhere('username', $username)
              ->first()]);

            $modelUser = Users::where('email', $username)
                    ->orWhere('username', $username)
                    ->first();

            $modelUser->password = '';

            return $modelUser;
        // }
        // return $tokenResponse;
    }

    public function login2(Request $request, ServerRequestInterface $server)
    {
        validator($request->all(), User::loginRules())
            ->validate();
        $tokenResponse = parent::issueToken($server);
        $content = $tokenResponse->getContent();
        $data = json_decode($content, true);
        if(isset($data["error"])) {
            return response()->json([
                'error' => 'invalid_credentials',
                'message' => 'The user credentials were incorrect.',
                'errors' => [
                    'username' => ['Incorrect username or password'],
                    'password' => ['Incorrect username or password']
                ]
            ], 401);
        }
        if (isset($data['access_token'])) {
            $user = new User();
            $data['user_data'] = UserResource::make($user->findForPassport($request->input('username')));
            return $tokenResponse->setContent($data);
        }
        return $tokenResponse;
    }

    public function logout(Request $request)
    {
        $accessToken = $request->user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->delete();
        $accessToken->delete();
        return Master::successResponse();
    }
}
