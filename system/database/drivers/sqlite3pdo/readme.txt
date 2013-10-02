SQLite3 PDO driver by Xintrea for CodeIgniter 2.1.x

v.0.01


NOTE: This driver tested on CodeIgniter 2.1.2


Install:

1. Create directory "sqlite3pdo" in "[SYSTEM]/database/drivers".

2. Copy to directory "sqlite3pdo" all files from this archive.


Setup connection:

1. Create SQLite3 database file, and put him to any directory.
   My database file is [APPPATH]/db/base.db

2. Set rules to database file for webserver must read and write data.

3. In database config [APPPATH]/config/database.php setup next settings:

...
$db['default']['hostname'] = '';
$db['default']['username'] = '';
$db['default']['password'] = '';
$db['default']['database'] = 'sqlite:'.APPPATH.'db/base.db';
$db['default']['dbdriver'] = 'sqlite3pdo';
...


This is all.

My contact: xintrea@gmail.com

My website: http://webhamster.ru
