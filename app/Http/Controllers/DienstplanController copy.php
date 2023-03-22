<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Aktuell;
use App\Models\AktuellCategory;
use App\Models\DienstplanBooked;
use App\Models\DienstplanVacation;
use App\Models\DienstplanContact;
use App\Models\DienstplanConfig;
use App\Models\DienstplanUserProps;
use Illuminate\Validation\Rule;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class DienstplanController extends Controller
{

    public function __construct(public $wid = 439)
    {
        $this->wid = request("wid", $this->wid);
    }

    /**
     * Redirect to home page.
     */
    public function index(Request $request)
    {
        return redirect()->route("index");
    }


    /**
     * Display the dienstplanOverview page.
     */
    public function dienstplanOverview(Request $request) //: View
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
     * Display the dienstplanAktuell page.
     */
    public function dienstplanAktuell(Request $request): View
    {
        return view('dienstplan.aktuell',);
    }

    /**
     * Display the months page.
     */
    public function months(Request $request) //: View
    {
        if (Auth::user()->admin()) {
            $users = User::select("first_name", "last_name", "username", "id")->whereNot("id", Auth::user()->id)->get();
        } else {
            $users = User::select("first_name", "last_name", "username", "id")->where("id", Auth::user()->id)->get();
        }
        $users = $users->pluck("name", "id");

        $start = strtotime(request("start", "now"));
        $start = $start ?? strtotime("now");
        $startOfMonth = $start - (30 * 86000);
        $endOfMonth = $start + (30 * 86000);

        $bookedArr = [];
        $bookedStaticArr = [];
        $bookings = DienstplanBooked::with(["user"])->select("id", "col", "start", "duration", "maintainer")
            ->where("start", ">", $startOfMonth)
            ->whereRaw('start + duration < ?', [$endOfMonth])
            ->get();
        $currentUser = User::select("first_name", "last_name", "id")->where("id", Auth::user()->id)->first();

        foreach ($bookings as $key => $booking) {
            $start = date("M-d-Y H:i", $booking->start);
            $end = date("M-d-Y H:i", $booking->start +  $booking->duration);

            $hours = $this->getHoursArray($start, $end);

            foreach ($hours as $hour) {
                $hour = str_replace("00:00", "24:00", $hour);
                $key = "$booking->col $hour";

                $bookedArr[$key] = [
                    "id" => $booking->id,
                    "col" => $booking->col,
                    "user" => $booking->maintainer,
                    "start" => $start,
                    "end" => $end,
                    "hours" => (count($hours) - 1),
                    "name" => $booking->user ? $booking->user->fullname() : "Unknown",
                ];

                $statickey = "$hour";

                $bookedStaticArr[$statickey] = [
                    "id" => $booking->id,
                    "col" => $booking->col,
                    "user" => $booking->maintainer,
                    "start" => $start,
                    "end" => $end,
                    "hours" => (count($hours) - 1),
                    "name" => $booking->user ? $booking->user->fullname() : "Unknown",
                ];
            }
        }
        return view('dienstplan.months', compact("users", "bookedArr", "bookedStaticArr", "currentUser"));
    }

    /**
     * Display the months page.
     */
    function getHoursArray($start, $end)
    {
        $hours = [];

        // Convert start and end times to DateTime objects
        $startTime =  DateTime::createFromFormat('M-d-Y H:i', $start);
        $endTime = DateTime::createFromFormat('M-d-Y H:i', $end);

        // Iterate over the hours between the start and end times
        while ($startTime <= $endTime) {
            $hours[] = $startTime->format('m-d-Y H:i');
            $startTime->modify('+1 hour');
        }

        return $hours;
    }
    /**
     * Display the vacation page.
     */
    public function vacation(Request $request) //: View
    {

        abort_if($request->user != null && !Auth::user()->admin(), \Illuminate\Http\Response::HTTP_NOT_FOUND); // only for admin access with perams
        if ($request->user != null) {
            $user = User::where("id", $request->user)->where("firma_id", 250)->first();
            abort_if($user == null, \Illuminate\Http\Response::HTTP_NOT_FOUND); // only for admin access with perams
        }
        $uid = $request->user ? intval($request->user) : Auth::user()->id;

        // get vacations
        $vacations = DienstplanVacation::with(["user"])->where("type", 0)
            ->where("user_id", $uid)
            // ->where("wid",$request->input("wid",439))
            ->whereRaw('start + duration > ?', [time()])
            ->orderBy('start',)
            ->get();

        // get outtimes
        $outtimes =  DienstplanVacation::with(["user"])->where("type", 1)
            ->where("user_id", $uid)
            // ->where("wid",$request->input("wid",439))
            ->whereRaw('start + duration > ?', [time()])
            ->orderBy('start',)
            ->get();

        // get fortbildungs
        $fortbildungs = DienstplanVacation::with(["user"])->where("type", 2)
            ->where("user_id", $uid)
            // ->where("wid",$request->input("wid",439))
            ->whereRaw('start + duration > ?', [time()])
            ->orderBy('start',)
            ->get();

        // get kranks
        $kranks =  DienstplanVacation::with(["user"])->where("type", 3)
            ->where("user_id", $uid)
            // ->where("wid",$request->input("wid",439))
            ->whereRaw('start + duration > ?', [time()])
            ->orderBy('start',)
            ->get();

        // get Sonstiges
        $sonstiges = DienstplanVacation::with(["user"])->where("type", 4)
            ->where("user_id", $uid)
            // ->where("wid",$request->input("wid",439))
            ->whereRaw('start + duration > ?', [time()])
            ->orderBy('start',)
            ->get();

        $users = User::select("id", "username", "first_name", "last_name")->where("firma_id", 250)->get();
        return view('dienstplan.vacation', compact("users", "uid", "vacations", "outtimes", "fortbildungs", "kranks", "sonstiges"));
    }


    /**
     * Store the vacation .
     */
    public function store(Request $request) //: View
    {
        $validatedData = $request->validate([
            'start' => 'required|date_format:Y-m-d|after:today',
            'end' => 'required|date_format:Y-m-d|after:today|different:start',
        ], [
            'start.required' => 'Bitte Startdatum auswählen.',
            'start.after' => 'Der Beginn muss ein Datum nach dem heutigen Tag sein.',
            'end.required' => 'Bitte Enddatum auswählen.',
            'end.after' => ' Das Ende muss ein Datum nach gestern sein.',
            'end.different' => 'Das Enddatum muss sich vom Startdatum unterscheiden.',
        ]);

        // dd($request->all());

        $user_id = Auth::user()->admin() ? intval($request->input("user_id", Auth::user()->id)) : Auth::user()->id;

        $pStart = DateTime::createFromFormat('Y-m-d', $request->start);
        $pEnd = DateTime::createFromFormat('Y-m-d', $request->end);
        if ($pStart->getTimestamp() > $pEnd->getTimestamp()) {
            $t = $pStart;
            $pStart = $pEnd;
            $pEnd = $t;
        }
        $pStart->setTime(0, 0, 0);
        $pEnd->setTime(23, 59, 59);

        $start = $pStart->getTimestamp();
        $end = $pEnd->getTimestamp();
        $wid = $request->input("webmodul_id", 439);
        $duration = $end - $start;

        $theVacations = DienstplanVacation::with(["user"])->where("wid", $this->wid)
            ->where("start", ">=", $start)
            ->whereRaw('start + duration < ?', [$end])
            ->get();


        // dd($start, $end);
        // dd($this->mergeWithExisting($start,$end,$request));


        // if (1 == 1) {


        //     //     $vacation = $this->data;
        //     //     $pStart = DateTime::createFromFormat('Y-m-d', $vacation['DienstplanVacation']['start']);
        //     //     $pEnd = DateTime::createFromFormat('Y-m-d', $vacation['DienstplanVacation']['end']);
        //     //     if ($pStart->getTimestamp() > $pEnd->getTimestamp()) {
        //     //         $t = $pStart;
        //     //         $pStart = $pEnd;
        //     //         $pEnd = $t;
        //     //     }
        //     //     $pStart->setTime(0, 0, 0);
        //     //     $pEnd->setTime(23, 59, 59);
        //     //     $vacation['DienstplanVacation']['start'] = $pStart->getTimestamp();
        //     //     $vacation['DienstplanVacation']['end'] = $pEnd->getTimestamp();

        //     //     $vacation['DienstplanVacation']['user_id'] = $uid;
        //     //     $vacation['DienstplanVacation']['wid'] = $this->webmodul_id;
        //     //     $duration = $vacation['DienstplanVacation']['end'] - $vacation['DienstplanVacation']['start'];
        //     //     $vacation['DienstplanVacation']['duration'] = $duration;

        //     //     // echo '<pre>';
        //     //     // print_r($vacation);
        //     //     // var_dump($this->DienstplanVacation->isBookable($vacation));
        //     //     // echo '</pre>';
        //     //     // die;
        // }

        if (!$this->mergeWithExisting($start,$end,$request)) {
            return redirect()->back()->with("alert", 'Urlaub/Auszeit konnte nicht gespeichert werden');
        }

        // if (!$this->isBookable("")) {
        //     return redirect()->back()->with("alert", "Bei der gew&auml;hlten Urlaubszeit kommt es zu &Uuml;berschneidungen mit bereits gebuchten Bereitschaftszeiten.");
        // } else {
        //     if (!$this->mergeWithExisting($start,$end,$request)) {
        //         return redirect()->back()->with("alert", 'Abwesenheit konnte nicht gespeichert werden');
        //     }
        // }


        dd(compact("user_id", "start", "end", "duration", "wid"));
    }


    /**
     * Delete the vacation .
     */
    public function delete(Request $request) //: View
    {
        if ($request->id == null) {
            return redirect()->back()->with("alert", "Urlaub/Auszeit konnte nicht gelöscht werden.");
        }

        if (Auth::user()->admin()) {
            $vacation = DienstplanVacation::where("id", $request->id)->first();
            // dd("admin",$vacation);

            if (!$vacation) {
                return redirect()->back()->with("alert", "Urlaub/Auszeit konnte nicht gelöscht werden.");
            }
        } else {
            $vacation = DienstplanVacation::where("id", $request->id)->where("user_id", Auth::user()->id)->first();

            if (!$vacation) {
                return redirect()->back()->with("alert", "Urlaub/Auszeit konnte nicht gelöscht werden.");
            }
        }

        try {
            //delete vactaion
            $vacation->delete();
            return redirect()->back()->with("success", "Urlaub/Auszeit wurde gelöscht.");
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->back()->with("alert", "Etwas ist schief gelaufen. Bitte versuche es erneut.");
        }
    }



    /**
     *
     * @return  boolval
     */
    public function isBookable($start,$end,$request)
    {
        return true;
        return false;


        // $DienstplanBooked = ClassRegistry::init('DienstplanBooked');
        // $start = $data['DienstplanVacation']['start'];
        // $end = $data['DienstplanVacation']['end']+1;
        // $overlaps = $DienstplanBooked->findOverlappingEvents($start,
        // 		$end,
        // 		$data['DienstplanVacation']['wid'],
        // 		$data['DienstplanVacation']['user_id']);
        // return empty($overlaps);

        // $overlaps = $this->findOverlappingEvents($start,
    }


    public function findOverlappingEvents( $start, $end, $wid )
    {
        $events = DienstplanVacation::with(["user"])
        ->where("wid", $wid)
        ->where("start", ">=", $start)
        ->whereRaw('start + duration < ?', [$end])
        ->get();

    	return $events;
    }



    public function mergeWithExisting($start, $end, $request)
    {
        $wid = $request->wid ?? $this->wid;
        $duration = $end - $start;

        $events = DienstplanVacation::with(["user"])
        ->where("wid", $wid)
        ->where("user_id", $request->user_id)
        ->where("type", $request->type)
        ->where("start", ">=", $start)
        ->whereRaw('start + duration < ?', [$end])
        ->get();

    	if( !empty($events) )
    	{
    		$minstart = $start;
    		$maxend = $end;
    		foreach( $events as $event )
    		{
    			$minstart = min( $minstart, $event->start);
    			$maxend = max( $maxend, $event->start + $event->duration );
    		}

    		foreach( $events as $event ){
                $event->delete();
            }
            
            try {
                $newVacation = new DienstplanVacation();
                $newVacation->user_id = $request->user_id;
                $newVacation->type = $request->type;
                $newVacation->start = $minstart;
                $newVacation->duration = $maxend-$minstart;
                $newVacation->wid = $wid;
                $newVacation->created = Carbon::now();
                $newVacation->modified = Carbon::now();
                $newVacation->save();
                return true;
            } catch (\Exception $e) {
                // throw $e;
                return false;
            }
    	}else{
            try {
                $newVacation = new DienstplanVacation();
                $newVacation->user_id = $request->user_id;
                $newVacation->type = $request->type;
                $newVacation->start = $start;
                $newVacation->duration = $duration;
                $newVacation->wid = $wid;
                $newVacation->created = Carbon::now();
                $newVacation->modified = Carbon::now();
                $newVacation->save();
                return true;
            } catch (\Exception $e) {
                // throw $e;
                return false;
            } 
        }

    }



    public function queryVacation(Request $request)
    {

        // $pStart = DateTime::createFromFormat('Y-m-d', $request->start);
        // $pEnd = DateTime::createFromFormat('Y-m-d', $request->end);
        // $pStart = DateTime::createFromFormat('d.m.Y', $from);
        // $pEnd = DateTime::createFromFormat('d.m.Y', $to);
        // if ($pStart > $pEnd) {
        //     $tmp = $pStart;
        //     $pStart = $pEnd;
        //     $pEnd = $tmp;
        // }
        // if (!$pStart) {
        //     $pStart = new DateTime();
        // }
        // if (!$pEnd) {
        //     $pEnd = clone $pStart;
        //     $pEnd->add(new DateInterval('P31D'));
        // }
        // $pStart->setTime(0, 0, 0);
        // $pEnd->setTime(23, 59, 59);
        // $start = $pStart->getTimestamp();
        // $end = $pEnd->getTimestamp();
        // $this->Paginator->settings = [
        //     'conditions' => [
        //         'wid' => $this->webmodul_id,
        //         'NOT' => [
        //             'OR' => [
        //                 'end <' => $start,
        //                 'start >' => $end,
        //             ],
        //         ],
        //     ],
        //     'order' => [
        //         'start' => 'ASC',
        //         'DienstplanUser.nachname' => 'ASC',
        //         'DienstplanUser.vorname' => 'ASC',
        //     ],
        //     'limit' => $this->DienstplanVacation->find('count'),
        // ];


        $user_id = Auth::user()->admin() ? intval($request->input("user_id", Auth::user()->id)) : Auth::user()->id;
        $start = $request->start ?? "now";
        $start = date("Y-m-d", strtotime($start));
        $end = $request->end ?? "now +1 month";
        $end = date("Y-m-d", strtotime($end));

        $pStart = DateTime::createFromFormat('Y-m-d', $start);
        $pEnd = DateTime::createFromFormat('Y-m-d', $end);
        if ($pStart->getTimestamp() > $pEnd->getTimestamp()) {
            $t = $pStart;
            $pStart = $pEnd;
            $pEnd = $t;
        }
        $pStart->setTime(0, 0, 0);
        $pEnd->setTime(23, 59, 59);

        $start = $pStart->getTimestamp();
        $end = $pEnd->getTimestamp();
        $wid = $request->input("webmodul_id", 439);
        $duration = $end - $start;

        // get vacation
        $vacations =  DienstplanVacation::with(["user"])
            ->when($user_id, function ($query) use ($user_id) {
                if (!Auth::user()->admin()) {
                    return $query->where("user_id", $user_id);
                }
            })
            // ->where("wid",$request->input("wid",439))
            ->where("start", ">", $start)
            ->whereRaw('start + duration < ?', [$end])
            ->orderBy("start", "DESC")
            ->get();
        return view('dienstplan.qryvacation', compact("vacations", "start", "end"));
    }

    public function admin(Request $request)
    {
        $users = User::where("firma_id", 250)->whereNot("id", Auth::user()->id)->when($request->by, function ($query) use ($request) {
            $sort = $request->sort ?? "asc";
            $sort = $sort == "asc" ? "asc" : "desc";

            $by =  in_array($request->by, ["last_name", "first_name", "email", "username", "strasse", "plz", "ort",]) ? $request->by : "id";

            return $query->orderBy($by, strtoupper($sort));
        })->paginate(10)->onEachSide(1);

        return view('dienstplan.admin', compact('users'));
    }

    public function editUser(Request $request)
    {
        $user = User::with(["props"])->whereNot("id", Auth::user()->id)->where("firma_id", 250)->where("id", $request->id)->first();
        if (!$user) {
            return redirect()->route("dienstplan.admin")->with("alert", "Benutzer nicht gefunden.");
        }
        return view('dienstplan.edituser', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $user = User::whereNot("id", Auth::user()->id)->where("firma_id", 250)->where("id", $request->id)->first();
        $props = $user->props;

        if (!$user) {
            return redirect()->route("dienstplan.admin");
        }

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => ['required', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'plain' => ['string', 'min:8', 'required'],
        ], [
            // 'start.required' => 'Bitte Startdatum auswählen.',
            // 'start.after' => 'Der Beginn muss ein Datum nach dem heutigen Tag sein.',
            // 'end.required' => 'Bitte Enddatum auswählen.',
            // 'end.after' => ' Das Ende muss ein Datum nach gestern sein.',
            // 'end.different' => 'Das Enddatum muss sich vom Startdatum unterscheiden.',
        ]);

        if (!$props) {
            $props = new DienstplanUserProps();
            $props->user_id = $user->id;
            $props->wid = $request->wid ?? 441;
            $props->created = Carbon::now();
        }
        $reqProps = $request->only([
            "pager",
            "funktion",
            "is_maintainer",
            "is_admin",
            "dienstplan_access",
            "hour_overview_access",
            "contact_maintainer",
        ]);
        $props->pager = $reqProps["pager"] ?? "";
        $props->funktion = $reqProps["funktion"] ?? "";
        $props->is_maintainer = $reqProps["is_maintainer"] ?? 0;
        $props->is_admin = $reqProps["is_admin"] ?? 0;
        $props->dienstplan_access = $reqProps["dienstplan_access"] ?? 0;
        $props->hour_overview_access = $reqProps["hour_overview_access"] ?? 0;
        $props->contact_maintainer = $reqProps["contact_maintainer"] ?? 0;
        $props->modified = Carbon::now();

        try {
            $props->save();
            $request['password'] = md5($request->plain);
            $user->update($request->all());

            return redirect()->route("dienstplan.edit", $user->id)->with("success", "Benutzer erfolgreich aktualisiert.");
        } catch (\Exception $e) {
            //throw $e;
            return redirect()->route("dienstplan.edit", $user->id)->with("alert", "Fehler beim aktualisieren des Benutzers.");
        }



        // $user->update($request->all());
    }

    public function deleteUser(Request $request)
    {

        if ($request->id == null) {
            return redirect()->route("dienstplan.admin")->with("alert", "Benutzer nicht gefunden.");
        }

        if (Auth::user()->admin()) {
            $user = User::whereNot("id", Auth::user()->id)->where("firma_id", 250)->where("id", $request->id)->first();
            // dd("admin",$user);

            if (!$user) {
                return redirect()->route("dienstplan.admin")->with("alert", "Benutzer nicht gefunden.");
            }
        }

        try {
            //delete user
            $user->delete();
            return redirect()->route("dienstplan.admin")->with("success", "Benutzer erfolgreich gelöscht.");
        } catch (\Exception $e) {
            //throw $e;
        }

        return redirect()->route("dienstplan.admin")->with("alert", "Etwas ist schief gelaufen. Bitte versuche es erneut.");
    }

    public function createUser(Request $request)
    {

        return view('dienstplan.createuser');
    }


    public function saveUser(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'plain' => 'string|min:8|required',
        ], [
            // 'start.required' => 'Bitte Startdatum auswählen.',
            // 'start.after' => 'Der Beginn muss ein Datum nach dem heutigen Tag sein.',
            // 'end.required' => 'Bitte Enddatum auswählen.',
            // 'end.after' => ' Das Ende muss ein Datum nach gestern sein.',
            // 'end.different' => 'Das Enddatum muss sich vom Startdatum unterscheiden.',
        ]);

        $request['password'] = md5($request->plain);
        $request['firma_id'] = 250;

        try {
            $user = User::create($request->all());
            $reqProps = [
                "wid" => $request->wid ?? 441,
                "user_id" => $user->id,
                "pager" =>  $request->pager ?? 0,
                "funktion" =>  $request->funktion ?? 0,
                "is_maintainer" =>  $request->is_maintainer ?? 0,
                "is_admin" =>  $request->is_admin ?? 0,
                "dienstplan_access" =>  $request->dienstplan_access ?? 0,
                "hour_overview_access" =>  $request->hour_overview_access ?? 0,
                "contact_maintainer" =>  $request->contact_maintainer ?? 0,
                "created" =>  Carbon::now(),
                "modified" => Carbon::now(),
            ];
            $props = DienstplanUserProps::create($reqProps);

            return redirect()->route("dienstplan.edit", $user->id)->with("success", "Benutzer erfolgreich erstellt.");
        } catch (\Exception $e) {
            throw $e;
            // return redirect()->route("dienstplan.user.create")->withInput()->with("alert", "Fehler beim Erstellen des Benutzers.");
        }
    }

    public function adminKontakte(Request $request)
    {
        $contacts = DienstplanContact::when($request->by, function ($query) use ($request) {
            $sort = $request->sort ?? "asc";
            $sort = $sort == "asc" ? "asc" : "desc";

            $by =  in_array($request->by, ["vorname", "nachname", "email", "strasse", "plz", "ort", "telefon"]) ? $request->by : "id";
            return $query->orderBy($by, strtoupper($sort));
        })->paginate(10)->onEachSide(1);
        return view('dienstplan.adminkontakte', compact('contacts'));
    }


    public function editKontakte(Request $request)
    {
        $kontakte = DienstplanContact::findOrFail($request->id);
        return view('dienstplan.editkontakte', compact('kontakte'));
    }

    public function updateKontakte(Request $request)
    {
        $kontakte = DienstplanContact::findOrFail($request->id);


        $validatedData = $request->validate([
            // "anrede" =>  "required" ,
            "vorname" => "required",
            "nachname" =>  "required",
            "email" =>  "required",
            "strasse" =>  "required",
            "plz" =>  "required",
            "ort" =>  "required",
            "telefon" =>  "required",
            "telefon_priv" =>  "required",
            "mobil" =>  "required",
            "notmobil" =>  "required",
            "funktion" =>  "required",
        ], []);


        try {
            $request['anrede'] = $request->anrede ?? ($kontakte->anrede ?? "");
            $request['modified'] = Carbon::now();
            $kontakte->update($request->all());
            $request['firma_id'] = 250;
            $request['wid'] = $request->wid ?? 441;
            return redirect()->route("dienstplan.admin.kontakte")->with("success", "Kontakte erfolgreich aktualisiert.");
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->route("dienstplan.kontakte.edit", $kontakte->id)->withInput()->with("alert", "Die Daten konnten nicht &uuml;bernommen werden.");
        }

        dd($request->all());
    }


    public function deleteKontakte(Request $request)
    {
        if ($request->id == null) {
            return redirect()->route("dienstplan.admin.kontakte")->with("alert", "Kontakte nicht gefunden.");
        }

        if (Auth::user()->admin()) {
            $kontakte = DienstplanContact::where("id", $request->id)->first();

            if (!$kontakte) {
                return redirect()->route("dienstplan.admin.kontakte")->with("alert", "Kontakte nicht gefunden.");
            }
        }

        try {
            //delete kontakte
            $kontakte->delete();
            return redirect()->route("dienstplan.admin.kontakte")->with("success", "Kontakte erfolgreich gelöscht.");
        } catch (\Exception $e) {
            //throw $e;
        }

        return redirect()->route("dienstplan.admin.kontakte")->with("alert", "Etwas ist schief gelaufen. Bitte versuche es erneut.");
    }

    public function createKontakte(Request $request)
    {
        return view('dienstplan.createkontakte');
    }

    public function storeKontakte(Request $request)
    {

        $validatedData = $request->validate([
            // "anrede" =>  "required" ,
            "vorname" => "required",
            "nachname" =>  "required",
            "email" =>  "required",
            "strasse" =>  "required",
            "plz" =>  "required",
            "ort" =>  "required",
            "telefon" =>  "required",
            "telefon_priv" =>  "required",
            "mobil" =>  "required",
            "notmobil" =>  "required",
            "funktion" =>  "required",
        ], []);

        try {
            $request['anrede'] = $request->anrede ?? "";
            $request['created'] = Carbon::now();
            $request['modified'] = Carbon::now();
            $request['firma_id'] = 250;
            $request['wid'] = $request->wid ?? 441;
            $kontakte = DienstplanContact::create($request->all());
            return redirect()->route("dienstplan.kontakte.edit", $kontakte->id)->with("success", "Kontakte erfolgreich erstellt.");
        } catch (\Exception $e) {
            throw $e;
            return redirect()->route("dienstplan.kontakte.create")->withInput()->with("alert", "Fehler: Der Datensatz konnte nicht angelegt werden.");
        }

        dd($request->all());
    }


    public function settings(Request $request)
    {
        // DienstplanConfig
        $config = DienstplanConfig::with(["user"])->where("id", $this->wid)->first();
        $users = User::where("firma_id", 250)->whereNot("id", Auth::user()->id)->orderBy("first_name", "ASC")->get();
        return view('dienstplan.settings', compact('users', 'config'));
    }


    public function updateSettings(Request $request)
    {
        $config = DienstplanConfig::where("id", $this->wid)->first();
        $request['editable_profile'] = $request->editable_profile == "on" ? 1 : 0;
        $request['apply_week'] = $request->apply_week == "on" ? 1 : 0;
        $request['allnumbers'] = $request->allnumbers == "on" ? 1 : 0;
        $request['show_h'] = $request->show_h == "on" ? 1 : 0;
        $config->update($request->all());

        return redirect()->route("dienstplan.settings")->with("success", "Einstellungen erfolgreich aktualisiert.");
    }


    public function hourOverview(Request $request)
    {
        $wid = $this->wid;
        $sort = $request->sort ?? 0;
        $maintainers = [];


        $start = $request->start ? strtotime($request->start) : strtotime("-30 day", strtotime("midnight"));
        $end = $request->end ? strtotime('tomorrow', strtotime($request->end)) : time();

        if ($start > $end) {
            $tmp = $end;
            $end = $start;
            $start = $tmp;
        }

        $users = User::where("firma_id", 250)->orderBy("first_name", "ASC")->get();

        $tbl = array();
        $events = DienstplanBooked::with(["user"])->where("wid", $this->wid)
            ->where("start", ">=", $start)
            ->whereRaw('start + duration < ?', [$end])
            ->get();

        foreach ($events as $key => $event) {
            if ($event->user) {
                if (in_array($event->user->id, $maintainers)) {
                    $maintainers[] = $event->user->id;
                    $tbl[$event->user->id]["hours"] += $event->duration / 3600;
                } else {
                    $maintainers[] = $event->user->id;
                    $tbl[$event->user->id] = [
                        "first_name" => $event->user->first_name,
                        "last_name" => $event->user->last_name,
                        "hours" => $event->duration / 3600,
                    ];
                }
            }
        }


        if ($sort == 1) {
            $tbl = collect($tbl)->sortBy('first_name')->toArray();
        } elseif ($sort == -1) {
            $tbl = collect($tbl)->sortByDesc('first_name')->toArray();
        } elseif ($sort == 2) {
            $tbl = collect($tbl)->sortBy('last_name')->toArray();
        } elseif ($sort == -2) {
            $tbl = collect($tbl)->sortByDesc('last_name')->toArray();
        } elseif ($sort == 3) {
            $tbl = collect($tbl)->sortBy('hours')->toArray();
        } elseif ($sort == -3) {
            $tbl = collect($tbl)->sortByDesc('hours')->toArray();
        }

        $tbl = array_values($tbl);

        return view('dienstplan.houroverview', compact('sort', 'tbl', 'start', 'end', 'wid'));
    }


    public function bookdienstplan(Request $request)
    {
        $hours = $request->hours;
        $col = $request->col;
        $maintainer = $request->user;
        $months = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        );


        try {
            $start = current($hours);
            $start = str_replace("24:00", "00:00", $start);
            $end = end($hours);
            $endexpload = explode("-", $end);
            $endmonth = $months[$endexpload[0]];
            $end = substr($end, 2);
            $endofmonth = "$endmonth$end";


            $start = DateTime::createFromFormat('m-d-Y H:i', "$start")->getTimestamp();
            $end = DateTime::createFromFormat('M-d-Y H:i', "$endofmonth")->getTimestamp();

            $duration = $end - $start;
            $total = $start + $duration;
            $total = date("d-m-Y h:i:s A", $total);


            try {
                if (Auth::user()->admin()) {
                    $user = DienstplanBooked::create([
                        "wid" => $this->wid,
                        "col" => $col,
                        "start" => $start,
                        "duration" => $duration,
                        "maintainer" => $maintainer,
                        "creator_id" => Auth::user()->id,
                        "created" => Carbon::now(),
                        "modified" =>  Carbon::now(),
                    ]);
                } else {
                    $user = DienstplanBooked::create([
                        "wid" => $this->wid,
                        "col" => $col,
                        "start" => $start,
                        "duration" => $duration,
                        "maintainer" => Auth::user()->id,
                        "creator_id" => Auth::user()->id,
                        "created" => Carbon::now(),
                        "modified" => Carbon::now(),
                    ]);
                }
                return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->with(
                    "success",
                    "Der Urlaub wurde erfolgreich gespeichert."
                );
            } catch (\Exception $e) {
                // throw $e;
                return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->withErrors(
                    ["alert" => "Der buchbare Bereich konnte nicht in die Datenbank übertragen werden."]
                );
            }

            dd($request->all(), $start, $end, $duration, $total);
        } catch (\Exception $e) {
            // throw $e;
            return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->withErrors(
                ["alert" => "Es kam zu Überschneidungen mit anderen Bereitschafts- oder Urlaubszeiten. Die Bereitschaftszeit wurde nicht angelegt."]
            );
        }
    }

    public function deleteBookdienstplan(Request $request)
    {
        try {
            $booking = DienstplanBooked::where("id", $request->id)->first();
            if (Auth::user()->admin()) {
                $booking->delete();
            } else {
                if ($booking->maintainer == Auth::user()->id) {
                    $booking->delete();
                } else {
                    return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->withErrors(
                        ["alert" => "Etwas ist schief gelaufen, bitte versuchen Sie es nach einiger Zeit erneut."]
                    );
                }
            }
            return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->with(
                "success",
                "Buchung erfolgreich gelöscht."
            );
        } catch (\Exception $e) {
            // throw $e;
            return redirect()->route('dienstplan.months', ["start" => request("start", date("d-m-yyyy")), "wid" => $this->wid])->withErrors(
                ["alert" => "Etwas ist schief gelaufen, bitte versuchen Sie es nach einiger Zeit erneut."]
            );
        }
    }
}
