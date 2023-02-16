<x-app-layout>
    @section('head')
        <title> Einsatznachsorge Bergstraße - Hilfe für Helfer | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'einsatznachsorge')

    {{-- need replace link to route --}}


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/nfs_bergstrasse.jpg') }});">

    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Einsatznachsorge Bergstraße - Hilfe für Helfer</h3>
        <p>Nach belastenden Einsätzen können bei jedem Helfer Stressmerkmale auftreten - unabhängig von den Dienstjahren
            oder dem Dienstgrad. Stressreaktionen sind normale menschliche Reaktionen auf unnormale Ereignisse und
            sollten die Betroffenen nicht verunsichern. Vor dem Hintergrund dessen, was diese erlebt und gesehen haben,
            sind solche körperlichen oder seelischen Auswirkungen eines Einsatzes nicht ungewöhnlich, sondern normal und
            verständlich. </p>
        <p>Schon nach einigen Tagen klingen die Reaktionen in der Regel ab. Wenn diese Reaktionen nach einem Monat noch
            nicht nachlassen, dann sollten die Betroffenen nicht zu lange warten und Hilfe in Anspruch nehmen. </p>
        <p>Mögliche Reaktionen können Nervosität, Erschöpfung, oder Schlafstörungen, aber auch Gefühlstaubheit,
            vermindertes Erinnerungsvermögen oder verändertes Ess-Trink-oder Rauchverhalten sein.</p>
        <p>Wenn Sie solche Reaktionen an sich beobachten, dann zögern Sie nicht, Hilfe in Anspruch zu nehmen.</p>
        <p>Weitere Informationen zu möglichen Belastungsreaktionen finden Sie
            <a href="/files/Faltblatt_Einsatzkraefte_Bergstrasse.pdf" target="_blank">hier</a>.

        </p>
        <p>&nbsp;</p>
        <h3>Wir bieten Hilfe für Einsatzkräfte und einzelne Betroffene an.</h3>
        <p>Unser Team ist nach dem bewährten Konzept von Dr. J.T. Mitchel in Einsatznachsorge ausgebildet. Wir arbeiten
            nach der Methode des CISM (Critical Incident Stress Management) bzw. SbE (Stressbearbeitung nach belastenden
            Einsätzen). Dieses Konzept wird auch von internationalen Organisationen wie z.B. der UNO erfolgreich
            angewandt.</p>
        <p>Grundregeln sind absolute Verschwiegenheit, Vertraulichkeit und Freiwilligkeit. Es handelt sich nicht um
            Psychotherapie.</p>
        <p>Wir bieten Einsatznachsorge für Gruppen von Einsatzkräften und Einzelne an.
        </p>
        <p>Weitere Informationen zu den Angeboten finden sie
            <a href="/files/SbE-Angebote.pdf" target="_blank">hier</a>.
        </p>


        <p>Die Angebote des SbE-Teams sind kostenfrei. <br />
            Da wir jedoch auch Kosten haben, sind Spenden willkommen. </p>
        <br />

        <p><strong>Ansprechpartner des SbE–Teams Kreis Bergstraße sind:</strong></p><br />


        <div class="column-4">
            <div class="column-2 centerme">
                <img src="{{ secure_asset('img/bergstrasse/foto_jungblut.jpg') }}" alt="Dipl. Päd. Jörg Jungblut">
                <br />
                <p>Dipl. Päd.<br />Jörg Jungblut <br /> (Koordinator) </p>
                Telefon 0179 – 52 34 275</p>
            </div>
        </div>

        <div class="column-4">
            <div class="column-2 centerme">
                <img src="{{ secure_asset('img/bergstrasse/foto_bienhaus.jpg') }}" alt="Pfarrerin">
                <br />
                <p>Pfarrerin<br /> Silke Bienhaus<br />(fachliche Leitung) </p>
                <p>Telefon 0 62 06 – 95 06 59</p>
            </div>

        </div>




        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Das SbE-Team kann über die Zentrale Leitstelle Bergstraße Tel. 06252 99 700 angefordert werden. <strong>Wir
                stehen Ihnen gerne zur Verfügung!</strong> </p>

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
