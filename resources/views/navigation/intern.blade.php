@auth
    {{-- @can('isAdmin') --}}
    <ul class="leftMenu">
        <a href="/aktuell?wid=459">Aktuelles aus Südhessen</a>
        <li>

            @php
                /**
                         <?php if($AccessControl->acl_check( 'webmoduls', 'config', 'aktuell', 460 )||$AccessControl->acl_check( 'webmoduls', 'access', 'aktuell', 460 )): ?>
                    <?php $selected = '/0'; ?>
                    <?php
                    if ((strtolower($this->params['controller']) == 'aktuellr' && $this->params['url']['wid'] == 460) || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'einsatzprotokoll_berg') || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'reflexion_berg') || (strtolower($this->params['controller']) == 'simplemessages' && $this->params['url']['wid'] == 464)) {
                        $selected = '/1';
                    }
                    ?>
                    <?php echo ClassRegistry::getObject('controller')->requestAction('/AktuellCategory/index_headless_list' . $selected, ['wid' => 460, 'mobil' => 0]); ?>
                    <?php $haveMenu = true; ?>
                    <?php endif; ?>
                    <?php if($AccessControl->acl_check( 'webmoduls', 'config', 'aktuell', 461 )||$AccessControl->acl_check( 'webmoduls', 'access', 'aktuell', 461 )): ?>
                    <?php $selected = '/0'; ?>
                    <?php
                    if ((strtolower($this->params['controller']) == 'aktuellr' && $this->params['url']['wid'] == 461) || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'einsatzprotokoll_da') || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'reflexion_da') || (strtolower($this->params['controller']) == 'simplemessages' && $this->params['url']['wid'] == 465)) {
                        $selected = '/1';
                    }
                    ?>
                    <?php echo ClassRegistry::getObject('controller')->requestAction('/AktuellCategory/index_headless_list' . $selected, ['wid' => 461]); ?>
                    <?php $haveMenu = true; ?>
                    <?php endif; ?>
                    <?php if($AccessControl->acl_check( 'webmoduls', 'config', 'aktuell', 462 )||$AccessControl->acl_check( 'webmoduls', 'access', 'aktuell', 462 )): ?>
                    <?php $selected = '/0'; ?>
                    <?php
                    if ((strtolower($this->params['controller']) == 'aktuellr' && $this->params['url']['wid'] == 462) || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'einsatzprotokoll_dadi') || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'reflexion_dadi') || (strtolower($this->params['controller']) == 'simplemessages' && $this->params['url']['wid'] == 466)) {
                        $selected = '/1';
                    }
                    ?>
                    <?php echo ClassRegistry::getObject('controller')->requestAction('/AktuellCategory/index_headless_list' . $selected, ['wid' => 462, 'mobil' => 0]); ?>
                    <?php $haveMenu = true; ?>
                    <?php endif; ?>
                    <?php if($AccessControl->acl_check( 'webmoduls', 'config', 'aktuell', 463 )||$AccessControl->acl_check( 'webmoduls', 'access', 'aktuell', 463 )): ?>
                    <?php $selected = '/0'; ?>
                    <?php
                    if ((strtolower($this->params['controller']) == 'aktuellr' && $this->params['url']['wid'] == 463) || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'einsatzprotokoll_ow') || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'reflexion_ow') || (strtolower($this->params['controller']) == 'simplemessages' && $this->params['url']['wid'] == 467)) {
                        $selected = '/1';
                    }
                    ?>
                    <?php echo ClassRegistry::getObject('controller')->requestAction('/AktuellCategory/index_headless_list' . $selected, ['wid' => 463, 'mobil' => 0]); ?>
                    <?php $haveMenu = true; ?>
                    <?php endif; ?>
                    <?php if($AccessControl->acl_check( 'webmoduls', 'config', 'aktuell', 468 )||$AccessControl->acl_check( 'webmoduls', 'access', 'aktuell', 468 )): ?>
                    <?php $selected = '/0'; ?>
                    <?php
                    if ((strtolower($this->params['controller']) == 'aktuellr' && $this->params['url']['wid'] == 468) || (strtolower($this->params['controller']) == 'pages' && $this->params['pass'][0] == 'einsatzprotokoll_nachsorge_da')) {
                        $selected = '/1';
                    }
                    ?>
                    <?php echo ClassRegistry::getObject('controller')->requestAction('/AktuellCategory/index_headless_list' . $selected, ['wid' => 468, 'mobil' => 0]); ?>
                    <?php $haveMenu = true; ?>
                    <?php endif; ?>
             * */
            @endphp

        <li class="has-ul active">
            <b>Dienstplan</b>
            <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.25rem;width: 1.25rem;" viewBox="0 0 20 20"
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
        <li class="has-ul active">
            <b>Administrator</b>
            <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.25rem;width: 1.25rem;" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            <ul class="sub " style="padding:0 !important;">
                <li><a style="color: red" href="/dienstplan/months?wid=">Dienstplankonf.</a></li>
                <li><a style="color: red" href="/dienstplan/vacation?wid=">Urlaub/Auszeit</a></li>
                <li><a style="color: red" href="/dienstplan/admin?wid=">Benutzer&uuml;bersicht</a></li>
                <li><a style="color: red" href="/dienstplan/createUser?wid=">Benutzer anlegen</a></li>
                <li><a style="color: red" href="/dienstplan/admin_kontakte?wid=">Kontakte</a></li>
                <li><a style="color: red" href="/dienstplan/settings?wid=">Einstellungen</a></li>
                <?php //if( $this->Session->read( 'User.DienstplanProps.hour_overview_access' ) == '1' ):
                ?>
                <li><a style="color: red" href="/dienstplan/hourOverview?wid=">Stunden&uuml;bersicht</a></li>
            </ul>
        </li>

        <li class="has-ul active">
            <b>Dienstplan</b>
            <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.25rem;width: 1.25rem;" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            <ul class="sub " style="padding:0 !important;">
                <li><a style="color: red" href="/dienstplan/aktuell?wid=">Aktuell</a></li>
                <li><a style="color: red" href="/dienstplan/overview?wid=">Ansicht</a></li>
                @if ('User.DienstplanProps.contact_maintainer' == 1)
                    <li><a style="color: red" href="/dienstplan/admin_kontakte?wid=">Kontakte bearbeiten</a></li>
                @endif
            </ul>
        </li>
        <li class="has-ul active">
            <b>Mein Bereich</b>
            <span id="subBtn">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.25rem;width: 1.25rem;" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            <ul class="sub " style="padding:0 !important;">
                <li><a style="color: red" href="/dienstplan/months?wid=">Dienstplan</a></li>
                <li><a style="color: red" href="/dienstplan/vacation?wid=">Urlaub/Auszeit</a></li>
                <li><a style="color: red" href="/dienstplan/user_view?wid=">Kontaktverzeichnis</a></li>
                <li>
                    <a style="color: red" href="/dienstplan/editUser/' . $this->Session->read('User.id')">Mein Profil</a>
                </li>
            </ul>
        </li>

    </ul>
    {{-- @endcan --}}
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
            console.log('has', menuHasClass)
            if (!menuHasClass) {
                $(".leftMenu").removeClass("open");
                $(".rightMenu").removeClass("open");
            }
        });
    });
</script>
