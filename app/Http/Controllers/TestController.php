<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

  public function index(Request $request)
  {
    $user = json_decode(Auth::guard('web')->user()->toJson());
    dd($user->email);
  }
}
