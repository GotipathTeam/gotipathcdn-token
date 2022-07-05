# Gotipath CDN Access Token/Signed URL Policy


### Tokens
The policy setting requires a cryptographic token to be included in the URL. 

### Secret Key
The secret key to generate the encoded string can be viewed at the bottom of the Access Control tab by clicking the Show button. 


(This is only visible when the portal is accessed via HTTPS and must be kept secret at all times for token policies to be effective.)

Once a token policy is created, you will need to use the secret key to generate an encoded string to add to
URLs for end user consumption as follows: 

Tokens are time limited with two parameters
* **stime** Start time (not valid before this time)
* **etime** End time (not valid after this time)

The format of these are: yyyymmddHHMMSS, e.g. 20220424115300, and in UTC.


**Example **

Basic URL: 
`https://example.com/path/menifest.m3u8`

1. Remove protocol and hostname from url: 
`/path/menifest.m3u8 `

2. Add the time validity fields (these are required): 
`/path/menifest.m3u8&stime=20081201060100&etime=20081201183000 `

3. Encode the result of step 2 in HMACSHA1 hash using the secret key. For example please check [index.php](https://github.com/GotipathTeam/gotipathcdn-token/blob/main/index.php) file.

4. Calculate Hash: Take the first 20 characters of the hash and add `0` at the beginning.

5. Build Final URL: Add the `stime`, `etime` & `encoded` data as query parameters.
`https://example.com/path/menifest.m3u8&stime=20081201060100&etime=20081201183000&encoded=0<first20chars-of-hash>`


**Behaviour**
An end-user who attempts to access a prohibited content will receive a ”Forbidden” message (http response code 403) from their browser.

