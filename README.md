# codeigniter-login

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

## Database

Since version 2.0.0 the project need a database connection, use the files 
at [webappdb](webappdb) directory.

## Development

The core core process is just 4 files:

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

Until version 1.0.0 the check per se is made at the file `Indexauth.php` in the auth function.. 
the line of the variable `$rs_access` has the status.. if not TRUE or not NULL the check is passed.

Since version 2.0.0 a database layer will be necessary so an extra file at `webappweb/models/Usersmodel.php`
its necesary to provide functionality, and `$rs_access` is the result of the DB check.

Since version 3.0.0 a imap mail layer was added so an extra files are at `webappweb/libraries/Imap.php` 
and `webappweb/config/imap.php`, `$im_access` is the result of the mail login check.

Since version 4.0.0 a main controller do the check work of the sesion at `webappweb/core/CP_Controller.php`
that all controllers inherit, so `$this->checksession();` is common functionality and reusable code.

#### Process simple login

This is the main entry controller, it will load the views of login form page 
to input credentials, also will process such request to validate the login 
process of the credentials.

```
->user/pass--->Indexauth/index--->Indexauth/auth()---->Indexhome/index (sucess)
                                    (check)      |
                                                 |---->Indexauth/index (fail)
```

The magic is done by the `auth($data = NULL, ... , ... )` 

## Authors and acknowledgment

Show your appreciation to those who have contributed to the project.

## License

For open source projects, say how it is licensed.

## Project status

If you have run out of energy or time for your project, put a note at the top of the README saying that development has slowed down or stopped completely. Someone may choose to fork your project or volunteer to step in as a maintainer or owner, allowing your project to keep going. You can also make an explicit request for maintainers.
