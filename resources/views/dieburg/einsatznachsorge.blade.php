<x-app-layout>
    @section('head')
        <title> Willkommen bei der Notfallseelsorge Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')
    {{-- need replace link to route --}}

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/engagieren100.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Einsatznachsorge Darmstadt-Dieburg</h3>

        <p>Text</p>


    </div>
</x-app-layout>
