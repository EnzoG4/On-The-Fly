DROP TABLE if exists `Student`;
DROP TABLE if exists `DiningHall`;
DROP TABLE if exists `Menu`;
DROP TABLE if exists `Order`;
DROP Table if exists `Deliverers`;

CREATE TABLE Customers(
	student_id int NOT NULL AUTO_INCREMENT,
	`date` datetime,
	firstname varchar(40) NOT NULL,
	lastname varchar(40) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	password char(40) NOT NULL,
	password1 char(40) NOT NULL,
	phone varchar(11) NOT NULL,
	dorm enum('66', '90', '2000', '2150', 'Greycliff', 'Gabelli', 'Ignacio', 'Modulars', 'Rubenstein', 'Stayer', 'Vanderslice', 'Voute', 'Walsh', 'Roncalli', 'Welch', 'Williams', 'Cheverus', 'Claver', 'Fenwick', 'Xavier', 'Fitzpatrick', 'Gonzaga', 'Loyola', 'Medeiros', 'Kostka') NOT NULL,
	room varchar(5) NOT NULL,
	eagle_id int(8) NOT NULL UNIQUE,
	credit char(16),
	expiration char(5),
	csc char(3),
	PRIMARY KEY(student_id)
)

CREATE TABLE Runners(
	runner_id int NOT NULL AUTO_INCREMENT,
	date datetime,
	firstname varchar(40) NOT NULL,
	lastname varchar(40) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	password char(40) NOT NULL,
	password1 char(40) NOT NULL,
	phone int(11) NOT NULL,
	PRIMARY KEY(runner_id)
)

Create TABLE Item (
	item_id int(11) NOT NULL AUTO_INCREMENT,
	menu_id int(2),
	order_id int(11),
	item_name varchar(40),
	type varchar(40),
	price varchar(40),
	quantity varchar(3),
	PRIMARY KEY(item_id)
);

CREATE TABLE Menu(
	menu_id int(1) NOT NULL AUTO_INCREMENT,
	dininghall_name varchar(40),
	PRIMARY KEY(menu_id)
)

CREATE TABLE Orders(
	order_id int(11) NOT NULL AUTO_INCREMENT,
	student_id int(11),
	runner_id int(11),
	curdate date,
	balance int(11),
	total_items int(11),
	PRIMARY KEY(order_id)
)

CREATE TABLE Listing(
	listing_id int(11) NOT NULL AUTO_INCREMENT,
	menu_id int(2),
	listing_name varchar(40),
	type varchar(40),
	price varchar(40),
	PRIMARY KEY(listing_id)
)
