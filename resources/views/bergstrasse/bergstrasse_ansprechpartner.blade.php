<x-app-layout>
    @section('head')
        <title> Ansprechpartner der Notfallseelsorge Bergstrasse | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')

    {{-- need replace link to route --}}

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/bergstrasse/foto_ansprechpartner.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Ansprechpartner der Notfallseelsorge Bergstrasse</h3>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/bergstrasse/foto_ritter.jpg') }}"
                    alt="Ansprechpartner der Notfallseelsorge Bergstrasse">
            </div>
            <div class="column-6 aps">
                <p><br /><br /><br />Pfarrerin Karin Ritter <br />
                    Leiterin der Notfallseelsorge</p>
                <p>ritter(at)haus-der-kirche.de </p>
            </div>
        </div>



        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/bergstrasse/foto_geiger.jpg') }}" alt="Pfarrerin Karin Ritter ">
            </div>
            <div class="column-6 aps">
                <p><br /><br /><br />Sabina Geiger<br />
                    Büro der Notfallseelsorge</p>
                <p>notfallseelsorge(at)haus-der-kirche.de</p>
            </div>
        </div>

    </div>

</x-app-layout>
