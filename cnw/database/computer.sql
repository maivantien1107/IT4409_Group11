drop database computer
--table user
CREATE TABLE `users` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci primary key  not NULL,
  `user_pass` varchar(50) DEFAULT NULL,
    address varchar(200) COLLATE utf8_unicode_ci DEFAULT null,
    telephone int(11) DEFAULT null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--table cart
CREATE table cart(
    cart_id int (11) PRIMARY KEY NOT null AUTO_INCREMENT,
    user_name varchar(50) COLLATE utf8_unicode_ci  DEFAULT null,
    CONSTRAINT `cart_fk1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`)
    )ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;
--table sản phẩm
CREATE TABLE products (
  `product_id` int(11) PRIMARY KEY NOT NULL,
  `model` varchar(50) collate utf8_unicode_ci DEFAULT NULL,
  `image` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  `size`  varchar(50) DEFAULT NULL,
  `weigh` double DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `number_of_product` int(11) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `p_description` text DEFAULT NULL,
  feature text default NULL,
  `dis` TINYINT(1)  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `products` ADD `overview` TEXT NOT NULL AFTER `dis`,
ADD `des1` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `overview`,
ADD `des2` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des1`,
ADD `des3` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des2`, 
ADD `des4` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des3`,
ADD `des5` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des4`,
ADD `des6` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des5`,
ADD `des7` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des6`,
ADD `des8` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des7`, 
ADD `image1` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des8`,
ADD `image2` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `image1`,
ADD `image3` TEXT COLLATE utf8_unicode_ci DEFAULT NULL AFTER `image2`;
-- table bình luận
CREATE TABLE comment (
    `cmt_id` int(11) PRIMARY key NOT null AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) DEFAULT NULL,
  `your_comment` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_comment` datetime DEFAULT NULL,
     FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`),
     FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- table hóa đơn từng sản phẩm
