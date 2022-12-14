create DATABASE pastebox;

use pastebox

CREATE TABLE userlist (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    description VARCHAR(30) NOT NULL,
    secret VARCHAR(30) NOT NULL
  );
  
insert into userlist (username,password,description,secret) values ('john', '8be3c943b1609fffbfc51aad666d0a04adf83c9d',
 'super secret password', 'Password');
 
 insert into userlist (username,password,description,secret) values ('Dan', '8be3c943b1609fffbfc51aad666d0a04adf83c9d',
 'super secret password', 'Password');
 
 insert into userlist (username,password,description,secret) values ('Ha', '8be3c943b1609fffbfc51aad666d0a04adf83c9d',
 'super secret password', 'Password');
 
 insert into userlist (username,password,description,secret) values ('Zeke', '8be3c943b1609fffbfc51aad666d0a04adf83c9d',
 'super secret password', 'Password');
