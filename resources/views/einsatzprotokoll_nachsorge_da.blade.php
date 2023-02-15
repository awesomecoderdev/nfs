<x-app-layout>
    @section('head')
        <title> Einsatznachsorge Intern | {{ __(config('app.name')) }}</title>

        <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/jquery-ui-1.11.4.custom/jquery-ui.min.css') }}" />
        <link type="text/css" rel="stylesheet"
            href="{{ secure_asset('css/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css') }}" />
        <link type="text/css" rel="stylesheet"
            href="{{ secure_asset('css/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/jquery.timepicker.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ secure_asset('css/jquery.timepicker.css') }}" />

        <script src="{{ secure_asset('js/ui-1.11.4/jquery-ui.min.js') }}"></script>
        <script src="{{ secure_asset('js/jquery.timepicker.min.js') }}"></script>
    @endsection
    @section('bodyClass', 'interna')

    <style type="text/css">
        .smallFontSize,
        table,
        input {
            font-size: 14px;
            font-family: "Lato", sans-serif;
        }

        table {
            background-color: white;
        }

        input {
            border-top: 0px;
            border-bottom: 1px solid black;
            border-left: 0px;
            border-right: 0px;
        }

        .checkboxcell {
            border-top: 0 !important;
            padding: 4px;
        }

        .checkboxcell_center label {
            text-align: center;
        }

        .checkboxcell label {
            display: block;
            float: left;
        }

        .cols2 label {
            width: 50%;
        }

        .cols3 label {
            width: 33%;
        }

        .cols4 label {
            width: 25%;
        }

        .cols5 label {
            width: 20%;
        }

        textarea {
            border: 0px;
        }

        input[disabled],
        textarea[disabled] {
            color: black;
        }

        input[type=checkbox][disabled],
        input[type=radio][disabled] {
            color: black;
            border: 1px solid black;
        }

        table td {
            border: 1px solid black;
        }

        table #heading h1 {
            display: inline !important;
            float: none !important;
        }

        table #heading {
            border: 0px !important;
            text-align: center;
            height: 50px;
        }

        #einsatzdatum th {
            border: 1px solid black;
            border-right: 0px;
        }

        #einsatzdatum td {
            border: 1px solid black;
            border-left: 0px;
        }

        table #row_head input {
            width: 170px;
        }

        table #row_head td {
            padding: 10px 5px 10px 5px;
        }

        table .time_inputs input {
            width: 20px;
        }

        table .td_center td {
            text-align: center;
        }

        table .td_singlecheck td {
            padding: 5px;
        }

        table .td_singlecheck input[type=checkbox] {
            float: right;
        }

        table .td_spacer td {
            color: #F00;
        }

        table th {
            text-align: left;
            vertical-align: center;
            border: 1px solid black;
            padding-left: 5px;
        }

        .green,
        .green input {
            background: #DDD9C3;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #einsatzprotokoll * {
                visibility: visible;
            }

            .container {
                margin: 0 !important;
            }

            #einsatzprotokoll_container {
                margin: 0 !important;
                padding: 0 !important;
                position: absolute !important;
                top: 20px;
                left: 20px;
            }

            input {
                border: 0px;
            }
        }
    </style>

    <div class="container  smallFontSize">
        <div class="row gutters"></div>

        <div class="col span_16 clr tar">
            <h2>Einsatznachsorge Intern</h2>
        </div>

        <div class="column-1 push-1 bgyellow int_ov">
        </div>
        <div class="col span_16 clr tar">
            <div id="einsatzprotokoll" class="smallFontSize">
                <div class="container">
                    <form>
                        <table style="width:640px;border:1px solid black;border-collapse:collapse;background: #fff;">
                            <tr style="border:1px solid black;">
                                <td colspan=3>
                                    <h3><br />Einsatznachsorge/Einsatzdokumentation</h3>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:250px;border:0px;border-collapse:collapse;background: #fff; margin-top:15px;">
                            <tr>
                                <th style="text-align: left;width:100px;">Ereignis-Nr.</th>
                                <td>
                                    <input type="text" name="input_ergnummer" style="width:95%;">
                                </td>
                            </tr>
                        </table>
                        <table style="width:640px;border:0px;border-collapse:collapse;background: #fff;">
                            <tr>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Ereignisdatum</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_datum" style="width:95%;"
                                                    class="datepicker"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;" colspan="2">Uhrzeit</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                von <input type="text" name="input_time_from" style="width:50px;"
                                                    class="timepicker">
                                                bis
                                                <input type="text" name="input_time_to" style="width:50px;"
                                                    class="timepicker">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Ort</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_ort" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">ENS Einsatzkräfte</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_kraefte" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Alarmierung durch</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_alarm" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Anfordernde Dienststelle/Einheit</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_einheit" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Ereignis</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_ereignis" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <label for="input_prev_vor">
                                        <input type="checkbox" name="input_prev_vor" id="input_prev_vor"
                                            value="prev_vor">
                                        Prävention/Fortbildung
                                    </label>
                                </td>
                                <td style="border:1px solid black;">
                                    <fieldset style="border:0px;padding:0;margin:0;">
                                        <input type="radio" id="input_betreuung" name="input_betreuung_grp"
                                            value="Betreuung">
                                        <label for="input_betreuung"> Betreuung</label> <br />
                                        <input type="radio" id="input_einzel" name="input_betreuung_grp"
                                            value="Einzelgespraech">
                                        <label for="input_einzel"> Einzelgespräch</label> <br />
                                        <input type="radio" id="input_gruppe" name="input_betreuung_grp"
                                            value="Gruppengespraech">
                                        <label for="input_gruppe"> Gruppengespräch</label> <br />
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:640px;border:0px;border-collapse:collapse;background: #fff;margin-top:15px">
                            <tr>
                                <th style="text-align: left;border:1px solid black;">Schilderung der Probleme / Rolle
                                    der Betroffenen bei dem Ereignis</th>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    <textarea name="input_schilderung_prob" style="width: 99%; height: 100px;">
                      </textarea>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:640px;border:0px;border-collapse:collapse;background: #fff;;margin-top:15px">
                            <tr>
                                <th style="text-align: left;border:1px solid black;">Schilderung der Unterstützung
                                    durch die Einsatznachsorge</th>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    <textarea name="input_schilderung_unter" style="width: 99%; height: 100px;">
                      </textarea>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:640px;border:0px;border-collapse:collapse;background: #fff;;margin-top:15px">
                            <tr>
                                <th style="text-align: left;border:1px solid black;">Vereinbarung mit den betroffenen
                                    Personen</th>
                            </tr>
                            <tr>
                                <td style="border:1px solid black;">
                                    <textarea name="input_schilderung_verein" style="width: 99%; height: 100px;">
                      </textarea>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:640px;border:0px;border-collapse:collapse;background: #fff;margin-top:15px;">
                            <tr>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Besonderheiten Folgenachsorge</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_besfolge" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Datum</th>
                                            <th style="text-align: left;">Uhrzeit</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_datur1" style="width:100px;"
                                                    class="datepicker"></td>
                                            <td><input type="text" name="input_datur2" style="width:100px;"
                                                    class="timepicker"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border:1px solid black;">
                                    <table style="width:100%;">
                                        <tr>
                                            <th style="text-align: left;">Tätigkeit</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="input_teati" style="width:95%;"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table
                            style="width:640px;border-collapse:collapse;border: 1px solid black;margin-top:15px;background: #fff;">
                            <tr>
                                <th
                                    style="padding: 10px 0 10px 5px;width:120px;vertical-align:top; text-align: left; border-right: 1px solid black;">
                                    Unterschrift
                                </th>
                                <td>
                                    <table style="width:100%">
                                        <tr>
                                            <td style="padding: 10px 0 10px 5px;width: 350px;">Datum <input
                                                    type="text" name="input_datum" class="datepicker"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 0 0 0 5px;"><b>gez.</b><input type="text"
                                                    name="input_gez"></td>
                                            <td style="padding: 0 0 10px 0;"><sub>Unterschrift</sub></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </form>

                    {{-- route need to be changed --}}
                    <button style="margin: 15px 0 10px 10px; float: left;"
                        onclick="sendMail(['heiko.kapraun@gmx.de', 's.fitz@hock-fitz.de' ],
                        '{{ '/send_mail/send' }}', 'Einsatzprotokoll', 'Anbei das Einsatzprotokoll', 'einsatzprotokoll');">E-Mail
                        versenden</button>
                </div>
            </div>

            <script type="text/javascript" src="{{ secure_asset('js/send_form.js') }}"></script>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker({
                dateFormat: "dd.mm.yy",
                selectOtherMonths: true
            });
            $('.timepicker').timepicker({
                'timeFormat': 'H:i'
            });
        });
    </script>

</x-app-layout>
