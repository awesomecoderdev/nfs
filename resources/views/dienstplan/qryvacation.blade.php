<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abwesenheit Übersicht | {{ __(config('app.name')) }}</title>
    <style>
        @media print {
            body {
                font-family: arial;
                -webkit-print-color-adjust: exact;
            }

            th {
                text-align: left;
            }

            td,
            th {
                padding-right: 15px;
                padding-bottom: 5px;
            }

            .grey {
                background-color: #DDD;
            }

            .print-invis {
                display: none;
            }

            a {
                text-decoration: none;
                color: #000;
            }
        }

        @media screen {
            body {
                font-family: arial;
            }

            th {
                text-align: left;
            }

            td,
            th {
                padding-right: 15px;
                padding-bottom: 5px;
            }

            .grey {
                background-color: #DDD;
            }
        }
    </style>
</head>

<body>
    <h2>Abwesenheit Übersicht</h2>
    <p>
        <a class="print-invis" href="javascript:window.print();">Übersicht drucken</a>
    </p>
    <!-- <p>
        <span>End: {{ date('Y-m-d', $end) }} Total = {{ $vacations->count() }}</span>

        <b>{{ date('d.m.Y', $start) }}</b> bis <b>{{ date('d.m.Y', $end) }}</b>
    </p> -->
    <table>
        <tr>
            <th>
                <a href="javascript:void(0);" class="desc">
                    Name
                </a>
            </th>
            <th>
                <a href="javascript:void(0);">
                    Von
                </a>
            </th>
            <th>
                <a href="javascript:void(0);">
                    Bis
                </a>
            </th>
            <th>
                <a href="javascript:void(0);">
                    Typ
                </a>
            </th>

        </tr>

        @foreach ($vacations as $vacation)
            <tr>
                <td>{{ $vacation->user ? $vacation->user->fullname() : 'Unknown' }}</td>
                <td>{{ date('d.m.Y', $vacation->start) }}</td>
                <td>{{ date('d.m.Y', $vacation->duration + $vacation->start) }}</td>
                <td>
                    @if ($vacation->type == 0)
                        Urlaub
                    @elseif ($vacation->type == 1)
                        Auszeit
                    @elseif ($vacation->type == 2)
                        Fortbildung
                    @elseif ($vacation->type == 3)
                        Krank
                    @elseif ($vacation->type == 4)
                        Sonstiges
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
