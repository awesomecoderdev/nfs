<x-app-layout>
    @section('head')
        <title> Kontakt | {{ __(config('app.name')) }}</title>
    @endsection

    <div class="col span_16 clr">

        <div class="container row">
            <div class="row gutters">
                <div class="col span_16 clr tar">
                    <h1>Kontakt</h1>
                    <span class="wei400 fsi22">Notfallseelsorge Südhessen</span>
                </div>
            </div>
        </div>

        <div class="container row mt80">
            <div class="row gutters">
                <div class="col span_16 clr">
                    <p>Die Notfallseelsorge selbst ist nicht unmittelbar für Mitbürgerinnen und Mitbürger erreichbar, da
                        sie ausschließlich von Feuerwehr, Rettungsdienst und Polizei gerufen wird. </p>
                    <p>Wenn Sie allgemeine Fragen oder Kommentare zur Notfallseelsorge Südhessen haben, bitten wir Sie,
                        das Kontaktformular zu nutzen. Wir werden uns dann schnellstmöglich mit Ihnen in Verbindung
                        setzen. <br>Bitte entscheiden Sie sich jedoch vorab für ein Thema, das erleichtert uns die
                        Bearbeitung Ihrer Anfrage enorm. Vielen Dank!</p>
                    <p>Im akuten Notfall wählen Sie bitte die Telefonnummer 112!</p>
                </div>
            </div>
        </div>

        <div class="container row">
            <div class="row gutters">
                <div class="col span_10 clr">
                    &#xFEFF;<div id="contact">
                        (&nbsp;<span style="color: #ff0000">*</span>&nbsp;) benötigte Eingabe<br><br>
                        <form action="/servers/neu.nfs-suedhessen.de/contact/?wid=448" id="contact-form"
                            renderer="table" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <table class="tableform" cellspacing="0">
                                <tbody>
                                    <tr class="input select">
                                        <th><input type="hidden" name="data[Contact][themen]" value=""
                                                id="ContactThemen"><label for="ContactThemen">Themen</label></th>
                                        <td>

                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Bergstrasse" id="ContactThemenBergstrasse"><label
                                                    for="ContactThemenBergstrasse">Bergstrasse</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Darmstadt" id="ContactThemenDarmstadt"><label
                                                    for="ContactThemenDarmstadt">Darmstadt</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Darmstadt-Dieburg" id="ContactThemenDarmstadtDieburg"><label
                                                    for="ContactThemenDarmstadtDieburg">Darmstadt-Dieburg</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Odenwaldkreis" id="ContactThemenOdenwaldkreis"><label
                                                    for="ContactThemenOdenwaldkreis">Odenwaldkreis</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Allgemeines" id="ContactThemenAllgemeines"><label
                                                    for="ContactThemenAllgemeines">Allgemeines</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Hilfe suchen" id="ContactThemenHilfeSuchen"><label
                                                    for="ContactThemenHilfeSuchen">Hilfe suchen</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Einsatznachsorge" id="ContactThemenEinsatznachsorge"><label
                                                    for="ContactThemenEinsatznachsorge">Einsatznachsorge</label></div>
                                            <div class="checkbox"><input type="checkbox" name="data[Contact][themen][]"
                                                    value="Mitmachen" id="ContactThemenMitmachen"><label
                                                    for="ContactThemenMitmachen">Mitmachen</label></div>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactBetreff">Betreff&nbsp;<span
                                                    style="color: #ff0000">*</span>&nbsp;</label></th>
                                        <td><input name="data[Contact][betreff]" maxlength="255" type="text"
                                                id="ContactBetreff"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input textarea">
                                        <th><label for="ContactNachricht">Nachricht&nbsp;<span
                                                    style="color: #ff0000">*</span>&nbsp;</label></th>
                                        <td>
                                            <textarea name="data[Contact][nachricht]" cols="30" rows="6" id="ContactNachricht"></textarea>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactAnrede">Anrede</label></th>
                                        <td><input name="data[Contact][anrede]" maxlength="20" type="text"
                                                id="ContactAnrede"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactVorname">Vorname&nbsp;<span
                                                    style="color: #ff0000">*</span>&nbsp;</label></th>
                                        <td><input name="data[Contact][vorname]" maxlength="50" type="text"
                                                id="ContactVorname"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactNachname">Nachname&nbsp;<span
                                                    style="color: #ff0000">*</span>&nbsp;</label></th>
                                        <td><input name="data[Contact][nachname]" maxlength="50" type="text"
                                                id="ContactNachname"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactUnternehmen">Unternehmen</label></th>
                                        <td><input name="data[Contact][unternehmen]" maxlength="100" type="text"
                                                id="ContactUnternehmen"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactStrasse">Strasse / Nr.</label></th>
                                        <td><input name="data[Contact][strasse]" maxlength="100" type="text"
                                                id="ContactStrasse"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactOrt">Plz / Ort</label></th>
                                        <td><input name="data[Contact][ort]" maxlength="100" type="text"
                                                id="ContactOrt"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactTelefon">Telefon</label></th>
                                        <td><input name="data[Contact][telefon]" maxlength="50" type="text"
                                                id="ContactTelefon"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactFax">Fax</label></th>
                                        <td><input name="data[Contact][fax]" maxlength="50" type="text"
                                                id="ContactFax"></td>
                                        <td></td>
                                    </tr>
                                    <tr class="input text">
                                        <th><label for="ContactEmail">Email&nbsp;<span
                                                    style="color: #ff0000">*</span>&nbsp;</label></th>
                                        <td><input name="data[Contact][email]" maxlength="50" type="text"
                                                id="ContactEmail"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <h2>Datennutzung und Datenspeicherung</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Wir verarbeiten Ihre, in diesem Formular eingegebenen,
                                            personenbezogenen Daten ausschließlich für die Beantwortung bzw.
                                            Verarbeitung Ihrer Anfrage. Wie wir weitere personenbezogene Daten
                                            verarbeiten entnehmen Sie bitte unserer <a
                                                href="/servers/neu.nfs-suedhessen.de/Datenschutz?wid=448">Datenschutzerklärung</a>
                                        </td>
                                    </tr>
                                    <tr class="input checkbox">
                                        <th><input type="hidden" name="data[Contact][datennutzung]"
                                                id="ContactDatennutzung_" value="0"><label
                                                for="ContactDatennutzung">Ich bin mit der Verarbeitung meiner Daten
                                                einverstanden&nbsp;<span style="color: #ff0000">*</span>&nbsp;</label>
                                        </th>
                                        <td><input type="checkbox" name="data[Contact][datennutzung]"
                                                class="radioLabel" value="1" id="ContactDatennutzung"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><br></td>
                                    </tr>
                                    <tr class="input text">
                                        <th rowspan="2">
                                            <label for="ContactCaptcha"><img
                                                    src="/servers/neu.nfs-suedhessen.de/Captcha/create?wid=448"></label>
                                        </th>
                                        <td>
                                            <input type="text" id="ContactCaptcha" value=""
                                                name="data[Contact][captcha]">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="width: 220px; font-size: 11px; padding: 2px;">Bitte geben Sie
                                                den nebenstehenden Code ein</div>
                                        </td>
                                    </tr>
                                    <tr class="submit">
                                        <td colspan="3" align="center"><input type="submit" value="Abschicken">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col span_6 clr">
                    &nbsp;
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<?php return false; ?>
<?php

