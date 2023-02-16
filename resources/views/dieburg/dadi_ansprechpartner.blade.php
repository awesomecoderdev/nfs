<x-app-layout>
    @section('head')
        <title>Ansprechpartner der Notfallseelsorge Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/engagieren100.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>



    <div class="column-8 bgwhite">
        <h3> Ansprechpartner der Notfallseelsorge Darmstadt-Dieburg</h3>


        <!--<div class="column-2 aps">
        <img src="{{ secure_asset('img/dadi/foto_ruffkapraun.jpg') }}" alt="">
      </div>
      <div class="column-6 aps">
        <p><strong>Heiko Ruff-Kapraun</strong><br />
         <ul><li>Evangelischer Pfarrer</li>
         </ul>
         <p>"Im Notfall gehören wir alle zusammen."</p> <br />

         <p>Telefon: 0171 37 44 999</p>
        <p>Mail: ruff-kapraun[at]nfs-suedhessen.de </p>
      </div>-->

        <div class="clearme"><br /><br /></div>




        <div class="column-2 aps">
            <img src="{{ secure_asset('img/dadi/foto_fitz.jpg') }}" alt="">

        </div>

        <div class="column-6 aps">
            <p><strong>Susanne Fitz</strong><br />
            <ul>
                <li>Katholische Dekanatsbeauftragte für Notfallseelsorge</li>
                <li>Kommissarische Leitung</li>
            </ul>
            <p>"Weil Menschen Menschen brauchen, die Halt geben und aushalten können."</p> <br />

            <p>Telefon: 0176 - 12 53 90 65</p>
            <p>Mail: susanne.fitz[at]bistum-mainz.de</p>
        </div>

        <div class="clearme"><br /><br /></div>

        <div class="column-2 aps">
            <img src="{{ secure_asset('img/dadi/foto_fornoff.jpg') }}" alt="">

        </div>

        <div class="column-6 aps">
            <p><strong>Michael Fornoff</strong><br />
            <ul>
                <li>Evangelischer Pfarrer</li>
                <li>Kommissarische Leitung</li>
            </ul>
            <p>"In der Notfallseelsorge engagiere ich mich, um Menschen in der Not zur Seite zu stehen."</p> <br />

            <p>Telefon: 0172 - 666 56 53 </p>
            <p>Mail: mfornoff[at]gmx.de</p>
        </div>

        <div class="clearme"><br /><br /></div>


        <!--<div class="column-2 aps">
        <img src="{{ secure_asset('img/dadi/foto_langner.jpg') }}" alt="">

      </div>
      <div class="column-6 aps">
        <p><strong>Waltraud Langer</strong><br />
         <ul><li>Sozialpädagogische Mitarbeiterin</li>
             <li>Leitungsteam</li>
         </ul>
         <p>"Ich bin in der Notfallseelsorge, um Menschen in Not beizustehen."</p> <br />

        <p>Mail: wallanger[at]web.de </p>
        </div>

      <div class="clearme"><br /><br /></div>


      <div class="column-2 aps">
        <img src="{{ secure_asset('img/dadi/foto_lehr.jpg') }}" alt="">

      </div>
      <div class="column-6 aps">
        <p><strong>Brigitte Lehr</strong><br />
         <ul><li>Rentnerin</li>
             <li>Leitungsteam</li>
         </ul>
         <p>"In der NFS habe ich entdeckt, dass ich stärker bin als ich dachte."</p> <br />

        <p>Mail: info[at]nfs-suedhessen.de </p>
      </div>

      <div class="clearme"><br /><br /></div>-->


    </div>


</x-app-layout>
