<x-app-layout>
    @section('head')
        <title> Willkommen bei der Notfallseelsorge Bergstraße | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')

    {{-- need replace link to route --}}


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/bergstrasse/foto_organisation.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Organisation & Struktur der Notfallseelsorge Bergstraße</h3>

        <p>Im November 1999 haben sich Mitarbeitenden der Hilfsorganisationen im Kreis Bergstraße und Vertreter/innen
            der beiden christlichen Kirchen zusammengeschlossen, um gemeinsam einen ehrenamtlichen Dienst für Menschen,
            die von einem plötzlichen Unglück getroffen werden, einzurichten.</p>

        <p>Anfang 2000 wurde dann der Arbeitskreis Notfallseelsorge (AK NFS) in Heppenheim gegründet. Ihm gehören je ein
            Vertreter oder eine Vertreterin der evangelischen und katholischen Kirche sowie der Deutschen
            Lebensrettungs-Gesellschaft (DLRG), des Deutschen Roten Kreuzes (DRK), der Johanniter Unfallhilfe (JUH), des
            Malteser Hilfsdiensts (MHD), der Freiwilligen Feuerwehren (FFW) und des technischen Hilfswerks (THW) an. Der
            Arbeitskreis legte Ausbildungsinhalte fest und formulierte eine Geschäftsordnung. </p>

        <p>Am 29. Mai 2001 wurden die ersten 39 Frauen und Männer zu ihrer ehrenamtlichen Tätigkeit als
            Notfallseelsorger/innen beauftragt. Mittlerweile sind rund 70 Frauen und Männer aus unterschiedlichen
            Berufsfeldern Teil unseres engagierten Teams.</p>
        <br />

        <p>
        <h3>Leitung und Einsatzgebiet</h3>
        </p>

        <p>Die Notfallseelsorge Bergstraße steht unter der Leitung von Pfarrerin Karin Ritter und ihres Leitungsteams.
            Das Leitungsteam verantwortet die Arbeit der Notfallseelsorge. Ihm gehören jeweils eine Vertreterin oder ein
            Vertreter der Organisationen an, die die Arbeit der Notfallseelsorge tragen und unterstützen. </p>

        <p>Die Alarmierung geschieht über die Rettungsleitstelle Heppenheim. Rund um die Uhr und 365 Tage im Jahr sind
            jeweils zwei Teammitglieder dienstbereit. Sie werden vom Rettungsdienst, den Notärzten, der Feuerwehr oder
            der Polizei über die Leitstelle alarmiert. Durchschnittlich zehn Mal pro Monat wird die Notfallseelsorge
            gerufen, vorwiegend bei plötzlichem häuslichen Tod, Suizid, Unfällen, Brand oder – gemeinsam mit der Polizei
            – zur Überbringung einer Todesnachricht. Einsatzgebiet ist der gesamte Kreis Bergstraße inclusive der Städte
            und Gemeinden im Neckartal. </p>

        <br />

        <p>
        <h3>Finanzierung und Förderverein </h3>
        </p>

        <p>Die Notfallseelsorge finanziert die Anschaffung von Einsatzkleidung und Ausstattung und übernimmt die Kosten
            für Organisation und Verwaltung. Den ehrenamtlichen Teammitgliedern werden die anfallenden Fahrtkosten zu
            den Einsätzen erstattet und Möglichkeiten zur Fortbildung angeboten.</p>

        <p>Für die Leitung der Notfallseelsorge finanziert die evangelische Kirche die halbe Pfarrstelle und stellt
            außerdem jährlich einen Sockelbetrag zur Verfügung. Die katholische Kirche finanziert die Ausstattung der
            katholisch Hauptamtlichen sowie auf Antrag einzelne Projekte. Eine finanzielle Unterstützung erfolgt
            außerdem durch das evangelische Dekanat Ried, das DRK sowie weitere Institutionen und Privatpersonen. </p>

        <p>Viele dieser Zuwendungen erhalten wir unregelmäßig, sie sind nicht kalkulierbar. Daher wurde zur finanziellen
            Absicherung der Arbeit der Notfallseelsorge am 30. September 2008 der
            <strong>
                <a href="/files/Flyer_Foerderverein_Bergstrasse.pdf" target="_blank">Förderverein Notfallseelsorge
                    Bergstraße e.V.</a>
            </strong>
            gegründet. Er zählt derzeit rund 100 Mitglieder. Darunter befinden sich Einzelmitglieder, Kirchengemeinden,
            Kommunen, Städte und Einrichtungen im Kreis Bergstraße.
        </p>

        <p><strong>Sie können Mitglied im Förderverein werden oder uns eine Spende zukommen lassen.</strong><br />
            Wir freuen uns, wenn Sie unsere Arbeit unterstützen.</p><br />


        <p><strong>Kontoverbindungen:</strong></p>

        <p>Förderverein Notfallseelsorge Bergstraße e.V. <br />
            Volksbank Bergstraße <br />
            IBAN: DE69 5089 0000 0052 435609 <br />
            BIC: GENODEF1VBD</p>
        <br />

        <p>Förderverein Notfallseelsorge Bergstraße e.V.<br />
            Sparkasse Starkenburg <br />
            IBAN: DE09 5095 1469 0000 030465<br />
            BIC: HELADEF1HEP</p>
    </div>
</x-app-layout>
