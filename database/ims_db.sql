CREATE TABLE inventory (
  id int NOT NULL,
  item varchar(100) NOT NULL,
  qtyleft int  NOT NULL,
  price int  NOT NULL,
   PRIMARY KEY (id)
);


INSERT INTO inventory (id, item, qtyleft, price) VALUES
(1, 'chal', 20, 2500),
(2, 'dal', 12, 100),
(3, 'ata', 17 , 60),
(4, 'moyda', 22, 75),
(5, 'suji', 5, 30);





CREATE TABLE user (
  id int NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (id)
);


INSERT INTO user (id, username, password ) VALUES
(6, 'admin', 'admin'),
(7, 'shihab', 'stuff');

