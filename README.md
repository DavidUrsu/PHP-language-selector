# PHP-language-selector
>This is a PHP script ideal for easy and accesible language changer for your website.
>The main features of this project are:
>>Fexible language manager
>>Manage the translates from a JSON file
>>The script will automaticaly select the main language of the browser, if the browser's language is not avalable on the website, it will switch to English (en)

>>See the demo on the index.php

##How to install
1. Drag the language.php file into your website folder (the location is irrelevant)
2. Include the language.php on the pages where you want to use it

##JSON FILE
1. The "supported_languages" array is essential, here you add the languages that are supported on your website, this helps the website to redirect the user to english version of the website if their language is not supported
2. The next items are json objects that have the text for every language

##How to use

There are two main functions of the script
!the variable $lang can be used on the website and it's value is the current language code of the website
!you will use it to get the text in the current language

function get_translated_text($text, $language)
  The function returns the associated text from the texts.json of the $text in the language $language
  e.g. <h3> <?php get_translated_text("welcome_message", $lang) ?> </h3>
    The function will go to the texts.json and return the item on ["welcome_message"]["$lang"], where $lang is the current website language code
    
function get_links_with_lang($link, $language)
  The function returns a text ($link) with the added $language parameter, this is used for the navigation on the website and it is added inside the href tag
  e.g. <a href='<?php get_links_with_lang("/sevices/", "en") ?>'></a>
    The function will return the link for the href tag with the language specifed inside the link, the result will be:
      e.g. <a href='/sevices/?lang=en'></a>
