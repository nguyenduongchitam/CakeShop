CREATE TABLE `Role` (
  `role_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30)
);

CREATE TABLE `User` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(30),
  `email` varchar(30),
  `phone_number` varchar(30),
  `address` varchar(50),
  `password` varchar(255),
  `role_id` int,
  `create_at` datetime,
  `update_at` datetime
);

CREATE TABLE `Category` (
  `category_id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30)
);

CREATE TABLE `Product` (
  `product_id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `title` varchar(50),
  `price` int,
  `discount_price` int,
  `thumbnail` varchar(255),
  `description` longtext,
  `created_at` datetime,
  `update_at` datetime
);

CREATE TABLE `Gallery` (
  `gallery_id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `thumbnail` varchar(255)
);

CREATE TABLE `FeedBack` (
  `feedback_id` int PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `email` varchar(50),
  `phone_number` varchar(30),
  `note` varchar(255)
);

CREATE TABLE `Order` (
  `order_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `city` varchar(60),
  `district` varchar(60),
  `ward` varchar(60),
  `address` varchar(255),
  `note` varchar(255),
  `delivery_money` int,
  `coupon_id` int,
  `order_date` datetime,
  `status` boolean,
  `total_money` int
);

CREATE TABLE `Order_Detail` (
  `order_id` int,
  `product_id` int,
  `price` int,
  `quantity` int,
  PRIMARY KEY (`order_id`, `product_id`)
);

CREATE TABLE `news` (
  `news_id` int PRIMARY KEY AUTO_INCREMENT,
  `title` mediumtext,
  `content` longtext,
  `thumbnail` varchar(100),
  `publish_date` date
);

CREATE TABLE `coupon` (
  `coupon_id` int PRIMARY KEY AUTO_INCREMENT,
  `coupon_code` varchar(10),
  `cart_min` int,
  `quantity` int,
  `total_discount` int,
  `start_date` date,
  `end_date` date
);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`);

ALTER TABLE `Order_Detail` ADD FOREIGN KEY (`order_id`) REFERENCES `Order` (`order_id`);

ALTER TABLE `Order_Detail` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

ALTER TABLE `Gallery` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`);


INSERT INTO `role`(`role_id`, `name`) VALUES (1,'Admin');
INSERT INTO `role`(`role_id`, `name`) VALUES (2,'Khách hàng');
/* password 12345 */
INSERT INTO `user`(`email`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('admin','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',1,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Văn A','A@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Anh B','B@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Thị C','C@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Văn D','D@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Văn E','E@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Dương Anh F','F@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());
INSERT INTO `user`(`full_name`, `email`, `phone_number`, `address`, `password`, `role_id`, `create_at`,`update_at`) VALUES ('Nguyễn Văn G','G@gmail.com','1234567','HCM','$2y$10$M0nUR5kAvhRKSUvJ3v36UOVdZm4szAkkhiAUYFtKkr877GOpgS3I2',2,now(),now());

INSERT INTO `category`(`category_id`,`name`) VALUES (1,'Bánh ngọt');
INSERT INTO `category`(`category_id`,`name`) VALUES (2,'Bánh kem');
INSERT INTO `category`(`category_id`,`name`) VALUES (3,'Bánh kếp');

INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (1,1,'Bánh ngọt 1',100000,80000,'Bánh ngọt-1.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (2,1,'Bánh ngọt 2',110000,80000,'Bánh ngọt-2.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (3,1,'Bánh ngọt 3',110000,80000,'Bánh ngọt-3.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (4,1,'Bánh ngọt 4',110000,80000,'Bánh ngọt-4.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (5,1,'Bánh ngọt 5 ',110000,80000,'Bánh ngọt-5.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (6,1,'Bánh ngọt 6',110000,80000,'Bánh ngọt-6.png','Bánh ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (7,1,'Bánh ngọt 7',110000,80000,'Bánh ngọt-7.png','Bánh ngon',now(),now());

INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (8,2,'Bánh Kem 1',110000,80000,'Bánh kem-1.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (9,2,'Bánh Kem 2',110000,80000,'Bánh kem-2.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (10,2,'Bánh Kem 3',110000,80000,'Bánh kem-3.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (11,2,'Bánh Kem 4',110000,80000,'Bánh kem-4.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (12,2,'Bánh Kem 5',110000,80000,'Bánh kem-5.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (13,2,'Bánh Kem 6',110000,80000,'Bánh kem-6.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (14,2,'Bánh Kem 7',110000,80000,'Bánh kem-7.jpg','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (15,2,'Bánh Kem 8',110000,80000,'Bánh kem-8.png','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (16,2,'Bánh Kem 9',110000,80000,'Bánh kem-9.png','Bánh kem ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (17,2,'Bánh Kem 10',110000,80000,'Bánh kem-10.png','Bánh kem ngon',now(),now());

INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (18,3,'Bánh Kếp',50000,40000,'Bánh kếp-1.jpg','Bánh kếp ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (19,3,'Bánh Kếp',50000,40000,'Bánh kếp-2.jpg','Bánh kếp ngon',now(),now());
INSERT INTO `product`(`product_id`,`category_id`,`title`, `price`, `discount_price`, `thumbnail`, `description`, `created_at`,`update_at`)VALUES (20,3,'Bánh Kếp',50000,40000,'Bánh kếp-3.jpg','Bánh kếp ngon',now(),now());

INSERT INTO `coupon`(`coupon_id`, `coupon_code`, `cart_min`, `quantity`, `total_discount`, `start_date`, `end_date`) VALUES (1,'0','0','0','0','1/1/2023','1/12/2024')