/**
 *	$params
 *		fields => (Array) Felder, je nach Darstellungsposition
 *		labels => (Array) Anzeigenamen, für "fields" (falls abweichend)
 *		hiddenValues=> (Array) Felder, die als versteckte Werte geschickt werden sollen
 *		showContactEmails => (Boolean) Anzeige der Empfängeremails
 */
$errors = array();

$required = explode(';', $config['pflichtfelder']);
foreach (ContactConfigController::$alwaysRequired as $field) {
	$required[] = $field;
}

if (empty($params['showContactEmails'])) {
	$params['showContactEmails'] = false;
}

if($fileupload)
{
    ?>
<script type="text/javascript">
    function emptyUploadField() {
        const elements = document.getElementsByClassName('fileInputField')
        let emptyElement = false;
        for (let i = 0; i < elements.length && !emptyElement; i++) {
            emptyElement |= elements[i].files.length <= 0
        }
        return emptyElement;
    }

    function addFile() {
        const fu = document.getElementById('fileupload')
        const elements = document.getElementsByClassName('fileInputField')
        if (elements.length < 4) {

            if (!emptyUploadField()) {
                const div = document.createElement('div')
                const inputElement = document.createElement('input')
                inputElement.setAttribute("type", "file")
                inputElement.setAttribute("class", "fileInputField")
                inputElement.setAttribute("name", "files[]")
                inputElement.setAttribute("accept", "application/pdf,image/jpeg,image/png")
                inputElement.addEventListener('change', d => {
                    if (inputElement.files.length <= 0) {
                        div.parentNode.removeChild(div)
                    }
                    addFile();
                })
                const removeButton = document.createElement('a')
                removeButton.setAttribute('href', '#')
                removeButton.innerHTML = 'x'
                div.appendChild(inputElement)
                div.appendChild(removeButton)
                fu.appendChild(div)
                removeButton.addEventListener('click', () => {
                    if (inputElement.files.length > 0) {
                        div.parentNode.removeChild(div)
                        if (!emptyUploadField()) {
                            addFile()
                        }
                    }
                })
            }
        }
    }

    function initFileUpload() {
        addFile()
    }
</script>
<?php
}

