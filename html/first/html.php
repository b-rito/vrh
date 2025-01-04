<!DOCTYPE html>
<html>
  <head>
    <title>View Request Headers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body bgcolor="black">
    <div id="container">
      <pre>
        <code>
<span style="color:#55F">            _</span>
<span style="color:#F55">__   __</span><span style="color:#5F5">_ __</span><span style="color:#55F">| |__         </span><span style="color:#FFF">View Request Headers</span>
<span style="color:#F55">\ \ / /</span><span style="color:#5F5">  __|</span><span style="color:#55F"> _  \        </span><span style="color:#55F"><a href="https://github.com/b-rito/vrh">https://github.com/b-rito/vrh</a></span>
<span style="color:#F55"> \ V /</span><span style="color:#5F5">| |  </span><span style="color:#55F">| | | |</span>
<span style="color:#F55">  \_/ </span><span style="color:#5F5">|_|  </span><span style="color:#55F">|_| |_|</span>

<?php
$maxHeader = 0;
$maxValue = 0;
$maxPost = 0;
$column1 = 15;
$column2 = 40;
$requestHeaders = apache_request_headers();

$red = "<span style=\"color:#F55\">";
$green = "<span style=\"color:#5F5\">";
$blue = "<span style=\"color:#55F\">";
$gray = "<span style=\"color:#555\">";
$yellow = "<span style=\"color:#FF5\">";
$white = "<span style=\"color:#FFF\">";
$close = "</span>";

// Calculate max header length and value length
foreach ($requestHeaders as $Header => $Value) {
    if ( $maxHeader < strlen($Header)) {
        $maxHeader = strlen($Header);
    }

    if ( $maxValue < strlen($Value)) {
        $maxValue = strlen($Value);
    }
}

if ($maxHeader < strlen("Request Headers")) {
    $maxHeader = strlen("Request Headers");
}

function makeHyphens($length) {
    return str_repeat('-', $length);
}

//////////////////////////////////////////////////////////
// Hostname
// Outline
printf("%s+ %s + %s +%s\n", $gray, makeHyphens($column1), makeHyphens($column2), $close);

// Date time
printf("%s|%s", $gray, $close);
printf("%s %-{$column1}s %s", $green, "Date", $close);
printf("%s=%s", $gray, $close);
printf("%s %-{$column2}s %s", $yellow, date(DATE_RFC2822), $close);
printf("%s|%s\n", $gray, $close);

// Hostname information
printf("%s|%s", $gray, $close);
printf("%s %-{$column1}s %s", $green, "Hostname", $close);
printf("%s=%s", $gray, $close);
printf("%s %-{$column2}s %s", $yellow, gethostname(), $close);
printf("%s|%s\n", $gray, $close);

// Request Method information
printf("%s|%s", $gray, $close);
printf("%s %-{$column1}s %s", $green, "Request Method", $close);
printf("%s=%s", $gray, $close);
printf("%s %-{$column2}s %s", $yellow, $_SERVER['REQUEST_METHOD'], $close);
printf("%s|%s\n", $gray, $close);

// Request URI information
printf("%s|%s", $gray, $close);
printf("%s %-{$column1}s %s", $green, "Request URI", $close);
printf("%s=%s", $gray, $close);
printf("%s %-{$column2}s %s", $yellow, $_SERVER['REQUEST_URI'], $close);
printf("%s|%s\n", $gray, $close);

// Outline
printf("%s+ %s + %s +%s\n", $gray, makeHyphens($column1), makeHyphens($column2), $close);

//////////////////////////////////////////////////////////
// Request Headers
// Outline
printf("%s+ %s + %s +%s\n", $gray, makeHyphens($maxHeader), makeHyphens($maxValue), $close);

// Title
printf("%s|%s", $gray, $close);
printf("%s %-{$maxHeader}s %s", $white, "Request Headers", $close);
printf("%s|%s", $gray, $close);
printf("%s %-{$maxValue}s %s", $white, "Request Values", $close);
printf("%s|%s\n", $gray, $close);

// Outline
printf("%s+ %s + %s +%s\n", $gray, makeHyphens($maxHeader), makeHyphens($maxValue), $close);
// Request Headers
foreach ($requestHeaders as $Header => $Value) {
    printf("%s %-{$maxHeader}s %s", $green, $Header, $close);
    printf("%s : %s", $gray, $close);
    printf("%s %-{$maxValue}s %s\n", $yellow, $Value, $close);
}

// Outline
printf("%s+ %s + %s +%s\n", $gray, makeHyphens($maxHeader), makeHyphens($maxValue), $close);

////////////////////////////////////////////////////////////
// POST data
// Variable for max POST size formatting, same length as Requests
$maxPost = $maxHeader + $maxValue + 3;

// Determine if POST is Form based or RAW and output

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (empty($_POST)) {
        $postData = file_get_contents('php://input');
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
            printf("%s|%s", $gray, $close);
            printf("%s %-{$maxPost}s %s\n", $white, "POST Form", $close);
            printf("%s|%s\n", $gray, $close);
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
            printf("%s %-*s %s\n", $yellow, $maxPost, $postData, $close);
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
    } else {
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
            printf("%s|%s", $gray, $close);
            printf("%s %-{$maxPost}s %s\n", $white, "POST Form", $close);
            printf("%s|%s\n", $gray, $close);
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
            print_r( $_POST);
            printf("%s+ %s +%s\n", $gray, makeHyphens($maxPost), $close);
    }
}
?>
        </code>
      </pre>
    </div>
  </body>
</html>