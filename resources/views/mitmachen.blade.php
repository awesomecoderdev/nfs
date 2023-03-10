<x-app-layout>
    @section('head')
        <title> Mit-machen | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'mitmachen')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Mit-machen</h1>
                <span class="wei400 fsi22">Wer helfen will, muss sich auskennen</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Sie können sich vorstellen, die Notfallseelsorge Südhessen mit Ihrem Engagement zu unterstützen?
                        Großartig! </p>
                    <p>Die Notfallseelsorge ist an 365 Tagen im Jahr über 24 Stunden einsatzbereit. Um dies
                        gewährleisten zu können, ist großes ehrenamtliches Engagement unverzichtbar. Gleichzeitig sind
                        für die Einsätze in der Notfallseelsorge spezielle Kenntnisse erforderlich, nicht nur im Umgang
                        mit den Betroffenen, sondern auch über die besonderen Bedingungen bei Rettungs- oder
                        Polizeieinsätzen.</p>
                    <p>Aus diesem Grund ist eine fundierte Ausbildung notwendig, bevor jemand als Notfallseelsorgerin
                        oder -seelsorger in einen Einsatz gerufen werden kann. Die Notfallseelsorge Südhessen bietet
                        jedes Jahr Kurse, die zur Mitarbeit qualifizieren. Für künftig Mitarbeitende sind diese
                        kostenfrei. Die Gebühren trägt die evangelische Kirche in Hessen und Nassau.</p>
                    <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu Menschen haben,
                        sich gut auf die Not anderer einlassen können und bereit sein, sich mit Themen wie Tod, Leid und
                        Sterben auseinander zu setzen. Wenn Sie zudem gerne in einem Team arbeiten und bereit sind, eine
                        qualifizierte Ausbildung zu absolvieren, dann könnten Sie bei uns an der richtigen Stelle sein.
                    </p>
                    <p>Fragen, Voraussetzung etc. können im persönlichen Austausch besprochen werden. Rufen Sie bitte an
                        unter Tel.: 0171-3744999</p>
                </div>
                <div class="col span_8 clr swap">
                    <img class="scale schick" src="{{ asset('img/07.jpg') }}" alt="ALTERNATIVTEXT">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Erste Hilfe für die Seele</h2>
                <span class="wei400 fsi18">Stabilisieren, orientieren, Ressourcen aktivieren</span>
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
                    <a class="btn2" href="/einsatznachsorge">Mehr Erfahren</a>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-machen</h3>
                    <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu Menschen haben,
                        sich gut auf die Not anderer einlassen können und bereit...</p>
                    <a class="btn2" href="/mitmachen">Mehr Erfahren</a>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-helfen</h3>
                    <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es auch weiterhin
                        bleiben. Doch die Aus- und Weiterbildung der Notfallseelsorger/innen...</p>
                    <a class="btn2" href="/mithelfen">Mehr Erfahren</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
