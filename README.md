# View Request Headers

View Request Headers helps setup a web service and simple PHP application. The PHP application shows the received HTTP request headers, request URI, and POST variables on an accessible webpage.

Can be useful in identifying that URL Rewrites or Request Headers have been applied properly in a service like a reverse proxy.

## Setup and Usage

To setup a default website with Nginx on Ubuntu, run command:

```bash
sudo /usr/bin/env bash -c "$(curl -fsSL https://gist.githubusercontent.com/b-rito/fa8b32e7143f9f7919fd2226e4319c05/raw/87d27636c2649b7c68bb1bc81cd47b71cc1a4535/setup.sh)"
```

> [!Note]  
> Script is stored in a gist for accessibility via command line, however a copy can be found within this repo

### Example usage

`http://localhost/headers` - if the User-Agent contains 'curl' you will be directed to `curl.php` which has style fitting to a terminal without seeing any HTML tags

`http://localhost/` - if the User-Agent contains 'curl' you will be directed to `index.php` which has style fitting to a terminal without seeing any HTML tags

`http://localhost/curl.php` - will show the View Request Headers, made with the intent to only be used via `curl`

`http://localhost/html.php` - will show the View Request Headers, made with the intent to only be used via browser or Postman

`http://localhost/index.php` - will return a small 'Site is up!' pointing you to `/headers` location for the Request Headers

`http://localhost/index.html` - will return a small 'Site is up!' with a button taking you to `/headers` in the browser
