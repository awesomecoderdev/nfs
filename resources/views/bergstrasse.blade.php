<x-app-layout>
    @section('head')
        <title> Bergstrasse | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nfsbergstrasse')

    {{-- need replace link to route --}}

    <div class="container row">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Bergstraße</h1>
                <span class="wei400 fsi22">Notfallseelsorge vor Ort</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container row">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Wir leisten "Erste Hilfe für die Seele" wenn das gewohnte Leben zusammenbricht. Über die zentrale
                        Rettungsleitstelle in Heppenheim sind unsere Teams rund um die Uhr erreichbar und einsatzbereit.
                        Unabhängig von Glaubenszugehörigkeit oder Weltanschauung, stehen wir jedem Menschen seelsorglich
                        zur Seite, wenn es gewollt ist. Unsere Arbeit geschieht professionell, ehrenamtlich und aus
                        reiner Nächstenliebe. Durch eine umfassende Ausbildung wurden unsere Notfallseelsorger auf
                        diesen Dienst vorbereitet. Im Kreis Bergstraße wird er von den Kirchen, Rettungs- und
                        Hilfsdiensten gemeinsam getragen.</p>
                    <p> Hier erfahren Sie mehr über unsere Arbeit...</p>
                </div>
                <div class="col span_8 clr swap">
                    <div class="nfsvol mb10"><img src="{{ secure_asset('img/03.jpg') }}" alt="ALTERNATIVTEXT"
                            class='scale schick'></div>
                    <div class="nfsvor mb10"><img src="{{ secure_asset('img/09.jpg') }}" alt="ALTERNATIVTEXT"
                            class='scale schick'></div>
                    {{-- <!--  <div class="col span_8 clr"> --}}
                    <div class="nfsvor mb10"><img src="{{ secure_asset('img/02.jpg') }}" alt="ALTERNATIVTEXT"
                            class='scale schick'></div>
                    {{-- </div>--> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Notfallseelsorge Bergstraße</h2>
                <span class="wei400 fsi18">Organisation und Förderverein</span>
            </div>
        </div>
    </div>

    <div class="container row mt40 hyp">
        <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                    <p>1999 schlossen sich Mitarbeitende der Hilfsorganisationen im Kreis Bergstraße und Vertreter/innen
                        der beiden christlichen Kirchen zusammen, um gemeinsam einen ehrenamtlichen Dienst für Menschen,
                        die von einem plötzlichen Unglück getroffen werden, auf den Weg zu bringen. Kurze Zeit später
                        wurde dann in Heppenheim der Arbeitskreis Notfallseelsorge (AK NFS) ins Leben gerufen, der aus
                        Vertretern der evangelischen und katholischen Kirche sowie der Deutschen
                        Lebensrettungs-Gesellschaft (DLRG), des Deutschen Roten Kreuzes (DRK), der Johanniter
                        Unfallhilfe (JUH), des Malteser Hilfsdiensts (MHD), der Freiwilligen Feuerwehren (FFW) und des
                        technischen Hilfswerks besteht, und Ausbildungsinhalte sowie eine Geschäftsordnung aufstellte.
                    </p>
                    <p>Seitdem stehen immer zwei unserer rund 70 Teammitglieder rund um die Uhr und 365 Tage im Jahr
                        dienstbereit. Durchschnittlich zehn Mal pro Monat wird die Notfallseelsorge im Landkreis
                        Bergstraße gerufen, vorwiegend bei plötzlichem häuslichen Tod, Suizid, Unfällen, Brand oder –
                        gemeinsam mit der Polizei – zur Überbringung einer Todesnachricht. Unser Einsatzgebiet umfasst
                        dabei den gesamten Kreis Bergstraße inklusive der Städte und Gemeinden im Neckartal. Geleitet
                        wird Arbeit von Pfarrerin Karin Ritter und ihrem Leitungsteam. Diesem gehören jeweils eine
                        Vertreterin oder ein Vertreter der Organisationen an, die die Arbeit der Notfallseelsorge tragen
                        und unterstützen.</p>
                    <p>Um das wertvolle Engagement unserer Organisation aufrechtzuerhalten braucht es natürlich auch
                        Geld. Neben der evangelischen und der katholischen Kirche erfolgt die finanzielle Unterstützung
                        der Notfallseelsorge Bergstraße auch durch das evangelische Dekanat Bergstraße, das DRK sowie
                        weitere Institutionen und Privatpersonen.
                        Viele Zuwendungen erhalten wir jedoch unregelmäßig. Kalkulieren ist somit schwierig. Zur
                        finanziellen Absicherung wurde daher 2008 der Förderverein Notfallseelsorge Bergstraße e.V.
                        gegründet. Er zählt derzeit rund 100 Mitglieder, darunter Einzelmitglieder, Kirchengemeinden,
                        Kommunen, Städte und Einrichtungen im Kreis Bergstraße. Über jedes weitere Mitglied und jede
                        Spende freuen wir uns natürlich sehr. </p>
                    <p><strong>Kontoverbindungen:</strong><br><br>
                        Förderverein Notfallseelsorge Bergstraße e.V.<br>
                        Volksbank Bergstraße<br>
                        IBAN: DE69 5089 0000 0052 435609<br>
                        BIC: GENODEF1VBD<br><br>
                        Förderverein Notfallseelsorge Bergstraße e.V.<br>
                        Sparkasse Starkenburg<br>
                        IBAN: DE09 5095 1469 0000 030465<br>
                        BIC: HELADEF1HEP</p>
                </div>
            </div>
        </div>
    </div>

    <!--
            <div class="container row mt80">
                <div class="row gutters">
                    <div class="col span_16 clr tar">
                        <h2>Einssatznachsorge</h2>
                        <span class="wei400 fsi18">Bergstraße</span>
                    </div>
                </div>
            </div>

            <div class="container row mt40 hyp">
            <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                <p>Herzrasen, Schlaflosigkeit, Erinnerungslücken, Niedergeschlagenheit – nach belastenden Einsätzen können bei jedem Helfer Stressmerkmale auftreten, unabhängig von den Dienstjahren oder dem Dienstgrad. Solche und viele weitere Anzeichen können Symptome dafür sein, dass ein Einsatz nicht verarbeitet werden konnte. Welche Ereignisse als besonders belastend empfunden werden, ist individuell sehr verschieden. Sicher ist jedoch: professionelle Hilfe wird benötigt!</p>
                <p>Wir bieten diese kostenfreie Hilfe für Einsatzkräfte und Betroffene. Unser Team ist nach dem bewährten Konzept von Dr. J.T. Mitchel in Einsatznachsorge ausgebildet. Dabei handelt es sich nicht um Psychotherapie, vielmehr arbeiten wir nach der Methode des CISM (Critical Incident Stress Management) bzw. SbE (Stressbearbeitung nach belastenden Einsätzen). Grundregeln des Konzepts sind absolute Verschwiegenheit, Vertraulichkeit und Freiwilligkeit.</p>
                <p>Das SbE-Team kann über die Zentrale Leitstelle Bergstraße, Telefon: 06252 99 700, angefordert werden. Wir stehen Ihnen gerne zur Verfügung!</p>
                </div>
            </div>
            </div>
            </div>
        -->

    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Kontakt zur Notfallseelsorge Bergstraße</h2>
                <span class="wei400 fsi18">Ihre Ansprechpartner</span>
            </div>
        </div>
    </div>

    <div class="container row mt40">
        <div class="row gutters">
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img src="{{ secure_asset('img/Ritter.jpg') }}" class="schick2" alt="ALTERNATIVTEXT">
                    <br>
                    <span class="blue">Karin Ritter</span>
                    Leiterin der Notfallseelsorge<br>
                    E-Mail: <a href="mailto: ritter@haus-der-kirche.de "> ritter@haus-der-kirche.de </a>
                </div>
            </div>
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img src="{{ secure_asset('img/Geiger.jpg') }}" class="schick2" alt="ALTERNATIVTEXT"><br>
                    <span class="blue">Sabina Geiger</span>
                    Büro der Notfallseelsorge<br>
                    E-Mail: <a href="mailto: notfallseelsorge@haus-der-kirche.de "> notfallseelsorge@haus-der-kirche.de
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container row mt80">
        <div class="row gutters">

            <div class="borders bgblue tar">
                <span class="blue">Ihr Kontakt zur Notfallseelsorge Bergstraße</span><br>
                Ludwigstr. 13<br>
                64646 Heppenheim<br>
                Telefon: 0 62 52 - 67 33 53/54<br>
                Telefax: 0 62 52 - 67 33 55<br>
                <br>
                E-Mail: <a href="mailto: mail@nfs-bergstrasse.de">mail@nfs-bergstrasse.de </a>
            </div>
        </div>
    </div>


    <div class="container row mt80">
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
