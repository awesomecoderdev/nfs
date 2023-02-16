<x-app-layout>
    @section('head')
        <title> Kontakt mit der Notfallseelsorge Darmstadt und Umgebung | {{ __(config('app.name')) }}</title>
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
        <h3> Kontakt mit der Notfallseelsorge Darmstadt und Umgebung</h3>


        <p>Ev. Dekanat Darmstadt-Stadt<br />
            Rheinstr. 31 <br />
            64283 Darmstadt<br />
            Telefon: 06151/136 24 24</p>

        <p>E-Mail: mail@notfallseelsorge-darmstadt.de</p>




        <p>&nbsp;</p>
        <p>Nutzen Sie auch gerne unser Kontaktformular. Bitte entscheiden Sie sich vorab für ein Thema, das erleichtert
            uns die Bearbeitung Ihrer Anfrage. Vielen Dank!</p>

        <p>
            {{-- route need to be changed --}}
            <a href="/contact/?wid=449">Zum Kontaktformular</a>
        </p>

    </div>



</x-app-layout>
