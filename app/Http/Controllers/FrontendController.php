<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('index',);
    }
    /**
     * Display the mitarbeiter page.
     */
    public function mitarbeiter(Request $request): View
    {
        return view('mitarbeiter',);
    }
    /**
     * Display the aktuell page.
     */
    public function aktuell(Request $request): View
    {
        return view('aktuell',);
    }

    /**
     * Display the bergstrasse page.
     */
    public function bergstrasse(Request $request): View
    {
        return view('bergstrasse',);
    }

    /**
     * Display the darmstadt_dieburg page.
     */
    public function darmstadt_dieburg(Request $request): View
    {
        return view('darmstadt_dieburg',);
    }

    /**
     * Display the einsatznachsorge page.
     */
    public function einsatznachsorge(Request $request): View
    {
        return view('einsatznachsorge',);
    }
    /**
     * Display the einsatzprotokoll_berg page.
     */
    public function einsatzprotokoll_berg(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('einsatzprotokoll_berg',);
    }

    /**
     * Display the einsatzprotokoll_da page.
     */
    public function einsatzprotokoll_da(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('einsatzprotokoll_da');
    }
}
