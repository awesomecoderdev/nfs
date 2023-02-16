<x-app-layout>
    @section('head')
        <title> Ansprechpartner der Notfallseelsorge des Odenwaldkreises | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nov')

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/odenwald/foto_spiegel.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Ansprechpartner der Notfallseelsorge des Odenwaldkreises</h3>

        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_ruffkapraun.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Heiko Ruff-Kapraun</strong><br />
                <ul>
                    <li>Leiter der Notfallseelsorge und Krisenintervention Odenwaldkreis</li>
                    <li>Evangelischer Pfarrer</li>
                </ul>
                <p>"Im Notfall gehören wir alle zusammen."</p> <br />

                <p>Telefon: 0171 - 3 744 999</p>
                <p>Mail: ruff-kapraun@nfs-odenwald.de </p>

            </div>
        </div>







        <!--<div class="column-8 aps">
      <div class="column-2 aps">
        <img src="{{ secure_asset('img/odenwald/foto_herrmannwinter.jpg') }}" alt="">
      </div>
      <div class="column-6 aps">
        <p><strong>Pfarrerin Annette Herrmann-Winter</strong><br />
        <ul><li>Leiterin der Notfallseelsorge und Krisenintervention Odenwaldkreis</li>
      <li>seit 2004 Supervisorin und Ausbilderin für die Mitarbeit im aktiven Team </li></ul>
      </ul>

            <p>"Ich bilde mit Begeisterung Ehrenamtliche für diesen Dienst aus. Mir ist die Qualität der Vorbereitung wichtig und ich habe großen Respekt vor ihrem engagierten und kompetenten Dienst."</p><br />

        <p>Mail: AHerrmann-Winter@t-online.de</a></p>
      </div>
      </div>-->


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/odenwald/foto_buechner.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Ulrike Büchner</strong><br />
                <ul>
                    <li>Stellvertretung der Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis</li>
                </ul>

                <p>"Notfallseelsorge ist für mich, das Gefühl das Richtige zur richtigen Zeit zu tun."</p><br />

                <p>Mail: leitung@nfs-odenwald.de</a></p>
            </div>
        </div>



        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/odenwald/foto_romer.jpg') }}" alt="">

            </div>
            <div class="column-6 aps">
                <p><strong>Brigitte Romer-Schweers</strong><br />
                <ul>
                    <li> Stellvertretung der Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis</li>
                    <li>Physiotherapeutin im Ruhestand</li>
                </ul>

                <p>"Notfallseelsorge heißt für mich, mit betroffenen Menschen, deren Welt gerade aus den Fugen geraten
                    ist, diese ersten Momente auszuhalten und damit ein wenig Halt zu geben."</p><br />

                <p>Mail: leitung@nfs-odenwald.de</a></p>
            </div>
        </div>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/odenwald/foto_rossner.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Bärbel Roßner</strong><br />
                <ul>
                    <li>Stellvertretung der Leitung der Notfallseelsorge und Krisenintervention Odenwaldkreis</li>
                </ul>

                <p>"Ich bin ehrenamtlich im Bereich der Notfallseelsorge und Krisenintervention im Odenwaldkreis tätig,
                    da es mir wichtig ist, dass niemand - der dies nicht möchte - nach einem belastenden Ereignis
                    alleine ist."</p><br />

                <p>Mail: leitung@nfs-odenwald.de</a></p>
            </div>
        </div>












        <!--<div class="column-8 aps">
      <div class="column-2 aps">
          <img src="{{ secure_asset('img/odenwald/foto_hoffmann.jpg') }}" alt="">
      </div>
      <div class="column-6 aps">
        <p><strong>Pfarrer Reinhold Hoffmann</strong><br />

        <ul><li>Stellv. Leiter der Notfallseelsorge und Krisenintervention Odenwaldkreis seit 2004</li>
      <li>Mitwirkung im Team seit 1999</li>
      <li>Teamer und Ausbilder für die Mitarbeit im aktiven Team</li></ul>


  <p>"Die Beteiligung der Ehrenamtlichen im Team ist mir ein Hoffnungszeichen. Es tut mir gut zu sehen, dass Menschen bereit sind in außergewöhnlichen und oft erschreckenden Ereignissen Unbekannten zur Seite zu stehen. Jeder <strong>darf</strong> – aber <strong>niemand muss</strong> mit schwierigen Eindrücken alleine sein.
  Ich habe Hochachtung davor, dass diese Ehrenamtlichen bereit sind, sich auf fremde Wertvorstellungen und Lebensgestaltungen einzulassen, ohne zu werten."
  </p><br />
        <p> Mail: kgm[at]rothenberg-evangelisch.de</p>
      </div>
      </div>-->

    </div>
</x-app-layout>
