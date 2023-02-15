-- try_hack_usデータベース作成 --
DROP DATABASE try_hack_us;
CREATE DATABASE try_hack_us;

-- usersテーブル作成 --
CREATE TABLE try_hack_us.users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(10) NOT NULL, -- 10文字まで
  password VARCHAR(50) NOT NULL, -- 50文字まで
  score INT DEFAULT 0,
  level INT DEFAULT 1
);

ROLLBACK;