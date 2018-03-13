/*Create database Warehouse4*/
CREATE DATABASE IF NOT EXISTS warehouse4 DEFAULT CHARACTER SET utf8 COLLATE = utf8_bin;

/*Create tables Warehouse4*/
CREATE TABLE `warehouse4` . `user` (
	id int unsigned auto_increment primary key,
    first_name varchar(255) ,
    last_name varchar(255) not null,
    user_name varchar(255),
	`password` varchar(255) not null
);

CREATE TABLE `warehouse4` . `stock` (
	id int unsigned auto_increment primary key,
    product_name varchar(255) not null,
    description varchar(255),
    amount varchar(255) not null,
    creation_date datetime,
	update_date datetime
)
engine = InnoDB
default character set  = utf8
collate = utf8_bin;