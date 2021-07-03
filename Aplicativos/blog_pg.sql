CREATE TABLE articles (
    id serial PRIMARY KEY,
    title VARCHAR(50),
    body TEXT,
    user_id INT,
    created timestamp DEFAULT NULL,
    modified timestamp DEFAULT NULL
);

/* Then insert some articles for testing: */
INSERT INTO articles (title,body, user_id,created)
    VALUES ('The title', 'This is the article body.', null,NOW());
INSERT INTO articles (title,body,user_id,created)
    VALUES ('A title once again', 'And the article body follows.', null, NOW());
INSERT INTO articles (title,body,user_id,created)
    VALUES ('Title strikes back', 'This is really exciting! Not.', null, NOW());

CREATE TABLE users (
    id serial PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created timestamp DEFAULT NULL,
    modified timestamp DEFAULT NULL
);
