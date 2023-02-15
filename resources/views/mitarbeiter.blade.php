<x-app-layout>
    @section('head')
        <title> Mitarbeiter | {{ __(config('app.name')) }}</title>
    @endsection


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/foto_maintern.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Mitarbeiter</h3>
        <p>
            In der Notfallseelsorge tätige Frauen und Männer arbeiten haupt- oder ehrenamtlich. Die ehrenamtlich
            Arbeitenden sind in verschiedenen Berufsfeldern tätig. Allen gemein ist, dass sie für die Begleitung von
            Menschen in Krisen ausgebildet und erfahren in der Notfallseelsorge sind. Denn eine gute Ausbildung, die
            ständige Weiterbildung und der Austausch von Erfahrungen nach den Einsätzen bilden die Grundlage für unsere
            kompetente Arbeit.
        </p>
    </div>

    <div class="column-3 push-1 bgwhite">
        <div class="quote">
            <p>
                <i class="fa fa-quote-left"></i> manchmal sind wir alle bausteine und können mit einander häuser bauen,
                brücken schlagen oder sogar kirchen errichten, stein für stein für stein, auch auf dem steinigsten weg
                liegen grundsteine für ein anderes leben <i class="fa fa-quote-right"></i>
            </p>
        </div>
    </div>

</x-app-layout>
