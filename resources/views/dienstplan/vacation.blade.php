<x-app-layout>
    @section('head')
        <title>Vacation | {{ __(config('app.name')) }}</title>
        <style>
            #dienstplan_vacation label {
                margin: 0;
                width: 100px;
            }

            #dienstplan_vacation .vacation_overview {
                margin-right: 10px;
            }

            #dienstplan_vacation .error {
                padding: 5px;
                display: flex;
                justify-content: start;
                align-items: center;
                margin: 0;
            }

            #dienstplan_vacation .error .errortext {
                margin-left: 5px;
            }

            #dienstplan_vacation .error img {
                margin: 5px 5px 5px 0;
            }

            #dienstplan_vacation th {
                text-align: left;
            }

            #dienstplan_vacation td {
                padding: 5px 10px 5px 0;
            }

            #dienstplan_vacation h3 {
                padding: 10px 10px 10px 0;
            }

            /*
                        #dienstplan_vacation #addvacationbox
                        {
                        margin-top: 20px;
                        clear:both;
                        }*/

            #dienstplan_vacation .interactionBox {
                padding-top: 20px;
                width: 100%;
                clear: both;
            }

            #dienstplan_vacation .interactionBox b {
                display: block;
                width: 100%;
                border-bottom: 1px solid black;
            }

            .datepicker,
            select {
                padding: 0.45rem;
                width: 13rem;
                margin: 0 14px;
            }

            select, input[type="date"], input[type="text"], input[type="number"], input[type="email"], input[type="password"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="color"], textarea {
                padding: 0.45rem;
                width: 13rem;
                margin: 0 14px;
            }

            .submitanzeigen {
                background: #2b8a3e;
                padding: 0.5rem 2.3rem;
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 0.25rem;
            }
        </style>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}" />

        <script src="{{ asset('js/ui-1.11.4/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    @endsection

    <div id="dienstplan_vacation">
        @if(session()->has('alert'))
            <div class="error">
                <img src="{{ asset('img/critical.png') }}" alt="Error">
                <div class="errortext">{{ session('alert') }}</div>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="error">
                <img src="{{ asset('img/okay.png') }}" alt="Success">
                <div class="errortext">{{ session('success') }}</div>
            </div>
        @endif
    </div>


    <div id="dienstplan_vacation">
            
        @can("isAdmin")    
            @if (isset($users))
                <script type="text/javascript">
                    function changeUser(id) {
                        location.href = "{{ route('dienstplan.vacation') }}/" + id;
                    }
                </script>
            @endif
            @if (isset($users))
                <div class="userselect">
                    <select onchange="changeUser(this.options[this.selectedIndex].value);">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $uid ? 'selected' : '' }}>
                                {{ $user->fullname() }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endcan
            
    
        <table
            style=" border-collapse:collapse; caption-side:bottom; border: solid 1px #000; padding: 10px; margin-top:10px;">
           
            <div class="vacation_overview">

                @if(!count($vacations))
                    <span>Keine aktuellen Urlaubszeiten festgelegt.</span>
                    <br>
                @else
                    <thead>
                        <tr>
                            <th style=" border: solid 1px #000;padding: 10px;">&nbsp;</th>
                            <th style=" border: solid 1px #000;padding: 10px;">Beginn</th>
                            <th style=" border: solid 1px #000;padding: 10px;">Ende</th>
                            <th style=" border: solid 1px #000;padding: 10px;">Dauer</th>
                            <th style=" border: solid 1px #000;padding: 10px;">Löschen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacations as $v)
                            @php
                                $id = $v->id;
                                $starts = date('d.m.Y', $v->start);
                                $ends = date('d.m.Y', $v->start + $v->duration);
                                $day = ceil($v->duration / (60 * 60 * 24));
                                $duration = '' . $day . ' Tage';
                                if ($day == 1) {
                                    $duration = '' . $day . ' Tag';
                                }
                            @endphp
                            <tr>
                                <td style="font-weight: bold; border: solid 1px #000;padding: 10px;">Urlaub</td>
                                <td style="border: solid 1px #000;padding: 10px;">{{ $starts }}</td>
                                <td style="border: solid 1px #000;padding: 10px;">{{ $ends }}</td>
                                <td style="border: solid 1px #000;padding: 10px;">{{ $duration }}</td>
                                <td style="border: solid 1px #000;padding: 10px;">
                                    <form class="dltform" action="{{ route('dienstplan.vacation.delete', $v) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="dltbtn" type="submit">
                                            <img src="{{ asset('img/cancel.png') }}" alt="Cancel" style="pointer-events: none;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
            </div>
            <!--urlaub end here-->

            <div class="vacation_overview">
                @if(!count($outtimes))
                    <span>Keine aktuellen Auszeiten festgelegt.</span>
                    <br>
                @else
                    @foreach ($outtimes as $v)
                        @php
                            $id = $v->id;
                            $starts = date('d.m.Y', $v->start);
                            $ends = date('d.m.Y', $v->start + $v->duration);
                            $day = ceil($v->duration / (60 * 60 * 24));
                            $duration = '' . $day . ' Tage';
                            if ($day == 1) {
                                $duration = '' . $day . ' Tag';
                            }
                        @endphp
                        <tr>
                            <td style="font-weight: bold; border: solid 1px #000;padding: 10px;">Auszeit</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $starts }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $ends }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $duration }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">
                                <form class="dltform" action="{{ route('dienstplan.vacation.delete', $v) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="dltbtn" type="submit">
                                        <img src="{{ asset('img/cancel.png') }}" alt="Cancel" style="pointer-events: none;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </div>
            <!--Auszeit end here-->

            <div class="vacation_overview">
                @if(!count($fortbildungs))
                    <span>Keine aktuellen Fortbildung festgelegt.</span>
                    <br>
                @else
                    @foreach ($fortbildungs as $v)
                        @php
                            $id = $v->id;
                            $starts = date('d.m.Y', $v->start);
                            $ends = date('d.m.Y', $v->start + $v->duration);
                            $day = ceil($v->duration / (60 * 60 * 24));
                            $duration = '' . $day . ' Tage';
                            if ($day == 1) {
                                $duration = '' . $day . ' Tag';
                            }
                        @endphp
                        <tr>
                            <td style="font-weight: bold; border: solid 1px #000;padding: 10px;">Fortbildung</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $starts }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $ends }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $duration }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">
                                    <form class="dltform" action="{{ route('dienstplan.vacation.delete', $v) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="dltbtn" type="submit">
                                            <img src="{{ asset('img/cancel.png') }}" alt="Cancel" style="pointer-events: none;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                @endif
            </div>
            <!--Fortbildung end here-->

            <div class="vacation_overview">
                @if(!count($kranks))
                    <span>Keine aktuellen krank festgelegt.</span>
                    <br>
                @else
                    @foreach ($kranks as $v)
                        @php
                            $id = $v->id;
                            $starts = date('d.m.Y', $v->start);
                            $ends = date('d.m.Y', $v->start + $v->duration);
                            $day = ceil($v->duration / (60 * 60 * 24));
                            $duration = '' . $day . ' Tage';
                            if ($day == 1) {
                                $duration = '' . $day . ' Tag';
                            }
                        @endphp
                        <tr>
                            <td style="font-weight: bold; border: solid 1px #000;padding: 10px;">Krank</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $starts }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $ends }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $duration }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">
                                    <form class="dltform" action="{{ route('dienstplan.vacation.delete', $v) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="dltbtn" type="submit">
                                            <img src="{{ asset('img/cancel.png') }}" alt="Cancel" style="pointer-events: none;">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                @endif
            </div>
            <!--kranks end here-->
            
            <div class="vacation_overview">
                @if(!count($sonstiges))
                    <span>Keine aktuellen sonstige festgelegt.</span>
                    <br>
                @else
                    @foreach ($sonstiges as $v)
                        @php
                            $id = $v->id;
                            $starts = date('d.m.Y', $v->start);
                            $ends = date('d.m.Y', $v->start + $v->duration);
                            $day = ceil($v->duration / (60 * 60 * 24));
                            $duration = '' . $day . ' Tage';
                            if ($day == 1) {
                                $duration = '' . $day . ' Tag';
                            }
                        @endphp
                        <tr>
                            <td style="font-weight: bold; border: solid 1px #000;padding: 10px;">Sonstige</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $starts }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $ends }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">{{ $duration }}</td>
                            <td style="border: solid 1px #000;padding: 10px;">
                                <form class="dltform" action="{{ route('dienstplan.vacation.delete', $v) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="dltbtn" type="submit">
                                        <img src="{{ asset('img/cancel.png') }}" alt="Cancel" style="pointer-events: none;">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </div>
            <!--sonstiges end here-->

            </tbody>
        </table>


        <div id="addvacationbox" class="interactionBox settings">
            <b>Abwesenheit hinzufügen</b>
            <div class="hidden">
                <form action="{{route('dienstplan.vacation.store')}}" id="DienstplanVacationVacationForm" method="POST" accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$uid}}">
                    <input type="hidden" name="webmodul_id" value="{{ request('wid',439) }}">
                    
                    <div class="input select">
                        <label for="DienstplanVacationType">Typ</label>
                        <select name="type" id="DienstplanVacationType">
                            <option value="0">Urlaub</option>
                            <option value="1">Auszeit</option>
                            <option value="2">Fortbildung</option>
                            <option value="3">Krank</option>
                            <option value="4">Sonstiges</option>
                        </select>
                    </div>
                    <div class="input text"><label for="DienstplanVacationStart">Beginn</label>
                        <input name="start" class="datepicker hasDatepicker" value="{{ old('start') }}" maxlength="11" type="date" id="DienstplanVacationStart">
                    </div>
                    @error("start")
                        <p style="color:red;"> {{ __($message) }} </p>
                    @enderror
                    <div class="input text"><label for="DienstplanVacationEnd">Ende</label>
                        <input name="end" class="datepicker hasDatepicker" value="{{ old('end') }}" type="date" id="DienstplanVacationEnd">
                    </div>
                    @error("end")
                        <p style="color:red;"> {{ __($message) }} </p>
                    @enderror
                    <div class="submit">
                        <input type="submit" class="submitanzeigen" value="Hinzufügen">
                    </div>
                </form>
            </div>
        </div>

        <div id="show_vacation_overview" class="interactionBox settings">
            <b>Abwesenheit Übersicht anzeigen</b>
            <form method="GET" action="{{ route('dienstplan.queryvacation') }}">
                
                <table>
                    <tr>
                        <th>Von</th>
                        <td>
                            <input value="{{ old('start', date('Y-m-d',strtotime('-1 month'))) }}" name="start" type="date">
                        </td>
                    </tr>
                    <tr>
                        <th>Bis</th>
                        <td>
                            <input value="{{  old('end', date('Y-m-d')) }}" name="end" type="date">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="submitanzeigen">Ok</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <script>
            // $('.datepicker').datepicker({
            //     dateFormat: "dd.mm.yy",
            //     selectOtherMonths: true,
            //     closeText: 'schließen',
            //     closeStatus: '',
            //     monthNames: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni',
            //         'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'
            //     ],
            //     monthNamesShort: ['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun',
            //         'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'
            //     ],
            //     dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            //     dayNamesShort: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            //     dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            // });
            // $('#queryVacationForm').submit(function() {
            //     window.open('Dienstplan/QueryVacation/' + $('#queryVacationFrom').val() + '/' + $('#queryVacationTo')
            //         .val());
            // });
            let today = new Date();

            $('#queryVacationFrom').val(today.toLocaleDateString('de-DE', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit'
            }));
        </script>
    </div>

</x-app-layout>

