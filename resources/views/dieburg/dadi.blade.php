<x-app-layout>
    @section('head')
        <title> Willkommen bei der Notfallseelsorge Darmstadt-Dieburg | {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'nvo')
    {{-- need replace link to route --}}


    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/dadi/foto_engel.jpg') }});">
    </div>

    <div class="column-2 push-1 bgyellow">
    </div>

    <div class="clearme"></div>

    <div class="column-8 bgwhite">
        <h3> Willkommen bei der Notfallseelsorge Darmstadt-Dieburg</h3>

        <p>Wir arbeiten in der Notfallseelsorge, weil es gut ist, wenn in der Not niemand ganz alleine bleiben muss. Wir
            wissen um den Schrecken in den Notfällen und helfen, wenn die Seele in Gefahr ist. Weil alles ohne Aussicht
            scheint, weil alles unbegreiflich ist, weil die Not die Worte verschlingt.</p>

        <p>Für unsere Aufgabe sind wir fachlich qualifiziert und arbeiten rein ehrenamtlich. Wir werden von den
            Rettungskräften alarmiert und helfen mit "Herz" und "Verstand". Im Notfall braucht die Psyche Zeit, um
            hinterherzukommen. Diese Zeit bringen wir mit. Wir wissen, an was zu denken ist, können die nächsten
            Schritte vorbereiten und mit den Personen in Not absprechen. Unsere Haltung ist dabei aufmerksam und
            zugewandt.</p>

        <p>In dieser Aufgabe sind wir getragen von dem Grundverständnis christlicher Nächstenliebe. In der christlichen
            Tradition finden wir gute Hinweise im Umgang mit Angst, Verzweiflung, Schuldfragen und der Erfahrung von
            plötzlichem Tod. Im Zentrum dieses Verständnisses steht eine tiefe menschliche Zuwendung. Diese gilt für
            alle Menschen, auch für Personen anderer Kulturkreise und Glaubensbekenntnisse.</p>

        <p>Zwei Notfallseelsorger/innen aus dem Team teilen sich den Dienst rund um die Uhr. Unser Motto: Frage das Herz
            mit allem was du kannst, dann weiß der Verstand immer um den nächsten Schritt.</p>
        <p>Dennoch gibt es immer wieder Einsätze und Anforderungen, bei denen auch wir an die Grenzen unserer
            Belastbarkeit stoßen. Gut zu wissen, wenn einem dann ein guter Engel beisteht, der Sicherheit und Hilfe
            gibt. Ein Schutzengel begleitet uns deshalb bei all unseren Einsätzen, spendet Kraft und hilft dabei, die
            eigenen Gefühle nach einem Einsatz wieder zu ordnen. Doch der Engel begleitet nicht nur unsere Wege – wir
            bringen ihn auch zu den Menschen, auf die wir bei unseren Einsätzen treffen.</p>
        <p>Die Idee zum himmlischen Wegbegleiter ist im Kreis der Notfallseelsorgerinnen und -sorger entstanden. Zu
            Papier gebracht hat das Schutzwesen Notfallseelsorgerin und Künstlerin Ilse Reining aus Brensbach. Sie malte
            das Bild eines Engels, das inzwischen die Johanniter-Wache in Groß-Umstadt ziert. Auch auf Visitenkarten,
            Briefköpfen, Flyern oder der Internetseite der Notfallseelsorge Darmstadt-Dieburg wird dieser Engel nach und
            nach Einzug erhalten. Er steht für Schutz und der Sehnsucht nach Hilfe und Heilung. Ermutigend,
            kraftschöpfend und tröstend. Das passt gut zu uns und ist vergleichbar mit unserer Arbeit. Es ist jedoch
            weit mehr als unser Logo, sondern viel eher eine Signatur, dass Gott uns beschützt, bewahrt und auch in
            schwierigen Situationen beisteht.</p>

        <!--<p>Den Flyer der NFS Darmstadt-Dieburg zum Download erhalten Sie <a href="/files/Flyer_NFS_Bergstrasse.pdf" target="_blank">hier</a>.</p>-->

        <!--YouTube-Video Start-->

        <div class="outeriframe">
            <p>Mittlerweile gibt es die Notfallseelsorge seit 20 Jahren im Landkreis Darmstadt-Dieburg. Etwa 2000
                Betreuungen hat das Team in dieser Zeit geleistet und sich zu einem wichtigen Bestandteil der
                Rettungskette entwickelt. Anlässlich des 20-jährigen Bestehens sprach der ehemalige Leiter der
                Notfallseelsorge, Heiko Ruff-Kapraun, mit Kreisbrandinspektor Heiko Schecker.</p>
            <p>&nbsp;</p>
            <iframe class="eiframedadi" src="https://www.youtube.com/embed/iHoV4KB9Q48" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>

        <!--YouTube-Video ende-->

    </div>

</x-app-layout>
