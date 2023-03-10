<x-app-layout>
    @section('head')
        <title> Log-in | {{ __(config('app.name')) }}</title>
    @endsection
    <!-- Session Status -->

    <div class="wrapper">
        <div class="col span_16 clr">
            <div class="container row">
                <div class="row gutters">
                    <div class="col span_16 clr tar">
                        <h1>Log-in</h1>
                        <span class="wei400 fsi22">Notfallseelsorge Südhessen</span>
                    </div>
                </div>
            </div>
            <div class="container row">
                <div class="row gutters">
                    <div class="col span_16 clr">
                        <h3>Mitarbeiter</h3>
                        <p>In der Notfallseelsorge tätigen Frauen und Männer arbeiten haupt- oder ehrenamtlich. Die
                            ehrenamtlich Arbeitenden sind in verschiedenen Berufsfeldern tätig. Allen gemein ist, dass
                            sie für die Begleitung von Menschen in Krisen ausgebildet und erfahren in der
                            Notfallseelsorge sind. Denn eine gute Ausbildung, die ständige Weiterbildung und der
                            Austausch von Erfahrungen nach den Einsätzen bilden die Grundlage für unsere kompetente
                            Arbeit.</p>
                    </div>
                </div>
            </div>
            <div class="container row">
                <div class="row gutters">
                    <div class="col span_10 clr">
                        <div class="element_login_1">
                            <div class="element_login_2">
                                <div class="element_login_3 settings">
                                    <p>Benutzen Sie bitte Ihre persönlichen Zugangsdaten, um sich einzuloggen</p>
                                    <style>
                                        /*
                                            .settings .input th{
                                            display: flex;
                                            justify-content: space-between;
                                            max-width: 350px;
                                            width: 100%;
                                            margin: 10px 0;
                                            } */
                                        tr.input th {
                                            width: 180px;
                                            text-align: left;
                                        }

                                        tr.submit td {
                                            display: flex;
                                            justify-content: end;
                                        }

                                        tr.submit td input[type="submit" i] {
                                            width: 170px;
                                            margin-right: 3px;
                                        }
                                    </style>
                                    {{-- <form action="{{ route('users.login') }}" renderer="normal" id="UserLogin/Form"
                                        method="post" accept-charset="utf-8">
                                        @csrf
                                        <input type="hidden" name="action" value="login">
                                        <table class="tableform" cellspacing="0">
                                            <tbody>
                                                <tr class="input text">
                                                    <th><input type="hidden" name="data[User][section]"
                                                            value="nfssection" id="UserSection"><label
                                                            for="userNickNameInput">Benutzername:</label></th>
                                                    <td><input name="data[User][username]" id="userNickNameInput"
                                                            maxlength="255" type="text" required="required"></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="input password">
                                                    <th><label for="UserPw">Passwort:</label></th>
                                                    <td><input name="data[User][pw]" type="password" id="UserPw">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr class="submit">
                                                    <td colspan="3" align="center"><input type="submit"
                                                            value="Anmelden"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <a href="{{ route('users.password.request') }}">Passwort
                                        vergessen?</a> --}}
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('users.login') }}" id="UserLogin/Form">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full" type="text"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Passwort')" />

                                            <x-text-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                    name="remember">
                                                <span
                                                    class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Mich erinnern') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('users.password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('users.password.request') }}">
                                                    {{ __('Passwort vergessen?') }}
                                                </a>
                                            @endif

                                            <x-primary-button class="ml-3">
                                                {{ __('Anmelden') }}
                                            </x-primary-button>
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                href="{{ route('users.register') }}">
                                                {{ __('Kein konto haben? Registrieren') }}
                                            </a>
                                        </div>
                                    </form>
                                    <script type="text/javascript">
                                        if (document.getElementById('email') && document.getElementById('email').value.length == 0) {
                                            document.getElementById('email').focus();
                                        } else {
                                            // document.getElementById('userNickNameInput').focus();
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col span_6 clr">
                        &nbsp;
                    </div>
                </div>
            </div>
            <div class="container row">
                <div class="row gutters">
                    <div class="col span_16 clr">
                        <p>
                            <i class="fa fa-quote-left"></i> manchmal sind wir alle bausteine und können mit einander
                            häuser bauen, brücken schlagen oder sogar kirchen errichten, stein für stein für stein, auch
                            auf dem steinigsten weg liegen grundsteine für ein anderes leben <i
                                class="fa fa-quote-right"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
