<x-app-layout>
    @section('head')
        <title> Darmstadt und Umgebung | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nfsdarmstadt')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Darmstadt und Umgebung</h1>
                <span class="wei400 fsi22">Notfallseelsorge vor Ort</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Wir sind da, wenn die Seele zerbricht - sei es beim Tod eines nahen Angehörigen, bei Suizid,
                        Unfällen und anderen Katastrophen, die Menschen zutiefst verletzt zurücklassen. Als erste
                        Ansprechpartner schaffen wir, als ein Team aus Seelsorgern und Seelsorgerinnen, Betroffenen für
                        die unmittelbaren Stunden nach dem Schock einen sicheren Gesprächsraum. Dabei orientieren wir
                        uns bei jedem Einsatz an den Bedürfnissen der Menschen – denn jedes Leid ist einzig. Wir
                        schweigen gemeinsam, tragen die Last mit, wir zeigen Wege zur Bewältigung des Schmerzes und der
                        Trauer auf sowie Wege zurück ins Leben.</p>
                    <p> Hier erfahren Sie mehr über unsere Arbeit...</p>
                </div>
                <div class="col span_8 clr swap">
                    <div class="nfsvol mb10">
                        <img class="scale schick" src="{{ secure_asset('img/01.jpg') }}" alt="ALTERNATIVTEXT">
                    </div>
                    <div class="nfsvor mb10">
                        <img class="scale schick" src="{{ secure_asset('img/08.jpg') }}" alt="ALTERNATIVTEXT">
                    </div>
                    {{-- <!--  <div class="col span_8 clr">
                        </div>--> --}}

                    <img class="scale schick" src="{{ secure_asset('img/02.jpg') }}" alt="ALTERNATIVTEXT">
                </div>
            </div>
        </div>

        <div class="container mt80">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h2>Notfallseelsorge Darmstadt und Umgebung</h2>
                    <span class="wei400 fsi18">Organisation und Finanzierung</span>
                </div>
            </div>
        </div>

        <div class="container mt40 hyp">
            <div class="row gutters">
                <div class="col span_16 clr">
                    <div class="borders">
                        <p>1999 schloss sich ein Team aus Krankenhausseelsorgern zusammen und begann mit der Planung der
                            Notfallseelsorge Darmstadt-Dieburg. Auch die beiden Dekanate Darmstadt-Stadt und
                            Darmstadt-Land beteiligten sich am Aufbau der Organisation, die schließlich am 2. Februar
                            2000 mit 35 ausgebildeten Notfallseelsorger/innen in Rufbereitschaft ging.</p>
                        <p>Noch heute sind die damals festgelegten Ausbildungs-Parameter und Organisationsstrukturen
                            maßgebend für das Team der Notfallseelsorge Darmstadt und Umgebung, deren Einsatzgebiet die
                            Stadt Darmstadt und den westlichen Teil des Landkreises Darmstadt-Dieburg umfasst.</p>
                        <p>Unter der Trägerschaft des evangelischen Dekanats Darmstadt-Stadt kooperiert die
                            Notfallseelsorge Darmstadt und Umgebung inzwischen mit zwei Notarztwachen und sieben
                            Rettungswachen. Finanziert wird diese Arbeit von der Evangelischen Kirche in Hessen und
                            Nassau (EKHN), den beiden Dekanaten Darmstadt-Stadt und Darmstadt-Land, dem Bistum Mainz,
                            aus Kirchensteuermitteln und Spenden.</p>
                        <p>Rund 55 Menschen engagieren sich zurzeit ehrenamtlich in der Einsatznachsorge und der
                            Notfallseelsorge Darmstadt und Umgebung. Geleitet wird die Organisation von Pfarrer Heiko
                            Ruff-Kapraun. Zur Seite steht ihm dabei Susanne Fitz, Gemeindereferentin des Bistums Mainz.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!--
            <div class="container mt80">
                <div class="row gutters">
                    <div class="col span_16 clr tar">
                        <h2>Einssatznachsorge</h2>
                        <span class="wei400 fsi18">Darmstadt und Umgebung</span>
                    </div>
                </div>
            </div>

            <div class="container mt40 hyp">
            <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                <p>Im Jahr 2008 erweiterte die Notfallseelsorge Darmstadt und Umgebung  ihr Aufgabengebiet um die Einsatznachsorge für die Mitarbeitenden bei Feuerwehr und Rettungsdienst. Denn: Ein schwerer Unfall, ein Brand, ein Suizid oder der Tod eines Kindes – all das hinterlässt bei den Einsatzkräften Bilder im Kopf, die nur schwer zu verarbeiten sind. Darüber reden entlastet, denn nicht immer reicht es aus, selbst nochmal alleine für sich das Einsatzgeschehen zu reflektieren.</p>
                <p>Unverarbeitete Erlebnisse aus Einsätzen können jedoch dazu führen, dass die Lebensqualität deutlich eigeschränkt wird. Durch Prävention kann das Risiko für Spätfolgen reduziert werden. Meistens reicht ein strukturiertes Gespräch mit einer psychosozialen Fachkraft aus, um die Erlebnisse aufzuarbeiten, denn sogar alltägliche Einsätze können als seelisch belastend empfunden werden.</p>
                <p>Mit einem besonders geschulten Team können wir diese wichtige Aufgabe leisten. Es steht unter der Leitung von Susanne Fitz und setzt sich aus erfahrenen Mitarbeitern der Hilfsorganisationen und der Feuerwehr zusammen. Jederzeit, kostenfrei und rund um die Uhr steht jemand für ein vertrauliches Gespräch zur Verfügung. Auch präventive Schulungen zum Thema bieten wir an.</p>
                <p>Kontakt zur Einsatznachsorge Darmstadt erhalten Sie über Leitfunkstelle Darmstadt, Telefon 06151-957 809 908 oder per E-Mail unter <a href="mailto:einsatznachsorge-darmstadt@web.de">einsatznachsorge-darmstadt@web.de</a>.</p>
                </div>
            </div>
            </div>
            </div>
        -->

        <div class="container mt80">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h2>Kontakt zur Notfallseelsorge Darmstadt und Umgebung</h2>
                    <span class="wei400 fsi18">Ihre Ansprechpartner</span>
                </div>
            </div>
        </div>

        <div class="container mt40">
            <div class="row gutters">
                <div class="col span_8 clr wimg">
                    <div class="borders tar">
                        <img src="{{ secure_asset('img/Phillips-Willumeit.jpg') }}" alt="ALTERNATIVTEXT"
                            class="schick2"><br>
                        <span class="blue">Erika Phillips-Willumeit</span>
                        Medizinische Fachangestellte<br>
                        Telefon: 0175 - 52 59 186<br>
                        <span>"Notfallseelsorge ist für mich zuverlässig für Menschen in Not da zu sein."</span>
                    </div>
                </div>
                <div class="col span_8 clr wimg">
                    <div class="borders tar">
                        <img src="{{ secure_asset('img/Grosskopf.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>
                        <span class="blue">Marcus-Stefan Großkopf</span>
                        Evangelischer Pfarrer<br>
                        Telefon: 0151 - 20 27 32 64<br>
                        <span>"Notfallseelsorge ist für mich, Zeit zu haben, um Ruhepunkte für Menschen in Not zu
                            schaffen."</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt40">
            <div class="row gutters">
                <div class="col span_8 clr wimg">
                    <div class="borders tar">

                        <img src="{{ secure_asset('img/Ruff-Kapraun.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>

                        <span class="blue">Heiko Ruff-Kapraun</span>
                        Evangelischer Pfarrer<br>
                        Telefon: 0171 - 3 744 999<br>
                        E-Mail: <a href="mailto: ruff-kapraun@nfs-suedhessen.de">ruff-kapraun@nfs-suedhessen.de</a><br>
                        <span>"Im Notfall gehören wir alle zusammen."<br><br></span>
                    </div>
                </div>
                <div class="col span_8 clr wimg">
                    <div class="borders tar">
                        <img src="{{ secure_asset('img/Fitz.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>

                        <span class="blue">Susanne Fitz</span>
                        Kath. Dekanatsbeauftragte für Notfallseelsorge<br>
                        Telefon: 0176 - 12 53 90 65<br>
                        E-Mail: <a href="mailto: susanne.fitz@bistum-mainz.de">susanne.fitz@bistum-mainz.de</a><br>
                        <span>"Weil Menschen Menschen brauchen, die Halt geben und aushalten können."</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt40">
            <div class="row gutters">
                <div class="col span_8 clr wimg">
                    <div class="borders tar">
                        <img src="{{ secure_asset('img/Pfalzgraf.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>

                        <span class="blue">Bettina Pfalzgraf</span>
                        Dipl. Kauffrau (Project Management Office)<br>
                        E-Mail: <a href="mailto: bettina-pfalzgraf@t-online.de">bettina-pfalzgraf@t-online.de</a><br>
                        <span>"Ich engagieren mich in der Notfallseelsorge, weil ich die Begegnung mit Menschen
                            mag."</span>
                    </div>
                </div>
                <div class="col span_8 clr wimg">
                    <div class="borders tar">
                        <img src="{{ secure_asset('img/Fairley.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>

                        <span class="blue">Iris Fairley</span>
                        Medizinisch-technische Assistentin<br>
                        E-Mail: <a href="mailto: irisfairley@aol.com">irisfairley@aol.com</a><br>
                        <span>"Notfallseelsorge bedeutet für mich Zeit zu haben für Menschen in Not."</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt40">
            <div class="row gutters">
                <div class="col span_8 clr wimg">
                    <div class="borders tar">

                        <img src="{{ secure_asset('img/Winterstein.jpg') }}" alt="ALTERNATIVTEXT" class="schick2"><br>

                        <span class="blue">Detlef Winterstein</span>
                        Unternehmensberater<br>
                        E-Mail: <a href="mailto: detlef@winterstein.ws">detlef@winterstein.ws</a><br>
                        <span>"In der Notfallseelsorge liegt für mich ein tiefer Lebenssinn."</span>
                    </div>
                </div>
            </div>


            <div class="container mt80">
                <div class="row gutters">

                    <div class="borders bgblue tar">
                        <span class="blue">Ihr Kontakt zur Notfallseelsorge Darmstadt</span><br>
                        Ev. Dekanat Darmstadt-Stadt<br>
                        Rheinstr. 31 <br>
                        64283 Darmstadt<br>
                        Telefon: 0 61 51 - 1 36 24 24<br>
                        <br>
                        E-Mail: <a href="mailto: mail@nfs-darmstadt.de"> mail@nfs-darmstadt.de</a>
                    </div>
                </div>
            </div>


            <div class="container mt80">
                <div class="row gutters">
                    <div class="col span_4 clr">

                        <div>
                            <a class="btnwhite esc" href="/bergstrasse">Bergstraße</a>
                        </div>
                    </div>

                    <div class="col span_4 clr">
                        <div>
                            <a class="btnwhite esc" href="/darmstadt-und-umgebung">Darmstadt</a>
                        </div>
                    </div>

                    <div class="col span_4 clr">
                        <div>
                            <a class="btnwhite esc" href="/darmstadt-dieburg">Darmstadt-Dieburg</a>
                        </div>
                    </div>

                    <div class="col span_4 clr">
                        <div>
                            <a class="btnwhite esc" href="/odenwald">Odenwaldkreis</a>
                        </div>
                    </div>


                </div>
            </div>


            <div class="fullblue">
                <div class="container mt80">
                    <div class="row gutters">
                        <div class="col span_16 clr tar">
                            <h2>Erste Hilfe für die Seele</h2>
                            <span class="wei400 fsi18">Stabilisieren, orientieren, Ressourcen aktivieren</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fullblue" style="margin-top: 0 !important">
                <div class="container">
                    <div class="row gutters cols4 hyp">
                        <div class="col span_4 clr">
                            <div class="borders white">
                                <h3>Hilfe erfahren</h3>
                                <p>In der Regel werden unsere Teams nach einem Ereignis durch die jeweiligen
                                    Rettungsleitstellen alarmiert und zum Einsatz entsandt. Denn bei einem...</p>
                                <a class="btn2" href="/hilfe-erfahren">Mehr erfahren</a>
                            </div>
                        </div>
                        <div class="col span_4 clr">
                            <div class="borders white">
                                <h3>Einsatznachsorge</h3>
                                <p>Das Leben von Menschen zu retten oder Menschen zu bergen, ist keine leichte Arbeit.
                                    Das wissen auch die Einsatzkräfte von Rettungsdienst und Feuerwehr...</p>
                                <a class="btn2" href="/einsatznachsorge">Mehr erfahren</a>
                            </div>
                        </div>
                        <div class="col span_4 clr">
                            <div class="borders white">
                                <h3>Mit-machen</h3>
                                <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu
                                    Menschen haben, sich gut auf die Not anderer einlassen können und bereit...</p>
                                <a class="btn2" href="/mitmachen">Mehr erfahren</a>
                            </div>
                        </div>
                        <div class="col span_4 clr">
                            <div class="borders white">
                                <h3>Mit-helfen</h3>
                                <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es
                                    auch weiterhin bleiben. Doch die Aus- und Weiterbildung der
                                    Notfallseelsorger/innen...</p>
                                <a class="btn2" href="/mithelfen">Mehr erfahren</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
