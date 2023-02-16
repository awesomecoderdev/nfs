<x-app-layout>
    @section('head')
        <title>Kontakt mit der Notfallseelsorge Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/notfallseelsorge100.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Kontakt mit der Notfallseelsorge Darmstadt-Dieburg</h3>


        <p>Ev. Dekanat Vorderer Odenwald<br />
            Am Darmstädter Schloß 2<br />
            64823 Groß-Umstadt<br />
            Telefon: 06078 / 78259-0 </p>

        <p>E-Mail: mail@notfallseelsorge-darmstadt-dieburg.de</p>




        <p>&nbsp;</p>
        <p>Nutzen Sie auch gerne unser Kontaktformular. Bitte entscheiden Sie sich vorab für ein Thema, das erleichtert
            uns die Bearbeitung Ihrer Anfrage. Vielen Dank!</p>

        {{-- route need to be changed --}}
        <a href="/contact/?wid=449">Zum Kontaktformular</a>
    </div>


</x-app-layout>
