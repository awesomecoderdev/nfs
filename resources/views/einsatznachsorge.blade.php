<x-app-layout>
    @section('head')
        <title> Einsatznachsorge | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'einsatznachsorge')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Einsatznachsorge</h1>
                <span class="wei400 fsi22">Hilfe für Helfer</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container ">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Ein schwerer Verkehrsunfall, ein Großschadensereignis, ein Suizid oder der Tod eines Kindes - im
                        Einsatz erleben die Helferinnen und Helfer von Rettungsdienst und Feuerwehr teilweise
                        traumatisierende Bilder und Geschichten, die sich nur schwer verarbeiten lassen. Auch deren
                        Seele leidet dann unter den Eindrücken dieser Erlebnisse und benötigt Erste Hilfe. </p>
                    <p>Unterstützung zur qualifizierten Nachbearbeitung dieser belastenden Momente und Bilder im Kopf
                        erfahren Einsatzkräfte und alle anderen, die danach fragen, durch speziell ausgebildete
                        Mitglieder der Notfallseelsorge Südhessen.
                    <p>Ziel dieser Einsatznachsorge ist es, die persönlichen Ressourcen der Helfer/innen zu stärken. So
                        begleiten wir die Mitarbeiter/innen nach besonders belastenden Ereignissen, führen
                        professionelle Einzelgespräche oder sorgen für strukturierte Einsatznachbesprechungen zur
                        besseren Aufarbeitung des Erlebten. </p>
                    <p>Die vier Einrichtungen der Notfallseelsorge organisieren die Einsatznachsorge
                        eigenverantwortlich.</p>
                </div>
                <div class="col span_8 clr swap">
                    <img src="{{ secure_asset('img/06.jpg') }}" class="scale schick" alt="ALTERNATIVTEXT">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt80">
        <div class="row gutters cols4">
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Bergstrasse</h3>
                    <p>Leitstelle</p>
                    <p>Telefon: <br>06252 - 99 700</p>
                    <p>E-Mail: <br><br><br></p>

                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Darmstadt</h3>
                    <p>Leitstelle</p>
                    <p>Telefon: <br>06151-957 809 908</p>
                    <p>E-Mail: <br><a
                            href="mailto:einsatznachsorge-darmstadt@web.de">einsatznachsorge-darmstadt@web.de</a></p>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Darmstadt-Dieburg</h3>
                    <p>Leitstelle</p>
                    <p>Telefon: <br>06151-957 809 908</p>
                    <p>E-Mail: <br><a
                            href="mailto:einsatznachsorge-darmstadt@web.de">einsatznachsorge-darmstadt@web.de</a></p>
                    </p>
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Odenwald</h3>
                    <p>Leiststelle</p>
                    <p>Telefon: <br><br></p>
                    <p>E-Mail: <br><a
                            href="mailto:einsatznachsorge@nfs-odenwald.de">einsatznachsorge@nfs-odenwald.de</a></p>
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
