<x-app-layout>
    @section('head')
        <title>Dienstplan Hour Overview | {{ __(config('app.name')) }}</title>
    @endsection


    <style type="text/css">
        .even td {
            background: #DDDDDD;
        }

        .readable {
           
            font-size: 17px;
        }

        .readable img{
          margin: 0;
        }
        
select,
input[type="date"],
input[type="text"],
input[type="number"],
input[type="email"],
input[type="password"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
input[type="color"],
textarea {
    padding: 0.45rem;
    width: 13rem;
    margin: 5px 14px;
}

button[type="submit"],
button[type="reset"],
button[type="button"],
.button {
    background: #2b8a3e;
    padding: 0.5rem 2.3rem;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 0.25rem;
}
    </style>

   <form action="{{route('dienstplan.hour.overview') }}" method="get">
    <table border=0>
        <tr>
            <th style="text-align: left;">
                Von:
            </th>
            <th style="text-align: left;">
                Bis:
            </th>
            <td>
            </td>
        </tr>
        <tr>

            <td>
                <input type="date" value="{{  date('Y-m-d',strtotime(request('start','-1 month'))) ?? date('Y-m-d',strtotime('-1 month')) }}" name="start">
            </td>

            <td>
                <input type="date" value="{{ date('Y-m-d',strtotime(request('end','today'))) ?? date('Y-m-d') }}"  name="end">
            </td>
            <td>
                <button type="submit">Los</button>
            </td>
        </tr>
    </table>
   </form>

    <table class="readable">
        <th>
            <a href="{{ route('dienstplan.hour.overview', ['sort'=> $sort == 2 ? -2 : 2] ) }}">Nachname</a>
            @if ($sort == 2)
                <img width="10px" src="{{ asset('/img/dienstplan/down.png') }}">
            @endif
            @if ($sort == -2)
                <img width="10px" src="{{ asset('/img/dienstplan/up.png') }}">
            @endif
        </th>
        <th>
            <a href="{{ route('dienstplan.hour.overview', ['sort'=> $sort == 1 ? -1 : 1] ) }}">Vorname</a>
            @if ($sort == 1)
                <img width="10px" src="{{ asset('/img/dienstplan/down.png') }}">
            @endif
            @if ($sort == -1)
                <img width="10px" src="{{ asset('/img/dienstplan/up.png') }}">
            @endif
        </th>
        <th>
            <a href="{{ route('dienstplan.hour.overview', ['sort'=> $sort == 3 ? -3 : 3] ) }}">Dienstzeit</a>
            @if ($sort == 3)
                <img width="10px" src="{{ asset('/img/dienstplan/down.png') }}">
            @endif
            @if ($sort == -3)
                <img width="10px" src="{{ asset('/img/dienstplan/up.png') }}">
            @endif
        </th>
        @foreach ($tbl as $key => $col)
            <tr class="{{ $key % 2 != 0 ?:'even' }}">
                <td>
                    {{$col['last_name']}}
                </td>
                <td>
                    {{$col['first_name']}}
                </td>
                <td style="text-align: right;">
                    {{$col["hours"]}}
                </td>
            </tr>
        @endforeach
    </table>

</x-app-layout>
