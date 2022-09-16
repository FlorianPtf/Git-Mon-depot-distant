DROP DATABASE if EXISTS SQL_GESCOM;

CREATE DATABASE SQL_GESCOM;

USE SQL_GESCOM;

CREATE TABLE suppliers(
	sup_id					INT PRIMARY KEY,
	sup_name					VARCHAR(50),
	sup_city					VARCHAR(50),
	sup_adress				VARCHAR(150),
	sup_mail					VARCHAR(75),
	sup_phone				INT(10)
);

CREATE TABLE customers(
	cus_id					INT PRIMARY KEY,
	cus_lastname			VARCHAR(50),
	cus_firstname			VARCHAR(50),
	cus_adress				VARCHAR(150),
	cus_zipcode				VARCHAR(50),
	cus_city					VARCHAR(50),
	cus_mail					VARCHAR(75),
	cus_phone				INT(10)
);

CREATE TABLE orders(
	ord_id					INT PRIMARY KEY,
	ord_order_date			DATE,
	ord_ship_date			DATE,
	ord_bill_date			DATE,
	ord_reception_date	DATE,
	ord_status				VARCHAR(25),
	cus_id					INT,
	FOREIGN KEY(cus_id) REFERENCES customers(cus_id)
);
	
CREATE TABLE categories(
	cat_id					INT PRIMARY KEY,
	cat_name					VARCHAR(200),
	cat_parent_id			INT
);

CREATE TABLE products(
	pro_id					INT PRIMARY KEY,
	pro_ref					VARCHAR(10),
	pro_name					VARCHAR(200),
	pro_desc					TEXT(1000),
	pro_price				DECIMAL(6, 2),
	pro_stock				SMALLINT(4),
	pro_color				VARCHAR(30),
	pro_picture				VARCHAR(40),
	pro_add_date			DATE,
	pro_update_date		DATETIME,
	pro_publish				TINYINT(1),
	cat_id					INT,
	sup_id					INT,
	FOREIGN KEY (cat_id) REFERENCES categories(cat_id),
	FOREIGN KEY (sup_id) REFERENCES suppliers(sup_id)
);

CREATE TABLE details(
	det_id					INT PRIMARY KEY,
	det_price				DECIMAL(6,2),
	det_quantity			INT(5),
	pro_id					INT,
	ord_id					INT,
	FOREIGN KEY (pro_id) REFERENCES products(pro_id),
	FOREIGN KEY (ord_id) REFERENCES orders(ord_id)
);