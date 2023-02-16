<x-app-layout>
    @section('head')
        <title> Einsatznachsorge Odenwaldkreis | {{ __(config('app.name')) }}</title>
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
        <h3>Einsatznachsorge Odenwaldkreis</h3>

        <p>Es gibt Einsätze, die noch lange nachklingen – auch wenn die Einsatzjacke schon längst wieder am Haken hängt.
            Bilder lassen uns manchmal nicht zur Ruhe kommen und das Erlebnis der eigenen Grenzen in einem Einsatz kann
            zu Zweifeln führen. Auch fragt man sich: "Wie haben meine KameradInnen den Einsatz erlebt?"
        </p>

        <p>Für alle Rettungskräfte des Odenwaldkreises steht die Notfallseelsorge und Krisenintervention zur
            Einsatznachsorge bereit. Speziell ausgebildete TeamerInnen können über die Leitstelle oder über die Leitung
            der Notfallseelsorge zu einem Nachtreffen in einem geschützten Rahmen angefragt werden. </p>

        <p>Bei einem von uns geleiteten Austausch mit klaren Strukturen können die HelferInnen den Einsatz und die
            eigene Rolle reflektieren und Stress abbauen. Manches erscheint danach in einem anderen Licht. Die
            Unterstützung der KollegInnen tut gut und stärkt für den nächsten Einsatz.</p>

        <p>Und falls Hilfe von außerhalb gewünscht wird: Wir arbeiten mit allen Notfallseelsorgesystemen in Südhessen
            zusammen. Auch in der Einsatznachsorge!</p><br />


        <p><strong>Ansprechpartnerin:</strong>
        </p>
        Brigitte Romer-Schweers<br />
        Mail: einsatznachsorge@nfs-odenwald.de
        </p>

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
