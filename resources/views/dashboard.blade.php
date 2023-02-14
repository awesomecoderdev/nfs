<x-app-layout>
    @section('head')
        <title> Dashboard | {{ __(config('app.name')) }}</title>
    @endsection

    <h1>This is dashboard</h1>

    @can('wid439')
        <div class="fullblue">
            <div class="container row">
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
                    </div>
                    <div class="col span_8 clr swap slider">

                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
