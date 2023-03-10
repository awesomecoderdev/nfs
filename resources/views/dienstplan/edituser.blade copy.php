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
            #dienstplan_vacation{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
    @endsection

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
    <div class="settings settingsss">
        <form action="{{ route('dienstplan.update.user', $user->id) }}" id="DienstplanUserEditUserForm" method="post"
            accept-charset="utf-8">
            @csrf
            <input type="hidden" name="wid" value="{{$user->wid}}">
            <div class="input text required">
                <label for="DienstplanUserUsername">Benutzername</label>
                <input name="username" value="{{ $user->username }}" maxlength="255" type="text"
                    id="DienstplanUserUsername" required="required">
            </div>
            <div class="input text required">
                <label for="DienstplanUserVorname">Vorname</label>
                <input name="first_name" value="{{ old('first_name',$user->first_name) }}" maxlength="250" type="text" id="DienstplanUserVorname"
                    required="required">
            </div>
            <div class="input text required">
                <label for="DienstplanUserNachname">Nachname</label>
                <input name="last_name" value="{{ old('last_name',$user->last_name) }}" maxlength="250" type="text"
                    id="DienstplanUserNachname" required="required">
            </div>
            <div class="input email required">
                <label for="DienstplanUserEmail">Email</label>
                <input name="email" value="{{ old('email',$user->email) }}" maxlength="255" type="email" id="DienstplanUserEmail"
                    required="required">
            </div>
            <div class="input text">
                <label for="DienstplanUserPropsFunktion">Funktion</label>
                <input name="funktion" value="{{ old('funktion',$user->props->funktion ?? '') }}" maxlength="255" type="text"
                    id="DienstplanUserPropsFunktion">
            </div>
            <div class="input text">
                <label for="DienstplanUserPlain">Passwort</label>
                <input name="plain" value="{{ old('plain',$user->plain) }}" maxlength="255" type="text" id="DienstplanUserPlain">
            </div>
            <div class="input text">
                <label for="DienstplanUserStrasse">Straße</label>
                <input name="strasse" value="{{ old('strasse',$user->strasse) }}" maxlength="250" type="text" id="DienstplanUserStrasse">
            </div>
            <div class="input text">
                <label for="DienstplanUserHausnummer">Hausnummer</label>
                <input name="hausnummer" value="{{ old('hausnummer',$user->hausnummer) }}" maxlength="5" type="text" id="DienstplanUserHausnummer">
            </div>
            <div class="input text">
                <label for="DienstplanUserPlz">Postleitzahl</label>
                <input name="plz" value="{{ old('plz',$user->plz) }}" maxlength="6" type="text" id="DienstplanUserPlz">
            </div>
            <div class="input text">
                <label for="DienstplanUserOrt">Ort</label>
                <input name="ort" value="{{ old('ort',$user->ort) }}" maxlength="250" type="text" id="DienstplanUserOrt">
            </div>
            <div class="input text">
                <label for="DienstplanUserTelefon">Telefon</label>
                <input name="telephone" value="{{ old('telephone',$user->telephone) }}" maxlength="50" type="text" id="DienstplanUserTelefon">
            </div>
            <div class="input text">
                <label for="DienstplanUserPropsPager">Pager</label>
                <input name="pager" value="{{ old('pager',$user->props->pager ?? '') }}" maxlength="255" type="text"
                    id="DienstplanUserPropsPager">
            </div>
            <div class="input text">
                <label for="DienstplanUserMobil">Mobil</label>
                <input name="mobile" value="{{ old('mobile',$user->mobile) }}" maxlength="50" type="text" id="DienstplanUserMobil">
            </div>
            <div class="input checkbox">
                <input type="checkbox" name="dienstplan_access" @checked(old('dienstplan_access', isset($user->props->dienstplan_access) ? ($user->props->dienstplan_access == '1') : false))
                    value="1" id="DienstplanUserPropsDienstplanAccess">
                <label for="DienstplanUserPropsDienstplanAccess">Dienstplan-Zugriff</label>
            </div>
            <div class="input checkbox">
                <input type="hidden" name="nachsorge_access" value="0">
                <input type="checkbox" name="nachsorge_access" value="1" id="DienstplanUserNachsorgeAccess" @checked(old('nachsorge_access', isset( $user->props->nachsorge_access ) ? ($user->props->nachsorge_access == '1') : false)) >
                <label for="DienstplanUserNachsorgeAccess">Nachsorge-Zugriff</label>
            </div>
            <div class="input checkbox">
                <input type="hidden" name="contact_maintainer" value="0">
                <input type="checkbox" name="contact_maintainer" value="1"
                     @checked(old('contact_maintainer', isset($user->props->contact_maintainer) ? ($user->props->contact_maintainer == '1') : false))
                    id="DienstplanUserPropsContactMaintainer">
                <label for="DienstplanUserPropsContactMaintainer">darf
                    Kontakte verwalten</label>
            </div><br>
            <div class="input checkbox">
                <input type="hidden" name="hour_overview_access" value="0">
                <input type="checkbox" name="hour_overview_access" value="1"
                    @checked(old('hour_overview_access', isset($user->props->hour_overview_access) ? ($user->props->hour_overview_access == '1') : false))
                    id="DienstplanUserPropsHourOverviewAccess">
                <label for="DienstplanUserPropsHourOverviewAccess">Stundenübersicht-Zugriff</label>
            </div><br>
            <div class="input checkbox">
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" name="is_admin" value="1" @checked(old('is_admin', $user->admin() == '1'))
                    id="DienstplanUserPropsIsAdmin">
                <label for="DienstplanUserPropsIsAdmin">Administrator?</label>
            </div>
            <div class="submit">
                <input type="submit" value="Submit">
            </div>
        </form>

    </div>


</x-app-layout>
