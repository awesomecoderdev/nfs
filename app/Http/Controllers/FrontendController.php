<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aktuell;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\AktuellCategory;
use App\Models\DienstplanBooked;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        // if (!Auth::user()) {
        //     $user = User::where("email", "little.jannie@example.net")->first();
        //     Auth::login($user, true);
        // }
        return view('index',);
    }

    /**
     * Redirect to home page.
     */
    public function redirect(Request $request)
    {
        return redirect()->route("index");
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
    // public function aktuell(Request $request): View
    // {
    //     return view('aktuell',);
    // }
    public function aktuell(Request $request)
    {
        if (!$request->wid) {
            return redirect()->route("index");
        }

        // return Aktuell::with(["category"])->limit(100)->orderBy("date",'DESC')->orderBy("sort",'DESC')->get();
        // $cats= AktuellCategory::with(['aktuell'])->limit(10)->get();

        // $aktuells = Aktuell::with(["category"])->where("firma_id",250)->when($request->wid, function($query) use($request){
        //     return $query->where("webmodul_id",$request->wid);
        // })->orderBy("date",'DESC')->orderBy("sort",'DESC')->get();

        $aktuells = Aktuell::with(["category"])
            ->where("firma_id", 250)
            ->when($request->wid, function ($query) use ($request) {
                return $query->where("webmodul_id", $request->wid);
            })
            ->limit(100)
            ->orderBy("date", 'DESC')
            ->orderBy("sort", 'DESC')
            ->get();

        return view('aktuell', compact("aktuells"));
    }


    /**
     * Display the aktuellr page.
     */
    public function aktuellr(Request $request)
    {
        if (!$request->id || !$request->wid) {
            return redirect()->route("index");
        }

        $category = AktuellCategory::where("webmodul_id", $request->wid)->findOrFail($request->id);
        $category->load(["aktuell"]);

        // return $category;
        return view('aktuellr', compact("category",));
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
     * Display the einsatzprotokoll_da page.
     */
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


    /**
     * Display the odienstplanOverview page.
     */
    public function odienstplanOverview(Request $request) //: View
    {
        $start = strtotime("midnight");
        $end = strtotime("+1 month", strtotime("tomorrow"));

        if ($request->start != null) {
            $start = intval($request->start);
        }

        if ($request->end != null) {
            $end = strtotime("tomorrow", intval($request->end));
        }

        return DienstplanBooked::with(["user"])->orderBy('start')->limit(100)->get();

        return view('dienstplan.overview', compact("start", "end",));
    }

    /**
     * Display the odienstplanAktuell page.
     */
    public function odienstplanAktuell(Request $request): View
    {
        return view('dienstplan.aktuell',);
    }
}
