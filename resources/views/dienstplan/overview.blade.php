<x-app-layout>
    @section('head')
        <title>Dienstplan Overview | {{ __(config('app.name')) }}</title>
        <style type="text/css">
            .overview_table th {
                font-weight: bold;
            }

            .overview_table td,
            .overview_table th {
                text-align: left;
                width: 250px;
            }

            .overview table th {
                width: 70px;
                font-size: 10pt;
                font-weight: normal;
            }

            .overview table td a {
                color: #000;
            }

            .overview table td {
                font-size: 10pt;
            }

            .overview table td,
            .overview table th {
                text-align: left;
                vertical-align: top;
            }

            .overview table th {
                font-weight: bold;
            }

            .overview_event {
                margin-bottom: 10px;
                padding: 5px;
            }

            .overview_timeslot_0 {
                background: #FFCC00;
            }

            .overview_timeslot_1 {
                background: #FFE888;
            }

            .overview_timeslot_2 {
                background: #CCCCCC;
            }

            .overview h2 {
                padding: 0 !important;
            }
        </style>
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

            select, input[type="date"], input[type="text"], input[type="number"], input[type="email"], input[type="password"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="color"], textarea {
                padding: 0.45rem;
                width: 13rem;
                margin: 0 14px;
            }

            button[type="submit"], button[type="reset"], button[type="button"], .button {
                background: #2b8a3e;
                padding: 0.5rem 2.3rem;
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 0.25rem;
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
    @endsection

    <form method="get" action="{{ route('dienstplan.overview') }}">
    <table border=0 style="float: left;">
        <tr>
            <th style="text-align: left;">
                Von:
            </th>
            <th style="text-align: left;">
                Bis:
            </th>
        </tr>
        <tr>

            <td>
                <input type="date" name="start" value="{{ date('Y-m-d',$start) }}" />
            </td>

            <td>
                <input type="date" name="end"  value="{{ date('Y-m-d',$end) }}" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br />
                <input type="checkbox" name="onlyme" value="true"  @checked($currentUserOnly)>
                Nur meine Zeiten anzeigen.
                <div style="float: right"><button type="submit">Los</button></div>
            </td>
        </tr>
    </table>
    </form>

    <div style="float:left; margin-left: 370px; margin-top: 10px;">
        <a href='{{ route("dienstplan.overview.pdf", ["start"=> date("Y-m-d",$start), "end"=> date("Y-m-d",$end), "onlyme"=> $currentUserOnly]) }}'
            target="_blank">
            <img src="{{ asset('img/dienstplan/pdf.jpg') }}" width="50px">
        </a>
    </div>
    <br />

    <script>
        $(document).ready(function() {
            var start = new Date(<?php echo $start; ?> * 1000);
            var end = new Date(<?php echo $end - 1; ?> * 1000);
            $('#datepicker-start').val(start.getDate() + '.' + (start.getMonth() + 1) + '.' + start.getFullYear());
            $('#datepicker-end').val(end.getDate() + '.' + (end.getMonth() + 1) + '.' + end.getFullYear());
            $('.datepicker').datepicker({
                dateFormat: "dd.mm.yy",
                selectOtherMonths: true
            });
        });

        function refresh() {
            var start = Math.floor(Date.parse($('#datepicker-start').datepicker("getDate")) / 1000);
            var end = Math.floor(Date.parse($('#datepicker-end').datepicker("getDate")) / 1000);
            var baseurl = '{{ route("dienstplan.overview") }}';
            var url = baseurl.split('?')[0];
            if (url.slice(-1) == '/')
                url += '' + start + '/' + end;
            else
                url += '/' + start + '/' + end;
            if ($('#onlyme').is(':checked'))
                url += '/1';

            window.location = url;
        }
    </script>
   

    <div class="overview" style="margin-top:150px;">

        @foreach( $table as $row )
        <div class="overview_day readable">
            <h2><?= $row['date'] ?></h2>
            <table class="overview_table">
                <tr>
                
                    @if($r1Set)
                        <th>
                            <b>A-Dienst</b>
                        </th>
                    @endif
                    @if($r2Set)
                        <th>
                            <b>B-Dienst</b>
                        </th>
                    @endif
                    @if($r3Set)
                        <th>
                            <b>Hintergrund-Dienst</b>
                        </th>
                    @endif
                    @if($r4Set)
                        <th>
                            <b>Dienst-Absicherung</b>
                        </th>
                    @endif
                </tr>
                <tr>
                    @if($r1Set) 
                        <td class="overview_timeslot overview_timeslot_0">
                            @if(isset($row["a"]))
                                @foreach( $row["a"] as $time=> $data )
                                    <div class="overview_event">
                                        <table>
                                            <tr>
                                                <th></th>
                                                <td><b>{{ $time }}</b></td>
                                            </tr>
                                            <tr>
                                                <th>Mitarbeiter: </th>
                                                <td>{{ $data['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ $data['cont_typ'] }}:</th>
                                                <td><a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }}</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    @endif

                    @if($r2Set) 
                        <td class="overview_timeslot overview_timeslot_1">
                            @if(isset($row["b"]))
                                @foreach( $row["b"] as $time=> $data )
                                    <div class="overview_event">
                                        <table>
                                            <tr>
                                                <th></th>
                                                <td><b>{{ $time }}</b></td>
                                            </tr>
                                            <tr>
                                                <th>Mitarbeiter: </th>
                                                <td>{{ $data['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ $data['cont_typ'] }}:</th>
                                                <td><a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }}</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    @endif

                    
                    @if($r3Set) 
                        <td class="overview_timeslot overview_timeslot_2">
                            @if(isset($row["h"]))
                                @foreach( $row["h"] as $time=> $data )
                                    <div class="overview_event">
                                        <table>
                                            <tr>
                                                <th></th>
                                                <td><b>{{ $time }}</b></td>
                                            </tr>
                                            <tr>
                                                <th>Mitarbeiter: </th>
                                                <td>{{ $data['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ $data['cont_typ'] }}:</th>
                                                <td><a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }}</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    @endif


                    @if($r4Set) 
                        <td class="overview_timeslot overview_timeslot_3">
                            @if(isset($row["d"]))
                                @foreach( $row["d"] as $time=> $data )
                                    <div class="overview_event">
                                        <table>
                                            <tr>
                                                <th></th>
                                                <td><b>{{ $time }}</b></td>
                                            </tr>
                                            <tr>
                                                <th>Mitarbeiter: </th>
                                                <td>{{ $data['name'] }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ $data['cont_typ'] }}:</th>
                                                <td><a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }}</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                            @endif
                        </td>
                    @endif


                </tr>
            </table>
        </div>
        @endforeach
    </div>

</x-app-layout>
