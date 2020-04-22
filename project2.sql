CREATE TABLE IF NOT EXISTS Users (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Products (
    id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(127) DEFAULT NULL,
    img VARCHAR(127) DEFAULT NULL,
    description VARCHAR(255) DEFAULT NULL, 
    price DECIMAL(10,2) DEFAULT NULL,
    rating TINYINT UNSIGNED DEFAULT NULL,
    stock TINYINT UNSIGNED
);

INSERT INTO Users(fname, email, username, password) 
VALUES ('testfname', 'test@test.com', 'test', 'testpassword');

INSERT INTO Products(name, img, description, price, rating, stock) 
VALUES ("24k Gold Furby (KMH Exclusive Pendant)", "images/dripfurby.jpg", "Blinged-out Uncut Gems pendant, inspired by Howie's KMH originals. Made with Australian crystals and gold-plated stainless steel.", 200000, 5, 1),
("Video Game", "images/shaqfu.jpg", "First game in 20 Years developed by Valve Software.", 22.99, 2, 0),
("T-Shirt", "images/kaws.jpg", "T-Shirt, Collaboration with Uniqlo and Kaws", 33.99, 5, 1),
("Shoe", "images/valDunks.jpg", "Suede and Velvet Limited Nike SB Dunk Low Pros in collaboration with StrangeLove Skateboards.", 199.99, 5, 1),
("Laptop", "images/xps.jpg", "Epic Laptop", 2533.99, 4, 1);
