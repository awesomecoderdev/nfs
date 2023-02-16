<x-app-layout>
    @section('head')
        <title> Kontakt mit der Notfallseelsorge Bergstrasse | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')

    {{-- need replace link to route --}}

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/nfs_bergstrasse.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Kontakt mit der Notfallseelsorge Bergstrasse</h3>


        <p>Ludwigstr. 13<br />
            64646 Heppenheim<br />
            Telefon: 06252 / 67 33 53 <br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            06252 / 67 33 54</p>
        <p>E-Mail: mail@notfallseelsorge-bergstrasse.de</p>
        <p>&nbsp;</p>

        <p>Bürozeiten:<br>
            Dienstag, Mittwoch und Freitag, 9.00 bis 12.00 Uhr<br>
            Tel: 0 62 52 - 67 33 54 <br>
        </p>

        <p>Nutzen Sie auch gerne unser Kontaktformular. Bitte entscheiden Sie sich vorab für ein Thema, das erleichtert
            uns die Bearbeitung Ihrer Anfrage. Vielen Dank!</p>

        <p>
            <a href="/contact/?wid=449">Zum Kontaktformular</a>
        </p>

    </div>



</x-app-layout>
