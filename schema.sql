
/* Create a table 'products' */
CREATE TABLE products (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(255) NOT NULL, 
    name VARCHAR(255) NOT NULL, 
    price DECIMAL(20) NOT NULL,
    weight DECIMAL(20) NOT NULL, 
    size INT(20) NOT NULL, 
    dimensions JSON NOT NULL DEFAULT('0')
 );
