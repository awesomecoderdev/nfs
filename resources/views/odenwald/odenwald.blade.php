<x-app-layout>
    @section('head')
        <title> Notfallseelsorge und Krisenintervention Odenwaldkreis | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nov')

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/odenwald/foto_team.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Notfallseelsorge und Krisenintervention Odenwaldkreis</h3>

        <p>Not zu sehen und für Menschen da zu sein, wenn sie mit einem plötzlichen Todesfall konfrontiert werden: Das
            ist das zentrale Anliegen der Notfallseelsorge und Krisenintervention im Odenwaldkreis. Dieser Aufgabe
            stellen sich die ehrenamtlichen Mitarbeiter/innen. </p>

        <p>Jeder Mensch verhält sich nach einem lebensverändernden Ereignis anders. Manchmal hinterlässt eine
            Todesnachricht Angehörige taub, wie versteinert und der Boden unter den Füßen scheint wegzubrechen. Manchmal
            bricht sich die Verzweiflung ihre Bahnen. In solchen Situationen ist es heilsam, jemanden zu haben, der die
            Sprachlosigkeit mit aushält. </p>

        <p>Unser Team ist auch für die Einsatzkräfte in Rettungsdienst und Feuerwehr nach belastenden Erfahrungen da.
            Für diese Einsatznachsorge sind einzelne Teammitglieder speziell ausgebildet und abrufbar. </p>

        <p>Unser Hilfsangebot ist vom Verständnis der christlichen Nächstenliebe getragen und richtet sich ausnahmslos
            an alle Menschen. Wir arbeiten ökumenisch und stehen im interkulturellen Gespräch. Wer unsere Hilfe
            einfordert, erhält sie – und das zu jeder Zeit, an allen Tagen im Jahr, rund um die Uhr. </p>

        <iframe class="ytframebig" src="https://www.youtube.com/embed/XgrryV8N3xg?rel=0&autoplay=0" frameborder="0"
            allowfullscreen></iframe>
    </div>

</x-app-layout>
