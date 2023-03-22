@auth
    <ul class="leftMenu">

        <li>
            <a href="{{ route('aktuell', ['wid' => 459]) }}">Aktuelles aus Südhessen</a>
        </li>


        <style>
            #subBtn {
                position: absolute;
                top: 10px;
                right: 10px;
                cursor: pointer;
            }

            #subBtn svg {
                pointer-events: none;
                transform: rotate(0deg);
                transition: all 150ms ease-in-out;
                height: 2rem;
                width: 2rem;

            }

            .has-ul {
                position: relative;
            }

            li.has-ul ul.sub {
                display: none;
            }

            li.has-ul.active ul.sub {
                display: block !important;
            }

            .has-ul.active #subBtn svg {
                transform: rotate(-180deg);
            }

            li b {
                box-sizing: border-box;
                width: 100%;
                padding: 0 0 0 0;
                border-right: none;
                color: #00519e;
                line-height: 46px;
                display: block;
                text-decoration: none;
                font-weight: 600;
                letter-spacing: 1px;
            }
        </style>

        @can('isAdmin')
            <li class="bergstrasse has-ul"><b>Bergstrasse Intern</b>
                <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub selected" id="bergstrasse_intern_sub">

                    <li><a href="/aktuellr/view/334?wid=460">Aktuelles und Termine</a></li>
                    <li><a href="/aktuellr/view/387?wid=460">Gelbe Seiten</a></li>
                    <li><a href="/aktuellr/view/335?wid=460">Fortbildungen</a></li>
                    <li><a href="/aktuellr/view/392?wid=460">Hintergrunddienst</a></li>
                    <li><a href="/aktuellr/view/337?wid=460">Team</a></li>
                    <li><a href="/aktuellr/view/336?wid=460">Downloads</a></li>
                    <li><a href="/aktuellr/view/391?wid=460">PSNV-Fachtagung 2018 Kinder</a></li>
                    <li><a href="/aktuellr/view/399?wid=460">PSNV-Fachtagung 2019
                            Einsatzkräfte</a></li>
                    <li><a href="/aktuellr/view/338?wid=460">Links</a></li>
                    <li><a href="/simplemessages?wid=464">Pinnwand</a></li>
                    <li><a href="/einsatzprotokoll_berg?wid=460">Einsatzprotokoll</a></li>
                    <li><a href="/reflexion_berg?wid=460">Reflexionsbogen</a></li>
                </ul>
            </li>
            <li class="darmstadt has-ul"><b>Darmstadt und Umgebung Intern</b> <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub " id="darmstadt_intern_sub">

                    <li><a href="/aktuellr/view/343?wid=461">Aktuelles und Termine</a></li>
                    <li><a href="/aktuellr/view/348?wid=461">Fortbildungen</a></li>
                    <li><a href="/aktuellr/view/349?wid=461">Downloads</a></li>
                    <li><a href="/aktuellr/view/350?wid=461">Team</a></li>
                    <li><a href="/aktuellr/view/351?wid=461">Links</a></li>
                    <li><a href="/aktuellr/view/398?wid=461">Kalender</a></li>
                    <li><a href="/aktuellr/view/427?wid=461">Steckbriefe</a></li>
                    <li><a href="/aktuellr/view/428?wid=461">Newsletter</a></li>
                    <li><a href="/simplemessages?wid=465">Pinnwand</a></li>
                    <li><a href="/einsatzprotokoll_da?wid=460">Einsatzprotokoll</a></li>
                    <li><a href="/reflexion_da?wid=460">Reflexionsbogen</a></li>
                </ul>
            </li>
        @endcan

        <li class="dieburg has-ul"><b>Darmstadt-Dieburg Intern</b> <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            <ul class="sub " id="dieburg_intern_sub">

                <li><a href="/aktuellr/view/352?wid=462">Aktuelles und Termine</a></li>
                <li><a href="/aktuellr/view/353?wid=462">Fortbildungen</a></li>
                <li><a href="/aktuellr/view/354?wid=462">Downloads</a></li>
                <li><a href="/aktuellr/view/355?wid=462">Team</a></li>
                <li><a href="/aktuellr/view/356?wid=462">Links</a></li>
                <li><a href="/simplemessages?wid=466">Pinnwand</a></li>
                <li><a href="/einsatzprotokoll_dadi?wid=460">Einsatzprotokoll</a></li>
                <li><a href="/reflexion_dadi?wid=460">Reflexionsbogen</a></li>
            </ul>
        </li>

        @can('isAdmin')
            <li class="odenwald has-ul"><b>Odenwald Intern</b>
                <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub " id="odenwald_intern_sub">

                    <li><a href="/aktuellr/view/357?wid=463">Aktuelles</a></li>
                    <li><a href="/aktuellr/view/445?wid=463">Rückblick</a></li>
                    <li><a href="/aktuellr/view/444?wid=463">Termine</a></li>
                    <li><a href="/aktuellr/view/360?wid=463">Team</a></li>
                    <li><a href="/simplemessages?wid=467">Pinnwand</a></li>
                    <li><a href="/einsatzprotokoll_ow?wid=460">Einsatzprotokoll</a></li>
                    <li><a href="/reflexion_ow?wid=460">Reflexionsbogen</a></li>
                </ul>
            </li>
            <li class="nachsorge has-ul"><b>Einsatznachsorge Intern</b>
                <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub " id="nachsorge_intern_sub">
                    <li><a href="/aktuellr/view/363?wid=468">Download</a></li>
                    <li><a href="/aktuellr/view/364?wid=468">MA-Liste</a></li>
                    <li><a href="/einsatzprotokoll_nachsorge_da?wid=460">Einsatznachsorgeprotokoll</a></li>
                </ul>
            </li>
        @endcan

        <li class="has-ul"><b>Dienstplan</b>
            <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            <ul class="sub " style="padding:0 !important;">
                <li><a style="color: red" href="/dienstplan/overview?wid=">Ansicht</a></li>
                <li><a style="color: red" href="/dienstplan/aktuell?wid=">Leitstelle</a></li>
            </ul>
        </li>

        @can('isAdmin')
            <li class="has-ul"><b>Administrator</b>
                <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub " style="padding:0 !important;">
                    <li><a style="color: red" href="{{ route('dienstplan.months', ['wid' => request('wid')]) }}">Dienstplankonf.</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.vacation', ['wid' => request('wid')]) }}">Urlaub/Auszeit</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.admin', ['wid' => request('wid')]) }}">Benutzerübersicht</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.user.create', ['wid' => request('wid')]) }}">Benutzer anlegen</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.admin.kontakte', ['wid' => request('wid')]) }}">Kontakte</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.settings', ['wid' => request('wid')]) }}">Einstellungen</a></li>
                    <li><a style="color: red" href="{{ route('dienstplan.hour.overview') }}">Stundenübersicht</a></li>
                </ul>
            </li>
        @else
            <li class="has-ul "><b>Mein Bereich</b>
                <span id="subBtn">
                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                <ul class="sub " style="padding:0 !important;">

                    <li><a style="color: red" href="/dienstplan/months?wid=">Dienstplan</a></li>
                    <!--<li><a style="color: red" href="/dienstplan/vacation?wid=">Urlaub/Auszeit</a></li>-->
                    <li><a style="color: red" href="/dienstplan/user_view?wid=">Kontaktverzeichnis</a>
                    </li>
                    <li><a style="color: red" href="/dienstplan/editUser/1857?wid=459">Mein Profil</a>
                    </li>
                </ul>
            </li>
        @endcan
    </ul>


