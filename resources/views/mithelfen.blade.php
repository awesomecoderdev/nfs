<x-app-layout>
    @section('head')
        <title> Mit-helfen | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'mithelfen')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Mit-helfen</h1>
                <span class="wei400 fsi22">Stiften Sie Trost</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Sie möchten die Arbeit der Notfallseelsorge mit einer Spende unterstützen? </p>
                    <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es auch weiterhin
                        bleiben. Doch die Aus- und Weiterbildung der Notfallseelsorger/innen kostet Geld. Auch unsere
                        Mitarbeitenden benötigen Ausstattung und Dienstkleidung. Umso mehr freuen wir uns, wenn Sie das
                        Engagement der Notfallseelsorge Südhessen finanziell unterstützen möchten. (Spendenquittungen
                        stellen wir ab einem Betrag von 50 Euro aus)</p>
                    <p>Auch eine Mitgliedschaft im Förderverein der jeweiligen Region ist möglich. Durch Ihren Beitrag
                        sichern Sie unsere Arbeit langfristig.</p>
                    <p>Für Ihre Hilfe sagen wir ganz herzlich „Danke“.</p>
                    <a href="/files/Bankverbindungen.pdf" class="btn">Jetzt spenden</a>
                </div>
                <div class="col span_8 clr swap">
                    <img src="{{ asset('img/07.jpg') }}" alt="ALTERNATIVTEXT" class="scale schick">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Erste Hilfe für die Seele</h2>
                <span class="wei400 fsi18"> Stabilisieren, orientieren, Ressourcen aktivieren</span>
            </div>
        </div>
    </div>

    <div class="container mt40 hyp">
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
