<x-app-layout>
    @section('head')
        <title> Ansprechpartner der Notfallseelsorge Darmstadt und Umgebung | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nov')

    {{-- route need to be changed --}}
    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/darmstadt/foto_darmstadt.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Ansprechpartner der Notfallseelsorge Darmstadt und Umgebung</h3>

        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_willumeit.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Erika Phillips-Willumeit</strong><br />
                <ul>
                    <li>Medizinische Fachangestellte</li>
                </ul>
                <p>"Notfallseelsorge ist für mich zuverlässig für Menschen in Not da zu sein."</p> <br />

                <p>Telefon: 0175 - 52 59 186</p>

            </div>
        </div>

        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_grosskopf.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Marcus-Stefan Großkopf</strong><br />
                <ul>
                    <li>Evangelischer Pfarrer</li>
                </ul>
                <p>"Notfallseelsorge ist für mich, Zeit zu haben, um Ruhepunkte für Menschen in Not zu schaffen."</p>
                <br />

                <p>Telefon: 0151 - 20 27 32 64</p>

            </div>
        </div>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_ruffkapraun.jpg') }}" alt="">
            </div>
            <div class="column-6 aps">
                <p><strong>Heiko Ruff-Kapraun</strong><br />
                <ul>
                    <li>Evangelischer Pfarrer</li>
                </ul>
                <p>"Im Notfall gehören wir alle zusammen."</p> <br />

                <p>Telefon: 0171 - 3 744 999</p>
                <p>Mail: ruff-kapraun@nfs-suedhessen.de </p>

            </div>
        </div>



        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_fitz.jpg') }}" alt="">
            </div>

            <div class="column-6 aps">
                <p><strong>Susanne Fitz</strong><br />
                <ul>
                    <li>Kath. Dekanatsbeauftragte für Notfallseelsorge</li>
                </ul>
                </p>
                <p>"Weil Menschen Menschen brauchen, die Halt geben und aushalten können."</p> <br />

                <p>Telefon: 0176 - 12 53 90 65</p>
                <p>Mail: susanne.fitz@bistum-mainz.de </p>

            </div>
        </div>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_pfalzgraf.jpg') }}" alt="">
            </div>

            <div class="column-6 aps">
                <p><strong>Bettina Pfalzgraf</strong><br />
                <ul>
                    <li>Dipl. Kauffrau (Project Management Office)</li>
                </ul>
                </p>
                <p>"Ich engagieren mich in der Notfallseelsorge, weil ich die Begegnung mit Menschen mag."</p> <br />

                <p>Mail: bettina-pfalzgraf@t-online.de </p>

            </div>
        </div>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_fairley.jpg') }}" alt="">
            </div>

            <div class="column-6 aps">
                <p><strong>Iris Fairley</strong><br />
                <ul>
                    <li>Medizinisch technische Assistentin</li>
                </ul>
                </p>
                <p>"Notfallseelsorge bedeutet für mich Zeit zu haben für Menschen in Not."</p> <br />

                <p>Mail: irisfairley@aol.com </p>

            </div>
        </div>


        <div class="column-8 aps">
            <div class="column-2 aps">
                <img src="{{ secure_asset('img/darmstadt/foto_winterstein.jpg') }}" alt="">
            </div>

            <div class="column-6 aps">
                <p><strong>Detlef Winterstein</strong><br />
                <ul>
                    <li>Unternehmensberater</li>
                </ul>
                </p>
                <p>"In der Notfallseelsorge liegt für mich ein tiefer Lebenssinn."</p> <br />

                <p>Mail: detlef@winterstein.ws </p>

            </div>
        </div>











        <!-- <div class="column-8 aps">
          <div class="column-2 aps">
            <img src="{{ secure_asset('img/darmstadt/foto_heierhoff.jpg') }}" alt="">
          </div>

      <div class="column-6 aps">
        <p><strong>Klaus Heierhoff</strong><br />
        <ul><li>Dipl. Ingenieur</li>
        <li><a href="/contact?wid=448&ct=da">Kontakt</a></li>
            </ul></p>

        </div>
      </div>




    <div class="column-8 aps">
          <div class="column-2 aps">
            <img src="{{ secure_asset('img/darmstadt/foto_phillips-willumeit.jpg') }}" alt="">
          </div>

      <div class="column-6 aps">
        <p><strong>Erika Phillips-Willumeit</strong><br />
        <ul><li>Arzthelferin</li>
            <a href="/contact?wid=448&ct=da">Kontakt</a>
            </li>
            </ul></p>


        </div>
      </div>



      <div class="column-8 aps">
      <div class="column-2 aps">
        <img src="{{ secure_asset('img/darmstadt/foto_wilke.jpg') }}" alt="">
      </div>

      <div class="column-6 aps">
        <p><strong>Carmen Wilke</strong><br />
        <ul><li>Leiterin einer Kindertagesstätte</li>
              <li>
                <a href="/contact?wid=448&ct=da">Kontakt</a>
            </li>
            </ul></p>

        </div>
      </div> -->







    </div>


</x-app-layout>
