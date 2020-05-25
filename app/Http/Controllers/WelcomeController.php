<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
		public function index(Request $request)
		{
      dd(Auth::guard('web'));
      return view('app');
		}
}
