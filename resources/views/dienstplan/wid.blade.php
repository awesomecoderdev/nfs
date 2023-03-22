<x-app-layout>
    @section('head')
        <title>Change WID | {{ __(config('app.name')) }}</title>
         <style>
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

            select, input[type="date"], input[type="text"], input[type="number"], input[type="email"], input[type="password"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], input[type="color"], textarea {
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
        </style>
    @endsection

    <div id="dienstplan_vacation">
        @if(session()->has('alert'))
            <div class="error">
                <img src="{{ asset('img/critical.png') }}" alt="Error">
                <div class="errortext">{{ session('alert') }}</div>
            </div>
        @endif
        @if(session()->has('success'))
            <div class="error">
                <img src="{{ asset('img/okay.png') }}" alt="Success">
                <div class="errortext">{{ session('success') }}</div>
            </div>
        @endif
    </div>



    <form action="{{ route('dienstplan.update.wid') }}" method="post">
        @csrf

        {!!  Form::select('wid', $wids, $wid) !!}
<!--         
        <select name="wid" id="wid">
            <option value="439">439</option>
            <option value="440">440</option>
            <option value="441">441</option>
            <option value="442">442</option>
            <option value="443">443</option>
        </select> -->

        <button type="submit">Change</button>
    </form>

</x-app-layout>
