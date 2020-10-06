CREATE TABLE products(
    product_id int(11) PRIMARY KEY AUTO_INCREMENT,
    product_name varchar(255) NOT NULL,
    product_image varchar(255) NOT NULL,
    product_price float(11) NOT NULL,
    product_desc longtext NOT NULL
);


INSERT INTO products (product_name, product_image, product_price, product_desc) VALUES
("Product 1", "https://via.placeholder.com/1000", 10.00, "Product 1 Description"),
("Product 2", "https://via.placeholder.com/1000", 20.00, "Product 2 Description"),
("Product 3", "https://via.placeholder.com/1000", 30.00, "Product 3 Description"),
("Product 4", "https://via.placeholder.com/1000", 499.99, "Product 4 Description");


CREATE TABLE cart(
    cart_id int(11) NOT NULL,
    user_id int (11) NOT NULL,
    product_id int(11) NOT NULL,
    product_quantity int (11) NOT NULL
);

CREATE TABLE users(
    user_id int(11) PRIMARY KEY AUTO_INCREMENT,
    email tinytext NOT NULL,
    pass longtext NOT NULL,
    first_name varchar(255),
    last_name varchar(255),
    address longtext,
    city varchar(255),
    phone varchar(255)
);

CREATE TABLE messages(
    msg_id int(11) PRIMARY KEY AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    email tinytext NOT NULL,
    subject tinytext NOT NULL,
    message longtext NOT NULL
    solved boolean DEFAULT false NOT NULL
);
