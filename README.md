# Gotipath CDN Access Token Policy


### Tokens
The token setting requires a cryptographic token to be included in the URL.
The secret key to
generate the encoded string can be viewed at the bottom of the Access Control tab by clicking the
Show button. This is only visible when the portal is accessed via HTTPS and must be kept secret at all
times for token policies to be effective.

Once a token policy is created, you will need to use the key to generate an encoded string to add to
URLs for end user consumption as follows: 

* Tokens are time limited with two parameters
* **stime** Start time (not valid before this time)
* **etime** End time (not valid after this time)

The format of these are: yyyymmddHHMMSS, e.g. 20120424115300, and in UTC (date –u
+%Y%m%d%H%M%S).
They may be optionally restricted to an IP address by adding &ip=1.2.3.4 as an additional parameter.

## Example with PHP