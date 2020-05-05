<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
		public function index(Request $request)
		{
      // return response()->json([
      //     'copyright' => 'Manfred047',
      //     'author' => 'Emanuel Chablé Concepción',
      //     'email' => 'manfred@manfred047.com',
      //     'website' => 'https://manfred047.com',
      //     'github' => 'https://github.com/Manfred047'
      // ]);
      return view('app');
		}
}
