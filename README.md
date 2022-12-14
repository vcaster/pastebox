# Setup:

* Spin up a mysql server on docker with `sudo docker run -p 13306:3306 --name mysql-docker-local -e MYSQL_ROOT_PASSWORD=Password -d mysql:latest`
* Connect to the mysql server `mysql --host=127.0.0.1 --port=13306 -u root -pPassword` and add the following sql code
* * create DATABASE pastebox;
* * use pastebox
* * CREATE TABLE userlist (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    description VARCHAR(100) NOT NULL,
    secret VARCHAR(30) NOT NULL
  );
* * insert into userlist (username,password,description,secret) values ('John', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 'super secret password', 'Password1!');
* * insert into userlist (username,password,description,secret) values (Dan, '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 'super secret password', 'Password1!');
* * insert into userlist (username,password,description,secret) values ('Ha', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 'super secret password', 'Password1!');
* * insert into userlist (username,password,description,secret) values ('Zeke', '8be3c943b1609fffbfc51aad666d0a04adf83c9d', 'super secret password', 'Password1!');
* Start the apache service `service apacehe2 start`
* Copy the pasebox directory to /var/www/html
* Visit http://localhost/pastebox
