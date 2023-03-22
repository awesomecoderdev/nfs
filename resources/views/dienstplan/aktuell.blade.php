<x-app-layout>
    @section('head')
        <title>Dienstplan Aktuell | {{ __(config('app.name')) }}</title>
    @endsection

    <div style="font-size: 17pt;">
        Aktuelle Uhrzeits:
        {{ $time }}
    </div>

    <?php
    // echo "WID $wid";
    // echo '<pre>';
    // print_r($table);
    // echo '</pre>';
    ?>

    <!-- start A no extra conduction-->
    @if (isset($table['a']))
        <h3>A-Dienst</h3>
        <table class="readable">
            <tr>
                <th>Name</th>
                <td>
                    {{ $table['a']['name'] }}
                </td>
            </tr>
            <tr>
                <?php $numberset = false; ?>
                @if (isset($table['a']['pager']))
                    <th>Pager</th>
                    <td>
                        {{ $table['a']['pager'] }}
                    </td>
                    <?php $numberset = true; ?>
                @endif
                @if (isset($table['a']['mobil']) && ($allnumbers || !$numberset))
                    <th>Mobil</th>
                    <td>
                        <a href="tel:{{ $table['a']['mobil'] }}">{{ $table['a']['mobil'] }}</a>
                    </td>
                    <?php $numberset = true; ?>
                @endif
                @if (isset($table['a']['tel']) && ($allnumbers || !$numberset))
                    <th>Telefon</th>
                    <td>
                        <a href="tel:{{ $table['a']['tel'] }}">{{ $table['a']['tel'] }}</a>
                    </td>
                    <?php $numberset = true; ?>
                @endif
            </tr>
        </table>
    @else
        <h3>A-Dienst</h3>
        <table class="readable">
            <tr>
                <th>Name</th>
                <td>
                    <center><span style="color:#FF0000">---</span></center>
                </td>
            </tr>
        </table>
    @endif
    <!-- end A -->

    <!-- start B no extra conduction-->
    @if (isset($table['b']))
        <h3>B-Dienst</h3>
        <table class="readable">
            <tr>
                <th>Name</th>
                <td>
                    {{ $table['b']['name'] }}
                </td>
            </tr>
            <tr>
                <?php $numberset = false; ?>
                @if (isset($table['b']['pager']))
                    <th>Pager</th>
                    <td>
                        {{ $table['b']['pager'] }}
                    </td>
                    <?php $numberset = true; ?>
                @endif
                @if (isset($table['b']['mobil']) && ($allnumbers || !$numberset))
                    <th>Mobil</th>
                    <td>
                        <a href="tel: {{ $table['b']['mobil'] }}"> {{ $table['b']['mobil'] }}</a>
                    </td>
                    <?php $numberset = true; ?>
                @endif
                @if (isset($table['b']['tel']) && ($allnumbers || !$numberset))
                    <th>Telefon</th>
                    <td>
                        <a href="tel:{{ $table['b']['tel'] }}">{{ $table['b']['tel'] }}</a>
                    </td>
                    <?php $numberset = true; ?>
                @endif
            </tr>
        </table>
    @else
        <h3>B-Dienst</h3>
        <table class="readable">
            <tr>
                <th>Name</th>
                <td>
                    <center><span style="color:#FF0000">---</span></center>
                </td>
            </tr>
        </table>
    @endif
    <!-- end B -->

    <!-- start C done-->
    @if ($wid == 441)
        @if (isset($table['c']))
            <h3>C-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $table['c']['name'] }}
                    </td>
                </tr>
                <tr>
                    <?php $numberset = false; ?>
                    @if (isset($table['c']['pager']))
                        <th>Pager</th>
                        <td>
                            {{ $table['c']['pager'] }}
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['c']['mobil']) && ($allnumbers || !$numberset))
                        <th>Mobil</th>
                        <td>
                            <a href="tel:{{ $table['c']['mobil'] }}">{{ $table['c']['mobil'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['c']['tel']) && ($allnumbers || !$numberset))
                        <th>Telefon</th>
                        <td>
                            <a href="tel:{{ $table['c']['tel'] }}">{{ $table['c']['tel'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                </tr>
            </table>
        @else
            <h3>C-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        <center><span style="color:#FF0000">---</span></center>
                    </td>
                </tr>
            </table>
        @endif
    @endif
    <!-- end C -->

    <!-- start H done 1step-> wid will implement on controller -->
    @if (!$ip_view || $show_h == 1)
        @if (isset($table['h']))
            <h3>Hintergrund-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $table['h']['name'] }}
                    </td>
                </tr>
                <tr>
                    <?php $numberset = false; ?>
                    @if (isset($table['h']['pager']))
                        <th>Pager</th>
                        <td>
                            {{ $table['h']['pager'] }}
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['h']['mobil']) && ($allnumbers || !$numberset))
                        <th>Mobil</th>
                        <td>
                            <a href="tel:{{ $table['h']['mobil'] }}">{{ $table['h']['mobil'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['h']['tel']) && ($allnumbers || !$numberset))
                        <th>Telefon</th>
                        <td>
                            <a href="tel:{{ $table['h']['tel'] }}">{{ $table['h']['tel'] }} </a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                </tr>
            </table>
        @else
            <h3>Hintergrund-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        <center><span style="color:#FF0000">---</span></center>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
        @endif
    @endif
    <!-- end H -->

    <!-- start D done-->
    @if (!in_array($wid, [439, 440]))
        @if (isset($table['d']))
            <h3>Dienst-Absicherung</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $table['d']['name'] }}
                    </td>
                </tr>
                <tr>
                    <?php $numberset = false; ?>
                    @if (isset($table['d']['pager']))
                        <th>Pager</th>
                        <td>
                            {{ $table['d']['pager'] }}
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['d']['mobil']) && ($allnumbers || !$numberset))
                        <th>Mobil</th>
                        <td>
                            <a href="tel:{{ $table['d']['mobil'] }}">{{ $table['d']['mobil'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['d']['tel']) && ($allnumbers || !$numberset))
                        <th>Telefon</th>
                        <td>
                            <a href="tel:{{ $table['d']['tel'] }}">{{ $table['d']['tel'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                </tr>
            </table>
        @else
            <h3>Dienst-Absicherung</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        <center><span style="color:#FF0000">---</span></center>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
        @endif
    @endif
    <!-- end D -->

    <!-- start L done-->
    @if (
        (isset($table['h']) && empty($table['h']) && (isset($table['d']) && empty($table['d']))) ||
            (!isset($table['h']) && !isset($table['h'])))
        @if (isset($table['l']))
            <h3>L&uuml;cken-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        {{ $table['l']['name'] }}
                    </td>
                </tr>
                <tr>
                    <?php $numberset = false; ?>
                    @if (isset($table['l']['pager']))
                        <th>Pager</th>
                        <td>
                            {{ $table['l']['pager'] }}
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['l']['mobil']) && ($allnumbers || !$numberset))
                        <th>Mobil</th>
                        <td>
                            <a href="tel:{{ $table['l']['mobil'] }}">{{ $table['l']['mobil'] }}</a>
                        </td>
                        <?php $numberset = true; ?>
                    @endif
                    @if (isset($table['l']['tel']) && ($allnumbers || !$numberset))
                        <th>Telefon</th>
                        <td>
                            <a href="tel:{{ $table['l']['tel'] }}">{{ $table['l']['tel'] }}</a>

                        </td>
                        <?php $numberset = true; ?>
                    @endif
                </tr>
            </table>
        @else
            <h3>L&uuml;cken-Dienst</h3>
            <table class="readable">
                <tr>
                    <th>Name</th>
                    <td>
                        <center><span style="color:#FF0000">---</span></center>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
        @endif
    @endif
    <!-- end L -->


</x-app-layout>
