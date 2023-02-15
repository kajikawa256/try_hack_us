-- try_hack_usデータベース作成 --
DROP DATABASE IF EXISTS try_hack_us;
CREATE DATABASE try_hack_us;

-- データベース移動 --
USE try_hack_us;

-- ユーザー作成 --
DROP USER IF EXISTS Administrator;
CREATE USER Administrator IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'Administratorasagod';
DROP USER IF EXISTS dummyUser;
CREATE USER dummyUser IDENTIFIED WITH MYSQL_NATIVE_PASSWORD BY 'iamking';

-- ユーザにデータベース権限付与 --
GRANT ALL ON try_hack_us.* TO Administrator;
GRANT SELECT ON try_hack_us.dummyTable TO dummyUser;

-- usersテーブル作成 --
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(10) NOT NULL, -- 10文字まで
  password VARCHAR(50) NOT NULL, -- 50文字まで
  score INT DEFAULT 0,
  level INT DEFAULT 1
);

-- ダミーテーブル作成 --
CREATE TABLE dummyTable (
  username VARCHAR(10) NOT NULL,
  password VARCHAR(50) NOT NULL,
  level int DEFAULT 1,
);

-- ダミー情報の作成 --
INSERT INTO dummyTable
VALUES ('a','level1'),('b','level2'),('c','level3');

commit;