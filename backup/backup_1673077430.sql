

CREATE TABLE `tbl_about` (
  `ABOUT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `ABOUT_TITLE` varchar(25) NOT NULL,
  `ABOUT_DESCRIPTION` varchar(1000) NOT NULL,
  `ABOUT_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `ABOUT_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ABOUT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_about VALUES("1","1","History","G.Verzosa Salon and Spa are operating since 2015 and it was owned by Guiler Verzosa, located at 420 P.Martinez St. Unit C16 City Residences Brgy. Bagong Silang Mandaluyong City . Until we had 3 other branches around MANDALUYONG area.","2022-12-14 20:22:30","1");



CREATE TABLE `tbl_appointment` (
  `APP_ID` int(10) NOT NULL AUTO_INCREMENT,
  `APP_NAME` varchar(50) NOT NULL,
  `APP_EMAIL` varchar(50) NOT NULL,
  `APP_MOBILE_NUMBER` bigint(12) NOT NULL,
  `APP_APPLY_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `START_DATE` datetime NOT NULL,
  `END_DATE` datetime NOT NULL,
  `APP_STATUS` int(2) NOT NULL,
  `REMARKS` varchar(500) DEFAULT NULL,
  `TEXT` varchar(500) NOT NULL,
  `SERVICE_ID` int(10) NOT NULL,
  PRIMARY KEY (`APP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_appointment VALUES("1","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-19 18:14:11","2022-11-20 18:20:00","2022-11-20 18:20:00","1","","Jayson Bobadilla Feguis booked a service of Foot Spa. 

Date: Nov-20-2022 10:30 am 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","2");
INSERT INTO tbl_appointment VALUES("2","Rhea Saclolo","Sammple.gameid@gmail.com","9123456789","2022-11-19 18:14:56","2022-11-21 10:35:00","2022-11-21 11:40:00","1","","Rhea Saclolo booked a service of Nail Polish A. 

Date: Nov-21-2022 10:00 am 
Number: 09123456789
Email: Sammple.gameid@gmail.com","3");
INSERT INTO tbl_appointment VALUES("3","Ryan Saclolo","ryan@gmail.com","9516678951","2022-11-20 13:55:39","2022-11-21 10:35:00","2022-11-21 11:25:00","2","CONFLICT WITH SCHEDULE","Ryan Saclolo booked a service of Rebond. 

Date: Nov-21-2022 03:00 pm 
Number: 09516678951
Email: ryan@gmail.com","4");
INSERT INTO tbl_appointment VALUES("4","Lawrence Luague","lawrence@gmail.com","9123456789","2022-11-20 13:56:22","2022-11-22 08:05:00","2022-11-22 09:50:00","3","BACK OUT","Lawrence Luague booked a service of Foot Spa. 

Date: Nov-22-2022 10:00 am 
Number: 09123456789
Email: lawrence@gmail.com","2");
INSERT INTO tbl_appointment VALUES("5","JF","jf@gmail.com","9123456789","2022-11-20 18:03:20","2022-11-21 10:00:00","2022-11-21 10:00:00","1","","JF booked a service of Nail Polish. 

Date: Nov-21-2022 10:00 am 
Number: 09123456789
Email: jf@gmail.com","1");
INSERT INTO tbl_appointment VALUES("6","JFeguis","jysnbbdllfgs@gmail.com","9123456789","2022-11-20 18:11:19","2022-11-21 12:20:00","2022-11-21 12:20:00","0","","JFeguis booked a service of Nail Polish. 

Date: Nov-21-2022 12:20 pm 
Number: 09123456789
Email: jysnbbdllfgs@gmail.com","1");
INSERT INTO tbl_appointment VALUES("7","Jayson Bobadilla Feguis","jysnbbdllfgs@gmail.com","9519777916","2022-11-20 18:14:28","2022-11-22 10:30:00","2022-11-22 10:30:00","0","","Jayson Bobadilla Feguis booked a service of Foot Spa. 

Date: Nov-22-2022 10:30 am 
Number: 09519777916
Email: jysnbbdllfgs@gmail.com","2");
INSERT INTO tbl_appointment VALUES("8","Jayson !!!!","jaysonfeguis121714@gmail.com","9519777916","2022-11-20 18:17:40","2022-11-20 20:17:00","2022-11-20 20:17:00","0","","Jayson !!!! booked a service of Nail Polish. 

Booked Date: Nov-20-2022 08:17 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","1");
INSERT INTO tbl_appointment VALUES("9","Jayson !!!!","jaysonfeguis121714@gmail.com","9519777916","2022-11-20 18:18:04","2022-11-20 20:17:00","2022-11-20 20:17:00","0","","Jayson !!!! booked a service of Nail Polish. 

Booked Date: Nov-20-2022 08:17 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","1");
INSERT INTO tbl_appointment VALUES("10","FEGS111","jaysonfeguis121714@gmail.com","9519777916","2022-11-20 18:19:11","2022-11-21 15:20:00","2022-11-21 15:20:00","0","","FEGS111 booked a service of Rebond. 

Booked Date: Nov-21-2022 03:20 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","4");
INSERT INTO tbl_appointment VALUES("11","FEGJAY","jaysonfeguis121714@gmail.com","9519777916","2022-11-20 18:20:12","2022-11-23 19:20:00","2022-11-23 19:20:00","0","","FEGJAY booked a service of Nail Polish A. 

Booked Date: Nov-23-2022 07:20 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","3");
INSERT INTO tbl_appointment VALUES("12","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-22 09:10:16","2022-11-23 11:10:00","2022-11-23 11:10:00","0","","Jayson Bobadilla Feguis booked a service of Nail Polish. 

Booked Date: Nov-23-2022 11:10 am 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","1");
INSERT INTO tbl_appointment VALUES("13","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-22 09:10:39","2022-11-23 11:10:00","2022-11-23 11:10:00","0","","Jayson Bobadilla Feguis booked a service of Nail Polish. 

Booked Date: Nov-23-2022 11:10 am 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","1");
INSERT INTO tbl_appointment VALUES("14","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-24 21:40:01","2022-11-25 19:39:00","2022-11-25 19:39:00","0","","Jayson Bobadilla Feguis booked a service of Foot Spa. 

Booked Date: Nov-25-2022 07:39 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","2");
INSERT INTO tbl_appointment VALUES("15","Aleks","alex@gmail.com","9124657893","2022-11-24 21:41:43","2022-11-29 19:40:00","2022-11-29 21:55:00","0","","Aleks booked a service of Nail Polis","3");
INSERT INTO tbl_appointment VALUES("16","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-24 21:42:00","2022-11-24 18:41:00","2022-11-24 18:41:00","0","","Jayson Bobadilla Feguis booked a service of Nail Polish. 

Booked Date: Nov-24-2022 06:41 pm 
Number: 09519777916
Email: jaysonfeguis121714@gmail.com","1");
INSERT INTO tbl_appointment VALUES("17","Jayson Feguis","jaysonfeguis121714@gmail.com","9519777916","2022-11-26 21:36:03","2022-11-27 10:30:00","2022-11-27 10:35:00","1","","10:30 am Jayson Feguis - Nail Polish A","3");



CREATE TABLE `tbl_audit` (
  `AUDIT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(10) NOT NULL,
  `AUDIT_ACTIVITY` varchar(100) NOT NULL,
  `AUDIT_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`AUDIT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_audit VALUES("1","0","Logged in adminid 4","2022-12-16 17:58:00");
INSERT INTO tbl_audit VALUES("2","4","Activate user id 2","2022-12-16 17:58:11");
INSERT INTO tbl_audit VALUES("3","4","Deactivate user id 2","2022-12-16 18:02:11");
INSERT INTO tbl_audit VALUES("4","4","Added customer sample","2022-12-16 18:06:42");
INSERT INTO tbl_audit VALUES("5","4","Added feedback of customer id 1","2022-12-16 18:21:30");
INSERT INTO tbl_audit VALUES("6","4","Activate user id 12","2022-12-16 18:21:46");
INSERT INTO tbl_audit VALUES("7","4","Activate user id 14","2022-12-16 18:30:38");
INSERT INTO tbl_audit VALUES("8","4","Deleted feedback  id14","2022-12-16 18:31:06");
INSERT INTO tbl_audit VALUES("9","4","Edited feedback id 12","2022-12-16 18:31:18");
INSERT INTO tbl_audit VALUES("10","0","Logged in adminid 4","2023-01-07 12:00:50");
INSERT INTO tbl_audit VALUES("11","4","Logged out user id 4","2023-01-07 13:38:14");
INSERT INTO tbl_audit VALUES("12","0","Logged in id ","2023-01-07 13:38:19");
INSERT INTO tbl_audit VALUES("13","0","Logged in adminid 4","2023-01-07 13:38:23");
INSERT INTO tbl_audit VALUES("14","4","Logged out user id 4","2023-01-07 13:40:17");
INSERT INTO tbl_audit VALUES("15","0","Logged in adminid 4","2023-01-07 15:20:09");



CREATE TABLE `tbl_backup` (
  `BACKUP_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(10) NOT NULL,
  `BACKUP_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `BACKUP_FILE` varchar(50) NOT NULL,
  PRIMARY KEY (`BACKUP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tbl_banner` (
  `BANNER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `BANNER_NAME` varchar(25) NOT NULL,
  `BANNER_IMAGE` varchar(200) NOT NULL,
  `BANNER_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `BANNER_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`BANNER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_banner VALUES("1","0","1","Promotion-2022-12-03_00-31-04.png","2022-11-22 08:28:58","0");
INSERT INTO tbl_banner VALUES("2","0","Ads 2","Promotion-2022-11-22_08-47-50.jpg","2022-11-22 08:47:50","1");
INSERT INTO tbl_banner VALUES("3","0","3","Promotion-2022-11-22_08-48-01.jpg","2022-11-22 08:48:01","1");
INSERT INTO tbl_banner VALUES("4","0","4123333234234","Promotion-2022-11-24_17-30-33.webp","2022-11-22 08:48:10","1");
INSERT INTO tbl_banner VALUES("5","0","sz","Promotion-2022-12-02_23-18-11.png","2022-12-02 23:18:11","1");
INSERT INTO tbl_banner VALUES("6","0","SDASDASD1","Promotion-2022-12-02_23-58-47.png","2022-12-02 23:58:47","1");



CREATE TABLE `tbl_category` (
  `CATEGORY_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `CATEGORY_NAME` varchar(50) NOT NULL,
  `CATEGORY_DESCRIPTION` varchar(500) NOT NULL,
  `CATEGORY_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `CATEGORY_STATUS` int(2) NOT NULL,
  `CATEGORY_PICTURE` varchar(500) NOT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_category VALUES("1","1","Nail Services","All about nail service","2022-11-17 10:29:38","1","");
INSERT INTO tbl_category VALUES("2","1","Hair Services","All about hair services","2022-11-17 12:38:31","1","");
INSERT INTO tbl_category VALUES("3","1","Makeup Services","All about makeup services","2022-11-17 12:38:31","1","");
INSERT INTO tbl_category VALUES("4","0","XXXX","XXXX","2022-12-03 00:04:53","1","");



CREATE TABLE `tbl_customer` (
  `CUSTOMER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `CUSTOMER_NAME` varchar(50) NOT NULL,
  `CUSTOMER_EMAIL` varchar(50) DEFAULT NULL,
  `CUSTOMER_MOBILE_NUMBER` bigint(12) NOT NULL,
  `CUSTOMER_GENDER` varchar(10) NOT NULL,
  `CUSTOMER_ADDRESS` varchar(100) NOT NULL,
  `CUSTOMER_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `CUSTOMER_PICTURE` varchar(500) DEFAULT NULL,
  `CUSTOMER_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_customer VALUES("1","0","sample","sample@gmail.com","9282717272","Male","dasdasdada","2022-12-16 18:06:42","Customer-2022-12-16_18-06-42.jpg","1");



CREATE TABLE `tbl_feedback` (
  `FEEDBACK_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(10) NOT NULL,
  `CUSTOMER_NAME` varchar(100) NOT NULL,
  `CREATED_BY` int(10) NOT NULL,
  `FEEDBACK_CONTENT` varchar(1000) NOT NULL,
  `FEEDBACK_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `FEEDBACK_STATUS` int(2) NOT NULL,
  `FEEDBACK_SHOW` int(2) NOT NULL,
  `CUSTOMER_PICTURE` varchar(200) NOT NULL,
  PRIMARY KEY (`FEEDBACK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_feedback VALUES("14","1","aa","0","lawrence1@ ","2022-12-16 18:30:27","0","1","profile.png");



CREATE TABLE `tbl_notification` (
  `NOTIF_ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOTIF_TYPE` int(10) NOT NULL,
  `NOTIF_CUSTOMER` int(50) NOT NULL,
  `NOTIF_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `NOTIF_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`NOTIF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tbl_product` (
  `PRODUCT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `PRODUCT_NAME` varchar(50) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(500) NOT NULL,
  `PRODUCT_PRICE` decimal(10,2) NOT NULL,
  `PRODUCT_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `PRODUCT_STATUS` int(2) NOT NULL,
  `PRODUCT_PICTURE` varchar(500) NOT NULL,
  `CREATED_BY` int(10) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_product VALUES("1","Hair Color","Color: Maroon
For external use only","1500.00","2022-11-20 15:16:10","1","Product-2022-12-03_00-26-35.png","0");
INSERT INTO tbl_product VALUES("2","Hair Conditioner","Apply with water","10.00","2022-11-20 15:16:58","1","Product-2022-11-20_15-16-58.jpg","0");
INSERT INTO tbl_product VALUES("3","Creamsilk","use for hair","13.00","2022-11-20 16:26:46","1","Product-2022-11-20_16-26-46.jpg","0");
INSERT INTO tbl_product VALUES("4","Hair Iron","Warrant: 7days","1399.00","2022-11-20 16:28:11","1","Product-2022-11-20_16-28-11.jpg","0");
INSERT INTO tbl_product VALUES("5","Hair Oil","Used for hair","140.00","2022-11-20 16:30:14","1","Product-2022-11-20_16-30-14.jpg","0");
INSERT INTO tbl_product VALUES("6","Store Map","Location","10.99","2022-11-20 16:31:47","1","Product-2022-11-20_16-31-47.png","0");
INSERT INTO tbl_product VALUES("7","Hello World","1","1.00","2022-11-21 22:01:54","1","Product-2022-11-24_17-21-49.jpg","0");
INSERT INTO tbl_product VALUES("8","ss","ss","23.00","2022-12-02 23:11:22","1","Product-2022-12-02_23-56-37.png","0");



CREATE TABLE `tbl_service` (
  `SERVICE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CATEGORY_ID` int(10) NOT NULL,
  `CREATED_BY` int(10) NOT NULL,
  `SERVICE_NAME` varchar(50) NOT NULL,
  `SERVICE_PRICE` decimal(10,2) NOT NULL,
  `SERVICE_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `SERVICE_PICTURE` varchar(500) NOT NULL,
  `SERVICE_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`SERVICE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_service VALUES("1","1","1","Nail Polish","120.00","2022-11-17 10:30:20","Service-2022-11-24_14-44-28.jpg","1");
INSERT INTO tbl_service VALUES("2","1","1","Foot Spa","300.00","2022-11-17 10:35:57","Service-2022-11-24_14-44-38.jpg","1");
INSERT INTO tbl_service VALUES("3","1","1","Nail Polish A","150.00","2022-11-17 10:37:28","Service-2022-11-24_14-44-47.jpg","0");
INSERT INTO tbl_service VALUES("4","4","1","Rebo234","1500.00","2022-11-17 12:39:56","Service-2022-12-03_00-07-07.png","1");
INSERT INTO tbl_service VALUES("5","1","0","ssx","23.00","2022-12-02 23:15:12","Service-2022-12-02_23-15-12.jpg","0");



CREATE TABLE `tbl_user` (
  `USER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_USERNAME` varchar(30) NOT NULL,
  `USER_PASSWORD` varchar(30) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_MOBILE_NUMBER` bigint(12) NOT NULL,
  `USER_STATUS` int(2) NOT NULL,
  `USER_TYPE` int(2) NOT NULL,
  `USER_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `USER_PICTURE` varchar(500) NOT NULL,
  `USER_SHOW` int(2) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_user VALUES("4","admin","admin","adminfname","adminlname","admin@gmail.com","9261902030","1","1","2022-12-02 22:58:14","User-2022-12-02_22-58-14.jpg","1");

