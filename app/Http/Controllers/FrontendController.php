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

    /**
    //  * Display the einsatzprotokoll_da page.
    //  */
    // public function einsatzprotokoll_da(Request $request): View
    // {
    // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    // header('Cache-Control: post-check=0, pre-check=0', false);
    // header('Pragma: no-cache');
    // return view('einsatzprotokoll_da');
    // }


    /**
     * Display the odenwald page.
     */
    public function odenwald(Request $request): View
    {
        return view('odenwald',);
    }

    /**
     * Display the notfallseelsorge page.
     */
    public function notfallseelsorge(Request $request): View
    {
        return view('notfallseelsorge',);
    }


    /**
     * Display the mitmachen page.
     */
    public function mitmachen(Request $request): View
    {
        return view('mitmachen',);
    }

    /**
     * Display the mithelfen page.
     */
    public function mithelfen(Request $request): View
    {
        return view('mithelfen',);
    }

    /**
     * Display the einsatzprotokoll_ow page.
     */
    public function einsatzprotokoll_ow(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('einsatzprotokoll_ow',);
    }


    /**
     * Display the einsatzprotokoll_nachsorge_da page.
     */
    public function einsatzprotokoll_nachsorge_da(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('einsatzprotokoll_nachsorge_da',);
    }

    /**
     * Display the reflexion_berg page.
     */
    public function reflexion_berg(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('reflexion_berg',);
    }

    /**
     * Display the hilfe_erfahren page.
     */
    public function hilfe_erfahren(Request $request): View
    {
        return view('hilfe_erfahren',);
    }

    /**
     * Display the reflexion_da page.
     */
    public function reflexion_da(Request $request): View
    {
        return view('reflexion_da',);
    }

    /**
     * Display the darmstadt_und_umgebung page.
     */
    public function darmstadt_und_umgebung(Request $request): View
    {
        return view('darmstadt_und_umgebung',);
    }

    /**
     * Display the einsatzprotokoll_dadi page.
     */
    public function einsatzprotokoll_dadi(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('einsatzprotokoll_dadi',);
    }
    /**
     * Display the reflexion_dadi page.
     */
    public function reflexion_dadi(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('reflexion_dadi',);
    }

    /**
     * Display the reflexion_ow page.
     */
    public function reflexion_ow(Request $request): View
    {
        // header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
        return view('reflexion_ow',);
    }

    /**
     * Display the notfallseelsorge_vor_ort page.
     */
    public function notfallseelsorge_vor_ort(Request $request): View
    {
        return view('notfallseelsorge_vor_ort',);
    }
}
