<x-app-layout>
    @section('head')
        <title> Log-in | {{ __(config('app.name')) }}</title>
        <style>
            /* select,
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
                } */

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

            .form-label {
                position: relative;
                display: block;
                clear: both;
                /*     width:400px; */
                max-width: 500px;
                margin-bottom: 20px;
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

            input,
            textarea {

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
                top: -32%;
                font-size: .8em;
                padding: 0 0.3em;
                background: #F9F9F9;
                line-height: 1.3;
            }

            textarea:focus~label,
            textarea.hascontent~label {
                top: -11%;
                font-size: .8em;
                padding: 0 .3em;
                background: #F9F9F9;
                line-height: 1.3;
            }

            input:focus,
            input.hascontent,
            textarea:focus,
            textarea.hascontent {
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

                $('textarea').on('blur', function() {
                    if ($(this).text() != '') {
                        $(this).removeClass('hascontent');
                    } else {
                        $(this).addClass('hascontent');
                    }
                });

            });
        </script>
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
                                        <span class="form-label">
                                            <input value="{{ old('email') }}" name="email" type="email"
                                                id="email">
                                            <label for="email">Email</label>
                                        </span>
                                        @error('email')
                                            <p style="color:red;"> {{ __($message) }} </p>
                                        @enderror


                                        <!-- Password -->
                                        <span class="form-label">
                                            <input value="{{ old('password') }}" name="password" type="password"
                                                id="password">
                                            <label for="password">Passwort</label>
                                        </span>
                                        @error('password')
                                            <p style="color:red;"> {{ __($message) }} </p>
                                        @enderror

                                        <!-- Remember Me -->
                                        <div class="ex-checkbox">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                name="remember">
                                            <label for="remember_me">{{ __('Mich erinnern') }}</label>
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
                                        {{-- <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                href="{{ route('users.register') }}">
                                                {{ __('Kein konto haben? Registrieren') }}
                                            </a>
                                        </div> --}}
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
