CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  VARCHAR(255) NOT NULL,
    email     VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName  VARCHAR(255),
    gender    CHAR(1),
    roles     TEXT         NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title   VARCHAR(255) NOT NULL,
    content TEXT,
    author  int NOT NULL
);

