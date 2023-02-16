<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class BergstrasseController extends Controller
{

    /**
     * Display the bergstrasse page.
     */
    public function index(Request $request): View
    {
        return view('bergstrasse.index',);
    }

    /**
     * Display the kontakt page.
     */
    public function kontakt(Request $request): View
    {
        return view('bergstrasse.kontakt',);
    }

    /**
     * Display the einsatznachsorge page.
     */
    public function einsatznachsorge(Request $request): View
    {
        return view('bergstrasse.einsatznachsorge',);
    }

    /**
     * Display the bergstrasse page.
     */
    public function bergstrasse(Request $request): View
    {
        return view('bergstrasse.bergstrasse',);
    }

    /**
     * Display the bergstrasse_orga page.
     */
    public function bergstrasse_orga(Request $request): View
    {
        return view('bergstrasse.bergstrasse_orga',);
    }

    /**
     * Display the bergstrasse_einsatznachsorge page.
     */
    public function bergstrasse_einsatznachsorge(Request $request): View
    {
        return view('bergstrasse.bergstrasse_einsatznachsorge',);
    }

    /**
     * Display the bergstrasse_ansprechpartner page.
     */
    public function bergstrasse_ansprechpartner(Request $request): View
    {
        return view('bergstrasse.bergstrasse_ansprechpartner',);
    }
}
