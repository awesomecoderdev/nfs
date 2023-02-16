<x-app-layout>
    @section('head')
        <title> Einsatznachsorge Bergstrasse - Hilfe für Helfer | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')

    {{-- need replace link to route --}}

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/nfs_bergstrasse.jpg') }};">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Einsatznachsorge Bergstrasse - Hilfe für Helfer</h3>
        <p>Nach belastenden Einsätzen <strong>können</strong> bei jedem Helfer Stressmerkmale auftreten - unabhängig von
            den Dienstjahren oder dem Dienstgrad. Stressreaktionen sind normale menschliche Reaktionen auf unnormale
            Ereignisse und sollten die Betroffenen nicht verunsichern. Vor dem Hintergrund dessen, was diese erlebt und
            gesehen haben, sind solche körperlichen oder seelischen Auswirkungen eines Einsatzes nicht ungewöhnlich,
            sondern normal und verständlich. </p>
        <p>Schon nach einigen Tagen klingen die Reaktionen in der Regel ab. Wenn diese Reaktionen nach einem Monat noch
            nicht nachlassen, dann sollten die Betroffenen nicht zu lange warten und Hilfe in Anspruch nehmen. </p>
        <p>Mögliche Reaktionen können Nervosität, Erschöpfung, oder Schlafstörungen, aber auch Gefühlstaubheit,
            vermindertes Erinnerungsvermögen oder verändertes Ess-Trink-oder Rauchverhalten sein.</p>
        <p>Wenn Sie solche Reaktionen an sich beobachten, dann zögern Sie nicht, Hilfe in Anspruch zu nehmen.</p>
        <p>Weitere Informationen zu möglichen Belastungsreaktionen finden Sie hier (pdf 1)
        </p>

        <h3>Wir bieten Hilfe für Einsatzkräfte und einzelne Betroffene an.</h3>
        <p>Unser Team ist nach dem bewährten Konzept von Dr. J.T. Mitchel in Einsatznachsorge ausgebildet. Wir arbeiten
            nach der Methode des CISM (Critical Incident Stress Management) bzw. SbE (Stressbearbeitung nach belastenden
            Einsätzen). Dieses Konzept wird auch von internationalen Organisationen wie z.B. der UNO erfolgreich
            angewandt.</p>
        <p>Grundregeln sind absolute Verschwiegenheit, Vertraulichkeit und Freiwilligkeit. Es handelt sich nicht um
            Psychotherapie.</p>
        <p>Wir bieten Einsatznachsorge für Gruppen von Einsatzkräften und Einzelne an.
        </p>
        <p>Weitere Informationen zu den Angeboten finden sie hier (pdf 2)
        </p>


        <p>Die Angebote des SbE-Teams sind kostenfrei. <br />
            Da wir jedoch auch Kosten haben, sind Spenden willkommen. </p>
        <br />

        <p><strong>Ansprechpartner des SbE–Teams Kreis Bergstraße sind:</strong></p>

        <div class="column-4">
            <div class="column-2 centerme">
                <img src="{{ secure_asset('img/bergstrasse/foto_gladisch.jpg') }}"
                    alt="Einsatznachsorge Bergstrasse - Hilfe für Helfer">
            </div>
            <div class="column-2 bu">
                <p>Dipl. Psych.<br /> Katharina M. Gladisch<br />(fachliche Leitung, RS, Notfallpsychologin)
                    <br /><br />
                </p>
                <p>Telefon<br /> 0151 - 3 63 50 41 </p>
            </div>

        </div>
        <div class="column-4">
            <div class="column-2 centerme">
                <img src="{{ secure_asset('img/bergstrasse/foto_jungblut.jpg') }}" alt="Katharina M. Gladisch">
            </div>
            <div class="column-2 bu">
                <p><br />Adam Schmitt <br /> (Koordinator, RA) <br /> <br /></p>
                <p><br />Telefon<br /> 0177 - 6 69 87 63</p>
            </div>
        </div>
        <p>Das SbE-Team kann über die Zentrale Leitstelle Bergstraße Tel. 06252 99 700 angefordert werden. <br />
            <strong>Wir stehen Ihnen gerne zur Verfügung!</strong>
        </p>
    </div>
</x-app-layout>
