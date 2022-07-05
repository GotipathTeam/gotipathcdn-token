<?php
date_default_timezone_set('UTC');

/**
 * @param $resource // /path/to/resource?option=33
 * @param $secret_key //
 * @return false|string
 */
function generate20CharHmacSha1($resource, $secret_key):string
{
    $hmac_str = hash_hmac('sha1', $resource, $secret_key);
    return substr($hmac_str, 0, 20);
}

function generateFinalUrl():string
{
    $baseUrl = 'https://tm.gpcdn.net'; //CDN Base url
    $path = "/uploads/images/2022/06/29/posters_42a94feac3427da1c324bba3345d48cb_goplay_ekti_shorno_ghotito_durghotona_2.png";
    $secret_key = "npkj0qkaczlkapq5uuzr2yh1cftut4zdz8o6ifb0dff4xq4vh0comb82tdt506fh"; //CDN secret key generated from gotipath portal.
    $stime = date('YmdHis'); //stime Start time (not valid before this time) e.g. 20120424115300 datetime format UTC
    $etime = date('YmdHis', strtotime(' + 10 minutes')); //etime End time (not valid after this time)
    $resource = $path . "?stime={$stime}&etime={$etime}";
    $token = generate20CharHmacSha1($resource, $secret_key);

    return $baseUrl . $resource . "&encoded=" . 0 . $token;
}

?>
<p>Final Url : <?php echo generateFinalUrl() ?></p>
<img src="<?php echo generateFinalUrl() ?>">