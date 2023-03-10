<x-app-layout>
    @section('head')
        <title> Hilfe erfahren | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'hilfe')

    <div class="container ">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Hilfe erfahren</h1>
                <span class="wei400 fsi22">Not sehen, für Menschen da sein</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container ">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>In der Regel werden unsere Teams nach einem Ereignis durch die jeweiligen Rettungsleitstellen
                        alarmiert und zum Einsatz entsandt. Denn bei einem traumatisierenden Zwischenfall bzw.
                        Situationen, in denen sich plötzlich alles verändert, bei schweren Unfällen, Suizid oder
                        Gewalttaten, ist häufig nicht nur der Körper verletzt, auch die Seele braucht Hilfe.</p>
                    <p>Deshalb versteht sich die Notfallseelsorge als ein Bindeglied in der Rettungsdienstkette, um
                        psychisch traumatisierten Menschen erste Verarbeitungshilfen zu geben und sie in der
                        Schocksituation zu stabilisieren. Wir helfen mit, das Unfassbare des Geschehenen auszuhalten,
                        wir versuchen zu stabilisieren, geben Informationen, aktivieren soziale Bindungen, stärken
                        eigene Ressourcen der Betroffenen und bieten erste organisatorische Hilfen an. Auf Wunsch bauen
                        wir auch Brücken zu psychosozialen Einrichtungen bzw. Beratungsstellen.</p>
                    <p>So müssen Betroffene in den ersten schweren Stunden nach dem Ereignis nicht alleine sein. Denn
                        Notfallseelsorger haben Zeit, wenn andere Helfer wieder gehen müssen. Zuhören, zusammen
                        schweigen und Trauer und Schmerz gemeinsam aushalten – das gehört zur Begleitung von Menschen in
                        Notfall-Situationen. </p>
                    <p>Und jeder Mensch, der unsere Hilfe einfordert, erhält sie – unabhängig von Religion, Konfession
                        oder Nationalität – zu jeder Zeit, an allen Tagen im Jahr, rund um die Uhr und kostenfrei. </p>
                    <p>Erreichbar ist die Notfallseelsorge über die Notrufnummer 112.</p>
                </div>
                <div class="col span_8 clr swap">
                    <img src="{{ asset('img/05.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
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