if($tableless == false): ?>
<?php
if (empty($params['fields'])) {
    $fields = ['themen', 'betreff', 'nachricht', 'anrede', 'vorname', 'nachname', 'unternehmen', 'strasse', 'ort', 'telefon', 'fax', 'email'];
} else {
    $fields = $params['fields'];
}

echo $this->element('required', ['mode' => 2]);

$url = '/contact/';
if (!empty($employee)) {
    $url = '/contact/index/' . $employee['ContactEmployee']['id'];
}
echo $this->FormTable->create('Contact', ['url' => $url, 'id' => 'contact-form', 'renderer' => 'table', 'submitcheck' => false, 'enctype' => 'multipart/form-data']);

if (!empty($params['hiddenValues']) && is_array($params['hiddenValues'])) {
    foreach ($params['hiddenValues'] as $key => $val) {
        echo $this->FormTable->hidden($key, ['value' => $val]);
    }
}

if (!empty($params['showContactEmails'])) {
    echo $this->FormTable->customRow('<b>An</b> </td><td>' . $config['emails'], null, false);
    echo $this->FormTable->customRow('&nbsp;', null, true);
}

foreach ($fields as $field) {
    if ($field == 'fax' && !$config['fax_aktiv']) {
        continue;
    }

    if (!empty($config['betreff_label']) && $field == 'betreff') {
        $label = $config['betreff_label'];
    } elseif (!empty($params['labels'][$field])) {
        $label = $params['labels'][$field];
    } elseif ($field == 'strasse') {
        $label = 'Strasse / Nr.';
    } elseif ($field == 'ort') {
        $label = 'Plz / Ort';
    } elseif ($field == 'themen') {
        $label = 'Mich interessieren folgende Themen';
    } else {
        $label = ucfirst($field);
    }

    if ($field == 'themen') {
        if (isset($this->Html->params['url']['wid']) && $this->Html->params['url']['wid'] == 398) {
            $label = 'Termine';
        } else {
            $label = !empty($params['labels'][$field]) ? $params['labels'][$field] : ucfirst($field);
        }

        if (!empty($employee)) {
            continue;
        }

        $options = [];
        foreach (explode(';', $config['themen']) as $thema) {
            $thema = trim($thema);
            if (empty($thema)) {
                continue;
            }
            $options[$thema] = trim($thema);
        }

        if (!empty($options)) {
            if ($config['themen_auswahl'] == 'checkbox') {
                echo $this->FormTable->input($field, [
                    'label' => $label,
                    'type' => 'select',
                    'multiple' => 'checkbox',
                    'options' => $options,
                ]);
            } elseif ($config['themen_auswahl'] == 'radio') {
                $row = '<label for="' . $field . '">' . $label . '</label></td><td>';

                $row .= '<table cellspacing="0" cellpadding="0">';
                foreach ($options as $key => $val) {
                    $row .= '<tr>';
                    $row .= '<td><input type="radio" name="data[Contact][themen][0]" value="' . $val . '" /></td>';
                    $row .= '<td>' . $val . '</td>';
                    $row .= '</tr>';
                }
                $row .= '</table>';

                $row .= '</td>';

                echo $this->FormTable->customRow($row);
            }
        }
    } else {
        if (!empty($config['nachricht_deactivate']) && $field == 'nachricht') {
            continue;
        }
        if ($field == 'email') {
            $error = 'Bitte geben Sie eine korrekte Emailadresse ein.';
        } else {
            $error = 'Bitte füllen Sie das Feld aus.';
        }
        if (in_array($field, $required)) {
            $label .= $this->element('required');
        }
        echo $this->FormTable->input($field, ['label' => $label, 'error' => false]);

        if ($this->FormTable->error($field)) {
            $error = '<div class="error-message">' . $error . '</div>';
            echo $this->FormTable->customRow($error, null, true);
        }
    }
}

