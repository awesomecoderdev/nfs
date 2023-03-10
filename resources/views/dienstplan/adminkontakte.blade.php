<x-app-layout>
    @section('head')
        <title>Dienstplan Admin Kontakte | {{ __(config('app.name')) }}</title>
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

            label {
                margin-right: 10px;
            }

            .settingsss {
                display: flex;
                justify-content: center;
            }

            .settingsss form {
                width: 50%;
            }

            #dienstplan_vacation {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .even td {
                background: #DDDDDD;
            }
        </style>
    @endsection

    <div class="column-6 push-1 bgcolored">
        <h1>kontakte</h1>
    </div>

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

    <a href="{{ route('dienstplan.kontakte.create') }}">Kontakt anlegen</a>
    {!! $contacts->links() ?? $contacts->links() !!}
    <table class="readable">
        <tr>
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'nachname', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Nachname</a>
            </th>
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'vorname', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Vorname</a>
            </th>
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'email', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Email</a>
            </th>
            @if (request('wid', 441) != 441)
                <th><a
                        href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'funktion', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Funktion</a>
                </th>
            @endif
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'strasse', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Stra&szlig;e</a>
            </th>
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'plz', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">PLZ</a>
            </th>
            <th><a
                    href="{{ route('dienstplan.admin.kontakte', ['page' => intval(request('page')), 'by' => 'ort', 'sort' => request('sort', 'asc') == 'asc' ? 'desc' : 'asc']) }}">Ort</a>
            </th>
            <th>Telefon</th>
            <th>Telefon priv.</th>
            <th>Mobil</th>
            <th>Notrufhandy</th>
            <td></td>
            <td></td>
        </tr>

        @foreach ($contacts ?? [] as $key => $contact)
            <tr class="{{ $key % 2 == 0 ? 'even' : '' }}">
                <td>{{ $contact->nachname }}</td>
                <td>{{ $contact->vorname }}</td>
                <td>{{ $contact->email }}</td>
                @if (request('wid', 441) != 441)
                    <td>{{ $contact->funktion }}</td>
                @endif
                <td>{{ $contact->strasse }}</td>
                <td>{{ $contact->plz }}</td>
                <td>{{ $contact->ort }}</td>
                <td><a href="tel:{{ $contact->telefon }}">{{ $contact->telefon }}</a></td>
                <td><a href="tel:{{ $contact->telefon_priv }}">{{ $contact->telefon_priv }}</a></td>
                <td><a href="tel:{{ $contact->mobil }}">{{ $contact->mobil }}</a></td>
                <td><a href="tel:{{ $contact->notmobil }}">{{ $contact->notmobil }}</a></td>
                <td><a href="{{ route('dienstplan.kontakte.edit', $contact->id) }}">bearbeiten</a></td>
                <td>
                    <form action="{{ route('dienstplan.kontakte.delete', $contact->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="usrdltbtn">l&ouml;schen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $contacts->links() ?? $contacts->links() !!}

</x-app-layout>
