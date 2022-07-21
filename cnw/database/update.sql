CREATE table cart_products(
    cart_id int(11) not null,
    product_id int (11) not null,
    quantity int(11) DEFAULT null,
     FOREIGN key (product_id) REFERENCES products(product_id),
    FOREIGN key (cart_id) REFERENCES cart(cart_id)
)
CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `date_bill` datetime DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `bill_status` varchar(100) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `product_id` (`product_id`);
  ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;
  ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
  ----
  ALTER TABLE `bill` ADD `user_name` VARCHAR(50) COLLATE utf8_unicode_ci DEFAULT NULL AFTER `product_id`;
  ---------------------------------
  ALTER TABLE `bill` ADD `quantity` INT(11) DEFAULT NULL AFTER `total_money`, 

--------------------------------
ALTER TABLE bill
add FOREIGN key (product_id) REFERENCES products(product_id),
add FOREIGN key (user_name) REFERENCES users(user_name);