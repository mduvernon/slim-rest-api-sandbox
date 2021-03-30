This project provides a CRUD operation on store entity

Install the project via:

`composer install
`

Create a copy of `app/setting.php.dist` to `app/setting.php`

Initialize your database parameters.

Import the `importSql.sql` in your database

Ypu have to be ine the project root directory and run the following command line (Make sure of the directory right):

`php -S 0.0.0.0:8080 -t public`

Api endpoints:
* Store list          GET     /stores         you can filter by name like ?filter={"name":"<name>"}
* Single store        GET     /stores/{id}
* Delete one store    DELETE  /stores/{id}
* Create one store    POST    /stores         the request shall be formatted like {"name":"<Non>","description":"<description>"}
* Update one store    PUT     /stores/{id}    the request shall be formatted like {"name":"<Non>","description":"<description>"}
