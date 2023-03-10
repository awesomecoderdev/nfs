<x-app-layout>
    @section('head')
        <title> Odenwald | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nfsodenwald')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Odenwald</h1>
                <span class="wei400 fsi22">Notfallseelsorge vor Ort</span>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container">
            <div class="row gutters gutflex">
                <div class="col span_8 clr">
                    <p>Not zu sehen und für Menschen da zu sein, wenn sie mit einem plötzlichen Todesfall konfrontiert
                        werden, einen Unfall miterleben oder eine andere Krise erleiden: Das ist das zentrale Anliegen
                        der Notfallseelsorge und Krisenintervention im Odenwaldkreis. <br />Seit 1999 gibt es unsere
                        Einrichtung, die vom Deutschen Roten Kreuz (Kreisverband Odenwaldkreis) und Evangelischen
                        Dekanat Odenwald getragen wird und Menschen eine professionelle Hilfe in akuten seelischen
                        Krisensituationen bietet. Dafür werden wir über den Rettungsdienst und die Polizei zum Einsatz
                        gerufen. Wir begeben uns dann direkt an den Ort des Geschehens und begleiten Opfer, Angehörige
                        und Beteiligte in der persönlichen Krise. Auch für die Einsatzkräfte in Rettungsdienst und
                        Feuerwehr sind wir nach belastenden Erfahrungen da. Für diese Einsatznachsorge wurden einzelne
                        Teammitglieder speziell ausgebildet.</p>
                    <p> Hier erfahren Sie mehr über unsere Arbeit...</p>
                </div>
                <div class="col span_8 clr swap">
                    <div class="nfsvol mb10">
                        <img class="scale schick" src="{{ asset('img/03.jpg') }}" alt="ALTERNATIVTEXT">
                    </div>
                    <div class="nfsvor mb10">
                        <img class="scale schick" src="{{ asset('img/05.jpg') }}" alt="ALTERNATIVTEXT">
                    </div>
                    {{-- <!--  <div class="col span_8 clr"> --}}
                    <img class="scale schick" src="{{ asset('img/02.jpg') }}" alt="ALTERNATIVTEXT">
                    {{-- </div>--> --}}
                </div>
            </div>
        </div>
    </div>


    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Notfallseelsorge und Krisenintervention Odenwaldkreis</h2>
                <span class="wei400 fsi18">Organisation und Förderverein</span>
            </div>
        </div>
    </div>

    <div class="container mt40 hyp">
        <div class="row gutters">
            <div class="col span_16 clr">
                <div class="borders">
                    <p>Seit 1999 besteht die Notfallseelsorge und Krisenintervention im Odenwaldkreis. Damals verbanden
                        sich die beiden Träger, das Deutsche Rote Kreuz und das Evangelische Dekanat Odenwald, um
                        Menschen in Krisensituationen zu unterstützen. Diese Zusammenarbeit war und ist eine
                        Besonderheit in Hessen und wurde durch einen Kooperationsvertrag geregelt.</p>
                    <p>Beide Träger finanzieren die Einrichtung und ermöglichen damit allen Menschen im Odenwaldkreis
                        eine professionelle Hilfe in akuten seelischen Notsituationen. Die Notfallseelsorge wendet sich
                        dabei an Überlebende von Notfallereignissen, an Angehörige und Hinterbliebene, an Vermissende
                        sowie an Menschen, die Zeugen eines Unglücks geworden sind. Diese seelsorgliche Betreuung
                        richtet sich ausnahmslos an alle Menschen. Wer unsere Hilfe einfordert, erhält sie – und das zu
                        jeder Zeit, rund um die Uhr.</p>
                    <p>Dafür stehen wir 365 Tage im Jahr in „Rufbereitschaft“. Konkret bedeutet das: Ausgerüstet mit
                        Funkmeldeempfänger, Einsatzrucksack und Einsatzkleidung, sind wir sieben Tage pro Woche Tag und
                        Nacht erreichbar, um in etwaigen Unglücksfällen eine seelsorgerliche Betreuung von Betroffenen
                        und Einsatzkräften zu gewährleisten.</p>
                    <p>Doch ohne die Spende von Einzelpersonen, Kommunen, Verbänden und anderen Institutionen ist unsere
                        Arbeit nicht zu denken. Verschiedene Einrichtungen des Odenwaldkreises unterstützen die Arbeit
                        finanziell, zum Beispiel das Katholische Dekanat Erbach, der Odenwaldkreis und das Evangelische
                        Dekanat Vorderer Odenwald. Seit 2006 ermöglicht zudem der Förderverein die kontinuierliche
                        Finanzierung der Aus- und Weiterbildung der Ehrenamtlichen, ihre Ausrüstung sowie die
                        Öffentlichkeitsarbeit.</p>
                    <p>Gerne können Sie unseren Förderverein durch Ihre Mitgliedschaft unterstützen oder durch eine
                        Spende einen Beitrag zu unserer Arbeit leisten. Wir danken Ihnen ganz herzlich!</p>
                    <p><strong>Spendenkonto:</strong></p>
                    <p>Förderverein Notfallseelsorge und Krisenintervention<br />Sparkasse Odenwaldkreis<br />IBAN DE 78
                        5085 1952 0031 0015 63 <br />BIC HELADEF1ERB</p>
                </div>
            </div>
        </div>
    </div>

    <!--
      <div class="container mt80">
          <div class="row gutters">
              <div class="col span_16 clr tar">
                  <h2>Einssatznachsorge</h2>
                  <span class="wei400 fsi18">Odenwaldkreis</span>
              </div>
          </div>
      </div>

      <div class="container mt40 hyp">
      <div class="row gutters">
      <div class="col span_16 clr">
          <div class="borders">
          <p>Es gibt Einsätze, die noch lange nachklingen – auch wenn die Einsatzjacke schon längst wieder am Haken hängt. Bilder lassen uns manchmal nicht zur Ruhe kommen und das Erlebnis der eigenen Grenzen in einem Einsatz kann zu Zweifeln führen.</p>
          <p>Für alle Rettungskräfte des Odenwaldkreises steht die Notfallseelsorge und Krisenintervention zur Einsatznachsorge bereit. Speziell ausgebildete Teams können über die Leitstelle oder über die Leitung der Notfallseelsorge zu einem Nachtreffen in einem geschützten Rahmen angefragt werden.	</p>
          <p>Und falls Hilfe von außerhalb gewünscht wird: Wir arbeiten mit allen Notfallseelsorgesystemen in Südhessen zusammen. Auch in der Einsatznachsorge!</p>		<p>Die Ansprechpartnerin für Einsatznachsorge des Odenwaldkreises ist Brigitte Romer-Schweers. Sie erreichen sie per E-Mail unter <a href="mailto:einsatznachsorge@nfs-odenwald.de">einsatznachsorge@nfs-odenwald.de</a>.</p>
          </div>
      </div>
      </div>
      </div>
  -->

    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Kontakt zur Notfallseelsorge Odenwaldkreis</h2>
                <span class="wei400 fsi18">Ihre Ansprechpartner</span>
            </div>
        </div>
    </div>

    <div class="container mt40">
        <div class="row gutters">
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img class="schick2" src="{{ asset('img/Ruff-Kapraun.jpg') }}" alt="ALTERNATIVTEXT"><br>

                    <span class="blue">Heiko Ruff-Kapraun</span>
                    Leiter der Notfallseelsorge und Krisenintervention Odenwaldkreis
                    Evangelischer Pfarrer<br>
                    Telefon: 0171 - 3 744 999<br>
                    E-Mail: <a href="mailto: ruff-kapraun@nfs-suedhessen.de">ruff-kapraun@nfs-suedhessen.de</a><br>
                    <span>"Im Notfall gehören wir alle zusammen."</span>
                </div>
            </div>
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img class="schick2" src="{{ asset('img/Buechner.jpg') }}" alt="ALTERNATIVTEXT"><br>

                    <span class="blue">Ulrike Büchner</span>
                    Stv. Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis<br>
                    E-Mail:<a href="mailto: leitung@nfs-odenwald.de"> leitung@nfs-odenwald.de</a><br>
                    <span>"Notfallseelsorge ist für mich, das Gefühl das Richtige zur richtigen Zeit zu tun."</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt40">
        <div class="row gutters">
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img class="schick2" src="{{ asset('img/romerschweers.jpg') }}" alt="ALTERNATIVTEXT"><br>

                    <span class="blue">Brigitte Romer-Schweers</span>
                    Stv. Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis<br>
                    Physiotherapeutin im Ruhestand<br>
                    E-Mail:<a href="mailto: leitung@nfs-odenwald.de"> leitung@nfs-odenwald.de</a><br>
                    <span>"Notfallseelsorge heißt für mich, mit betroffenen Menschen, deren Welt gerade aus den Fugen
                        geraten ist, diese ersten Momente auszuhalten und damit ein wenig Halt zu geben."<br><br></span>
                </div>
            </div>
            <div class="col span_8 clr wimg">
                <div class="borders tar">
                    <img class="schick2" src="{{ asset('img/rossner.jpg') }}" alt="ALTERNATIVTEXT"><br>
                    <span class="blue">Bärbel Roßner</span>
                    Stv. Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis<br>
                    E-Mail:<a href="mailto: leitung@nfs-odenwald.de"> leitung@nfs-odenwald.de</a><br>
                    <span>"Ich bin ehrenamtlich im Bereich der Notfallseelsorge und Krisenintervention im Odenwaldkreis
                        tätig, da es mir wichtig ist, dass niemand - der dies nicht möchte - nach einem belastenden
                        Ereignis alleine ist.<br><br></span>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt80">
        <div class="row gutters">

            <div class="borders bgblue tar">
                <span class="blue">Ihr Kontakt zur Notfallseelsorge und Krisenintervention im Odenwaldkreis</span><br>
                Obere Pfarrgasse23<br>
                64720 Michelstadt<br>
                Telefon: 0151 29 50 37 02<br><br>
                E-Mail: <a href="mailto: leitung@nfs-odenwald.de	">leitung@nfs-odenwald.de </a>
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
