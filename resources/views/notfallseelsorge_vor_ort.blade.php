<x-app-layout>
    @section('head')
        <title> Notfallseelsorge vor Ort | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'notfallseelsorge')

    <div class="container row">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Notfallseelsorge vor Ort</h1>
                <span class="wei400 fsi22">Darmstadt &bull; Darmstadt-Dieburg &bull; Odenwaldkreis &bull;
                    Bergstraße</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container row">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Um den ehrenamtlichen Aufgabe in ganz Südhessen gerecht zu werden, ist die Notfallseelsorge in
                        den Landkreisen Bergstraße, Odenwald, Darmstadt-Dieburg und der kreisfreien Stadt Darmstadt in
                        eigenständigen Einrichtungen für Notfallseelsorge organisiert. Diese Einrichtungen vor Ort
                        werden jeweils durch eine Pfarrstelle für Notfallseelsorge fachlich begleitet und organisiert.
                        Seit 2012 sind die vier regionalen Einrichtungen der Notfallseelsorge in Südhessen in einer
                        Kooperation verbunden – hier stellen sie ihre Arbeit vor. </p>

                    <div class="holdeml mb10">
                        <a class="btn esc" href="/bergstrasse">Bergstraße</a>
                    </div>
                    <div class="holdemr mb10;">
                        <a class="btn esc" href="/darmstadt-und-umgebung">Darmstadt</a>
                    </div>
                    <div class="clearme"></div>
                    <div class="holdeml">
                        <a class="btn esc" href="/darmstadt-dieburg">Darmstadt-Dieburg</a>
                    </div>
                    <div class="holdemr">
                        <a class="btn esc" href="/odenwald">Odenwaldkreis</a>
                    </div>
                </div>
                <div class="col span_8 clr swap">
                    <div class="nfsvol mb10">
                        <img src="{{ secure_asset('img/01.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
                    </div>
                    <div class="nfsvor mb10">
                        <img src="{{ secure_asset('img/02.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
                    </div>
                    <div class="nfsvol">
                        <img src="{{ secure_asset('img/04.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
                    </div>
                    <div class="nfsvor">
                        <img src="{{ secure_asset('img/03.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Erste Hilfe für die Seele</h2>
                <span class="wei400 fsi18">Stabilisieren, orientieren, Ressourcen aktivieren</span>
            </div>
        </div>
    </div>

    <div class="container row mt40 hyp">
        <div class="row gutters cols4">
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Hilfe erfahren</h3>
                    <p>In der Regel werden unsere Teams nach einem Ereignis durch die jeweiligen Rettungsleitstellen
                        alarmiert und zum Einsatz entsandt. Denn bei einem...</p>
                    <a class="btn2" href="/hilfe-erfahren">Mehr erfahren</a>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Einsatznachsorge</h3>
                    <p>Das Leben von Menschen zu retten oder Menschen zu bergen, ist keine leichte Arbeit. Das wissen
                        auch die Einsatzkräfte von Rettungsdienst und Feuerwehr...</p>
                    <a class="btn2" href="/einsatznachsorge">Mehr erfahren</a>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-machen</h3>
                    <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu Menschen haben,
                        sich gut auf die Not anderer einlassen können und bereit...</p>
                    <a class="btn2" href="/mitmachen">Mehr erfahren</a>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-helfen</h3>
                    <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es auch weiterhin
                        bleiben. Doch die Aus- und Weiterbildung der Notfallseelsorger/innen...</p>
                    <a class="btn2" href="/mithelfen">Mehr erfahren</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