if ($fileupload) {
    $upload = '<tr><th>Anhang <br /><span style="color:#aaa;">(png, jpg, pdf)</span></th><td>';
    $upload .= '<div id="fileupload"></div>';
    $upload .= '<script type="text/javascript">initFileUpload()</script>';
    $upload .= '</td></tr>';
    echo $this->FormTable->customRow($upload, null, true);
    if (isset($filesizeError) && $filesizeError) {
        $error = '<div class="error-message">Fehler: Eine Datei ist zu groß.</div>';
        echo $this->FormTable->customRow($error, null, true);
    } elseif (isset($fileFormatError) && $fileFormatError) {
        $error = '<div class="error-message">Fehler: Laden sie nur JPG- und PDF-Dateien hoch.</div>';
        echo $this->FormTable->customRow($error, null, true);
    } elseif (isset($uploadError) && $uploadError) {
        $error = '<div class="error-message">Fehler: Es kam zu einem unerwarteten Fehler beim Upload.</div>';
        echo $this->FormTable->customRow($error, null, true);
    }
}

echo $this->FormTable->customRow('<h2>Datennutzung und Datenspeicherung</h2>', null, true);

if (!empty($dataUseError)) {
    echo $this->FormTable->customRow('<span class="error-message">Bitte geben sie ihr Einverständnis zum Speichern und Nutzen ihrer Daten</span><br/><br/>', null, true);
}

$datenschutzUrl = $this->Html->url('/Datenschutz');

echo $this->FormTable->customRow('Wir verarbeiten Ihre, in diesem Formular eingegebenen, personenbezogenen Daten ausschließlich für die Beantwortung bzw. Verarbeitung Ihrer Anfrage. Wie wir weitere personenbezogene Daten verarbeiten entnehmen Sie bitte unserer <a href="' . $datenschutzUrl . '">Datenschutzerklärung</a>', null, true);

$fieldConf = [
    'type' => 'checkbox',
    'label' => 'Ich bin mit der Verarbeitung meiner Daten einverstanden' . $this->element('required'),
    'class' => 'radioLabel',
];
if (!empty($dataUseError)) {
    $fieldConf['class'] = ['radioLabel', 'form-error'];
}
echo $this->FormTable->input('datennutzung', $fieldConf);

