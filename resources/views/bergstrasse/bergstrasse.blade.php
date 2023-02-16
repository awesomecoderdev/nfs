<x-app-layout>
    @section('head')
        <title> Willkommen bei der Notfallseelsorge Bergstraße | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')

    {{-- need replace link to route --}}

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/bergstrasse/foto_starkenburg.jpg') }});">
        <span class="bu">Bild: Wirtschaftsförderung Bergstraße GmbH</span>
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Willkommen bei der Notfallseelsorge Bergstraße</h3>


        <p>Christliche Nächstenliebe ist der Beweggrund unseres Handelns, wenn wir Menschen, die mit einem plötzlichen
            Tod, einem Unfall, einem Suizid oder einem anderen einschneidenden Erlebnis konfrontiert sind, seelsorglich
            zur Seite stehen. </p>

        <p>In solchen lebensverändernden Ausnahmesituationen nehmen wir uns Zeit und hören zu. Wir halten Traurigkeit
            und Schmerz mit aus, in welcher Form er sich auch immer äußert. Wir leisten "Erste Hilfe für die Seele" wenn
            das gewohnte Leben zusammenbricht. Oft können wir auch für einen würdigen Abschied von Verstorbenen sorgen
            und geben Hinweise auf Trauergruppen und Beratungsstellen. Wir gehen die erste Schritte in die Trauer mit
            und versuchen so, sie zu erleichtern.</p>

        <p>Unsere Arbeit geschieht professionell und ehrenamtlich. Die Mitarbeitenden kommen aus unterschiedlichen
            Berufen und Lebenserfahrungen und wurden durch eine umfassende Ausbildung auf diesen Dienst vorbereitet. Die
            Notfallseelsorge im Kreis Bergstraße wird von den Kirchen, Rettungs- und Hilfsdiensten gemeinsam getragen.
            Den Flyer der NFS Bergstraße zum Download erhalten Sie
            <a href="/files/Flyer_NFS_Bergstrasse.pdf" target="_blank">hier</a>
        </p>

        <p>Über die zentrale Rettungsleitstelle in Heppenheim sind unsere Teams rund um die Uhr erreichbar und
            einsatzbereit. Wir leisten Hilfe, wo sie gewollt ist und unabhängig von Glaubenszugehörigkeit oder
            Weltanschauung. </p>

        <p>Wenn Sie den Dienst der Notfallseelsorge für sich oder andere in Anspruch nehmen möchten, rufen Sie bitte die
            Leitstelle unter der zentralen Notrufnummer 112 an. Wenn Sie Mitarbeiter/in der Rettungsdienste, der
            Feuerwehr oder anderer Hilfsdienste sind und nach einem belastenden Einsatz ein Gespräch suchen, finden Sie
            unter dem Stichwort "Einsatznachsorge" Ansprechpersonen. </p>

        <p>Für allgemeine Fragen zu unserer Arbeit nutzen Sie bitte das <a href="/contact">Kontaktformular</a> .</p>


    </div>


</x-app-layout>
