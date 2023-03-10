<x-app-layout>
    @section('head')
        <title>Dienstplan Settings | {{ __(config('app.name')) }}</title>

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
     
            #dienstplan_vacation{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            </style>
    @endsection

    <div class="column-6 push-1 bgcolored">
        <h1>Settings</h1>
    </div>
    <div class="container">
        <div class="row">
            <div id="dienstplan_vacation">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">
                            <img src="{{ asset('img/critical.png') }}" alt="Error">
                            <div class="errortext">{{ $error }}</div>
                        </div>
                    @endforeach
                @endif
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
        </div>
    </div>

    <form method="post" action="{{ route('dienstplan.settings.update') }}">
        @csrf
        <table border=0>
            <tr>
                <th style="vertical-align: top; text-align: left;">
                    L&uuml;ckendienst:
                </th>
                <td>
                    <select name="filluser" size="10">
                        @foreach ($users as $user)
                            <option @selected($user->id == $config->user->id) value="{{ $user->id }}">
                                {{ $user->fullname() }}
                            </option>
                        @endforeach
                    </select>
                </td>

            @if($config->delete_mode == 0)
                <tr>
                    <th style="vertical-align: top; text-align: left;">
                        L&ouml;schsperre:
                    </th>
                    <td>
                        <input type="text" name="delete_border" value="{{ $config->delete_border }}" /> Tage
                    </td>
                </tr>
            @else
                <tr>
                    <th style="vertical-align: center; text-align: left;">
                        Der Tag, ab dem das<br /> L&ouml;schen
                        im Folgemonat<br /> nicht mehr m&ouml;glich ist:
                    </th>
                    <td>
                        <input type="text" name="delete_date" value="{{ $config->delete_date }}" />
                    </td>
                </tr>
            @endif


            <tr>
                <th style="vertical-align: top; text-align: left;">
                    editierbares Benutzerprofil:
                </th>
                <td>
                    <input type="checkbox" name="editable_profile" @checked($config->editable_profile) />
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top; text-align: left;">
                    Bereitschaftsdienst &uuml;bernehmen:
                </th>
                <td>
                    <input type="checkbox" name="apply_week" @checked($config->apply_week) />
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top; text-align: left;">
                    Leitstelle sieht alle Nummern:
                </th>
                <td>
                    <input type="checkbox" name="allnumbers" @checked($config->allnumbers) />
                </td>
            </tr>
            <tr>
                <th style="vertical-align: top; text-align: left;">
                    Leitstelle sieht H-Dienst:
                </th>
                <td>
                    <input type="checkbox" name="show_h" @checked($config->show_h) />
                </td>
            </tr>
            </tr>


        </table>
        <input type="submit" value="Speichern" />
    </form>

</x-app-layout>