CREATE TABLE `cart_products` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
    FOREIGN key (cart_id) REFERENCES cart(cart_id),
    FOREIGN key (product_id) REFERENCES products(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--table hóa đơn
create table bill (
	bill_id int not null auto_increment,
    product_id int not null,
    user_name varchar(50) COLLATE utf8_unicode_ci not null,
    date_bill datetime,
    total_money int,
    primary key (bill_id),
    foreign key (product_id) references products(product_id),
    foreign key (user_name) references users(user_name)
);
--table chuột
CREATE TABLE `mouse_products` (
  `mouse_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `standard` tinyint(1) DEFAULT NULL,
  `protocol` varchar(50) DEFAULT NULL,
  `is_led` tinyint(1) DEFAULT NULL,
    FOREIGN key (product_id) REFERENCES products(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;


CREATE TABLE `computer_products` (
  `computer_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `s_cpu` varchar(50) DEFAULT NULL,
  `s_ram` varchar(50) DEFAULT NULL,
  `s_memory` int(11) DEFAULT NULL,
  `screen` varchar(50) DEFAULT NULL,
  `s_card` varchar(50) DEFAULT NULL,

  `os` varchar(50) DEFAULT NULL,
   FOREIGN key (`product_id`) REFERENCES products(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `pc` (
  `pc_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `i_case` text DEFAULT NULL,
    FOREIGN key (product_id) REFERENCES products(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;


CREATE TABLE `laptop` (
  `laptop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pin` int(11) DEFAULT NULL,
    FOREIGN key (product_id) REFERENCES products(product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table supplier(
    supplier_id int(11) PRIMARY key not null  AUTO_INCREMENT,
    supplier varchar(50) COLLATE utf8_unicode_ci not null
    
    )
create table cpu(
  cpu_id varchar(20) collate utf8_unicode_ci primary key not null,
  cpu varchar(50) collate utf8_unicode_ci not null
)
create table search(
    search_id int(11) PRIMARY key not null AUTO_INCREMENT,
    content text COLLATE utf8_unicode_ci not null,
    times int(11) DEFAULT null
    )

  CREATE TABLE news(
    title varchar(250) COLLATE utf8_unicode_ci not null,
    news_id int(11) PRIMARY key not null AUTO_INCREMENT,
    category varchar(250) COLLATE utf8_unicode_ci default NULL,
    description text COLLATE utf8_unicode_ci DEFAULT null,
    time datetime DEFAULT null,
    img varchar(250) COLLATE utf8_unicode_ci DEFAULT null,
    overview text COLLATE utf8_unicode_ci DEFAULT null
    )

    create table news_description(
    news_id int(11) not null,
    des1 text COLLATE utf8_unicode_ci DEFAULT null,
      des2 text COLLATE utf8_unicode_ci DEFAULT null,
      des3 text COLLATE utf8_unicode_ci DEFAULT null,
      des4 text COLLATE utf8_unicode_ci DEFAULT null,
      des5 text COLLATE utf8_unicode_ci DEFAULT null,
      des6 text COLLATE utf8_unicode_ci DEFAULT null,
      des7 text COLLATE utf8_unicode_ci DEFAULT null,
    FOREIGN key (news_id) REFERENCES news(news_id)
    
    )

    ALTER TABLE `news_description` ADD `image1` VARCHAR(250) COLLATE utf8_unicode_ci DEFAULT NULL AFTER `des7`,
ADD `image2` VARCHAR(250) COLLATE utf8_unicode_ci DEFAULT NULL AFTER `image1`,
ADD `image3` VARCHAR(250)COLLATE utf8_unicode_ci DEFAULT NULL AFTER `image2`;
----------------------------------------------------------------
--table admin
CREATE table admin(
    admin_user varchar(50) COLLATE utf8_unicode_ci PRIMARY key not null,
    admin_password varchar(50) DEFAULT null
    )ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci  ;


    --kết nối bảng




    --update data
    ALTER TABLE `computer_products` CHANGE `s_memory` `s_memory` VARCHAR(50) NULL DEFAULT NULL;
-----
    ALTER TABLE `products` DROP `image`;
    ----------------------------------------------------------------
    ALTER TABLE `products` CHANGE `image1` `des9` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
    ALTER TABLE `products` CHANGE `image2` `des10` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
    ALTER TABLE `products` CHANGE `image3` `des11` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
    ----
    ALTER TABLE `products` CHANGE `overview` `overview` TEXT COLLATE utf8_general_ci DEFAULT NULL;
    ----------------
    ALTER TABLE `news_description` CHANGE `image1` `des8` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci  DEFAULT NULL;
    ALTER TABLE `news_description` CHANGE `image2` `des9` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci  DEFAULT NULL;
    ALTER TABLE `news_description` CHANGE `image3` `des10` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci  DEFAULT NULL;

--create RAM
CREATE TABLE ram(
    ram varchar(200) COLLATE utf8_unicode_ci DEFAULT null
    );
insert into ram(ram) values('4 GB'),
                         ('8 GB'),
                         ('16 GB'),
                         ('32 GB');
--index 
-- CREATE FULLTEXT INDEX index_search
-- ON products(model,feature);

    --insert
    INSERT into users(user_name,user_pass,address,telephone) VALUES('maitien','a12345','thanh hóa','12345');
    INSERT into products(product_id,model,image,price,size,weigh,color,number_of_product,supplier,p_description,feature) VALUES(1,'Acer Nitro Gaming AN515-58-52SP/i5-12500H','public/img/Img_product/Acernitrogamingan515-58-52sp.webp',24990000,'30cm*20cm*1.8cm',1.24,'yellow',10,'Acer','máy tính','tính năng 1');
    INSERT INTO computer_products(computer_product_id,product_id,s_cpu,s_ram,s_memory,screen,s_card,os) VALUES (101, 1, 'core i5', '8 GB', 512, '15.6 in', 'GTX 1060 4GB' ,'Win 10');
    INSERT INTO laptop(laptop_id, product_id, pin) VALUES (1001,1,40);
    insert into supplier(supplier) VALUES ('Acer'),
                                      ('Asus'),
                                      ('Apple'),
                                      ('Avita'),
                                      
                                      ('Chuwi'),
                                      ('Dell'),
                                      ('Gigabyte'),
                                      ('Lenovo'),
                                      ('Microsoft'),
                                      ('HP'),
                                      ('MSI');
    insert into cpu(cpu_id, cpu) VALUES('cpu1','Intel celeron'),
                                   ('cpu2','Intel pentium'),
                                   ('cpu3', 'Intel Core i3'),
                                   ('cpu4', 'Intel Core i5'),
                                   ('cpu5', 'Intel Core i7'),
                                   ('cpu6', 'Intel Core i9'),
                                   ('cpu7', 'AMD Ryzen 3'),
                                   ('cpu8', 'AMD Ryzen 5'),
                                   ('cpu9', 'AMD Ryzen 7'),
                                   ('cpu10', 'AMD Ryzen 9');
  INSERT INTO `news`(`title`, `category`, `description`, `time`, `img`, `overview`) VALUES ('Hè rộn ràng - lưu trữ an toàn cùng Seagate','Khuyến mãi','descript2','2022/07/09','https://www.phucanh.vn/media/news/1806_he-ron-rang-luu-tru-cung-seagate.jpg','Nhắm mắt thấy mùa hè, mở mắt thấy chương trình ưu đãi về. Từ ngày 20/06 - 30/07/2022, chương trình ưu đãi “MUA Ổ CỨNG TẶNG THẺ CÀO” sẽ được áp dụng khi khách hàng mua sản phẩm ổ cứng gắn ngoài của Seagate từ 2TB trở lên tại tất cả các showroom của cửa hàng');
INSERT INTO `news_description`(`news_id`, `des1`, `des2`, `des3`, `des4`, `des5`, `des6`, `des7`,image1,image2,image3) VALUES (12,'Theo báo cáo từ công ty quản lý tài chính nổi tiếng Morgan Stanley, doanh thu mảng PC của AMD dự kiến sẽ bị sụt giảm mạnh trong năm nay. Cụ thể, doanh số của đội Đỏ có thể sẽ chứng kiến mức sụt giảm lên tới 26% trong năm 2022 này. Nhu cầu về linh kiện PC nói chung đang giảm mạnh sau khi đại dịch qua đi và chuỗi cung ứng được nối lại, khiến cho hàng hóa trở nên dồi dào hơn. Thêm vào đó, lạm phát tăng cao cũng khiến cho người tiêu dùng nói chung dè dặt hơn trong việc mua sắm.Theo báo cáo từ công ty quản lý tài chính nổi tiếng Morgan Stanley, doanh thu mảng PC của AMD dự kiến sẽ bị sụt giảm mạnh trong năm nay. Cụ thể, doanh số của đội Đỏ có thể sẽ chứng kiến mức sụt giảm lên tới 26% trong năm 2022 này. Nhu cầu về linh kiện PC nói chung đang giảm mạnh sau khi đại dịch qua đi và chuỗi cung ứng được nối lại, khiến cho hàng hóa trở nên dồi dào hơn. Thêm vào đó, lạm phát tăng cao cũng khiến cho người tiêu dùng nói chung dè dặt hơn trong việc mua sắm.','Điều này cho thấy tầm quan trọng cực lớn của CPU Ryzen 7000 đối với kết quả kinh doanh của AMD. Bộ vi xử lý mới có thể sẽ trở thành cứu cánh của đội Đỏ nếu như có thể đánh bại được đối thủ Raptor Lake tới từ Intel. Thậm chí, đó có thể sẽ là cách duy nhất để AMD tiến lên vào lúc này khi Alder Lake đã giúp cho Intel lấy lại ngôi vương CPU từ tay AMD.','Trong khi Alder Lake mang tới một loạt những cải tiến, bao gồm cả kiến trúc dạng lai (hybrid) kết hợp các nhân hiệu năng cao và các nhân tiết kiệm năng lượng. Đồng thời, con chip của Intel cũng bổ sung thêm RAM DDR5 và hỗ trợ PCIe 5.0, những điều mà AMD vẫn chưa thể làm được với Ryzen 5000. Chính vì vậy, những người dùng muốn build một bộ PC cao cấp với CPU đời mới thường sẽ chọn Intel thay vì AMD trong thời gian vừa qua.','Sự trở lại đầy mạnh mẽ của Intel đã khiến AMD bị lép vế trong một thời gian dài. Đội Đỏ cũng đã đáp trả bằng việc phát hành Ryzen 7 5800X3D, một con quái vật thực sự cho dòng CPU gaming với kiến trúc V-Cache. Ngoài ra, đầu năm nay AMD cũng đã cho ra mắt bộ vi xử lý mới Ryzen 9 5950X, tuy nhiên xét về hiệu năng thì sản phẩm này vẫn chưa thể so với Intel Core i9-12900K. Nhìn chung, thị trường CPU vẫn đang chứng kiến thế thượng phong của đội Xanh.','Cả bối cảnh hiện tại và tương lai đều không ủng hộ AMD, chính vì vậy giờ sẽ là lúc mà đội Đỏ cần phải đánh một trận “tất tay” với Ryzen 7000 nói riêng và CPU Zen 4 nói chung hòng lật ngược thế cờ. Đã có những thông tin cho rằng AMD có ý định lùi ngày phát hành Ryzen 7000 để có thêm thời gian đẩy nốt số hàng tồn kho của Ryzen 5000. Tuy nhiên kế hoạch đó có thể sẽ thay đổi và CPU Zen 4 đầu tiên sẽ trình làng sớm hơn dự kiến.','Trận chiến giữa Intel và AMD trên mặt trận CPU bao giờ cũng căng thẳng, và có lẽ cuộc đối đầu năm 2022 này sẽ còn khốc liệt hơn nhiều. Nên nhớ rằng nhu cầu PC giảm cũng ảnh hưởng không nhỏ tới Intel, và đương nhiên họ cũng muốn Raptor Lake duy trì mạch chiến thắng của Alder Lake để vượt qua khoảng thời gian khó khăn sắp tới.','Xanh và Đỏ, ai sẽ là người chiến thắng? Hãy cùng chờ xem!','https://www.tncstore.vn/image/catalog/Tin tức website/với CPU Ryzen 7000/4.png','https://www.tncstore.vn/image/catalog/Tin tức website/với CPU Ryzen 7000/4.png','https://www.tncstore.vn/image/catalog/Tin tức website/với CPU Ryzen 7000/4.png');





---update 16/07
create TABLE card (
    card varchar(250) COLLATE utf8_unicode_ci DEFAULT null
    )
  INSERT INTO card(card) VALUES ('Nvidia Geforce Series'), ('Amd  radeon series'), ('Card onboard');

  -----------------------------
  CREATE table memory (
    memory varchar(250) COLLATE utf8_unicode_ci DEFAULT null
    )
  INSERT INTO memory(memory) VALUES ('SSD 128 GB'),('SSD 256 GB'),('SSD 512 GB'),('SSD 1TB'),('HHD 512 GB'),('HHD 1TB');

  --bảng rate 
  CREATE TABLE rate (
    rate_id int(11) PRIMARY key not null AUTO_INCREMENT,
    product_id int(11),
    user_name varchar(50) COLLATE utf8_unicode_ci DEFAULT null,
    star int(11) default null,
    content text COLLATE utf8_unicode_ci DEFAULT null,
    date_cmt datetime DEFAULT null)

----------------
CREATE TABLE admin(
    users varchar(50) COLLATE utf8_unicode_ci PRIMARY key not null,
    pass varchar(50) COLLATE utf8_unicode_ci not null)

    ALTER TABLE `products` CHANGE `product_id` `product_id` INT(11) NOT NULL AUTO_INCREMENT;