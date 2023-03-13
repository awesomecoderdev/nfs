<x-app-layout>
    @section('head')
        <title>Notfallseelsorge Südhessen | {{ __(config('app.name')) }}</title>
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

            .submitanzeigen {
                background: #2b8a3e;
                padding: 0.5rem 2.3rem;
                color: white;
                font-size: 18px;
                border: none;
                border-radius: 0.25rem;
            }

            #dienstplan_vacation {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
    @endsection

    <link rel="stylesheet" href="{{ asset('css/timetable.css') }}">

    @empty($_GET['start'])
        <!-- <link rel="stylesheet" href="{{ asset('css/frontend.css') }}"> -->
    @endempty

    @php
        if (isset($_GET['start']) && !empty($_GET['start'])) {
            $start = $_GET['start'];
            $date = date('d-m-Y', strtotime($start));
        } else {
            $date = date('d-m-Y', strtotime('now'));
        }
    @endphp

    <script>
        const showTimeTable = {{ isset($_GET['start']) && !empty($_GET['start']) ? 'true' : 'false' }};
        const startFrom = "{{ $date }}";
        const widroute = "{{ route('dienstplan.months', ['start' => request('start', date('d-m-Y'))]) }}&wid=";
        const route = "{{ route('dienstplan.months') }}";
        const isAdmin = {{ auth()->user()->admin()? 1: 0 }};
        const request = @json(request()->all());
        const token = "{{ csrf_token() }}";
        const users = @json($users);
        var ftop = (window.innerHeight / 2) - (320 / 2);
        var fleft = (window.innerWidth / 2) - (320 / 2);
        const bookdienstplan = "{{ route('dienstplan.bookdienstplan') }}";
        const bookings = @json($bookedArr);
        const staticBookings = @json($bookedStaticArr);
    </script>


    <div class="container">
        <div class="row">
            <div id="dienstplan_vacation">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">
                            <img src="{{ asset('img/critical.png') }}" alt="Error">
                            <div class="errortext">{{ $error }}</div>
                        </div>
                    @endforeach
                @endif
                @if (session()->has('alert'))
                    <div class="error">
                        <img src="{{ asset('img/critical.png') }}" alt="Error">
                        <div class="errortext">{{ session('alert') }}</div>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="error">
                        <img src="{{ asset('img/okay.png') }}" alt="Success">
                        <div class="errortext">{{ session('success') }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @section('content')
        <div class="container timetablecontainer">

            <div id="timeTableDates"></div>

            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <div style="padding: 10px;">
                <table>
                    <tr>
                        <th colspan="2">Legende</th>
                    </tr>
                    <tr>
                        <td>
                            <div style="border: 1px #000 solid; width: 12px; height: 12px; background: #33BB33;"></div>
                        </td>
                        <td>vollst&auml;ndig gebucht</td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border: 1px #000 solid; width: 12px; height: 12px; background: #FFA600;"></div>
                        </td>
                        <td>teilweise gebucht</td>
                    </tr>
                    <tr>
                        <td>
                            <div style="border: 1px #000 solid; width: 12px; height: 12px; background: #D50100;"></div>
                        </td>
                        <td>keine Bereitschaftszeiten</td>
                    </tr>
                </table>
            </div>
        </div>
    @endsection

</x-app-layout>
