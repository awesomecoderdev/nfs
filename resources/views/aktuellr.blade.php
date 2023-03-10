<x-app-layout>
    @section('head')
        <title> Aktuellr | {{ __(config('app.name')) }}</title>
    @endsection

    <div class="column-1 push-1 bgyellow int_ov">
    </div>

    <div class="column-6 push-1 bgcolored int_ov">
    </div>

    <div class="container">
        <div class="row gutters">
            <div class="col span_16 clr tar">        
                {{--
                @if($category->aktuell->count() == 0)
                    <h1>Willkommen bei der Notfallseelsorge in Südhessen</h1>
                    <span class="wei400 fsi22">Not sehen, für Menschen da sein</span>
                @else
                    <h1>Bergstraße Intern</h1>
                    <span class="wei400 fsi22">Aktuelles aus der Notfallseelsorge Südhessen</span>
                @endif
                --}}

                
                @if(request("wid")==455 || request("wid")==460)
                <div class="column-6 push-1 bgcolored int_ov">
                	<h2>Bergstra&szlig;e Intern</h2>
                </div>
                @elseif(request("wid")==456 || request("wid")==461)
                <div class="column-6 push-1 bgcolored int_ov">
                	<h2>Darmstadt Intern</h2>
                </div>
                @elseif(request("wid")==457 || request("wid")==462)
                <div class="column-6 push-1 bgcolored int_ov">
                	<h2>Darmstadt-Dieburg Intern</h2>
                </div>
                @elseif(request("wid")==458 || request("wid")==463)
                <div class="column-6 push-1 bgcolored int_ov">
                	<h2>Odenwald Intern</h2>
                </div>
                @elseif(request("wid")==468)
                <div class="column-6 push-1 bgcolored int_ov">
                	<h2>Einsatznachsorge Intern</h2>
                </div>
                @else
                <div class="column-6 push-1 bgcolored int_ov">
                  <h2>Willkommen bei der Notfallseelsorge in Südhessen<br /><span>Erste Hilfe für die Seele</span></h2>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt80">
        <div class="row gutters">
            <div class="col span_16 clr">
                {{-- {{ $this->renderDefault() }} --}}
            </div>
        </div>
    </div>

    <!-- <div class="column-1 push-1 bgyellow">
    </div>

    <div class="column-6 push-1 bgcolored" style="background-image: url({{ secure_asset('img/steine100.jpg') }});">
        <h2>Willkommen bei der Notfallseelsorge in Südhessen<br /><span>Erste Hilfe für die Seele</span></h2>
    </div> -->


    <h3>{{$category->name}}</h3>
    
    @foreach ($category->aktuell as $key => $aktuell)
        <div class="aktuell_entry">


            <div class="aktuell_heading">
                <h2 class="" onclick="scrolling(this)" id="aktuell_entry_{{ $aktuell->id }}"
                    style="cursor:pointer">
                    <span class="">{{ date('d.m.Y', strtotime($aktuell->date)) }} - </span>
                    {{ $aktuell->title }}
                </h2>
            </div>


            <div id="aktuell_entry_body_{{ $aktuell->id }}" class="aktuellElement " style="">


                <div class="aktuellEntryText">

                    <div class="mini_slideshow_container mini_slideshow_right">
                        <div class="mini_slideshow" id="mini_slideshow_{{ $aktuell->id }}" style="">

                            <div class="mini_slideshow_slideshow" id="{{ $aktuell->id }}_slideshow"
                                style="width: 100%;">
                            </div>
                        </div>
                    </div>

                    {!! $aktuell->body !!}

                    <br style="clear: both;">

                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
