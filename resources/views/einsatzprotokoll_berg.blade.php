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
            font-size: 13px;
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
            width: 160px;
        }

        table #row_head td {
            padding: 5px 5px 5px 5px;
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

        table .leftheadcol {
            width: 130px;
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
            <h2>Bergstra&szlig;e Intern</h2>
        </div>
        <div class="column-1 push-1 bgyellow int_ov">
        </div>
        <div class="col span_16 clr tar">

            <div class="column-8 bgwhite int_ov" id="einsatzprotokoll_container">
                <div id="einsatzprotokoll">

                    <div class="container">
                        <form>
                            <table style="width:700px;border-collapse:collapse;">
                                <tr>
                                    <td colspan=5 id="heading">
                                        <h3>Einsatzprotokoll Notfallseelsorge Kreis Bergstra&szlig;e</h3>
                                    </td>
                                </tr>
                                <tr id="row_einsatzdatum">
                                    <th>Einsatzdatum:</th>
                                    <td colspan=2><input type="text" name="input_einsatzdatum" class="datepicker">
                                    </td>
                                </tr>
                                <tr id="row_head">
                                    <th class="green leftheadcol">Nfs-Team</th>
                                    <td class="green" colspan=2>Name Nfs 1: <input type="text"
                                            name="input_name_nfs_1"></td>
                                    <td class="green" colspan=2>Name Nfs 2: <input type="text"
                                            name="input_name_nfs_2"></td>
                                </tr>
                                <tr class="td_center time_inputs">
                                    <th class="green" rowspan=2>Pers&ouml;nliche<br />Einsatzdaten</th>
                                    <td>
                                        Alarmierung<br />
                                        <input type="text" name="input_nfs1_alarm_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs1_alarm_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        Ankunft E-Stelle<br />
                                        <input type="text" name="input_nfs1_ankunft_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs1_ankunft_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        Alarmierung<br />
                                        <input type="text" name="input_nfs2_alarm_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs2_alarm_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        Ankunft E-Stelle<br />
                                        <input type="text" name="input_nfs2_ankunft_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs2_ankunft_i" class="timepicker_i"> Uhr
                                    </td>
                                </tr>
                                <tr class="td_center time_inputs">
                                    <td>
                                        R&uuml;ckfahrt E-Stelle<br />
                                        <input type="text" name="input_nfs1_est_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs1_est_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        Ankunft Zuhause<br />
                                        <input type="text" name="input_nfs1_home_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs1_home_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        R&uuml;ckfahrt E-Stelle<br />
                                        <input type="text" name="input_nfs2_est_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs2_est_i" class="timepicker_i"> Uhr
                                    </td>
                                    <td>
                                        Ankunft Zuhause<br />
                                        <input type="text" name="input_nfs2_home_h" class="timepicker_h">:
                                        <input type="text" name="input_nfs2_home_i" class="timepicker_i"> Uhr
                                    </td>
                                </tr>
                                <tr class="td_singlecheck">
                                    <th class="green" rowspan=2>Anfahrt mit</th>
                                    <td>
                                        <label for="input_nfs1_priv">Privat-Pkw</label>
                                        <input type="checkbox" id="input_nfs1_priv" name="input_nfs1_priv">
                                    </td>
                                    <td>
                                        <label for="input_nfs1_sonst">Sonstige</label>
                                        <input type="checkbox" id="input_nfs1_sonst" name="input_nfs1_sonst">
                                    </td>
                                    <td>
                                        <label for="input_nfs2_priv">Privat-Pkw</label>
                                        <input type="checkbox" id="input_nfs2_priv" name="input_nfs2_priv">
                                    </td>
                                    <td>
                                        <label for="input_nfs2_sonst">Sonstige</label>
                                        <input type="checkbox" id="input_nfs2_sonst" name="input_nfs2_sonst">
                                    </td>
                                </tr>
                                <tr class="td_center">
                                    <td colspan=2>
                                        <input type="text" name="input_nfs1_km"
                                            style="width:50px;text-align:right;"> Km: Nfs 1
                                    </td>
                                    <td colspan=2>
                                        <input type="text" name="input_nfs2_km"
                                            style="width:50px;text-align:right;"> Km: Nfs 2
                                    </td>
                                </tr>
                                <tr class="td_spacer td_center">
                                    <td class="green" colspan=5><b>Wichtiger Hinweis: Bei Ankunft und Abfahrt E-Stelle
                                            Leitstelle telefonisch informieren!</b></td>
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
                                            Suizidvollzug
                                        </label>wie: <input type="text" name="input_ereignis_sonst2"
                                            id="input_ereignis_sonst2" style="width: 100px;"><br>
                                        <label for="input_ereignis2_5">
                                            <input type="checkbox" name="input_ereignis2_5" id="input_ereignis2_5">
                                            T&ouml;tungsdelikt <br />
                                        </label>
                                        <label for="input_ereignis2_6">
                                            <input type="checkbox" name="input_ereignis2_6" id="input_ereignis2_6">
                                            plötzl. Todesfall <br />
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
                                            Badeunfall<br />
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
                                            Aussegnung<br />
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
                                        <table style="border:0px;">
                                            <tr>
                                                <td style="border:0px; width: 80px;">
                                                    Erwachsene:
                                                </td>
                                                <td style="border:0px;">
                                                    Anzahl:
                                                </td>
                                                <td style="border:0px;">
                                                    <input type="text" name="anz_betr_pers_erw"
                                                        id="anz_betr_pers_erw" style="width:110px">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;">
                                                    Jugendliche:
                                                </td>
                                                <td style="border:0px;">
                                                    Anzahl:
                                                </td>
                                                <td style="border:0px;">
                                                    <input type="text" name="anz_betr_pers_ju"
                                                        id="anz_betr_pers_ju" style="width:110px">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;">
                                                    Kinder:
                                                </td>
                                                <td style="border:0px;">
                                                    Anzahl:
                                                </td>
                                                <td style="border:0px;">
                                                    <input type="text" name="anz_betr_pers_ki"
                                                        id="anz_betr_pers_ki" style="width:110px">
                                                </td>
                                            </tr>
                                        </table>
                                        <!--
                        <center>Hauptbetroffene</center>
                        Mitbetroffene: <input type="text" name="input_bepp_anzahl" style="width: 40px;">
                        Alter: <input type="text" name="input_bepp_alter" style="width: 40px;"><br/>
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
                        -->
                                    </td>
                                    <th class="green">
                                        Religion der<br />
                                        betroffenen<br />
                                        Person/en
                                    </th>
                                    <td>
                                        <label for="input_mit1" style="display: inline-block;width:80px;">
                                            <input type="checkbox" name="input_mit1" id="input_mit1">
                                            rm./kath.
                                        </label>
                                        <label for="input_mit2">
                                            <input type="checkbox" name="input_mit2" id="input_mit2">
                                            ev.
                                        </label>
                                        <br />
                                        <label for="input_mit3" style="display: inline-block;width:80px;">
                                            <input type="checkbox" name="input_mit3" id="input_mit3">
                                            Islam
                                        </label>
                                        <label for="input_mit4">
                                            <input type="checkbox" name="input_mit4" id="input_mit4">
                                            andere
                                        </label>
                                        <br />
                                        <label for="input_mit3">
                                            <input type="checkbox" name="input_mit5" id="input_mit5">
                                            Keine Religion
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
                                        Informationen<br />zum Einsatz
                                        <p span style="font-weight: normal;  font-size: 8pt;">
                                            Einsatz kurz schildern! <br>
                                            Angaben zur betroffenen Person (m/w, Alter)<br> <br>
                                            Wenn Platz nicht ausreicht, <br>
                                            Anlage beifügen.</span>

                                    </th>
                                    <td colspan=4 style="height:340px;">
                                        <textarea style="width:99%; height: 99%; resize: none;" name="input_infos_einsatz" maxlength="1200">
                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="green">
                                        <span style="font-size: 9pt;">
                                            Thema f&uuml;r Einsatz-<br />
                                            nachbesprechung
                                        </span>
                                    </th>
                                    <td colspan=2 style="height:46px;">
                                        <textarea style="width:99%; resize: none;" name="input_thema_nachbespr1">
                        </textarea>
                                    </td>
                                    <td colspan=2 style="height:46px;">
                                        <textarea style="width:99%; resize: none; " name="input_thema_nachbespr2">
                        </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="green">
                                        Unterschrift
                                    </th>
                                    <td colspan=2>
                                        Nfs 1:
                                    </td>
                                    <td colspan=2>
                                        Nfs 2:
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>


                    {{-- send mail --}}
                    <button style="margin: 15px 0 10px 10px; float: left;"
                        onclick="sendMail(['notfallseelsorge@haus-der-kirche.de'], '{{ '/send_mail/send' }}', 'Einsatzprotokoll', 'Anbei das Einsatzprotokoll', 'einsatzprotokoll');">E-Mail
                        versenden</button>
                    <p align="right">
                        <b>Fax bitte an 06252 673355</b>
                    </p>

                    <script type="text/javascript" src="{{ secure_asset('js/send_form.js') }}"></script>
                </div>
            </div>
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
