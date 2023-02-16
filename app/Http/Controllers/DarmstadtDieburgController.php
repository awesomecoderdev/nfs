<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class DarmstadtDieburgController extends Controller
{
    /**
     * Display the index page.
     */
    public function index(Request $request): View
    {
        return view('dieburg.index',);
    }

    /**
     * Display the dadi page.
     */
    public function dadi(Request $request): View
    {
        return view('dieburg.dadi',);
    }


    /**
     * Display the einsatznachsorge page.
     */
    public function einsatznachsorge(Request $request): View
    {
        return view('dieburg.einsatznachsorge',);
    }


    /**
     * Display the dadi_orga page.
     */
    public function dadi_orga(Request $request): View
    {
        return view('dieburg.dadi_orga',);
    }


    /**
     * Display the dadi_kontakt page.
     */
    public function dadi_kontakt(Request $request): View
    {
        return view('dieburg.dadi_kontakt',);
    }


    /**
     * Display the dadi_notfallseelsorge page.
     */
    public function dadi_notfallseelsorge(Request $request): View
    {
        return view('dieburg.dadi_notfallseelsorge',);
    }


    /**
     * Display the dadi_einsatznachsorge page.
     */
    public function dadi_einsatznachsorge(Request $request): View
    {
        return view('dieburg.dadi_einsatznachsorge',);
    }


    /**
     * Display the dadi_ansprechpartner page.
     */
    public function dadi_ansprechpartner(Request $request): View
    {
        return view('dieburg.dadi_ansprechpartner',);
    }
}
