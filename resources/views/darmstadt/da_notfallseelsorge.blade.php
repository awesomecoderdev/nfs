<x-app-layout>
    @section('head')
        <title> Notfallseelsorge Darmstadt und Umgebung | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nov')



    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/darmstadt/foto_darmstadt.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Notfallseelsorge Darmstadt und Umgebung</h3>

        <p>Wir sind ein Team aus Seelsorger/innen und stehen Menschen in akuten Notsituationen bei. Wir sind da, wenn
            die Seele zerbricht - sei es beim Tod eines nahen Angehörigen, bei Suizid, Unfällen und anderen
            Katastrophen, die Menschen zutiefst verletzt zurücklassen. </p>
        <p>Wir stehen Betroffenen als erste Ansprechpartner/innen zur Verfügung und schaffen für die unmittelbaren
            Stunden nach dem Schock einen sicheren Gesprächsraum. Dabei orientieren wir uns immer an den Bedürfnissen
            der Menschen – denn jedes Leid ist einzig. Wir schweigen gemeinsam, tragen die Last mit, wir zeigen Wege zur
            Bewältigung des Schmerzes auf und Wege zurück ins Leben.</p>
        <p>In Kooperation mit Feuerwehr, Polizei und Rettungsdienst leisten wir die "Erste Hilfe für die Seele. In aller
            Regel werden wir von den Einsatzkräften gerufen, um Menschen nach einer schicksalhaften Erfahrung
            beizustehen. Manchmal brauchen auch die Einsatzkräfte im Rettungsdienst Beistand, um ihren Dienst am
            Menschen weiter leisten zu können. Nachrichten über den Tod von nahestehenden Menschen überbringen wir
            gemeinsam mit der Polizei.</p>
        <p>Unser Hilfsangebot ist vom Verständnis der christlichen Nächstenliebe getragen und richtet sich ausnahmslos
            an alle Menschen. Wer unsere Hilfe einfordert, erhält sie – und das zu jeder Zeit, an allen Tagen im Jahr,
            rund um die Uhr.</p>

    </div>

</x-app-layout>
