<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Overview') }}</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

        * {
            margin: 0;
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
        }

        body {
            background: #fff;
            font-family: 'Roboto', sans-serif;
        }

        ::selection {
            background: #f31544;
            color: #FFF;
        }

        ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .col-left {
            float: left;
        }

        .col-right {
            float: right;
        }

        h1 {
            font-size: 1.5em;
            color: #444;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .75em;
            color: #666;
            line-height: 1.2em;
        }

        a {
            text-decoration: none;
            color: #00a63f;
        }

        #invoiceholder {
            width: 100%;
            height: 100%;
            padding:  0;
        }

        #invoice {
            position: relative;
            margin: 0 auto;
            width: 700px;
            background: #FFF;
        }

        [id*='invoice-'] {
            /* Targets all id with 'col-' */
            /*  border-bottom: 1px solid #EEE;*/
            /* padding: 20px; */
        }

        #invoice-top {
            border-bottom: 2px solid #96F;
        }

        #invoice-mid {
            /* min-height: 110px; */
        }

        #invoice-bot {
            /* min-height: 240px; */
        }

        .logo {
            display: inline-block;
            vertical-align: middle;
            width: 110px;
            overflow: hidden;
        }

        .info {
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px;
        }

        .logo img,
        .clientlogo img {
            width: 100%;
        }

        .clientlogo {
            display: inline-block;
            vertical-align: middle;
            width: 50px;
        }

        .clientinfo {
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        #message {
            margin-bottom: 30px;
            display: block;
        }

        h2 {
            margin-bottom: 5px;
            color: #444;
        }

        .col-right td {
            color: #666;
            padding: 5px 8px;
            border: 0;
            font-size: 0.75em;
        }

        .col-right td label {
            margin-left: 5px;
            font-weight: 600;
            color: #444;
        }

        .cta-group a {
            display: inline-block;
            padding: 7px;
            border-radius: 4px;
            background: rgb(196, 57, 10);
            margin-right: 10px;
            min-width: 100px;
            text-align: center;
            color: #fff;
            font-size: 0.75em;
        }

        .cta-group .btn-primary {
            background: #00a63f;
        }

        .cta-group.mobile-btn-group {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            font-size: 0.70em;
            text-align: left;
            padding: 5px 8px;
        }

        .tabletitle th {
            text-align: left;
        }

        th {
            font-size: 0.7em;
            text-align: left;
            padding: 5px ;
        }

        .thecol{
            width: {{ $r4Set ? '25%' : '33%' }} ;
        }
        a{
            color: #000 !important;
            padding-left: 10rem !important;
        }
    </style>
</head>


<body>
    <div id="invoiceholder">
        <div id="invoice" class="effect2">
            <div id="invoice-bot">
                <div id="table">
                    <table class="table-main">
                        <thead>
                            <tr class="tabletitle">
                                @if($r1Set)
                                    <th>
                                        <h1>A-Dienst</h1>
                                    </th>
                                @endif
                                @if($r2Set)
                                    <th>
                                        <h1>B-Dienst</h1>
                                    </th>
                                @endif
                                @if($r3Set)
                                    <th>
                                        <h1>Hintergrund-Dienst</h1>
                                    </th>
                                @endif
                                @if($r4Set)
                                    <th>
                                        <h1>Dienst-Absicherung</h1>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                      
                        @foreach( $table as $row )
                            <tr>
                                <td colspan="3" style="padding-top: 10px;">
                                    <b >{{ $row['date'] }}</b>
                                </td>
                            </tr>
                            <tr class="list-item total-row">
                              
                                @if($r1Set) 
                                    <td colspan="1" class="thecol" style="background: rgb(255, 204, 0);">
                                        @if(isset($row["a"]))
                                            @foreach( $row["a"] as $time=> $data )
                                                <b>{{ $time }}</b>
                                                {{ $data['name'] }} <br>
                                                
                                                <div>
                                                    <a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }} ({{ $data['cont_typ'] }})</a>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </td>
                                @endif
                            
                                @if($r2Set) 
                                    <td colspan="1" class="thecol" style="background: rgb(255, 232, 136);">
                                        @if(isset($row["b"]))
                                            @foreach( $row["b"] as $time=> $data )
                                                <b>{{ $time }}</b>
                                                {{ $data['name'] }} <br>
                                                
                                                <div>
                                                    <a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }} ({{ $data['cont_typ'] }})</a>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </td>
                                @endif

                                @if($r3Set) 
                                    <td colspan="1" class="thecol" style="background: rgb(204, 204, 204);">
                                        @if(isset($row["h"]))
                                            @foreach( $row["h"] as $time=> $data )
                                                <b>{{ $time }}</b>
                                                {{ $data['name'] }} <br>
                                                
                                                <div>
                                                    <a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }} ({{ $data['cont_typ'] }})</a>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </td>
                                @endif

                                @if($r4Set) 
                                    <td colspan="1" class="thecol" style="background: rgb(255, 255, 255);">
                                        @if(isset($row["d"]))
                                            @foreach( $row["d"] as $time=> $data )
                                                <b>{{ $time }}</b>
                                                {{ $data['name'] }} <br>
                                                
                                                <div>
                                                    <a href="tel:{{ $data['tel'] }}">{{ $data['tel'] }} ({{ $data['cont_typ'] }})</a>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach 
                    </table>
                </div>
                <!--End Table-->
                
            </div>
            <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->
    </div><!-- End Invoice Holder-->
</body>

</html>
