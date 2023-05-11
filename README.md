# codeigniter-login

Login template for codeigniter repo, this project just use session files, the most simple

The project its at https://gitlab.com/codeigniterpower/codeigniter-login

## How to use:

The project is just 4 files in fact, check [Development](#development) section in this document.

#### Installation

Just clone the repo:

```
mkdir ~/Devel && ~/Devel

git clone --recursive https://gitlab.com/codeigniterpower/codeigniter-login
```

Then enable "user directory" module into your webserver, change "public_html" to "Devel
and visit `http://localhost/~general/codeigniter-login`

#### Deploy into your webserver

Just clone the repo:
```
mkdir /var/www/html && /var/www/html

git clone --recursive https://gitlab.com/codeigniterpower/codeigniter-login
```

Then enable the site and visit `http://localhost/codeigniter-login`

## Database

There's no need if you want can setup a method in the [webappweb/models/Usersmodel.php](webappweb/models/Usersmodel.php) 
that just use your own storage, user check or way to autenticate the user data.

By default this project uses a embebed sqlite3 database, that you can 
change or move it, just by configure it on [webappweb/config/database.php](webappweb/config/database.php).

Since version 2.0.0 the project need a database connection, use the files 
at [webappdb](webappdb) directory.

Since version 5.0.0 the project provide a sqlite database, by default its 
at [webappdb/codeigniter.db](webappdb/codeigniter.db).

## Development

The core core process is just 4 files, complete documented at the [LOGIN.md](LOGIN.md) document:

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

Since version 5.0.0 the project provide a sqlite database, by default its 
at `webappdb/codeigniter.db` and extra view are show to noted more the sesion handle.

For mode detailed please read the [LOGIN.md](LOGIN.md) document

#### Profiler and debugging

Debugging is using our profiler, it requires a special view which is not part of the project 
so it is provided as an extra file in the [vendor](vendor) directory, just take it and put it on 
the views directory and profiler will work.

Until version 3.9.9 it can be simply disabled in the controller constructor, since version 4.0.0 
it is disabled in the core controller constructor inherited by the other controllers.

#### Process simple login

This is the main entry controller, it will load the views of login form page 
to input credentials, also will process such request to validate the login 
process of the credentials.

```
->user/pass--->Indexauth/index--->Indexauth/auth()---->Indexhome/index (sucess)
                                    (check)      |
                                                 |---->Indexauth/index (fail)
```

For mode detailed please read the [LOGIN.md](LOGIN.md) document

## Authors and acknowledgment

* (c) PICCORO Lenz McKAY @mckaygerhard

## License

CC-BY-SA

