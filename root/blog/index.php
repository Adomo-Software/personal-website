<?php $INCLUDE_CSS=false ?>
<?php $INCLUDE_HTML=false ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    <?php
        $INCLUDE_CSS = true;
        include $_SERVER['DOCUMENT_ROOT'] . '/../header.parts.php';
//      .blinking-text
//      .navfile
//      .terminal
//      .title

    ?>
    </style>
</head>
<body>

    <?php
        $INCLUDE_HTML = true;
        include $_SERVER['DOCUMENT_ROOT'] . '/../header.parts.php';

        // echo $_SERVER['DOCUMENT_ROOT'] . "\n";
        // echo $_SERVER['REQUEST_URI'] . "\n";
    ?>
</body>
</html>
