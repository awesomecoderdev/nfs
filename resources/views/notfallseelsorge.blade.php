<x-app-layout>
    @section('head')
        <title> Notfallseelsorge | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'notfallseelsorge')

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored"
        style="background-image: url({{ secure_asset('img/foto_notfallseelsorge.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3>Notfallseelsorge – Not sehen, für Menschen da sein</h3>



        <!-- <p><strong><br />Die Arbeit der Notfallseelsorge</strong></p> -->

        <p>Auf der Grundlage des christlichen Verständnisses von Nächstenliebe steht die Notfallseelsorge in Südhessen
            Menschen bei akuten Krisen und seelischen Belastungen zur Seite. Das kann der Tod eines nahestehenden
            Menschen sein, verursacht etwa durch Krankheit oder einen Unfall. Auch bei Suizid oder Suizidversuch sorgen
            wir für die Betreuung von Angehörigen. Bei Unfällen betreuen wir Opfer, Angehörige, Unfallverursacher und
            Zeugen am Unfallort oder zu Hause.</p>

        <p>Gerade die ersten Minuten oder Stunden nach einem unerwarteten und lebensverändernden Ereignis können sehr
            belastend sein. Jedes Leid wird als einzig erlebt. Wir bieten in der akuten Belastung persönliche Hilfe und
            Unterstützung an. Notfallseelsorgende sind da und haben Zeit, sie hören zu und unterstützen in der Phase der
            akuten Betroffenheit. In Absprache mit den Hilfesuchenden informieren sie Vertrauenspersonen aus deren nahen
            Umfeld. Dadurch können Angehörige die ersten Schritte zur Bewältigung ihres Leids gehen.</p>

        <p>Die Notfallseelsorge in Südhessen ist eine ergänzende Maßnahme in der Rettungskette. Sie richtet sich an alle
            Menschen unabhängig von deren Weltanschauung, Glaubenszugehörigkeit oder ethnischem Hintergrund. Unsere
            Mitarbeitenden sind jederzeit erreichbar, an allen Tagen im Jahr, rund um die Uhr.</p>



        <p> <strong><br />Qualifikation und Standards – Wer helfen will, muss sich auskennen</strong></p>
        <p>Die Mitarbeitenden in der Notfallseelsorge üben ihre Arbeit haupt- oder ehrenamtlich aus und kommen aus
            vielfältigen Berufen. Die Pfeiler der Qualifizierung für die Arbeit als Notfallseelsorgende/r bestehen aus
            einem Grundkurs, Weiterbildungen und regelmäßiger Supervision.</p>

        <p>Die aktive Mitarbeit setzt eine Grundqualifikation voraus. Diese wird durch die Teilnahme an einer Schulung
            gemäß den Standards für Psychosoziale Notfallversorgung in Deutschland erworben (Richtlinien). Die
            Kooperation in Südhessen bietet dafür jährlich Ausbildungskurse an.</p>

        <p>An den erfolgreich absolvierten Grundkurs schließt sich eine Praktikumsphase in den regionalen Teams an.
            Inhalte der Ausbildung sind z. B. Grundlagen der Gesprächsführung, Einüben der wichtigsten
            Einsatzsituationen, Umgang mit Stress, Reflexion der eigenen Erfahrungen mit Sterben und Tod, Klärung der
            Rolle als ehrenamtliche Seelsorger/innen, Einführung in die Zusammenarbeit mit den Rettungsdiensten,
            Feuerwehren und der Polizei. Im aktiven Dienst bilden sich die Ehrenamtlichen regelmäßig fort.
        </p>

        <p>Der Dienst der Rettung von Menschen ist manchmal ein schwerer Dienst: Notfallseelsorger/innen erleben Tod und
            Trauer, Schmerz und Verzweiflung und müssen auch manchmal die eigene Hilflosigkeit bei Einsätzen
            verarbeiten. Deshalb verpflichten sich alle Aktiven zu regelmäßigen Einsatznachbesprechungen, Supervision
            und Weiterbildung.</p>

        </p>
    </div>

    <div class="column-3 push-1 bgwhite">
        <div class="quote">

            <i class="fa fa-quote-left"></i>
            <ul>
                <li>Die Aufgabe der<br />Notfallseelsorge:</li>
                <li style="letter-spacing: 1px;"><strong>S</strong>tabilisieren</li>
                <li style="letter-spacing: 1px;padding-left: 8px;"><strong>O</strong>rganisieren</li>
                <li style="letter-spacing: 1px;padding-left: 20px;"><strong>S</strong>chützen <i
                        class="fa fa-quote-right"></i></li>
            </ul>

        </div>
        <div class="quote" style="padding: 0; margin-top: 20px;">
            <iframe class="ytframe" src="https://www.youtube.com/embed/qtu9PKiQ93g?rel=0&autoplay=0" frameborder="0"
                allowfullscreen></iframe>
        </div>
    </div>
</x-app-layout>
