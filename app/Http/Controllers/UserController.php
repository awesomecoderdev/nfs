<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the kontakt page.
     */
    public function kontakt(Request $request): View
    {
        return view('users.kontakt',);
    }
}
