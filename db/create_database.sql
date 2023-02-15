-- try_hack_usデータベース作成 --
DROP DATABASE try_hack_us;
CREATE DATABASE try_hack_us;

-- usersテーブル作成 --
CREATE TABLE try_hack_us.users (
  id INT NOT NULL PRIMARY KEY,
  username VARCHAR(10), -- 10文字まで
  password VARCHAR(50), -- 50文字まで
  score INT
);

ROLLBACK;