if (!empty($config['captcha'])) {
    $captchaUrl = '/Captcha/create';
    $captcha = '<img src="' . $this->Html->url($captchaUrl) . '" />';

    echo $this->FormTable->customRow('<br/>', null, true);
    #echo $this->FormTable->input('captcha', array('label'=>$captcha));

    echo "
		    <tr class=\"input text\">
			    <th rowspan=\"2\">
				    <label for=\"ContactCaptcha\">" .
        $captcha .
        "</label>
			    </th>
			    <td>
				    <input type=\"text\" id=\"ContactCaptcha\" value=\"\" name=\"data[Contact][captcha]\">
			    </td>
		    </tr>
		    <tr>
			    <td><div style=\"width: 220px; font-size: 11px; padding: 2px;\">Bitte geben Sie den nebenstehenden Code ein</div></td>
		    </tr>
	    ";

    if ($this->FormTable->error('captcha')) {
        echo $this->FormTable->customRow('<div class="error-message">Der Code wurde nicht korrekt eingegeben</div>', null, true);
    }
}

echo $this->FormTable->end('Abschicken');
?>
<?php else: ?>

<?php // tableless part
?>
<?php

    if (empty($params['fields'])) {

	    $fields = array(
		    'themen',
		    'betreff',
		    'nachricht',
		    'anrede',
		    'vorname',
		    'nachname',
		    'unternehmen',
		    'strasse',
		    'ort',
		    'telefon',
		    'fax',
		    'email'
	    );
    }
    else {
	    $fields = $params['fields'];
    }

    echo $this->element('required', array('mode'=>2));

    $url = '/contact/';
    if ( ! empty($employee)) {
	    $url = '/contact/index/'.$employee['ContactEmployee']['id'];
    }
    echo $this->Form->create( 'Contact', array( 'url' => $url, 'id' => 'contact-form', 'renderer' => 'table', 'submitcheck' => false, 'enctype' => 'multipart/form-data' ) );

    if ( !empty($params['hiddenValues']) && is_array($params['hiddenValues']))
    {
	    foreach ($params['hiddenValues'] as $key=>$val) {
		    echo $this->Form->hidden($key, array('value'=>$val));
	    }
    }

    if ( !empty($params['showContactEmails'])) {
        ?>
<p><b>An</b> <?= $config['emails'] ?></p>
<?php
    }

    foreach ($fields as $field) {
	    if($field == 'fax' && !$config['fax_aktiv'])
		    continue;

	    if ( ! empty($config['betreff_label']) && $field == 'betreff') {
		    $label = $config['betreff_label'];
	    }
	    else if ( ! empty($params['labels'][$field])) {
		    $label = $params['labels'][$field];
	    }
	    else if ($field == 'strasse') {
		    $label = 'Strasse / Nr.';
	    } else if ($field == 'ort') {
		    $label = 'Plz / Ort';
	    } else if ($field == 'themen') {
		    $label = 'Mich interessieren folgende Themen';
	    }
	    else {
		    $label = ucfirst($field);
	    }

	    if ($field == 'themen') {

		    if (isset($this->Html->params['url']['wid']) && $this->Html->params['url']['wid'] == 398) {
			    $label = "Termine";
		    }
		    else {
			    $label = ! empty($params['labels'][$field]) ? $params['labels'][$field] : ucfirst($field);
		    }

		    if ( ! empty($employee)) {
			    continue;
		    }

		    $options = array();
		    foreach (explode(';', $config['themen']) as $thema) {
			    $thema = trim($thema);
			    if (empty($thema)) {
				    continue;
			    }
			    $options[$thema] = trim($thema);
		    }

		    if ( ! empty($options)) {

			    if ($config['themen_auswahl'] == 'checkbox') {

				    echo $this->Form->input(
					    $field,
					    array(
						    'label'=>$label,
						    'type'=>'select',
						    'multiple'=>'checkbox',
						    'options'=>$options
					    )
				    );
			    }
			    else if ($config['themen_auswahl'] == 'radio') {
				    ?>
<label for="<?= $field ?>"><?= $label ?></label>
<?php
				    foreach ($options as $key=>$val) {
				        ?>
<input type="radio" name="data[Contact][themen][0]" value="<?= $val ?>" id="ContactTheme<?= $val ?>" />
<label for="ContactTheme<?= $val ?>"><?= $val ?></label>
<?php
				    }
			    }
		    }

	    } else {

		    if ( ! empty($config['nachricht_deactivate']) && $field == 'nachricht')
		    {
			    continue;
		    }
		    if ($field == 'email') {
			    $error = 'Bitte geben Sie eine korrekte Emailadresse ein.';
		    } else {
			    $error = 'Bitte füllen Sie das Feld aus.';
		    }
		    if (in_array($field, $required)) {
			    $label .= $this->element('required');
		    }
		    echo $this->Form->input($field, array('label'=>$label, 'error'=>false));

		    if ($this->Form->error($field)) {
		        ?>
<div class="error-message"><?= $error ?></div>
<?php
		    }
	    }
    }

    if($fileupload)
    {
        ?>
<div id="anhang-row">
    <div id="anhang-label">
        Anhang <br /><span style="color:#aaa;">(png, jpg, pdf)</span>
    </div>
    <div id="fileupload"></div>
    <script type="text/javascript">
        initFileUpload()
    </script>
    <?php
            if (isset($filesizeError) && $filesizeError) {
                ?>
    <div class="error-message">Fehler: Eine Datei ist zu groß.</div>
    <?php
	        }
	        elseif (isset($fileFormatError) && $fileFormatError) {
	            ?>
    <div class="error-message">Fehler: Laden sie nur JPG- und PDF-Dateien hoch.</div>
    <?php
	        }
	        elseif(isset($uploadError) && $uploadError)
	        {
	            ?>
    <div class="error-message">Fehler: Es kam zu einem unerwarteten Fehler beim Upload.</div>
    <?php
	        }
            ?>
</div>
<?php } ?>
<div class="headline">
    <h2>Datennutzung und Datenspeicherung</h2>
