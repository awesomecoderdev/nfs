<x-app-layout>
    @section('head')
        <title> Aktuell | {{ __(config('app.name')) }}</title>
    @endsection

    <div class="column-1 push-1 bgyellow int_ov">
    </div>

    <div class="column-6 push-1 bgcolored int_ov">
    </div>

    <div class="container row">
        <div class="row gutters">

            <div class="col span_16 clr tar">
                <h1>Neues/Blog</h1>
                <span class="wei400 fsi22">Aktuelles aus der Notfallseelsorge Südhessen</span>
            </div>
        </div>
    </div>
    <div class="container row mt80">
        <div class="row gutters">
            <div class="col span_16 clr">
                {{-- {{ $this->renderDefault() }} --}}
            </div>

        </div>
    </div>

    <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/steine100.jpg') }});">
        <h2>Willkommen bei der Notfallseelsorge in Südhessen<br /><span>Erste Hilfe für die Seele</span></h2>
    </div>

</x-app-layout>
