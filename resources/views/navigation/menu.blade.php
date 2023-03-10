<ul class="rightMenu">
    <li> <a href="{{ route('aktuell') }}"> Neues/Blog</a></li>
    <li> <a href="{{ route('notfallseelsorge_vor_ort') }}"> Notfallseelsorge vor Ort </a>
        <ul>
            <li> <a href="{{ route('bergstrasse.index') }}"> Bergstraße</a></li>
            <li> <a href="{{ route('darmstadt_und_umgebung') }}"> Darmstadt und Umgebung</a></li>
            <li> <a href="{{ route('dieburg.index') }}"> Darmstadt-Dieburg</a></li>
            <li> <a href="{{ route('odenwald.index') }}"> Odenwald</a></li>
        </ul>
    </li>
    <li> <a href="{{ route('hilfe_erfahren') }}"> Hilfe erfahren</a></li>
    <li> <a href="{{ route('einsatznachsorge') }}"> Einsatznachsorge</a></li>
    <li> <a href="{{ route('mitmachen') }}"> Mit-machen</a></li>
    <li> <a href="{{ route('mithelfen') }}"> Mit-helfen</a></li>
    <li> <a href="/contact"> Kontakt</a></li>
    @auth
        <li> <a href="{{route('index') }}"> Start</a></li>
        <li> <a href="/aktuell?wid=459"> Intern</a></li>
    @else
        <li class="last"><a href="/aktuell?landing=1">Mitarbeiter intern</a></li>
    @endauth

    @can("isAdmin")
        <li><a href="/intern?wid=" target="_blank">Administrator</a></li>
        
    @endcan


    @auth
        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('users.logout') }}">
                @csrf

                <x-dropdown-link :href="route('users.logout')" onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </li>
    @endauth

</ul>
