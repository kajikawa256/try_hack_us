-- try_hack_usデータベース作成 --
DROP DATABASE IF EXISTS spic22_hack02;
CREATE DATABASE spic22_hack02;

-- データベース移動 --
USE spic22_hack02;

-- ユーザー作成 --
DROP USER IF EXISTS Administrator;
CREATE USER Administrator IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'Administratorasagod';
DROP USER IF EXISTS dummyUser;
CREATE USER dummyUser IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'iamking';

-- usersテーブル作成 --
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(10) NOT NULL, -- 10文字まで
  password VARCHAR(50) NOT NULL, -- 50文字まで
  score INT DEFAULT 0,
  level INT DEFAULT 1
);

-- ダミーテーブル作成 --
CREATE TABLE DummyTable (
  username CHAR(1) NOT NULL,
  password VARCHAR(20) NOT NULL,
  level int DEFAULT 1
);

-- ユーザにデータベース権限付与 --
GRANT ALL ON spic22_hack02.* TO Administrator;
GRANT SELECT ON spic22_hack02.dummyTable TO dummyUser;

-- ダミー情報の作成 --
INSERT INTO dummyTable
VALUES ('a','level1',1),('b','level2',2),('c','level3',3);

commit;