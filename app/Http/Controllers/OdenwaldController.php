<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class OdenwaldController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(Request $request): View
    {
        return view('odenwald.index',);
    }

    /**
     * Display the odenwald page.
     */
    public function odenwald(Request $request): View
    {
        return view('odenwald.odenwald',);
    }

    /**
     * Display the einsatznachsorge page.
     */
    public function einsatznachsorge(Request $request): View
    {
        return view('odenwald.einsatznachsorge',);
    }

    /**
     * Display the odenwald_orga page.
     */
    public function odenwald_orga(Request $request): View
    {
        return view('odenwald.odenwald_orga',);
    }


    /**
     * Display the odenwald_kontakt page.
     */
    public function odenwald_kontakt(Request $request): View
    {
        return view('odenwald.odenwald_kontakt',);
    }


    /**
     * Display the odenwald_notfallseelsorge page.
     */
    public function odenwald_notfallseelsorge(Request $request): View
    {
        return view('odenwald.odenwald_notfallseelsorge',);
    }


    /**
     * Display the odenwald_einsatznachsorge page.
     */
    public function odenwald_einsatznachsorge(Request $request): View
    {
        return view('odenwald.odenwald_einsatznachsorge',);
    }

    /**
     * Display the odenwald_ansprechpartner page.
     */
    public function odenwald_ansprechpartner(Request $request): View
    {
        return view('odenwald.odenwald_ansprechpartner',);
    }
}
