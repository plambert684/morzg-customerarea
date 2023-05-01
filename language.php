<?php
// Set the language code
$lang = "fr"; // Change this to your desired language

// Load the language file
$file = file_get_contents("lang/$lang.json");
$langData = json_decode($file, true);

// Use the language data
echo $langData["welcome_message"];
echo $langData["menu"]["home"];
echo $langData["menu"]["about"];
echo $langData["menu"]["contact"];
