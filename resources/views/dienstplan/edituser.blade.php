<x-app-layout>
    @section('head')
        <title>Dienstplan Edit User | {{ __(config('app.name')) }}</title>
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

            .ex-checkbox,
            .ex-radio {
                position: relative;
                margin: 12px 0;
                font-size: 14px;
            }

            .ex-checkbox label,
            .ex-radio label {
                padding-left: 32px;
                line-height: 140%;
                font-weight: normal;
                display: inline-block;
                position: relative;
                cursor: pointer;
                pointer-events: all;
            }

            .ex-checkbox input[type=checkbox],
            .ex-radio input[type=radio] {
                margin: 0;
                opacity: 0;
                cursor: pointer;
                width: 20px;
                height: 20px;
                z-index: 10;
                position: absolute;
                left: 15px;
                top: 16px;
            }

            /*
        ==========================
        checkboxes
        ==========================
    */
            .ex-checkbox input[type=checkbox]+label::before {
                border: 1px solid #9f9f9f;
                width: 20px;
                height: 20px;
                content: '';
                position: absolute;
                left: 0;
                background-color: #fff;
            }

            .ex-checkbox input[type=checkbox]:hover+label::before {
                border: 2px solid #0288d1;
            }

            .ex-checkbox input[type=checkbox]:focus+label::before {
                box-shadow: 0 0 1px #0288d1;
                outline: none;
            }

            .ex-checkbox input[type=checkbox]:checked+label::before {
                border: 1px solid transparent;
                background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0Ij48cGF0aCBmaWxsPSIjMDI4OGQxIiBkPSJNMTguOSA4LjhsLTguNyA4LjdjLS4xLjEtLjIuMS0uMyAwbC00LjktNC45Yy0uMS0uMS0uMS0uMiAwLS4zbDEuMi0xLjJjLjEtLjEuMi0uMS4zIDBsMy42IDMuNiA3LjMtNy4zYy4xLS4xLjItLjEuMyAwbDEuMiAxLjJjLjEgMCAuMS4xIDAgLjJ6IiAvPjwvc3ZnPg==') no-repeat center center;
                background-size: 24px 24px;
            }

            .ex-checkbox input[type=checkbox]:checked:hover+label::before {
                background-size: 30px 30px;
            }

            .ex-checkbox input[type=checkbox]:disabled {
                cursor: not-allowed;
            }

            .ex-checkbox input[type=checkbox]:disabled+label {
                color: #bcbcbc;
                cursor: not-allowed;
            }

            .ex-checkbox input[type=checkbox]:disabled:checked+label::before {
                border: 1px solid transparent;
                background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0Ij48cGF0aCBmaWxsPSIjYmNiY2JjIiBkPSJNMTguOSA4LjhsLTguNyA4LjdjLS4xLjEtLjIuMS0uMyAwbC00LjktNC45Yy0uMS0uMS0uMS0uMiAwLS4zbDEuMi0xLjJjLjEtLjEuMi0uMS4zIDBsMy42IDMuNiA3LjMtNy4zYy4xLS4xLjItLjEuMyAwbDEuMiAxLjJjLjEgMCAuMS4xIDAgLjJ6IiAvPjwvc3ZnPg==') no-repeat center center;
            }

            .ex-checkbox input[type=checkbox]:disabled+label::before {
                border: 1px solid #bcbcbc;
            }

            .ex-checkbox input:focus~label,
            .ex-checkbox input.hascontent~label {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                font-size: 14px;
                box-sizing: border-box;
                transform: translateY(50%);
                transition: all 0.2s ease-in-out;
                top: 20%;
                left: 1em;
                background: none;
                color: #b3b3b3;
                font-family: sans-serif;
                padding-left: 32px;
                line-height: 140%;
                font-weight: normal;
                display: inline-block;
                position: relative;
                cursor: pointer;
                pointer-events: all;
            }
        </style>
        <script>
            jQuery(document).ready(function() {

                $('input').on('blur', function() {
                    if (!$(this).val()) {
                        $(this).removeClass('hascontent');
                    } else {
                        $(this).addClass('hascontent');
                    }
                });

            });
        </script>
    @endsection

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

    <div class="settings settingsss">

        <form action="{{ route('dienstplan.update.user', $user->id) }}" id="DienstplanUserEditUserForm" method="post"
            accept-charset="utf-8">
            @csrf
            <input type="hidden" name="wid" value="{{ request('wid', $user->wid) }}">

            <span class="form-label">
                <input name="username" value="{{ old('username', $user->username) }}" maxlength="255" type="text"
                    id="DienstplanUserUsername" required="required"
                    class="{{ old('username', $user->username) == null ?: 'hascontent' }}">
                <label for="DienstplanUserUsername">Benutzername</label>
            </span>

            <span class="form-label">
                <input name="first_name" value="{{ old('first_name', $user->first_name) }}" maxlength="250"
                    type="text" id="DienstplanUserVorname" required="required"
                    class="{{ old('first_name', $user->first_name) == null ?: 'hascontent' }}">
                <label for="DienstplanUserVorname">Vorname</label>
            </span>

            <span class="form-label">
                <input name="last_name" value="{{ old('last_name', $user->last_name) }}" maxlength="250" type="text"
                    id="DienstplanUserNachname" required="required"
                    class="{{ old('last_name', $user->last_name) == null ?: 'hascontent' }}">

                <label for="DienstplanUserNachname">Nachname</label>
            </span>

            <span class="form-label">
                <input name="email" value="{{ old('email', $user->email) }}" maxlength="255" type="email"
                    id="DienstplanUserEmail" required="required"
                    class="{{ old('email', $user->email) == null ?: 'hascontent' }}">
                <label for="DienstplanUserEmail">Email</label>
            </span>

            <span class="form-label">
                <input name="funktion" value="{{ old('funktion', $user->props->funktion ?? '') }}" maxlength="255"
                    type="text" id="DienstplanUserPropsFunktion"
                    class="{{ old('funktion', $user->props->funktion ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserPropsFunktion">Funktion</label>
            </span>

            <span class="form-label">
                <input name="plain" value="{{ old('plain', $user->plain) }}" maxlength="255" type="text"
                    id="DienstplanUserPlain" class="{{ old('plain', $user->plain ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserPlain">Passwort</label>
            </span>

            <span class="form-label">
                <input name="strasse" value="{{ old('strasse', $user->strasse) }}" maxlength="250" type="text"
                    id="DienstplanUserStrasse"
                    class="{{ old('strasse', $user->strasse ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserStrasse">Straße</label>
            </span>

            <span class="form-label">
                <input name="hausnummer" value="{{ old('hausnummer', $user->strasse) }}" maxlength="5" type="text"
                    id="DienstplanUserHausnummer"
                    class="{{ old('hausnummer', $user->hausnummer ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserHausnummer">Hausnummer</label>
            </span>
            <span class="form-label">
                <input name="plz" value="{{ old('plz', $user->plz) }}" maxlength="6" type="text"
                    id="DienstplanUserPlz" class="{{ old('plz', $user->plz ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserPlz">Postleitzahl</label>
            </span>
            <span class="form-label">
                <input name="ort" value="{{ old('ort', $user->ort) }}" maxlength="250" type="text"
                    id="DienstplanUserOrt" class="{{ old('ort', $user->ort ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserOrt">Ort</label>
            </span>
            <span class="form-label">
                <input name="telephone" value="{{ old('telephone', $user->telephone) }}" maxlength="50"
                    type="text" id="DienstplanUserTelefon"
                    class="{{ old('telephone', $user->telephone ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserTelefon">Telefon</label>
            </span>
            <span class="form-label">
                <input name="pager" value="{{ old('pager', $user->props->pager ?? '') }}" maxlength="255"
                    type="text" id="DienstplanUserPropsPager"
                    class="{{ old('pager', $user->props->pager ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserPropsPager">Pager</label>
            </span>
            <span class="form-label">
                <input name="mobile" value="{{ old('mobile', $user->mobile) }}" maxlength="50" type="text"
                    id="DienstplanUserMobil" class="{{ old('mobile', $user->mobile ?? '') == null ?: 'hascontent' }}">
                <label for="DienstplanUserMobil">Mobil</label>
            </span>
            <div class="ex-checkbox">
                <input type="checkbox" name="dienstplan_access" @checked(old('dienstplan_access', isset($user->props->dienstplan_access) ? $user->props->dienstplan_access == '1' : false)) value="1"
                    id="DienstplanUserPropsDienstplanAccess">
                <label for="DienstplanUserPropsDienstplanAccess">Dienstplan-Zugriff</label>
            </div>
            <div class="ex-checkbox">
                <input type="hidden" name="nachsorge_access" value="0">
                <input type="checkbox" name="nachsorge_access" value="1" id="DienstplanUserNachsorgeAccess"
                    @checked(old('nachsorge_access', isset($user->props->nachsorge_access) ? $user->props->nachsorge_access == '1' : false))>
                <label for="DienstplanUserNachsorgeAccess">Nachsorge-Zugriff</label>
            </div>
            <div class="ex-checkbox">
                <input type="hidden" name="contact_maintainer" value="0">
                <input type="checkbox" name="contact_maintainer" value="1" @checked(old(
                        'contact_maintainer',
                        isset($user->props->contact_maintainer) ? $user->props->contact_maintainer == '1' : false))
                    id="DienstplanUserPropsContactMaintainer">
                <label for="DienstplanUserPropsContactMaintainer">darf
                    Kontakte verwalten</label>
            </div>
            <div class="ex-checkbox">
                <input type="hidden" name="hour_overview_access" value="0">
                <input type="checkbox" name="hour_overview_access" value="1" @checked(old(
                        'hour_overview_access',
                        isset($user->props->hour_overview_access) ? $user->props->hour_overview_access == '1' : false))
                    id="DienstplanUserPropsHourOverviewAccess">
                <label for="DienstplanUserPropsHourOverviewAccess">
                    Stundenübersicht-Zugriff

                </label>
            </div>
            <div class="ex-checkbox">
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" name="is_admin" value="1" @checked(old('is_admin', $user->admin() == '1'))
                    id="DienstplanUserPropsIsAdmin">
                <label for="DienstplanUserPropsIsAdmin">Administrator?</label>
            </div>
            <br>
            <div class="submit">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>


</x-app-layout>
