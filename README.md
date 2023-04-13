# codeigniter-webapp

Login template for codeigniter repo, this project just use session files, the most simple

The project its at https://gitlab.com/codeigniterpower/codeigniter-login

## Installation

Just clone the repo:

```
mkdir ~/Devel && ~/Devel

git clone --recursive https://gitlab.com/codeigniterpower/codeigniter-login

```

Then enable "user directory" module into your webserver, change "public_html" to "Devel
and visit `http://localhost/~general/codeigniter-login`

## Deploy into your webserver

Just clone the repo:

```
mkdir /var/www/html && /var/www/html

git clone --recursive https://gitlab.com/codeigniterpower/codeigniter-login

```

Then enable the site and visit `http://localhost/codeigniter-login`

## Development

Its just 4 files:

```
 webappweb                             The Applicaions directory of Codeigniter renamed
          |
          /controllers                 Place of the controllers that manages logic
          |          |
          |          /Indexauth.php    Login controller mechanish to init or end session
          |          |
          |          /Indexhome.php    Another page entry, will check valid sesion object
          |
          /views                       Pages display rendering data from controllers
                |
                /homesview.php         Arbitrary page only viewable under valid session
                |
                /inicion.php           Login view page for init the sesion process
```

#### Process simple login

This is the main entry controller, it will load the views of login form page 
to input credentials, also will process such request to validate the login 
process of the credentials.

```
->user/pass--->Indexauth/index--->Indexauth/auth()---->Indexhome/index (sucess)
                                                 |
                                                 |---->Indexauth/index (fail)
```

The magic is done by the `auth($data = NULL, ... , ... )` 

## Authors and acknowledgment

Show your appreciation to those who have contributed to the project.

## License

For open source projects, say how it is licensed.

## Project status

If you have run out of energy or time for your project, put a note at the top of the README saying that development has slowed down or stopped completely. Someone may choose to fork your project or volunteer to step in as a maintainer or owner, allowing your project to keep going. You can also make an explicit request for maintainers.
