<x-app-layout>
    @section('head')
        <title> Organisation & Förderverein | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nov')

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/odenwald/foto_steine.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Organisation & Förderverein</h3>

        <p>Die Notfallseelsorge und Krisenintervention im Odenwaldkreis ist eine Einrichtung des Deutschen Roten Kreuzes
            (Kreisverband Odenwaldkreis) und des Evangelischen Dekanats Odenwald. Sie besteht seit 1999.</p>

        <p>Die beiden Träger haben sich verbunden, um Menschen in Krisensituationen zu unterstützen. Diese
            Zusammenarbeit ist eine Besonderheit in Hessen und durch einen Kooperationsvertrag geregelt. </p>

        <p>Beide Träger finanzieren die Einrichtung und ermöglichen damit allen Menschen im Odenwaldkreis eine
            professionelle Hilfe in akuten seelischen Krisensituationen.</p>

        <p>Die Evangelische Kirche in Hessen und Nassau stellt eine halbe Pfarrstelle zur Leitung der Arbeit bereit.
            <!--Seit 2004 ist liegt Aufgabe bei Pfarrerin Annette Herrmann-Winter.-->
        </p>

        <p> Verschiedene andere Einrichtungen des Odenwaldkreises unterstützen die Arbeit finanziell, zum Beispiel das
            Katholische Dekanat Erbach, der Odenwaldkreis und das Evangelische Dekanat Vorderer Odenwald.</p> <br />



        <p>
        <h3>Der Förderverein</h3>
        </p>
        <p>Seit 2006 ermöglicht der Förderverein die kontinuierliche Finanzierung der Aus- und Weiterbildung der
            Ehrenamtlichen, ihre Ausrüstung sowie die Öffentlichkeitsarbeit. Denn ohne die Spende von Einzelpersonen,
            Kommunen, Verbänden und anderen Institutionen ist die Arbeit nicht zu denken.</p>

        <p><b>Der Vorstand:</b><br />
            Vorsitzender Konrad Bäumle (DRK) <br />
            Finanzverantwortliche Elisabeth König (DRK)<br />
            Justiziarin Christa Weyrauch (DRK)<br />
            sowie Inge Büchler (Ev. Dekanat Odenwald) und Dr. Gabriele Hauer (Ev. Dekanat Odenwald)</p>

        <p>Sie können den Förderverein durch Ihre Mitgliedschaft unterstützen oder durch eine Spende einen Beitrag zu
            unserer Arbeit leisten. Dafür einen herzlichen Dank!</p>


        <p><b>Spendenkonto</b>:<br />
            Förderverein Notfallseelsorge und Krisenintervention<br />
            Sparkasse Odenwaldkreis<br />
            IBAN DE 78 5085 1952 0031 0015 63 <br />
            BIC HELADEF1ERB</p>


        <p>Weitere Information, auch wie Sie Mitglied im Förderverein werden können, finden Sie im
            <strong>
                <a href="/files/Flyer_Foerderverein_Odenwald.pdf" target="_blank">Flyer des Förderverein Notfallseelsorge
                    und Krisenintervention im Odenwaldkreis </a>.
    </div>
</x-app-layout>
