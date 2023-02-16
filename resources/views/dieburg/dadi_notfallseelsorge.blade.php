<x-app-layout>
    @section('head')
        <title>Notfallseelsorge Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/dadi/foto_dadi.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Notfallseelsorge Darmstadt-Dieburg</h3>

        <p>Wir sind ein Team aus Seelsorgerinnen und Seelsorgern und stehen Menschen in akuten Notsituationen bei. Wir
            sind da, wenn die Seele zerbricht - sei es beim Tod eines nahen Angehörigen, bei Suizid, Unfällen und
            anderen Katastrophen, die uns alle zutiefst verletzt zurücklassen. Wir schweigen gemeinsam, tragen die Last
            mit, wir zeigen Wege zur Bewältigung des Schmerzes auf und Wege zurück ins Leben.</p>
        <p>In Kooperation mit Feuerwehr, Polizei und Rettungsdienst leisten wir "Erste Hilfe für die Seele. In aller
            Regel werden wir von den Einsatzkräften gerufen, um Menschen nach einer lebensverändernden Situation
            beizustehen. Manchmal brauchen auch die Einsatzkräfte im Rettungsdienst Beistand, um ihren Dienst am
            Menschen weiter leisten zu können.
        </p>
        <p>Unser Hilfsangebot ist vom Verständnis der christlichen Nächstenliebe getragen und richtet sich ausnahmslos
            an alle Menschen. Wir arbeiten ökumenisch und sind am interkulturellen Dialog interessiert. Wer unsere Hilfe
            einfordert, erhält sie – und das zu jeder Zeit, an allen Tagen im Jahr, rund um die Uhr.</p>


    </div>


</x-app-layout>
