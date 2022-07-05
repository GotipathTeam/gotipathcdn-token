<?php
include_once __DIR__ . '/CdnTokenGenerate.php';
date_default_timezone_set('UTC');

function getCdnUrlWithToken($resource)
{
    $baseUrl = 'https://tm.gpcdn.net'; //CDN Base url
    $g = 0; // Generator
    $key = "npkj0qkaczlkapq5uuzr2yh1cftut4zdz8o6ifb0dff4xq4vh0comb82tdt506fh"; //CDN secret token generated from gotipath portal.
    $stime = date('YmdHis'); //stime Start time (not valid before this time) e.g. 20120424115300 datetime format UTC
    $etime = date('YmdHis', strtotime(' + 10 minutes')); //etime End time (not valid after this time)
    $resource = $resource . "?stime={$stime}&etime={$etime}";
    $cdn = new CdnTokenGenerate();
    $resource = $cdn->constructUriWithToken($resource, $g, $key);

    return $baseUrl . $resource;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CDN Token</title>
</head>
<body>
<p>The token setting requires a cryptographic token to be included in the URL. The secret key to
    generate the encoded string can be viewed at the bottom of the Access Control tab by clicking the
    Show button. This is only visible when the portal is accessed via HTTPS and must be kept secret at all
    times for token policies to be effective. </p>
<img
        style="width: 300px;height: 300px"
        src="<?php echo getCdnUrlWithToken("/uploads/images/2022/06/29/posters_42a94feac3427da1c324bba3345d48cb_goplay_ekti_shorno_ghotito_durghotona_2.png") ?>"
        alt="">
</body>
</html>