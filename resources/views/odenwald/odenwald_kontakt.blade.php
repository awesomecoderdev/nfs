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
        <h3> Kontakt mit der Notfallseelsorge und Krisenintervention im Odenwaldkreis</h3>


        <p>Notfallseelsorge und Krisenintervention im Odenwaldkreis<br />
            Obere Pfarrgasse23<br />
            64720 Michelstadt<br />
            Telefon: 0151 29 50 37 02</p>
        <p>E-Mail: leitung@nfs-odenwald.de




        <p>&nbsp;</p>
        <p>Nutzen Sie auch gerne unser Kontaktformular. Bitte entscheiden Sie sich vorab für ein Thema, das erleichtert
            uns die Bearbeitung Ihrer Anfrage. Vielen Dank!</p>

        <p>
            <a href="/contact/?wid=449">Zum Kontaktformular</a>
        </p>

    </div>


</x-app-layout>
