<?php

class CdnTokenGenerate
{
    private function generateToken($resource, $generator, $secret_key)
    {
        /* accepts arguments:
           $resource = a resource on a web server e.g. /path/to/resource?option=33
           $generator = an integer generator value
           $secret_key = the secret key for the HMAC construction.
           Returns the concatenation of the generator and the first 20 characters
           of the HMAC of $resource using key $secret_key and the SHA1 algorithm.
         */
        $hmac_str = hash_hmac('sha1', $resource, $secret_key);
        return $generator . substr($hmac_str, 0, 20);
    }


    function constructUriWithToken($resource, $generator, $secret)
    {
        /* construct_url_with token takes arguments:
           $resource = a resource on a web server e.g. /path/to/resource?option=33
           $generator = an integer generator value
           $secret_key = the secret key for the HMAC construction.
           This will append &encoded=token to your resource url
         */
        $token = $this->generateToken($resource, $generator, $secret);
        return $resource . "&encoded=" . $token;
    }
}