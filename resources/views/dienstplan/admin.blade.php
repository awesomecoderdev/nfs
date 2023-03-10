<x-app-layout>
    @section('head')
        <title>Dienstplan Admin | {{ __(config('app.name')) }}</title>
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

    <style type="text/css">
        .even td {
            background: #DDDDDD;
        }

        svg {
            height: 0.5rem;
            width: 0.5rem;
        }
    </style>

    <div class="column-6 push-1 bgcolored">
        <h1>Benutzerübersicht</h1>
    </div>


    @section('content')
        <div class="container">
            <div class="row">
                <div id="dienstplan_vacation">
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

        <div class="container " style="overflow:scroll;">
            <div class="row">
                <div class="">
                    {!! $users->links() ?? $users->links() !!}
                    <table class="readable">
                        <tr>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'last_name', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Nachname</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'first_name', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Vorname</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'username', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Benutzername</a>
                            </th>
                            <th>Passwort</th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'email', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Email</a>
                            </th>
                            @if (request('wid', 441) != 441)
                                <th><a
                                        href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'funktion', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}>">Funktion</a>
                                </th>
                            @endif
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'strasse', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Stra&szlig;e</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'plz', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}>">PLZ</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'ort', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}>">Ort</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'telephone', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Telefon</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'pager', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Pager</a>
                            </th>
                            <th><a
                                    href="{{ route('dienstplan.admin', ['page' => intval(request('page')), 'by' => 'mobile', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Mobil</a>
                            </th>
                            <td></td>
                            <td></td>
                        </tr>


                        @foreach ($users as $key => $user)
                            <tr class="{{ $key % 2 == 0 ? 'even' : '' }}">
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->plain }}</td>
                                <td>{{ $user->email }}</td>
                                @if (request('wid') != 441)
                                    <td>{{ $user->props->funktion ?? '' }}</td>
                                @endif
                                <td>{{ $user->strasse }} {{ $user->hausnummer }}</td>
                                <td>{{ $user->plz }}</td>
                                <td>{{ $user->ort }}</td>
                                <td><a href="tel:{{ $user->telephone }}">{{ $user->telephone }}</a></td>
                                <td>{{ $user->props->pager ?? '' }}</td>
                                <td><a href="tel:{{ $user->mobile }}">{{ $user->mobile }}</a></td>
                                <td><a href="{{ route('dienstplan.edit', $user->id) }}">bearbeiten</a></td>
                                <td>
                                    <form action="{{ route('dienstplan.delete', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="usrdltbtn" value="l&ouml;schen">
                                    </form>
                                    <!-- <a href="{{ route('dienstplan.delete', $user->id) }}">l&ouml;schen</a> -->
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $users->links() ?? $users->links() !!}
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
