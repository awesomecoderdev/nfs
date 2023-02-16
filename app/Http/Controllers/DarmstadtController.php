<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class DarmstadtController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(Request $request): View
    {
        return view('darmstadt.index',);
    }

    /**
     * Display the einsatznachsorge page.
     */
    public function einsatznachsorge(Request $request): View
    {
        return view('darmstadt.einsatznachsorge',);
    }

    /**
     * Display the da_orga page.
     */
    public function da_orga(Request $request): View
    {
        return view('darmstadt.da_orga',);
    }

    /**
     * Display the darmstadt_kontakt page.
     */
    public function darmstadt_kontakt(Request $request): View
    {
        return view('darmstadt.darmstadt_kontakt',);
    }


    /**
     * Display the da_einsatznachsorge page.
     */
    public function da_einsatznachsorge(Request $request): View
    {
        return view('darmstadt.da_einsatznachsorge',);
    }

    /**
     * Display the da_notfallseelsorge page.
     */
    public function da_notfallseelsorge(Request $request): View
    {
        return view('darmstadt.da_notfallseelsorge',);
    }


    /**
     * Display the da_ansprechpartner page.
     */
    public function da_ansprechpartner(Request $request): View
    {
        return view('darmstadt.da_ansprechpartner',);
    }
}
