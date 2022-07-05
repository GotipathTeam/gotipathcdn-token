# Gotipath CDN Access Token Policy


### Tokens
The token setting requires a cryptographic token to be included in the URL. The secret key to generate the encoded string can be viewed at the bottom of the Access Control tab by clicking the Show button. This is only visible when the portal is accessed via HTTPS and must be kept secret at all times for token policies to be effective.

[![](https://i.ibb.co/L5vBL1Z/Screenshot-22.png)](https://console.gotipath.com)

Once a token policy is created, you will need to use the key to generate an encoded string to add to
URLs for end user consumption as follows: 

Tokens are time limited with two parameters
* **stime** Start time (not valid before this time)
* **etime** End time (not valid after this time)

The format of these are: yyyymmddHHMMSS, e.g. 20120424115300, and in UTC (date –u
+%Y%m%d%H%M%S).
They may be optionally restricted to an IP address by adding &ip=1.2.3.4 as an additional parameter.



**Example **
(Note that text may be wrapped in these examples. )

Basic URL: 
http://example.com/path/to/resource?clientId=12345&product=A123&other=xyz 

1. Remove protocol and hostname from the hash input leaving: 
`/path/to/resource?clientId=12345&product=A123&other=xyz `

2. Add the time validity fields (these are required, not optional): 
`/path/to/resource?clientId=12345&product=A123&other=xyz&stime=20081201060100&eti
me=20081201183000 `

3. Calculate the encoded string as 0 concatenated with the first 20 characters of an 
HMACSHA1 hash using the result of step 2 and the secret key. 

4. Build new URL: 
`http://www.sample.com/path/to/resource?clientId=12345&product=A123&other=xyz&stim
e=200812010601006&etime=20081201100100&encoded=0<first20chars-of-hash>`

Sample code for the encoded string (hash) calculation in a number of different programming 
languages is available separately from your vendor or by contacting Conversant support team. 

**Behaviour **
An end-user who attempts to access a prohibited content will receive a ”Forbidden” message (http response code 403) from their browser.

