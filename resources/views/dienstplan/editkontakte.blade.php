<x-app-layout>
    @section('head')
        <title>Dienstplan Edit Kontakte | {{ __(config('app.name')) }}</title>
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

            .form-label {
                position: relative;
                display: block;
                clear: both;
                /*     width:400px; */
                max-width: 500px;
            }

            label {
                -webkit-transform: translateY(50%);
                -moz-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                -o-transform: translateY(-50%);
                transform: translateY(50%);
                -webkit-transition: all 0.2s ease-in-out;
                -moz-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
                position: absolute;
                top: 3%;
                left: 1em;
                background: none;
                color: #b3b3b3;
                font-weight: normal;
                cursor: text;
                pointer-events: none;
                font-family: sans-serif;
            }

            input {

                display: block;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                -webkit-transition: border-color;
                -moz-transition: border-color;
                transition: border-color;
                box-sizing: border-box;
                background-color: white;
                border-radius: 3px;
                border: 1px solid #DDD;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
                font-family: sans-serif;
                font-size: 1em;
                margin-right: 0;
                margin-bottom: 0.75em;
                padding: 0.5em 0.5em;
                padding: 1em;
                width: 100%;
            }

            input:focus~label,
            input.hascontent~label {

                top: -45%;
                font-size: .8em;
                padding: 0 .3em;
                background: #F9F9F9;

            }

            input:focus,
            input.hascontent {
                outline: none;
                border: 2px solid #00519e;
            }

            .btn {
                background-color: #4CAF50;
                /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
    @endsection

    <h1>Edit Kontakte</h1>

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

    <form action="{{ route('dienstplan.kontakte.update', $kontakte->id) }}" id="DienstplanContactCreateContactForm"
        method="post" accept-charset="utf-8">
        @csrf
        <span class="form-label">
            <input name="vorname" value="{{ old('vorname', $kontakte->vorname) }}" maxlength="255" type="text"
                id="DienstplanContactVorname"
                class="{{ old('vorname', $kontakte->vorname ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactVorname">Vorname</label>
        </span>

        <span class="form-label">
            <input name="nachname" value="{{ old('nachname', $kontakte->nachname) }}" maxlength="255" type="text"
                id="DienstplanContactNachname"
                class="{{ old('nachname', $kontakte->nachname ?? '') == null ?: 'hascontent' }}">

            <label for="DienstplanContactNachname">Nachname</label>
        </span>

        <span class="form-label">
            <input name="funktion" value="{{ old('funktion', $kontakte->funktion) }}" maxlength="255" type="text"
                id="DienstplanContactFunktion"
                class="{{ old('funktion', $kontakte->funktion ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactFunktion">Funktion</label>
        </span>

        <span class="form-label">
            <input name="email" maxlength="255" value="{{ old('email', $kontakte->email) }}" type="email"
                id="DienstplanContactEmail" class="{{ old('email', $kontakte->email ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactEmail">Email</label>
        </span>

        <span class="form-label">
            <input name="strasse" value="{{ old('strasse', $kontakte->strasse) }}" maxlength="255" type="text"
                id="DienstplanContactStrasse"
                class="{{ old('strasse', $kontakte->strasse ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactStrasse">Straße/Hausnummer</label>
        </span>

        <span class="form-label">
            <input name="plz" type="number" value="{{ old('plz', $kontakte->plz) }}" id="DienstplanContactPlz"
                class="{{ old('plz', $kontakte->plz ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactPlz">Postleitzahl</label>
        </span>

        <span class="form-label">
            <input name="ort" maxlength="255" type="text" value="{{ old('ort', $kontakte->ort) }}"
                id="DienstplanContactOrt" class="{{ old('ort', $kontakte->ort ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactOrt">Ort</label>
        </span>

        <span class="form-label">
            <input name="telefon" value="{{ old('telefon', $kontakte->telefon) }}" maxlength="255" type="text"
                id="DienstplanContactTelefon"
                class="{{ old('telefon', $kontakte->telefon ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactTelefon">Telefon</label>
        </span>

        <span class="form-label">
            <input name="telefon_priv" value="{{ old('telefon_priv', $kontakte->telefon_priv) }}" maxlength="255"
                type="text" id="DienstplanContactTelefonPriv"
                class="{{ old('telefon_priv', $kontakte->telefon_priv ?? '') == null ?: 'hascontent' }}">
            <label for="DienstplanContactTelefonPriv">Telefon priv</label>
        </span>

        <span class="form-label">
            <input name="mobil" value="{{ old('mobil', $kontakte->mobil) }}" maxlength="255" type="text"
                id="DienstplanContactMobil" class="{{ old('mobil', $kontakte->mobil ?? '') == null ?: 'hascontent' }}">

            <label for="DienstplanContactMobil">Mobil</label>
        </span>

        <span class="form-label">
            <input name="notmobil" value="{{ old('notmobil', $kontakte->notmobil) }}" maxlength="255" type="text"
                id="DienstplanContactNotmobil"
                class="{{ old('notmobil', $kontakte->notmobil ?? '') == null ?: 'hascontent' }}">

            <label for="DienstplanContactNotmobil">Notfallhandy</label>
        </span>
        <br>
        <div class="submit">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-app-layout>