</div>
<?php
        if(!empty($dataUseError))
        {
            ?>
<span class="error-message">Bitte geben sie ihr Einverständnis zum Speichern und Nutzen ihrer Daten</span><br /><br />
<?php
        }
        $datenschutzUrl = $this->Html->url('/Datenschutz');
        ?>
<div class="accept">
    Wir verarbeiten Ihre, in diesem Formular eingegebenen, personenbezogenen Daten ausschließlich für die Beantwortung
    bzw. Verarbeitung Ihrer Anfrage. Wie wir weitere personenbezogene Daten verarbeiten entnehmen Sie bitte unserer <a
        href="<?= $datenschutzUrl ?>">Datenschutzerklärung</a>
</div>
<?php
$fieldConf = [
    'type' => 'checkbox',
    'label' => 'Ich bin mit der Verarbeitung meiner Daten einverstanden' . $this->element('required'),
    'class' => 'radioLabel',
];
if (!empty($dataUseError)) {
    $fieldConf['class'] = ['radioLabel', 'form-error'];
}
echo $this->Form->input('datennutzung', $fieldConf);
?>
<?php
    if ( ! empty($config['captcha'])) {

	    $captchaUrl = '/Captcha/create';
	    $captcha = '<img src="'.$this->Html->url($captchaUrl).'" />';
	    ?>
<br />
<div class="captcha">
    <label for="ContactCaptcha"><?= $captcha ?></label>
    <input type="text" id="ContactCaptcha" value="" name="data[Contact][captcha]">
    <div id="captchaInfo">
        Bitte geben Sie den nebenstehenden Code ein
    </div>
    <?php
            if ($this->FormTable->error('captcha')) {
                ?>
    <div class="error-message">Der Code wurde nicht korrekt eingegeben</div>
    <?php
            }
            ?>
</div>
<?php
    }

    echo $this->Form->end('Abschicken');
    ?>



<?php endif ?>
