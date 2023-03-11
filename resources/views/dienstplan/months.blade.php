<x-app-layout>
    @section('head')
        <title>Notfallseelsorge Südhessen | {{ __(config('app.name')) }}</title>
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
        const isAdmin = {{ auth()->user()->admin() }};
        const request = @json(request()->all());
        const token = "{{ csrf_token() }}";
        const users = @json($users);
    </script>

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
