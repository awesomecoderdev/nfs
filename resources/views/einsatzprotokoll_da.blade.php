<x-app-layout>
    @section('head')
        <title> Bergstra&szlig;e Intern | {{ __(config('app.name')) }}</title>

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
        .smallFontSize table,
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

        .blank {
            border: 0px;
            border-right: 1px solid black;
            background: #DDD9C3;
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
            <h2>Darmstadt Intern</h2>
        </div>
        <div class="column-1 push-1 bgyellow int_ov">
        </div>
        <div class="col span_16 clr tar">
            <div id="einsatzprotokoll">

                <div class="container">
                    <form>
                        <table style="width:700px;border-collapse:collapse;">
                            <tr>
                                <td colspan=5 id="heading">
                                    <h3>Einsatzprotokoll Notfallseelsorge Darmstadt und Umgebung</h3>
                                </td>
                            </tr>
                            <tr id="row_einsatzdatum">
                                <th>Einsatzdatum:</th>
                                <td colspan=2><input type="text" name="input_einsatzdatum" class="datepicker"></td>
                            </tr>
                            <tr id="row_einsatznummer">
                                <th>Einsatznummer:</th>
                                <td colspan=2><input type="text" name="input_einsatznummer"></td>
                            </tr>
                            <tr id="row_head">
                                <th class="green">Name:</th>
                                <td colspan=4><input type="text" name="input_name_nfs_1" style="width:98%;"></td>
                            </tr>
                            <tr class="td_center time_inputs">
                                <th class="green" rowspan=2>Pers&ouml;nliche<br />Einsatzdaten</th>
                                <td colspan=2>
                                    Alarmierung<br />
                                    <input type="text" name="input_nfs1_alarm_h" class="timepicker_h">:
                                    <input type="text" name="input_nfs1_alarm_i" class="timepicker_i"> Uhr
                                </td>
                                <td colspan=2>
                                    Ankunft E-Stelle<br />
                                    <input type="text" name="input_nfs1_ankunft_h" class="timepicker_h">:
                                    <input type="text" name="input_nfs1_ankunft_i" class="timepicker_i"> Uhr
                                </td>
                            </tr>
                            <tr class="td_center time_inputs">
                                <td colspan=2>
                                    R&uuml;ckfahrt E-Stelle<br />
                                    <input type="text" name="input_nfs1_est_h" class="timepicker_h">:
                                    <input type="text" name="input_nfs1_est_i" class="timepicker_i"> Uhr
                                </td>
                                <td colspan=2>
                                    Ankunft Zuhause<br />
                                    <input type="text" name="input_nfs1_home_h" class="timepicker_h">:
                                    <input type="text" name="input_nfs1_home_i" class="timepicker_i"> Uhr
                                </td>
                            </tr>
                            <tr class="td_singlecheck">
                                <th class="green" rowspan=2>Anfahrt mit</th>
                                <td colspan=2>
                                    <label for="input_nfs1_priv">Privat-Pkw</label>
                                    <input type="checkbox" id="input_nfs1_priv" name="input_nfs1_priv">
                                </td>
                                <td colspan=2>
                                    <label for="input_nfs1_sonst">Sonstige</label>
                                    <input type="checkbox" id="input_nfs1_sonst" name="input_nfs1_sonst">
                                </td>
                            </tr>
                            <tr class="td_center">
                                <td colspan=2>
                                    <input type="text" name="input_nfs1_km" style="width:50px;text-align:right;"> Km
                                </td>
                                <td colspan=2 class="blank">
                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Einsatzstelle<br />
                                    <span style="font-weight: normal;">Ort/Strasse</span>
                                </th>
                                <td colspan=4>
                                    <textarea style="width:99%; height: 99%;" name="input_einsatzstelle">
					</textarea>
                                </td>
                            </tr>
                            <tr class="td_singlecheck">
                                <th class="green">
                                    Alarmiert von
                                </th>
                                <td>
                                    <label for="input_leitstelle">Leitstelle</label>
                                    <input type="checkbox" id="input_leitstelle" name="input_leitstelle">
                                </td>
                                <td>
                                    <label for="input_hintergrund">Hintergrunddienst</label>
                                    <input type="checkbox" id="input_hintergrund" name="input_hintergrund">
                                </td>
                                <td>
                                    <label for="input_sonst">Sonstige</label>
                                    <input type="checkbox" id="input_sonst" name="input_sonst">
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="td_singlecheck">
                                <th class="green">
                                    Angefordert von
                                </th>
                                <td>
                                    <label for="input_rettung">Rettungsdienst</label>
                                    <input type="checkbox" id="input_rettung" name="input_rettung">
                                </td>
                                <td>
                                    <label for="input_polizei">Polizei</label>
                                    <input type="checkbox" id="input_polizei" name="input_polizei">
                                </td>
                                <td>
                                    <label for="input_feuerwehr">Feuerwehr</label>
                                    <input type="checkbox" id="input_feuerwehr" name="input_feuerwehr">
                                </td>
                                <td>
                                    <label for="input_sonst2">Sonstige</label>
                                    <input type="checkbox" id="input_sonst2" name="input_sonst2">
                                </td>
                            </tr>
                            <tr class="td_spacer td_center">
                                <td class="green" colspan=5>&nbsp;</td>
                            </tr>
                            <tr>
                                <th class="green" rowspan=2>
                                    Ereignis
                                </th>
                                <td colspan=2 style="border-right:0px;">
                                    <label for="input_ereignis1_1">
                                        <input type="checkbox" name="input_ereignis1" id="input_ereignis1_1">
                                        h&auml;usliches Ereignis <br />
                                    </label>
                                    <label for="input_ereignis1_2">
                                        <input type="checkbox" name="input_ereignis1" id="input_ereignis1_2">
                                        au&szlig;erh&auml;uslicher Einsatz
                                    </label>
                                </td>
                                <td colspan=2 style="border-left:0px;">
                                    <label for="input_ereignis1_3">
                                        <input type="checkbox" name="input_ereignis1" id="input_ereignis1_3">
                                        Betriebliches Ereignis
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2 style="border-right:0px;">
                                    <label for="input_ereignis2_1">
                                        <input type="checkbox" name="input_ereignis2_1" id="input_ereignis2_1">
                                        Reanimation erfolglos <br />
                                    </label>
                                    <label for="input_ereignis2_2">
                                        <input type="checkbox" name="input_ereignis2_2" id="input_ereignis2_2">
                                        Reanimation erfolgreich <br />
                                    </label>
                                    <label for="input_ereignis2_3">
                                        <input type="checkbox" name="input_ereignis2_3" id="input_ereignis2_3">
                                        Suizidversuch <br />
                                    </label>
                                    <label for="input_ereignis2_4">
                                        <input type="checkbox" name="input_ereignis2_4" id="input_ereignis2_4">
                                        Suizidvollzug <br />
                                    </label>
                                    <label for="input_ereignis2_5">
                                        <input type="checkbox" name="input_ereignis2_5" id="input_ereignis2_5">
                                        T&ouml;tungsdelikt <br />
                                    </label>
                                    <label for="input_ereignis2_6">
                                        <input type="checkbox" name="input_ereignis2_6" id="input_ereignis2_6">
                                        Tod eines Kindes <br />
                                    </label>
                                    <label for="input_ereignis2_7">
                                        <input type="checkbox" name="input_ereignis2_7" id="input_ereignis2_7">
                                        Verkehrsunfall <br />
                                    </label>
                                    <label for="input_ereignis2_8">
                                        <input type="checkbox" name="input_ereignis2_8" id="input_ereignis2_8">
                                        &Uuml;berbringung Todes-/Unfallnachricht <br />
                                    </label>
                                </td>
                                <td colspan=2 style="border-left:0px;">
                                    <label for="input_ereignis2_11">
                                        <input type="checkbox" name="input_ereignis2_11" id="input_ereignis2_11">
                                        Alkohol-/Drogenmissbrauch <br />
                                    </label>
                                    <label for="input_ereignis2_21">
                                        <input type="checkbox" name="input_ereignis2_21" id="input_ereignis2_21">
                                        Brand <br />
                                    </label>
                                    <label for="input_ereignis2_31">
                                        <input type="checkbox" name="input_ereignis2_31" id="input_ereignis2_31">
                                        Gro&szlig;schaden ab 8 Personen <br />
                                    </label>
                                    <label for="input_ereignis2_41">
                                        <input type="checkbox" name="input_ereignis2_41" id="input_ereignis2_41">
                                        psychiatrischer Vorfall <br />
                                    </label>
                                    <label for="input_ereignis2_51">
                                        <input type="checkbox" name="input_ereignis2_51" id="input_ereignis2_51">
                                        Gewaltdelikt <br />
                                    </label>
                                    <label for="input_ereignis2_61">
                                        <input type="checkbox" name="input_ereignis2_61" id="input_ereignis2_61">
                                        Evakuierung <br />
                                    </label>
                                    <label for="input_ereignis2_71">
                                        <input type="checkbox" name="input_ereignis2_71" id="input_ereignis2_71">
                                        MANV <br />
                                    </label>
                                    <label for="input_ereignis2_81">
                                        <input type="checkbox" name="input_ereignis2_81" id="input_ereignis2_81">
                                        sonstiges
                                    </label><input type="text" name="input_ereignis_sonst">
                                </td>
                            </tr>
                            <tr class="td_spacer td_center">
                                <td class="green" colspan=5>&nbsp;</td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Betreuung
                                </th>
                                <td colspan=2 style="border-right:0px;">
                                    <label for="input_betreuung1">
                                        <input type="checkbox" name="input_betreuung1" id="input_betreuung1">
                                        h&auml;usliche Betreuung <br />
                                    </label>
                                    <label for="input_betreuung2">
                                        <input type="checkbox" name="input_betreuung2" id="input_betreuung2">
                                        au&szlig;erh&auml;usliche Betreuung<br />
                                    </label>
                                    <label for="input_betreuung3">
                                        <input type="checkbox" name="input_betreuung3" id="input_betreuung3">
                                        Begleitung ins Krankenhaus<br />
                                    </label>
                                    <label for="input_betreuung4">
                                        <input type="checkbox" name="input_betreuung4" id="input_betreuung4">
                                        Begleitung zu Verwandten/Bekannten<br />
                                    </label>
                                </td>
                                <td colspan=2 style="border-left:0px;">
                                    <label for="input_betreuung5">
                                        <input type="checkbox" name="input_betreuung5" id="input_betreuung5">
                                        Benachrichtigung weiterer Personen<br />
                                    </label>
                                    <label for="input_betreuung6">
                                        <input type="checkbox" name="input_betreuung6" id="input_betreuung6">
                                        Hinweis auf Beratungsstellen/Trauergruppen<br />
                                    </label>
                                    <label for="input_betreuung7">
                                        <input type="checkbox" name="input_betreuung7" id="input_betreuung7">
                                        Gebet, Aussegnung<br />
                                    </label>
                                    <label for="input_betreuung8">
                                        <input type="checkbox" name="input_betreuung8" id="input_betreuung8">
                                        sonstiges
                                    </label><input type="text" name="input_betreuung_sonst">
                                </td>
                            </tr>
                            <tr class="td_spacer td_center">
                                <td class="green" colspan=5>&nbsp;</td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Betreute<br />
                                    Person/en
                                </th>
                                <td colspan=2>
                                    <center>Hauptbetroffene</center>
                                    Mitbetroffene: <input type="text" name="input_bepp_anzahl"
                                        style="width: 40px;">
                                    Alter: <input type="text" name="input_bepp_alter" style="width: 40px;"><br />
                                    <div style="float:left;">
                                        Religion:
                                    </div>
                                    <div style="float:left;">
                                        <label for="input_rel">
                                            <input type="checkbox" name="input_rel" id="input_rel">
                                            rm./kath.
                                        </label>
                                        <label for="input_rel1">
                                            <input type="checkbox" name="input_rel1" id="input_rel1">
                                            ev.
                                        </label>
                                        <label for="input_rel2">
                                            <input type="checkbox" name="input_rel2" id="input_rel2">
                                            Islam
                                        </label><br />
                                        <label for="input_rel3">
                                            <input type="checkbox" name="input_rel3" id="input_rel3">
                                            andere
                                        </label>
                                        <label for="input_rel4">
                                            <input type="checkbox" name="input_rel4" id="input_rel4">
                                            keine Religion
                                        </label>
                                    </div>
                                </td>
                                <td colspan=2>
                                    <center>Mitbetroffene/r</center>
                                    <label for="input_mit1">
                                        <input type="checkbox" name="input_mit1" id="input_mit1">
                                        Kind/er (bis 14 Jahre)
                                    </label><br />
                                    <label for="input_mit2">
                                        <input type="checkbox" name="input_mit2" id="input_mit2">
                                        Jugendliche/r (15-18 Jahre)
                                    </label><br />
                                    <label for="input_mit3">
                                        <input type="checkbox" name="input_mit3" id="input_mit3">
                                        Erwachsene/r
                                    </label><br />
                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Sekund&auml;r-<br />
                                    ma&szlig;nahmen
                                </th>
                                <td colspan=2 style="border-right:0px;">
                                    <label for="input_sek1">
                                        <input type="checkbox" name="input_sek1" id="input_sek1">
                                        Ortspfarrer/in informiert <br />
                                    </label>
                                    <label for="input_sek2">
                                        <input type="checkbox" name="input_sek2" id="input_sek2">
                                        Gespr&auml;ch mit Helfer<br />
                                    </label>
                                    <label for="input_sek3">
                                        <input type="checkbox" name="input_sek3" id="input_sek3">
                                        Gespr&auml;ch mit Rettungsdienst<br />
                                    </label>
                                    <label for="input_sek4">
                                        <input type="checkbox" name="input_sek4" id="input_sek4">
                                        Gespr&auml;ch mit Feuerwehr<br />
                                    </label>
                                </td>
                                <td colspan=2 style="border-left:0px;">
                                    <label for="input_sek5">
                                        <input type="checkbox" name="input_sek5" id="input_sek5">
                                        Gespr&auml;ch mit Polizei<br />
                                    </label>
                                    <label for="input_sek6">
                                        <input type="checkbox" name="input_sek6" id="input_sek6">
                                        Imam informiert/hinzugezogen<br />
                                    </label>
                                    <label for="input_sek7">
                                        <input type="checkbox" name="input_sek7" id="input_sek7">
                                        Weitere Hilfsma&szlig;nahmen eingeleitet<br />
                                    </label>
                                    <label for="input_sek8">
                                        <input type="checkbox" name="input_sek8" id="input_sek8">
                                        sonstiges
                                    </label><input type="text" name="input_sek_sonst">
                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    R&uuml;ckruf erw&uuml;nscht?
                                </th>
                                <td class="checkboxcell checkboxcell_center cols2" colspan=4>
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
                                <th class="green">
                                    Informationen<br>
                                    zum Einsatz
                                </th>
                                <td colspan="4" style="height:100px;">
                                    <textarea style="width:99%; height: 99%;" name="input_infos_einsatz">					</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    <span style="font-size: 9pt;">
                                        Thema f&uuml;r Einsatz-<br />
                                        nachbesprechung
                                    </span>
                                </th>
                                <td colspan=4 style="height:25px;">
                                    <textarea style="width:99%; height: 99%;" name="input_thema_nachbespr">
					</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th class="green">
                                    Unterschrift
                                </th>
                                <td colspan=4>
                                </td>
                            </tr>
                        </table>

                    </form>
                </div>
            </div>

            {{-- send mail --}}
            <button style="margin: 15px 0 10px 19px; float: left;"
                onclick="sendMail(['heiko.kapraun@gmx.de'], '{{ '/send_mail/send' }}', 'Einsatzprotokoll', 'Anbei das Einsatzprotokoll', 'einsatzprotokoll');">E-Mail
                versenden</button>

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
