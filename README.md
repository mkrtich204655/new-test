DOCS
=============================================================
    --->NECESSARILY<---

1. change app/config/config.php

/*Your DB Host*/        define('DB_HOST', '****');
/*Your DB User Name*/   define('DB_USER', '****');
/*Your DB Password*/    define('DB_PASS', '****');

==================
    --->NOT NECESSARILY<---

2. change app/config/config.php

/*Your DB Name*/    define('DB_NAME', '****');

=============================================================
    --->ATTENTION<---

1. It is not necessary to create a database, the database is created automatically
/* app/lib/DB.php */

=============================================================
    --->ROUTING<---

1. How routes work
/* Controller name / Method name */
/* for example */

http://127.0.0.1/TVSeries/filter






