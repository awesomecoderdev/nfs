<x-app-layout>
    @section('head')
        <title>Dienstplan Overview | {{ __(config('app.name')) }}</title>
    @endsection

    <table border=0 style="float: left;">
        <tr>
            <th style="text-align: left;">
                Von:
            </th>
            <th style="text-align: left;">
                Bis:
            </th>
        </tr>
        <tr>

            <td>
                <input type="text" class="datepicker" id="datepicker-start">
            </td>

            <td>
                <input type="text" class="datepicker" id="datepicker-end">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="checkbox" id="onlyme" @checked($currentUserOnly)>
                Nur meine Zeiten anzeigen.
                <div style="float: right"><button onclick="refresh()">Los</button></div>
            </td>
        </tr>
    </table>

    <div style="float:left; margin-left: 370px; margin-top: 10px;">
        <a href='{{ "/dienstplan/overview_pdf/$start/$end/$currentUserOnly" }}'
            target="_blank">
            <img src="{{ asset('img/dienstplan/pdf.jpg') }}" width="50px">
        </a>
    </div>
    <br />

    <script>
        $(document).ready(function() {
            var start = new Date(<?php echo $start; ?> * 1000);
            var end = new Date(<?php echo $end - 1; ?> * 1000);
            $('#datepicker-start').val(start.getDate() + '.' + (start.getMonth() + 1) + '.' + start.getFullYear());
            $('#datepicker-end').val(end.getDate() + '.' + (end.getMonth() + 1) + '.' + end.getFullYear());
            $('.datepicker').datepicker({
                dateFormat: "dd.mm.yy",
                selectOtherMonths: true
            });
        });

        function refresh() {
            var start = Math.floor(Date.parse($('#datepicker-start').datepicker("getDate")) / 1000);
            var end = Math.floor(Date.parse($('#datepicker-end').datepicker("getDate")) / 1000);
            var baseurl = '{{ route("dienstplan.overview") }}';
            var url = baseurl.split('?')[0];
            if (url.slice(-1) == '/')
                url += '' + start + '/' + end;
            else
                url += '/' + start + '/' + end;
            if ($('#onlyme').is(':checked'))
                url += '/1';

            window.location = url;
        }
    </script>
    <style type="text/css">
        .overview_table th {
            font-weight: bold;
        }

        .overview_table td,
        .overview_table th {
            text-align: left;
            width: 250px;
        }

        .overview table th {
            width: 70px;
            font-size: 10pt;
            font-weight: normal;
        }

        .overview table td a {
            color: #000;
        }

        .overview table td {
            font-size: 10pt;
        }

        .overview table td,
        .overview table th {
            text-align: left;
            vertical-align: top;
        }

        .overview table th {
            font-weight: bold;
        }

        .overview_event {
            margin-bottom: 10px;
            padding: 5px;
        }

        .overview_timeslot_0 {
            background: #FFCC00;
        }

        .overview_timeslot_1 {
            background: #FFE888;
        }

        .overview_timeslot_2 {
            background: #CCCCCC;
        }

        .overview h2 {
            padding: 0 !important;
        }
    </style>

    <div class="overview" style="margin-top:150px;">

        @foreach( $table as $row )
        <div class="overview_day readable">
            <h2><?= $row['date'] ?></h2>
            <table class="overview_table">
                <tr>
                    <?php if($r1Set): ?>
                    <th><b>A-Dienst</b></th>
                    <?php endif; ?>
                    <?php if($r2Set): ?>
                    <th><b>B-Dienst</b></th>
                    <?php endif; ?>
                    <?php if($r3Set): ?>
                    <th><b>Hintergrund-Dienst</b></th>
                    <?php endif; ?>
                    <?php if($r4Set): ?>
                    <th><b>Dienst-Absicherung</b></th>
                    <?php endif; ?>
                </tr>
                <tr>
                    <?php if($r1Set): ?>
                    <td class="overview_timeslot overview_timeslot_0">
                        <?php if(isset($row[0])): ?>
                        <?php foreach( $row[0] as $time=>$data ): ?>
                        <div class="overview_event">
                            <table>
                                <tr>
                                    <th></th>
                                    <td><b><?= $time ?></b></td>
                                </tr>
                                <tr>
                                    <th>Mitarbeiter: </th>
                                    <td><?= $data['name'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $data['cont_typ'] ?>:</th>
                                    <td><a href="tel:<?= $data['tel'] ?>"><?= $data['tel'] ?></a></td>
                                </tr>
                            </table>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>

                    <?php if($r2Set): ?>
                    <td class="overview_timeslot overview_timeslot_1">
                        <?php if(isset($row[1])): ?>
                        <?php foreach( $row[1] as $time=>$data ): ?>
                        <div class="overview_event">
                            <table>
                                <tr>
                                    <th></th>
                                    <td><b><?= $time ?></b></td>
                                </tr>
                                <tr>
                                    <th>Mitarbeiter: </th>
                                    <td><?= $data['name'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $data['cont_typ'] ?>:</th>
                                    <td><a href="tel:<?= $data['tel'] ?>"><?= $data['tel'] ?></a></td>
                                </tr>
                            </table>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>

                    <?php if($r3Set): ?>
                    <td class="overview_timeslot overview_timeslot_2">
                        <?php if(isset($row[2])): ?>
                        <?php foreach( $row[2] as $time=>$data ): ?>
                        <div class="overview_event">
                            <table>
                                <tr>
                                    <th></th>
                                    <td><b><?= $time ?></b></td>
                                </tr>
                                <tr>
                                    <th>Mitarbeiter: </th>
                                    <td><?= $data['name'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $data['cont_typ'] ?>:</th>
                                    <td><a href="tel:<?= $data['tel'] ?>"><?= $data['tel'] ?></a></td>
                                </tr>
                            </table>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>



                    <?php if($r4Set): ?>
                    <td class="overview_timeslot overview_timeslot_3">
                        <?php
                        // echo '<pre>';
                        // print_r($row);
                        // echo '</pre>';
                        ?>
                        <?php if(isset($row[3])): ?>
                        <?php foreach( $row[3] as $time=>$data ): ?>
                        <div class="overview_event">
                            <table>
                                <tr>
                                    <th></th>
                                    <td><b><?= $time ?></b></td>
                                </tr>
                                <tr>
                                    <th>Mitarbeiter: </th>
                                    <td><?= $data['name'] ?></td>
                                </tr>
                                <tr>
                                    <th><?= $data['cont_typ'] ?>:</th>
                                    <td><a href="tel:<?= $data['tel'] ?>"><?= $data['tel'] ?></a></td>
                                </tr>
                            </table>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>

                </tr>
            </table>
        </div>
        @endforeach
    </div>

</x-app-layout>
