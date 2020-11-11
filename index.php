<?php
$vysledek = false;
$textarea = '';
if (isset($_POST['text'])) {
    $textarea = $_POST['text'];
    $patterns1 = array(
        '/\s+([ksvzouai])\s+/i',
        '/([0-9]+)\h+([0-9]+|m|m²|l|k|t|h|°C|Kč|lidí|dní|%|€)/',
        '/(§|\*|†|#|&)\s+([0-9]+|[a-zA-Z])/',
    );
    $replacements1 = array(
        ' $1&nbsp;',
        '$1&nbsp;$2',
        '$1&nbsp;$2',
    );
    $patterns2 = array(
        '/([0-9]+)\h+([0-9]+|m|m²|l|kg|h|°C|Kč|lidí|dní|%|€)/',
    );
    $replacements2 = array(
        '$1&nbsp;$2',
    );
    $str = preg_replace($patterns1, $replacements1, $textarea);
    // projedeme znovu kvůli mezer mezi zbylými čísly
    $str = preg_replace($patterns2, $replacements2, $str);
    $vysledek = htmlspecialchars($str);
}

?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zalomení předložek</title>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
</head>

<body>
    <div class="uk-section uk-section-large">
        <div class="uk-container uk-container-small">
            <h1>Online nástroj pro zalomení předložek</h1>
            <p><a href="https://prirucka.ujc.cas.cz/?id=880">https://prirucka.ujc.cas.cz/?id=880</a></p>
            <form action="" method="post">
                <textarea class="uk-textarea" name="text" id="" cols="30" rows="10"><?= $textarea; ?>
                </textarea>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary">Odeslat</button>
                </div>
            </form>
            <?php if ($vysledek) : ?>
                <pre><code id="textarea"><?= $vysledek ?></code></pre>
                <button data-clipboard-target="#textarea" class="uk-button uk-button-default copy">Kopírovat do schránky</button>
            <?php endif; ?>
        </div>
    </div>
    <script>
        new ClipboardJS('.copy');
    </script>
</body>

</html>