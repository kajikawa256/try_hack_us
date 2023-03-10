-- try_hack_usデータベース作成 --
DROP DATABASE IF EXISTS spic22_hack02;
CREATE DATABASE spic22_hack02;

-- データベース移動 --
USE spic22_hack02;

-- ユーザー作成 --
DROP USER IF EXISTS spic22_hack02;
CREATE USER spic22_hack02 IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'C2vaVW6w';

-- usersテーブル作成 --
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(10) NOT NULL, -- 10文字まで
  password VARCHAR(100) NOT NULL, -- 50文字まで
  score INT DEFAULT 0,
  level INT DEFAULT 1
);

-- ダミーテーブル作成 --
CREATE TABLE DummyTable (
  username VARCHAR(10) NOT NULL,
  password VARCHAR(20) NOT NULL,
  level int DEFAULT 1
);

-- ユーザにデータベース権限付与 --
GRANT ALL ON spic22_hack02.* TO spic22_hack02;

-- ダミー情報の作成 --
INSERT INTO dummyTable
VALUES ('admin','abc12345',1),('root','Xb4DPJZM',2),('Anonymous','BkFh6RbpJsaX',3);

-- サンプルのユーザー情報を作成 --
INSERT INTO users(username,password)
VALUES ("Sample","Sample00Sample!");

commit;