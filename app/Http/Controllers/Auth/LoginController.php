<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Library\Master;
use App\Models\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Psr\Http\Message\ServerRequestInterface;

// class LoginController extends AccessTokenController
class LoginController extends Controller
{
  public function login(Request $request, ServerRequestInterface $server)
  {
    $User = Users::where('email', $request->username)
      ->orWhere('username', $request->username)
      ->first();

    if (!Hash::check($request->password, $User->password)) {
      return response()->json([
        'error' => 'invalid_credentials',
        'message' => 'The User credentials were incorrect.',
        'errors' => [
          'username' => ['Incorrect username or password'],
          'password' => ['Incorrect username or password']
        ]
      ], 401);
    }

    Auth::login($User, true);

    return $User;
  }

  public function login2(Request $request, ServerRequestInterface $server)
  {
    validator($request->all(), User::loginRules())
      ->validate();
    $tokenResponse = parent::issueToken($server);
    $content = $tokenResponse->getContent();
    $data = json_decode($content, true);
    if (isset($data["error"])) {
      return response()->json([
        'error' => 'invalid_credentials',
        'message' => 'The User credentials were incorrect.',
        'errors' => [
          'username' => ['Incorrect username or password'],
          'password' => ['Incorrect username or password']
        ]
      ], 401);
    }
    if (isset($data['access_token'])) {
      $User = new User();
      $data['user_data'] = UserResource::make($User->findForPassport($request->input('username')));
      return $tokenResponse->setContent($data);
    }
    return $tokenResponse;
  }

  public function logout(Request $request)
  {
    $accessToken = $request->User()->token();
    DB::table('oauth_refresh_tokens')
      ->where('access_token_id', $accessToken->id)
      ->delete();
    $accessToken->delete();
    return Master::successResponse();
  }

  public function guard()
  {
    return Auth::guard('web');
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->respondWithToken($this->guard()->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'user' => $this->guard()->user(),
      'token_type'   => 'bearer',
      // 'expires_in'   => $this->guard()->factory()->getTTL() * 60,
    ]);
  }
}
