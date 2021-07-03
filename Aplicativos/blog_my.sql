CREATE TABLE articles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
	user_id INT(11),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

/* Then insert some articles for testing: */
INSERT INTO articles (title,body, user_id,created)
    VALUES ('The title', 'This is the article body.', null,NOW());
INSERT INTO articles (title,body,user_id,created)
    VALUES ('A title once again', 'And the article body follows.', null, NOW());
INSERT INTO articles (title,body,user_id,created)
    VALUES ('Title strikes back', 'This is really exciting! Not.', null, NOW());

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);