@endauth

<style>
    .hideSelectable li ul {
        display: none;
    }

    /* .selectable li:hover ul{
        display: block;
        } */

    .showList {
        display: block !important;
        transition: all 0.3s;
    }

    .hideList {
        display: none;
        transition: all 0.3s;
    }

    ul.selectable {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
</style>

<script>
    $(document).ready(function() {

        $('.leftMenu li.has-ul').click(function() {
            $(this).children('.sub').slideToggle(500);
            $(this).toggleClass('active');
            //    event.preventDefault();
        });

        $(".leftMenu a").click(function(e) {
            // e.preventDefault();
            $(".leftMenu").removeClass("open");
        });

        $(document).click(function(e) {
            e.stopPropagation();
            var element = e.target.getAttribute("id");
            if (element === "menu-button-left" || element === "menu-button" || element === "subBtn") {
                // do whatever you wnat if same id
            } else {
                if ($("ul").hasClass("open")) {
                    // $("ul").removeClass("open");
                }
            }


        });


        // hide all ul
        $(".selectable li ul").addClass("hideList");
        $(".selectable > ul > li > a").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            // unlock all ul
            $(".selectable").removeClass("hideSelectable");


            // hide all ul
            $(".selectable li ul").addClass("hideList");

            //$(this).children("ul").toggleClass("showList");
            $(this).next("ul").toggleClass("showList");

        });

        $(document).click(function(e) {
            e.stopPropagation();
            var element = e.target;
            // console.log('e', $(element).text())
            var menuHasClass = $(element).closest(".menu").hasClass("menu");
            // console.log('has', menuHasClass)
            if (!menuHasClass) {
                $(".leftMenu").removeClass("open");
                $(".rightMenu").removeClass("open");
            }
        });
    });
</script>
