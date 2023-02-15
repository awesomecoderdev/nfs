<x-app-layout>
    @section('head')
        <title> Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nfsdadi')
    {{-- need replace link to route --}}


    <div class="container row">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Darmstadt-Dieburg</h1>
                <span class="wei400 fsi22">Notfallseelsorge vor Ort</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container row">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Seit über 20 Jahren gibt es die Notfallseelsorge Darmstadt-Dieburg nun schon. Weit mehr als 2000
                        Betreuungen hat das Team in dieser Zeit geleistet und sich zu einem wichtigen Bestandteil der
                        Rettungskette entwickelt. Denn in Notsituationen sollte niemand alleine sein. Sie sind
                        Schnittstellen des Lebens, an denen Fragen nach Sinn und Schuld aufbrechen. Wir wissen um den
                        Schrecken und helfen, wenn die Seele in Gefahr ist. Weil alles ohne Aussicht scheint, weil alles
                        unbegreiflich ist, weil die Not die Worte verschlingt. Sicher Geglaubtes geht verloren,
                        Lebensentwürfe zerbrechen. Für unsere Aufgabe sind wir fachlich qualifiziert, arbeiten rein
                        ehrenamtlich und stets nach dem Motto: Frage das Herz mit allem was du kannst, dann weiß der
                        Verstand immer um den nächsten Schritt.</p>
                    <p> Hier erfahren Sie mehr über unsere Arbeit...</p>
                </div>
                <div class="col span_8 clr swap">
                    <div class="nfsvol mb10">
                        <img src="{{ secure_asset('img/01.jpg') }}" class="scale schick" alt="ALTERNATIVTEXT">
                    </div>
                    <div class="nfsvor mb10">
                        <img src="{{ secure_asset('img/10.jpg') }}" class="scale schick" alt="ALTERNATIVTEXT">
                    </div>
                    {{-- <!--  <div class="col span_8 clr"> --}}
                    <img src="{{ secure_asset('img/02.jpg') }}" class="scale schick" alt="ALTERNATIVTEXT">
                    {{-- </div>--> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Notfallseelsorge Darmstadt-Dieburg</h2>
                <span class="wei400 fsi18">Organisation und Finanzierung</span>
            </div>
        </div>
    </div>

    <div class="container row mt40 hyp">
        <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                    <p>1999 gründete das evangelische Dekanat Groß-Umstadt die Notfallsorge für den östlichen Teil des
                        Landkreises Darmstadt-Dieburg und den dortigen Feuerwehrverband. Während die Arbeit anfangs noch
                        ausschließlich von freiwilligen Gemeindeseelsorgern getragen wurde, übernahm 2005 ein Kreis von
                        Ehrenamtlichen die wertvolle Aufgabe im ländlich strukturierten Einzugsbereich Frankfurt,
                        Darmstadt und Aschaffenburg.</p>
                    <p>Inzwischen besteht das Team der Notfallseelsorge Darmstadt-Dieburg aus rund 20 Personen und wird
                        vom evangelischen Pfarrer aus Groß-Zimmern, Michael Fornoff, sowie der katholischen
                        Gemeindereferentin Susanne Fitz koordiniert und geleitet. Alle Mitarbeiter engagieren sich rein
                        ehrenamtlich und wurden fachlich qualifiziert auf ihre Aufgabe in einer kostenfreien Ausbildung
                        zum Notfallseelsorger vorbereitet. </p>
                    <p>Dennoch gibt es immer wieder Einsätze und Anforderungen, bei denen auch wir an die Grenzen
                        unserer Belastbarkeit stoßen. Gut zu wissen, wenn einem dann ein guter Engel beisteht, der
                        Sicherheit und Hilfe gibt. Ein Schutzengel begleitet uns deshalb bei all unseren Einsätzen,
                        spendet Kraft und hilft dabei, die eigenen Gefühle nach einem Einsatz wieder zu ordnen. Der
                        Engel begleitet aber nicht nur unsere Wege – wir bringen ihn auch zu den Menschen, auf die wir
                        bei unseren Einsätzen treffen. Er steht für Schutz und der Sehnsucht nach Hilfe und Heilung.
                        Ermutigend, kraftschöpfend und tröstend. Das passt gut zu uns und ist vergleichbar mit unserer
                        Arbeit.</p>
                    <p>Finanziert wird diese vom Träger, dem Dekanat Vorderer Odenwald, unter Beteiligung der
                        evangelischen Gesamtkirche und des katholischen Bistums Mainz. Doch für die Arbeit der
                        Notfallseelsorge, für die Organisation, die Verwaltung oder die Anschaffung von Kleidung sind
                        wir auf weitere Zuwendungen angewiesen. Wenn Sie die Notfallseelsorge Darmstadt-Dieburg also mit
                        einer Geldspende fördern möchten, freut uns das sehr.</p>
                    <p>Eine Überweisung können Sie unter folgender Bankverbindung vornehmen:</p>
                    <p>Ev. Regionalverwaltung Starkenburg-Ost
                        Sparkasse Dieburg<br>
                        IBAN: DE46 5085 0150 0002 0078 00<br>
                        BIC: ELADEF1DAS<br>
                        Verwendungszweck: "Notfallseelsorge Darmstadt-Dieburg"</p>
                </div>
            </div>
        </div>
    </div>

    <!--
            <div class="container row mt80">
                <div class="row gutters">
                    <div class="col span_16 clr tar">
                        <h2>Einssatznachsorge</h2>
                        <span class="wei400 fsi18">Darmstadt-Dieburg</span>
                    </div>
                </div>
            </div>

            <div class="container row mt40 hyp">
            <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                <p>Uns liegt sehr viel daran, dass Einsatzkräfte auch nach vielen Einsätzen, keine Einschränkung ihrer Lebensqualität erleiden. Denn auch ein Retter kommt mal in Not, wird von Ereignissen eingeholt und von Gefühlen um ihn herum überwältigt. In solchen Momenten kann es hilfreich sein, das Angebot der Notfallseelsorge in Anspruch zu nehmen, zu dem auch die Einsatznachsorge gehört. </p>
                <p>Nicht immer ist es nämlich möglich, das Einsatzgeschehen alleine zu verarbeiten. Bilder geistern durch den Kopf, im Schlaf holt einen das Erlebte wieder ein. Solch traumatischer Stress ist nur schwer erkennbar und kann auf die Dauer krank machen. Durch Prävention kann das Risiko für Spätfolgen jedoch reduziert werden. Meistens reicht ein strukturiertes Gespräch mit einer psychosozialen Fachkraft aus, um die Erlebnisse aufzuarbeiten. Hierfür stehen wir Ihnen daher jederzeit und rund um die Uhr zur Verfügung. Die Gespräche sind selbstverständlich kostenlos, vertraulich und unterliegen der Verschwiegenheit. Gegebenenfalls können wir weitere Hilfsangebote vermitteln.</p>
                <p>Die Kontaktaufnahme zur Einsatznachsorge kann über die verschiedenen Wege erfolgen: </p>
                <ul>
                  <li>Beauftragte für die Einsatznachsorge Darmstadt-Dieburg ist Susanne Fitz, Telefon 0176 - 12 53 90 65 </li>
                  <li>E-Mail: <a href="mailto:einsatznachsorge-darmstadt@web.de">einsatznachsorge-darmstadt@web.de</a></li>
                  <li>Leitstelle Darmstadt-Dieburg, Telefon 06151-957 809 908</li>
                </ul>
                </div>
            </div>
            </div>
            </div>
        -->

    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Kontakt zur Notfallseelsorge Darmstadt-Dieburg</h2>
                <span class="wei400 fsi18">Ihre Ansprechpartner</span>
            </div>
        </div>
    </div>

    <div class="container row mt40">
        <div class="row gutters">
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img src="{{ secure_asset('img/Fitz.jpg') }}" class="schick2" alt="ALTERNATIVTEXT">
                    <span class="blue">Susanne Fitz</span>
                    Kath. Dekanatsbeauftragte für Notfallseelsorge<br>
                    Kommissarische Leitung<br>
                    Telefon: 0176 - 12 53 90 65<br>
                    E-Mail: <a href="mailto: susanne.fitz@bistum-mainz.de">susanne.fitz@bistum-mainz.de</a><br>
                    <span>"Weil Menschen Menschen brauchen, die Halt geben und aushalten können."</span>
                </div>
            </div>
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img src="{{ secure_asset('img/Fornoff.jpg') }}" class="schick2" alt="ALTERNATIVTEXT">
                    <br>
                    <span class="blue">Michael Fornoff</span>
                    Evangelischer Pfarrer<br>
                    Kommissarische Leitung<br>
                    Telefon: 0172 - 666 56 53<br>
                    E-Mail: <a href="mailto: mfornoff@gmx.de">mfornoff@gmx.de</a><br>
                    <span>"In der Notfallseelsorge engagiere ich mich, um Menschen in der Not zur Seite zu
                        stehen."</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container row mt80">
        <div class="row gutters">

            <div class="borders bgblue tar">
                <span class="blue">Ihr Kontakt zur Notfallseelsorge Darmstadt</span><br>
                Ev. Dekanat Vorderer Odenwald<br>
                Am Darmstädter Schloss 2<br>
                64823 Groß-Umstadt<br>
                Telefon: 0 60 78 - 7 82 59 - 0 <br><br>
                E-Mail: <a href="mailto: mail@nfs-darmstadt-dieburg.de ">mail@nfs-darmstadt-dieburg.de </a>
            </div>

        </div>
    </div>

    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_4 clr">

                <div>
                    <a href="/bergstrasse" class="btnwhite esc">Bergstraße</a>
                </div>
            </div>

            <div class="col span_4 clr">
                <div>
                    <a href="/darmstadt-und-umgebung" class="btnwhite esc">Darmstadt</a>

                </div>
            </div>

            <div class="col span_4 clr">
                <div>
                    <a href="/darmstadt-dieburg" class="btnwhite esc">Darmstadt-Dieburg</a>
                </div>
            </div>

            <div class="col span_4 clr">
                <div>
                    <a href="/odenwald" class="btnwhite esc">Odenwaldkreis</a>
                </div>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container row mt80">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h2>Erste Hilfe für die Seele</h2>
                    <span class="wei400 fsi18">Stabilisieren, orientieren, Ressourcen aktivieren</span>
                </div>
            </div>
        </div>
    </div>

    <div class="fullblue" style="margin-top: 0 !important">
        <div class="container row">
            <div class="row gutters cols4 hyp">
                <div class="col span_4 clr">
                    <div class="borders white">
                        <h3>Hilfe erfahren</h3>
                        <p>In der Regel werden unsere Teams nach einem Ereignis durch die jeweiligen Rettungsleitstellen
                            alarmiert und zum Einsatz entsandt. Denn bei einem...</p>
                        <a class="btn2" href="/hilfe-erfahren">Mehr erfahren</a>
                    </div>
                </div>
                <div class="col span_4 clr">
                    <div class="borders white">
                        <h3>Einsatznachsorge</h3>
                        <p>Das Leben von Menschen zu retten oder Menschen zu bergen, ist keine leichte Arbeit. Das
                            wissen auch die Einsatzkräfte von Rettungsdienst und Feuerwehr...</p>
                        <a class="btn2" href="/einsatznachsorge">Mehr erfahren</a>
                    </div>
                </div>
                <div class="col span_4 clr">
                    <div class="borders white">
                        <h3>Mit-machen</h3>
                        <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu Menschen
                            haben, sich gut auf die Not anderer einlassen können und bereit...</p>
                        <a class="btn2" href="/mitmachen">Mehr erfahren</a>
                    </div>
                </div>
                <div class="col span_4 clr">
                    <div class="borders white">
                        <h3>Mit-helfen</h3>
                        <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es auch
                            weiterhin bleiben. Doch die Aus- und Weiterbildung der Notfallseelsorger/innen...</p>
                        <a class="btn2" href="/mithelfen">Mehr erfahren</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
