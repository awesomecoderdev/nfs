<ul>
    <li> <a href="/aktuell/"> Neues/Blog</a></li>
    <li> <a href="/notfallseelsorge-vo"> Notfallseelsorge vor Ort </a>
        <ul>
            <li> <a href="/bergstrasse"> Bergstraße</a></li>
            <li> <a href="/darmstadt-und-umgebung"> Darmstadt und Umgebung</a></li>
            <li> <a href="/darmstadt-dieburg"> Darmstadt-Dieburg</a></li>
            <li> <a href="/odenwald"> Odenwald</a></li>
        </ul>
    </li>
    <li> <a href="/hilfe-erfahren"> Hilfe erfahren</a></li>
    <li> <a href="/einsatznachsorge"> Einsatznachsorge</a></li>
    <li> <a href="/mitmachen"> Mit-machen</a></li>
    <li> <a href="/mithelfen"> Mit-helfen</a></li>
    <li> <a href="/contact"> Kontakt</a></li>
    @auth
        <li class="last"> Mita <a href="/aktuell?landing=1">rbeiter intern</a></li>
    @else
        <li> <a href="/"> Start</a></li>
        <li> <a href="/aktuell"> Intern</a></li>
    @endauth

    @if (auth()->user())
        <li><a href="/intern?wid=" target="_blank">Administrator</a></li>
    @endif


    @auth
        <li>Logout</li>
    @endauth

</ul>
