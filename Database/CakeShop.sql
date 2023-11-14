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
  `password` varchar(30),
  `role_id` int,
  `create_at` datetime,
  `update_time` datetime
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
  `Update_at` datetime
);

CREATE TABLE `Galery` (
  `galery_id` int PRIMARY KEY AUTO_INCREMENT,
  `product_id` int,
  `thumbnail` varchar(255)
);

CREATE TABLE `FeedBack` (
  `feedback_id` int PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255),
  `lastname` varchar(255),
  `email` varchar(50),
  `phone_number` varchar(30),
  `subject_name` varchar(255),
  `note` varchar(255)
);

CREATE TABLE `Order` (
  `order_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `note` varchar(255),
  `order_date` datetime,
  `status` bool,
  `total_money` int
);

CREATE TABLE `Order_Detail` (
  `order_detail_id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int,
  `product_id` int,
  `price` int,
  `num` int
);

ALTER TABLE `User` ADD FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`category_id`) REFERENCES `Category` (`category_id`);

ALTER TABLE `Order_Detail` ADD FOREIGN KEY (`order_id`) REFERENCES `Order` (`order_id`);

ALTER TABLE `Order_Detail` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

ALTER TABLE `Galery` ADD FOREIGN KEY (`product_id`) REFERENCES `Product` (`product_id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);


