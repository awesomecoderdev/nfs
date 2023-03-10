<x-app-layout>
    @section('head')
        <title> Darmstadt Intern | {{ __(config('app.name')) }}</title>

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

    <div class="container row smallFontSize">
        <div class="row gutters"></div>
        <div class="col span_16 clr tar">
            <h2>Darmstadt Intern</h2>
        </div>
        <div class="column-1 push-1 bgyellow int_ov">
        </div>
        <div class="col span_16 clr tar">
            <div id="einsatzprotokoll">

                <div class="container row">
                    <form>
                        <table style="width:700px;border-collapse:collapse">
                            <tr>
                                <td colspan=3 id="heading">
                                    <h3>Einsatzprotokoll Notfallseelsorge Darmstadt und Umgebung</h3><br />
                                    <span>- Reflexion nach Notfallseelsorge-Einsatz -</span>
                                </td>
                            </tr>
                            <tr>
                                <th class="green">NotfallseelsorgerIn:</th>
                                <td><input type="text" style="width:99%;" name="input_seelsorger"></td>
                            </tr>
                            <tr>
                                <th class="green">Einsatzdatum:</th>
                                <td><input type="text" name="input_einsatzdatum" class="datepicker"
                                        style="width:99%;"></td>
                            </tr>
                            <tr>
                                <th class="green">Gelungene<br />Intervention im<br />Einsatz:</th>
                                <td colspan=2 style="height:100px;">
                                    <textarea name="input_gelinv" style="width:99%;height:99%;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="green">Problematisch f&uuml;r<br />mich war:</th>
                                <td colspan=2 style="height:100px;">
                                    <textarea name="input_probl" style="width:99%;height:99%;"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="green" colspan=3 style="text-align:center;">
                                    <b>Erleben und Befindlichkeit w&auml;hrend des Einsatzes:</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3 class="verticalHead green">
                                    Aufnahme der Notfallseelsorge als Institution durch die beratene Person:
                                </td>
                            </tr>
                            <tr>
                                <td class="checkboxcell checkboxcell_center cols3" colspan=3>
                                    <label for="checkbox_positiv">
                                        <input type="checkbox" id="checkbox_positiv" name="grp1">
                                        positiv/freundlich
                                    </label>
                                    <label for="checkbox_indiv">
                                        <input type="checkbox" id="checkbox_indiv" name="grp1">
                                        indifferent/gleichg&uuml;ltig
                                    </label>
                                    <label for="checkbox_neg">
                                        <input type="checkbox" id="checkbox_neg" name="grp1">
                                        negativ/ablehnend
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3 class="verticalHead green">
                                    Reaktion der beratenden Personen auf mich pers&ouml;nlich als NotfallseelsorgerIn:
                                </td>
                            </tr>
                            <tr>
                                <td class="checkboxcell cols4" colspan=3>
                                    <label for="checkbox_vor">
                                        <input type="checkbox" id="checkbox_vor">
                                        vorsichtig
                                    </label>
                                    <label for="checkbox_res">
                                        <input type="checkbox" id="checkbox_res">
                                        reserviert
                                    </label>
                                    <label for="checkbox_agg">
                                        <input type="checkbox" id="checkbox_agg">
                                        aggressiv
                                    </label>
                                    <label for="checkbox_fre">
                                        <input type="checkbox" id="checkbox_fre">
                                        freundlich
                                    </label>
                                    <label for="checkbox_int">
                                        <input type="checkbox" id="checkbox_int">
                                        intensiv
                                    </label>
                                    <label for="checkbox_anh">
                                        <input type="checkbox" id="checkbox_anh">
                                        anh&auml;nglich
                                    </label>
                                    <label for="checkbox_wec">
                                        <input type="checkbox" id="checkbox_wec">
                                        wechselnd
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3 class="verticalHead green">
                                    Kontakt zur beratenden Person erlebe ich pers&ouml;nlich als:
                                </td>
                            </tr>
                            <tr>
                                <td class="checkboxcell cols5" colspan=3>
                                    <label for="checkbox_vor1">
                                        <input type="checkbox" id="checkbox_vor1">
                                        leicht herzustellen
                                    </label>
                                    <label for="checkbox_res1">
                                        <input type="checkbox" id="checkbox_res1">
                                        intensiv
                                    </label>
                                    <label for="checkbox_agg1">
                                        <input type="checkbox" id="checkbox_agg1">
                                        distanziert
                                    </label>
                                    <label for="checkbox_fre1">
                                        <input type="checkbox" id="checkbox_fre1">
                                        anstrengend
                                    </label>
                                    <label for="checkbox_int1">
                                        <input type="checkbox" id="checkbox_int1">
                                        angenehm
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3 class="verticalHead green">
                                    Nach dem Einsatz f&uuml;hle ich mich:
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3 style="border: 0;padding:0;">
                                    <table style="width:100%;height:100%;border-collapse:collapse;padding:0;"
                                        class="tdpadding">
                                        <tr>
                                            <td style="border-top: 0;">gut/erfolgreich</td>
                                            <td style="border-top: 0;">(wenig)
                                                <input type="checkbox" name="chk1">
                                                <input type="checkbox" name="chk2">
                                                <input type="checkbox" name="chk3">
                                                <input type="checkbox" name="chk4">
                                                <input type="checkbox" name="chk5">
                                                (sehr)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>zufrieden</td>
                                            <td>(wenig)
                                                <input type="checkbox" name="chk11">
                                                <input type="checkbox" name="chk12">
                                                <input type="checkbox" name="chk13">
                                                <input type="checkbox" name="chk14">
                                                <input type="checkbox" name="chk15">
                                                (sehr)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ausgelaugt/matt</td>
                                            <td>(wenig)
                                                <input type="checkbox" name="chk21">
                                                <input type="checkbox" name="chk22">
                                                <input type="checkbox" name="chk23">
                                                <input type="checkbox" name="chk24">
                                                <input type="checkbox" name="chk25">
                                                (sehr)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>k&ouml;rperlich und seelisch ersch&ouml;pft</td>
                                            <td>(wenig)
                                                <input type="checkbox" name="chk31">
                                                <input type="checkbox" name="chk32">
                                                <input type="checkbox" name="chk33">
                                                <input type="checkbox" name="chk34">
                                                <input type="checkbox" name="chk35">
                                                (sehr)
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="green" colspan=3 style="text-align:center;border-top:0px;">&nbsp;

                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    R&uuml;ckruf erw&uuml;nscht?
                                </th>
                                <td class="checkboxcell checkboxcell_center cols2" colspan=2>
                                    <label for="checkbox_y">
                                        <input type="checkbox" id="checkbox_y">
                                        Ja
                                    </label>
                                    <label for="checkbox_n">
                                        <input type="checkbox" id="checkbox_n">
                                        Nein
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="green" colspan=3 style="text-align:center;border-top:0px;">&nbsp;

                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Die Zusammenarbeit<br />
                                    mit
                                </th>
                                <td colspan=2 style="border:0;padding:0;margin:0;">
                                    <table style="width:100%;height:100%;border-collapse:collapse;padding:0;margin:0;"
                                        class="tdpadding">
                                        <tr>
                                            <td style="border-top:0;border-left:0;">Feuerwehr</td>
                                            <td style="border-top:0;">
                                                <label for="checkbox_gut">
                                                    <input type="checkbox" id="checkbox_gut">
                                                    war gut
                                                </label>
                                            </td>
                                            <td style="border-top:0;">
                                                <label for="checkbox_problem">
                                                    <input type="checkbox" id="checkbox_problem">
                                                    war problematisch
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left:0;">Rettungsdienst</td>
                                            <td>
                                                <label for="checkbox_gut1">
                                                    <input type="checkbox" id="checkbox_gut1">
                                                    war gut
                                                </label>
                                            </td>
                                            <td>
                                                <label for="checkbox_problem1">
                                                    <input type="checkbox" id="checkbox_problem1">
                                                    war problematisch
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left:0;border-bottom:0;">Polizei</td>
                                            <td style="border-bottom:0;">
                                                <label for="checkbox_gut2">
                                                    <input type="checkbox" id="checkbox_gut2">
                                                    war gut
                                                </label>
                                            </td>
                                            <td style="border-bottom:0;">
                                                <label for="checkbox_problem2">
                                                    <input type="checkbox" id="checkbox_problem2">
                                                    war problematisch
                                                </label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th class="green">Anmerkungen: </th>
                                <td colspan=2 style="height:120px;">
                                    <textarea name="input_anm" style="width:99%;height:99%;"></textarea>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>
            {{-- route need to be changed --}}
            <button style="margin: 15px 0 10px 19px !important; float: left;"
                onclick="sendMail(['heiko.kapraun@gmx.de'],
                '{{ '/send_mail/send' }}',
                 'Reflexionsprotokoll', 'Anbei das Reflexionsprotokoll', 'reflexionsprotokoll');">
                E-Mail versenden</button>


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
            $('.timepicker_h').timepicker({
                'timeFormat': 'H',
                'step': '60'
            });
            $('.timepicker_i').timepicker({
                'timeFormat': 'i',
                'step': '1',
                'minTime': '00:00am',
                'maxTime': '00:59am',
            });
        });
    </script>

</x-app-layout>
