<!DOCTYPE html>
<?php include("language.php"); ?>

<html>

<head>
    <title>PHP Language Selector</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css.css">
</head>

<body style="text-align: center;">
    <h1> <?php get_translated_text("welcome_text", $lang) ?> </h1>
    <h3> <?php get_translated_text("test_description", $lang) ?> </h3>
    <p> <?php get_translated_text("change_language_text", $lang) ?> </p>

    <div class="dropdown">
        <button class="dropbtn"><span style='color: #ffffff'><span class="flag-icon <?php global $lang; print("flag-icon-$lang")?>"></span></span></button>
        <div class="dropdown-content">
            <a href='<?php get_links_with_lang("", "en") ?>'><span class="flag-icon flag-icon-en"></span></a>
            <a href='<?php get_links_with_lang("", "es") ?>'><span class="flag-icon flag-icon-es"></span></a>
        </div>
    </div>
    <br>
    <br>
    <a href='<?php get_links_with_lang("", "$lang") ?>'> <?php get_translated_text("link_example", $lang) ?> </a>
</body>

</html>