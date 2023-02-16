<x-app-layout>
    @section('head')
        <title> Einsatznachsorge Darmstadt und Umgebung | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'einsatznachsorge')

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/darmstadt/foto_darmstadt.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">

        <h3>Einsatznachsorge Darmstadt und Umgebung</h3>

        <p>Einsätze mit schwerwiegenden Folgen für Mensch lassen sich manchmal nur schwer verarbeiten. Sicherlich kommt
            es in den Reihen der Einsatzkräfte nach einem solchen Einsatz zu einer kurzen Reflektion des gerade
            Erlebten, aber es ist möglich, dass das Einsatzgeschehen nicht immer alleine verarbeitet werden kann.</p>
        <p>Nicht verarbeitete Erlebnisse aus Einsätzen können dazu führen, dass die Lebensqualität deutlich eigeschränkt
            wird. Durch Prävention kann das Risiko für Spätfolgen reduziert werden. Meistens reicht ein strukturiertes
            Gespräch mit einer psychosozialen Fachkraft aus, um die Erlebnisse aufzuarbeiten.</p>
        <p>Diese Maßnahme sollte nicht erst bei unmittelbar psychisch stark belasteten Einsätzen ansetzen, sondern auch
            bei Einsätzen, die dem allgemeinen Tagesgeschäft zugeordnet werden können. Auch alltägliche Einsätze können
            als seelisch belastend empfunden werden.</p>
        <p>Es liegt uns sehr viel daran, dass alle Einsatzkräfte, auch nach vielen Einsätzen, keine Einschränkung ihrer
            Lebensqualität erleiden.</p>
        <p>Wir sind in der glücklichen Lage mit einem besonders geschulten Team diese wichtige Aufgabe zu leisten. Das
            Team der Einsatznachsorge setzt sich aus erfahrenen Mitarbeitern der Hilfsorganisationen und der Feuerwehr
            zusammen und steht Ihnen jederzeit und rund um die Uhr für ein Gespräch zur Verfügung. </p>
        <p>Die Gespräche sind vertraulich und unterliegen der Verschwiegenheit. Es entstehen keine Kosten für die
            Einsatzkräfte und wir können gegebenenfalls Hilfsangebote vermitteln.</p>
        <p>Mitarbeiter des Einsatznachsorge-Teams führen auch präventiv Schulungen zum Thema seelisch belastende
            Einsätze für Führungskräfte und Mitarbeiter Hilfsorganisationen und der Feuerwehr durch. </p>

        <p>Die Kontaktaufnahme zur Einsatznachsorge kann über diese Wege erfolgen:
        <ul>
            <!--<li>Anfragen zu Präventions-Seminaren können Sie hier stellen: <a href="/contact">Kontakt</a>  </li>-->
            <li>Leiterin der Einsatznachsorge ist Susanne Fitz (Dekanatsbeauftragte für Notfallseelsorge des Bistums

                Mainz, Gemeindepädagogin) Telefon 0176 - 12 53 90 65 </li>
            <li>E-Mail-Adresse der Einsatznachsorge: einsatznachsorge-darmstadt@web.de</li>
            <li>Leitfunkstelle Darmstadt, Telefon 06151-957 809 908</li>
        </ul>

        <!--<p>{{ secure_asset('img/darmstadt/foto_ens.jpg') }}</p>-->

    </div>

    <div class="column-3 push-1 bgwhite">
        <div class="quote">
            <p><i class="fa fa-quote-left"></i>&nbsp;&nbsp;Auch ein Retter kommt mal in Not, wird von Ereignissen und
                Gefühlen um ihn herum überwältigt. In solchen Mo-<br />menten tut es gut, die Hilfe der Notfallseelsorge
                in An-<br />spruch nehmen zu dürfen.&nbsp;&nbsp;<i class="fa fa-quote-right"></i><span>Manfred
                    Leuthäußer<br />Rettungsassistent Odenwaldkreis</span>
            </p>
        </div>
    </div>



</x-app-layout>
