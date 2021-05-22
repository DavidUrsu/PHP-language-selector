<?php

global $urlRoot; #gets the root of the website
    session_start();
    #check if the langauge is set
    if(!isset($_GET["lang"])){
        $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2); #getting the language code
        setcookie("lang", $lang, time()+60*60*24*30); #create a cookie with the language code

        #redirect the website with get variable
        $link = $urlRoot.$_SERVER['REQUEST_URI']."?lang=$lang";
        header("Location: $link");
    } else {
        #if the lang is set in GET, then the $lang and the lang cookie change their value to the current lang (usefull when we are changing the language)
        $lang = $_GET["lang"];
        setcookie("lang", $lang, time()+60*60*24*30);
    }

    #check if the language is supported
    $path = "texts.json"; #Get the path to the json file
    $handle = file_get_contents($path); #Reads the json file
    $handle = json_decode($handle, true);
    #check in the array of supported languages if the language exists, if not it will redirect the website to the english version of it
    $k = 0;
    foreach($handle['supported_languages'] as $checker){
        if($checker == $lang){
            $k=1;
        }
    }
    if($k==0){
        $link = $urlRoot.strtok($_SERVER["REQUEST_URI"], '?')."?lang=en"; #get the link without any GET variables and just add the $lang
        header("Location: $link");
    }

    print("<html lang='$lang'>"); #html language

    #from the JSON "texts.json" return the specific text ($text) for the requested language ($language)
    function get_translated_text($text, $language){
        $path = "texts.json"; #Get the path to the json file
        $handle = file_get_contents($path); #Reads the json file
        $handle = json_decode($handle, true);
        
        print($handle["$text"]["$language"]); #print the text
    }

    #return the link with a language variable in $_GET
    function get_links_with_lang($link, $language){
        print ("$link?lang=$language");
    }
