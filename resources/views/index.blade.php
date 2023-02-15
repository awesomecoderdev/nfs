<x-app-layout>
    @section('head')
        <title> {{ __(config('app.name')) }}</title>
    @endsection
    @section('bodyClass', 'index')

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h1>Willkommen bei der<br>Notfallseelsorge in Südhessen</h1>
                <span class="wei400 fsi22">Not sehen, für Menschen da sein</span>
            </div>
        </div>
    </div>


    @can('wid439')
        <div class="fullblue">
            <div class="container">
                <div class="row gutters gutflex">
                    <div class="col span_8 clr">
                        <p> Seit vielen Jahren steht die Notfallseelsorge Südhessen allen Menschen in akuten Notsituationen
                            zur
                            Seite: unmittelbar, überkonfessionell und professionell. Denn gerade die ersten Minuten und
                            Stunden
                            nach einem unerwarteten und lebensverändernden Ereignis, wie ein Unfall oder der Tod eines
                            nahestehenden Menschen, können sehr belastend sein und Betroffene in großes Leid stürzen.</p>
                        <p>In dieser augenblicklichen Belastung bieten wir von der Notfallseelsorge Südhessen unsere
                            persönliche
                            Hilfe und Unterstützung an, sind da und haben Zeit, hören zu und unterstützen in der Phase der
                            akuten Betroffenheit. Dafür werden wir über den Rettungsdienst und die Polizei zum Einsatz
                            gerufen.
                            Wir begeben uns dann direkt an den Ort des Geschehens und begleiten Opfer, Angehörige und
                            Beteiligte
                            in der persönlichen Krise. Auf der Grundlage des christlichen Verständnisses von Nächstenliebe
                            sorgen wir für die Betreuung noch am Unfallort oder Zuhause, halten das Geschehene, Traurigkeit
                            und
                            Schmerz gemeinsam mit den Hilfesuchenden aus – jederzeit, an allen Tagen im Jahr und rund um die
                            Uhr. </p>
                        {{-- $this->Html->link('Notfallseelsorge vor Ort', '/notfallseelsorge-vor-ort', ['class' => 'btn', 'escape' => false])  --}}
                    </div>
                    <div class="col span_8 clr swap slider">

                    </div>
                </div>
            </div>
        </div>
    @endcan


    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr tar">
                <h2>Erste Hilfe für die Seele</h2>
                <span class="wei400 fsi18">Stabilisieren, orientieren, Ressourcen aktivieren</span>
            </div>
        </div>
    </div>

    <div class="container mt40 hyp">
        <div class="row gutters cols4">
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Hilfe erfahren</h3>
                    <p>In der Regel werden unsere Teams nach einem Ereignis durch die jeweiligen Rettungsleitstellen
                        alarmiert und zum Einsatz entsandt. Denn bei einem...</p>
                    {{-- $this->Html->link('Mehr erfahren', '/hilfe-erfahren', ['class' => 'btn2', 'escape' => false])  --}}
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Einsatznachsorge</h3>
                    <p>Das Leben von Menschen zu retten oder Menschen zu bergen, ist keine leichte Arbeit. Das wissen
                        auch
                        die Einsatzkräfte von Rettungsdienst und Feuerwehr...</p>
                    {{-- $this->Html->link('Mehr erfahren', '/einsatznachsorge', ['class' => 'btn2', 'escape' => false])  --}}
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-machen</h3>
                    <p>Grundsätzlich sollten Sie selbst psychisch belastbar sein, einen "guten Draht" zu Menschen haben,
                        sich gut auf die Not anderer einlassen können und bereit...</p>
                    {{-- $this->Html->link('Mehr erfahren', '/mitmachen', ['class' => 'btn2', 'escape' => false])  --}}
                </div>
            </div>
            <div class="col span_4 clr">
                <div class="borders">
                    <h3>Mit-helfen</h3>
                    <p>Die Einsätze der Notfallseelsorge sind für die Betroffenen kostenlos und sollen es auch weiterhin
                        bleiben. Doch die Aus- und Weiterbildung der Notfallseelsorger/innen...</p>
                    {{-- $this->Html->link('Mehr erfahren', '/mithelfen', ['class' => 'btn2', 'escape' => false])  --}}
                </div>
            </div>
        </div>
    </div>

    <div class="fullblue">
        <div class="container mt80">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h2>Neues/Blog</h2>
                    <span class="wei400 fsi18">Aktuelles aus der Notfallseelsorge Südhessen</span>
                </div>
            </div>
        </div>
    </div>

    <div class="fullblue" style="margin-top: 0 !important">
        <div class="container">
            <div class="row gutters hyp">
                <div class="col span_0 clr">
                    &nbsp;
                </div>
                <div class="col span_15 clr">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
