CREATE TABLE IF NOT EXISTS Tags
(tag_id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
content TEXT,
condition INT (5),
PRIMARY KEY (tag_id))
ENGINE=InnoDB