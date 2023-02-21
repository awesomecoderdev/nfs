<x-app-layout>
    @section('head')
        <title> Time table | {{ __(config('app.name')) }}</title>
    @endsection
    <link rel="stylesheet" href="{{ secure_asset('css/timetable.css') }}">

    @empty($_GET['start'])
        <link rel="stylesheet" href="{{ secure_asset('css/frontend.css') }}">
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
    </script>

    <div id="timeTableDates"></div>

</x-app-layout>
