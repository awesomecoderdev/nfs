<x-app-layout>
    @section('head')
        <title> Kontakt | {{ __(config('app.name')) }}</title>
        <!-- <style>
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
        </style> -->

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


            .form-label {
                position:relative;
                display:block;
                clear:both;
                /*     width:400px; */
                max-width:500px; 
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
            background:none;
            color: #b3b3b3;
            font-weight: normal;
            cursor: text;
            pointer-events: none;
            font-family: sans-serif;
            }

            input,textarea {
                
            display:block;
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
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.06);
            font-family: sans-serif;
            font-size: 1em;
            margin-right: 0;
            margin-bottom: 0.75em;
            padding: 0.5em 0.5em;
            padding:1em;
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
            textarea.hascontent~label
            {
                top: -11%;
                font-size: .8em;
                padding: 0 .3em;
                background:#F9F9F9;
                line-height: 1.3;
            }

            input:focus,
            input.hascontent,
            textarea:focus,
            textarea.hascontent
            {
                outline: none;
                border: 2px solid #00519e;
            }

            .btn {
                background-color: #4CAF50; /* Green */
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

            .ex-checkbox input[type=checkbox], .ex-radio input[type=radio] {
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
            .ex-checkbox input[type=checkbox] + label::before {
                border: 1px solid #9f9f9f;
                width: 20px;
                height: 20px;
                content: '';
                position: absolute;
                left: 0;
                background-color: #fff;
            }

            .ex-checkbox input[type=checkbox]:hover + label::before {
                border: 2px solid #0288d1;
            }

            .ex-checkbox input[type=checkbox]:focus + label::before {
                box-shadow: 0 0 1px #0288d1;
                outline: none;
            }

            .ex-checkbox input[type=checkbox]:checked + label::before {
                border: 1px solid transparent;
                background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0Ij48cGF0aCBmaWxsPSIjMDI4OGQxIiBkPSJNMTguOSA4LjhsLTguNyA4LjdjLS4xLjEtLjIuMS0uMyAwbC00LjktNC45Yy0uMS0uMS0uMS0uMiAwLS4zbDEuMi0xLjJjLjEtLjEuMi0uMS4zIDBsMy42IDMuNiA3LjMtNy4zYy4xLS4xLjItLjEuMyAwbDEuMiAxLjJjLjEgMCAuMS4xIDAgLjJ6IiAvPjwvc3ZnPg==') no-repeat center center;
                background-size: 24px 24px;
            }

            .ex-checkbox input[type=checkbox]:checked:hover + label::before {
                background-size: 30px 30px;
            }

            .ex-checkbox input[type=checkbox]:disabled {
                cursor: not-allowed;
            }

            .ex-checkbox input[type=checkbox]:disabled + label {
                color: #bcbcbc;
                cursor: not-allowed;
            }

            .ex-checkbox input[type=checkbox]:disabled:checked + label::before {
                border: 1px solid transparent;
                background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0Ij48cGF0aCBmaWxsPSIjYmNiY2JjIiBkPSJNMTguOSA4LjhsLTguNyA4LjdjLS4xLjEtLjIuMS0uMyAwbC00LjktNC45Yy0uMS0uMS0uMS0uMiAwLS4zbDEuMi0xLjJjLjEtLjEuMi0uMS4zIDBsMy42IDMuNiA3LjMtNy4zYy4xLS4xLjItLjEuMyAwbDEuMiAxLjJjLjEgMCAuMS4xIDAgLjJ6IiAvPjwvc3ZnPg==') no-repeat center center;
            }

            .ex-checkbox input[type=checkbox]:disabled + label::before {
                border: 1px solid #bcbcbc;
            }

            .ex-checkbox input:focus~label, .ex-checkbox input.hascontent~label {
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
                    if (!$(this).val()){
                        $(this).removeClass('hascontent');
                    }else{
                        $(this).addClass('hascontent');
                    }
                });

                $('textarea').on('blur', function() {
                    if ($(this).text() != ''){
                        $(this).removeClass('hascontent');
                    }else{
                        $(this).addClass('hascontent');
                    }
                });

            });
        </script>
    @endsection


    
    <div id="dienstplan_vacation">
        @error('contact')
            <div class="error">
                <img src="{{ asset('img/critical.png') }}" alt="Error">
                <div class="errortext">{{ $message }}</div>
            </div>
        @enderror
    </div>



    @if (isset($_REQUEST['success']))
        <div class="column-8 bgwhite">
            <h3> Kontakt</h3>

            &#xFEFF;

            <p id="contact-success-message">
                Vielen Dank für Ihre Kontaktanfrage.<br>
                <br>
                Sie erhalten in Kürze eine Antwort
            </p>

        </div>
    @else
        <div class="container row">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h1>Kontakt</h1>
                    <span class="wei400 fsi22">Notfallseelsorge Südhessen</span>
                </div>
            </div>
        </div>

        <div class="container row mt80">
            <div class="row gutters">
                <div class="col span_16 clr">
                    <p>Die Notfallseelsorge selbst ist nicht unmittelbar für Mitbürgerinnen und Mitbürger erreichbar, da
                        sie ausschließlich von Feuerwehr, Rettungsdienst und Polizei gerufen wird. </p>
                    <p>Wenn Sie allgemeine Fragen oder Kommentare zur Notfallseelsorge Südhessen haben, bitten wir Sie,
                        das Kontaktformular zu nutzen. Wir werden uns dann schnellstmöglich mit Ihnen in Verbindung
                        setzen. <br>Bitte entscheiden Sie sich jedoch vorab für ein Thema, das erleichtert uns die
                        Bearbeitung Ihrer Anfrage enorm. Vielen Dank!</p>
                    <p>Im akuten Notfall wählen Sie bitte die Telefonnummer 112!</p>
                </div>
            </div>
        </div>

        <div class="container row">
            <div class="row gutters">
                <div class="col span_10 clr">
                    &#xFEFF;<div id="contact">
                        (&nbsp;<span style="color: #ff0000">*</span>&nbsp;) benötigte Eingabe<br><br>
                        <form action="{{ route('contact.submit') }}" id="contact-form" renderer="table"
                            enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <input type="hidden" name="themen" value="" id="ContactThemen">
                            <label for="ContactThemen">Themen</label>

                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Bergstrasse', old('themen', [])) ? true : false)
                                    value="Bergstrasse" id="ContactThemenBergstrasse">
                                <label for="ContactThemenBergstrasse">Bergstrasse</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Darmstadt', old('themen', [])) ? true : false)
                                    value="Darmstadt" id="ContactThemenDarmstadt">
                                <label for="ContactThemenDarmstadt">Darmstadt</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Darmstadt-Dieburg', old('themen', [])) ? true : false)
                                    value="Darmstadt-Dieburg" id="ContactThemenDarmstadtDieburg">
                                <label for="ContactThemenDarmstadtDieburg">Darmstadt-Dieburg</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Odenwaldkreis', old('themen', [])) ? true : false)
                                    value="Odenwaldkreis" id="ContactThemenOdenwaldkreis">
                                <label for="ContactThemenOdenwaldkreis">Odenwaldkreis</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Allgemeines', old('themen', [])) ? true : false)
                                    value="Allgemeines" id="ContactThemenAllgemeines">
                                <label for="ContactThemenAllgemeines">Allgemeines</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Hilfe suchen', old('themen', [])) ? true : false)
                                    value="Hilfe suchen" id="ContactThemenHilfeSuchen">
                                <label for="ContactThemenHilfeSuchen">Hilfe suchen</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Einsatznachsorge', old('themen', [])) ? true : false)
                                    value="Einsatznachsorge" id="ContactThemenEinsatznachsorge">
                                <label for="ContactThemenEinsatznachsorge">Einsatznachsorge</label>
                            </div>
                            <div class="ex-checkbox">
                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Mitmachen', old('themen', [])) ? true : false)
                                    value="Mitmachen" id="ContactThemenMitmachen">
                                <label for="ContactThemenMitmachen">Mitmachen</label>
                            </div>

                            <br>
                            <span class="form-label">                
                                <input value="{{ old('betreff') }}" name="betreff" maxlength="255" type="text" id="ContactBetreff">
                                <label for="ContactBetreff">Betreff&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('betreff')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 

                            <span class="form-label">                
                                <textarea name="nachricht" class="hasContent" cols="30" rows="6" id="ContactNachricht">{{ old('nachricht') }}</textarea> 
                                <label for="ContactNachricht">Nachricht&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('betreff')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror
                           
                            <span class="form-label">                
                                <input value="{{ old('anrede') }}" name="anrede" maxlength="20" type="text" id="ContactAnrede">
                                <label for="ContactAnrede">Anrede</label>
                            </span>
                            @error('anrede')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror
                            
                            <span class="form-label">                
                                <input value="{{ old('vorname') }}" name="vorname" maxlength="50" type="text" id="ContactVorname">
                                <label for="ContactVorname">Vorname&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('vorname')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror
                                           
                                
                            <span class="form-label">                
                                <input value="{{ old('nachname') }}" name="nachname" maxlength="50" type="text" id="ContactNachname">
                                <label for="ContactNachname">Nachname&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('nachname')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror    
                            
                                 
                            <span class="form-label">                
                                <input value="{{ old('unternehmen') }}" name="unternehmen" maxlength="100" type="text" id="ContactUnternehmen">
                                <label for="ContactUnternehmen">Unternehmen</label>
                            </span>
                            @error('unternehmen')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror  

                                 
                            <span class="form-label">                
                                <input value="{{ old('strasse') }}" name="strasse" maxlength="100" type="text" id="ContactStrasse">
                                <label for="ContactStrasse">Strasse / Nr.</label>
                            </span>
                            @error('strasse')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 
    
                            <span class="form-label">                
                                <input value="{{ old('ort') }}" name="ort" maxlength="100" type="text" id="ContactOrt">
                                <label for="ContactOrt">Plz / Ort</label>
                            </span>
                            @error('ort')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 
                            
                            <span class="form-label">                
                                <input value="{{ old('telefon') }}" name="telefon" maxlength="50" type="text" id="ContactTelefon">
                                <label for="ContactTelefon">Telefon</label>
                            </span>
                            @error('telefon')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror
                            
                            
                            <span class="form-label">                
                                <input value="{{ old('fax') }}" name="fax" maxlength="50" type="text" id="ContactFax">
                                <label for="ContactFax">Fax</label>
                            </span>
                            @error('fax')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 


                            <span class="form-label">                
                                <input value="{{ old('email') }}" name="email" maxlength="50" type="text" id="ContactEmail">
                                <label for="ContactEmail">Email&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('email')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 


                            <span class="form-label">                
                                <input value="{{ old('email') }}" name="email" maxlength="50" type="text" id="ContactEmail">
                                <label for="ContactEmail">Email&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </span>
                            @error('email')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 

                            <div>
                                <span>
                                    <h2>Datennutzung und Datenspeicherung</h2>
                                </span>
                            </div>
                            <div>
                                <span>Wir verarbeiten Ihre, in diesem Formular eingegebenen,
                                    personenbezogenen Daten ausschließlich für die Beantwortung bzw.
                                    Verarbeitung Ihrer Anfrage. Wie wir weitere personenbezogene Daten
                                    verarbeiten entnehmen Sie bitte unserer <a href="{{ route('datenschutz') }}">Datenschutzerklärung</a>
                                </span>
                            </div>
                            

                            <input type="hidden" name="datennutzung" id="ContactDatennutzung_" value="0">
                            <div class="ex-checkbox">
                                <input type="checkbox" name="datennutzung" class="radioLabel" @checked(old('datennutzung', 0) == 1) value="1" id="ContactDatennutzung">
                                <label for="ContactDatennutzung">Ich bin mit der Verarbeitung meiner Daten einverstanden&nbsp;<span style="color: #ff0000">*</span>&nbsp;
                                </label>
                            </div>
                            @error('datennutzung')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror


                            <br>
                            <br>
                            <img src="{{ $captcha->inline() }}">
                            <span class="form-label">                
                                <input type="text" class="{{ auth()->user() && auth()->user()->admin() ? 'hascontent' : ''}}" id="ContactCaptcha" value="{{ auth()->user() && auth()->user()->admin() ? $captcha->getPhrase() : ''}}" name="captcha">
                                <label for="ContactEmail">Captcha&nbsp;
                                    <span style="color: #ff0000">*</span>&nbsp;
                                </label>
                                
                            </span>
                            @error('captcha')
                                <p style="color:red;"> {{ __($message) }} </p>
                            @enderror 
                            <span>
                                <div style="font-size: 11px; padding: 2px;">
                                    Bitte geben Sie den nebenstehenden Code ein
                                </div>
                            </span>
                            <br>

                            <span class="form-label" style="display:block;">                
                                <input type="submit" style="cursor:pointer; width:100%;" value="Abschicken">
                            </span>
                                           


                            <!-- <table class="tableform" cellspacing="0">
                                <tbody>
                                    <tr class="input select">
                                        <th>
                                            <input type="hidden" name="themen" value="" id="ContactThemen">
                                            <label for="ContactThemen">Themen</label>
                                        </th>
                                        <td>
                                            <div class="ex-checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Bergstrasse', old('themen', [])) ? true : false)
                                                    value="Bergstrasse" id="ContactThemenBergstrasse">
                                                <label for="ContactThemenBergstrasse">Bergstrasse</label>
                                            </div>
                                            <div class="ex-checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Darmstadt', old('themen', [])) ? true : false)
                                                    value="Darmstadt" id="ContactThemenDarmstadt">
                                                <label for="ContactThemenDarmstadt">Darmstadt</label>
                                            </div>
                                            <div class="ex-checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Darmstadt-Dieburg', old('themen', [])) ? true : false)
                                                    value="Darmstadt-Dieburg" id="ContactThemenDarmstadtDieburg">
                                                <label for="ContactThemenDarmstadtDieburg">Darmstadt-Dieburg</label>
                                            </div>
                                            <div class="ex-checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Odenwaldkreis', old('themen', [])) ? true : false)
                                                    value="Odenwaldkreis" id="ContactThemenOdenwaldkreis">
                                                <label for="ContactThemenOdenwaldkreis">Odenwaldkreis</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Allgemeines', old('themen', [])) ? true : false)
                                                    value="Allgemeines" id="ContactThemenAllgemeines">
                                                <label for="ContactThemenAllgemeines">Allgemeines</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Hilfe suchen', old('themen', [])) ? true : false)
                                                    value="Hilfe suchen" id="ContactThemenHilfeSuchen">
                                                <label for="ContactThemenHilfeSuchen">Hilfe suchen</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Einsatznachsorge', old('themen', [])) ? true : false)
                                                    value="Einsatznachsorge" id="ContactThemenEinsatznachsorge">
                                                <label for="ContactThemenEinsatznachsorge">Einsatznachsorge</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="themen[]" @checked(is_array(old('themen')) && in_array('Mitmachen', old('themen', [])) ? true : false)
                                                    value="Mitmachen" id="ContactThemenMitmachen">
                                                <label for="ContactThemenMitmachen">Mitmachen</label>
                                            </div>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactBetreff">Betreff&nbsp;
                                                <span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <input value="{{ old('betreff') }}" name="betreff" maxlength="255"
                                                type="text" id="ContactBetreff">
                                            @error('betreff')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input textarea">
                                        <th>
                                            <label for="ContactNachricht">Nachricht&nbsp;
                                                <span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <textarea name="nachricht" cols="30" rows="6" id="ContactNachricht">{{ old('nachricht') }}</textarea>
                                            @error('nachricht')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactAnrede">Anrede</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('anrede') }}" name="anrede" maxlength="20"
                                                type="text" id="ContactAnrede">
                                            @error('anrede')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactVorname">Vorname&nbsp;
                                                <span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <input value="{{ old('vorname') }}" name="vorname" maxlength="50"
                                                type="text" id="ContactVorname">
                                            @error('vorname')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactNachname">Nachname&nbsp;
                                                <span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <input value="{{ old('nachname') }}" name="nachname" maxlength="50"
                                                type="text" id="ContactNachname">
                                            @error('nachname')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactUnternehmen">Unternehmen</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('unternehmen') }}" name="unternehmen"
                                                maxlength="100" type="text" id="ContactUnternehmen">
                                            @error('unternehmen')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactStrasse">Strasse / Nr.</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('strasse') }}" name="strasse" maxlength="100"
                                                type="text" id="ContactStrasse">
                                            @error('strasse')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactOrt">Plz / Ort</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('ort') }}" name="ort" maxlength="100"
                                                type="text" id="ContactOrt">
                                            @error('ort')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactTelefon">Telefon</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('telefon') }}" name="telefon" maxlength="50"
                                                type="text" id="ContactTelefon">
                                            @error('telefon')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactFax">Fax</label>
                                        </th>
                                        <td>
                                            <input value="{{ old('fax') }}" name="fax" maxlength="50"
                                                type="text" id="ContactFax">
                                            @error('fax')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th>
                                            <label for="ContactEmail">Email&nbsp;
                                                <span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <input value="{{ old('email') }}" name="email" maxlength="50"
                                                type="text" id="ContactEmail">
                                            @error('email')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h2>Datennutzung und Datenspeicherung</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Wir verarbeiten Ihre, in diesem Formular eingegebenen,
                                            personenbezogenen Daten ausschließlich für die Beantwortung bzw.
                                            Verarbeitung Ihrer Anfrage. Wie wir weitere personenbezogene Daten
                                            verarbeiten entnehmen Sie bitte unserer <a
                                                href="{{ route('datenschutz') }}">Datenschutzerklärung</a>
                                        </td>
                                    </tr>
                                    <tr class="input checkbox">
                                        <th>
                                            <input type="hidden" name="datennutzung" id="ContactDatennutzung_" value="0">
                                            <label for="ContactDatennutzung">Ich bin mit der Verarbeitung meiner Daten
                                                einverstanden&nbsp;<span style="color: #ff0000">*</span>&nbsp;
                                            </label>
                                        </th>
                                        <td>
                                            <input type="checkbox" name="datennutzung" class="radioLabel"
                                                @checked(old('datennutzung', 0) == 1) value="1" id="ContactDatennutzung">
                                            @error('datennutzung')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><br>
                                        </td>
                                    </tr>
                                    <tr class="input text">
                                        <th rowspan="2">
                                            <label for="ContactCaptcha">
                                                <img src="{{ $captcha->inline() }}">
                                                {{$captcha->getPhrase()}}
                                            </label>
                                        </th>
                                        <td>
                                            <input type="text" id="ContactCaptcha" name="captcha">
                                            @error('captcha')
                                                <p style="color:red;"> {{ __($message) }} </p>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="width: 220px; font-size: 11px; padding: 2px;">
                                                Bitte geben Sie den nebenstehenden Code ein
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="submit">
                                        <td colspan="3" align="center"><input type="submit" value="Abschicken">
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </form>
                    </div>
                </div>
                <div class="col span_6 clr">
                    &nbsp;
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
