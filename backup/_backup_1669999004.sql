

CREATE TABLE `tbl_about` (
  `ABOUT_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `ABOUT_TITLE` varchar(25) NOT NULL,
  `ABOUT_DESCRIPTION` varchar(1000) NOT NULL,
  `ABOUT_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `ABOUT_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ABOUT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_audit VALUES("1","1","Logged in jayson","2022-11-24 21:16:39");
INSERT INTO tbl_audit VALUES("2","1","Added userJayson","2022-11-24 21:17:32");
INSERT INTO tbl_audit VALUES("3","1","Edited user nameJayson","2022-11-24 21:17:45");
INSERT INTO tbl_audit VALUES("4","1","Added userJayson","2022-11-24 21:18:20");
INSERT INTO tbl_audit VALUES("5","2","Logged in jayson2","2022-11-24 21:27:21");
INSERT INTO tbl_audit VALUES("6","1","Logged in jayson1","2022-11-24 21:34:45");
INSERT INTO tbl_audit VALUES("7","1","Added an appointment for Jayson Bobadilla Feguis","2022-11-24 21:40:01");
INSERT INTO tbl_audit VALUES("8","1","Added an appointment for Aleks","2022-11-24 21:41:43");
INSERT INTO tbl_audit VALUES("9","0","Logged in ","2022-11-24 21:50:44");
INSERT INTO tbl_audit VALUES("10","0","Logged in ","2022-11-24 21:50:49");
INSERT INTO tbl_audit VALUES("11","1","Logged in jayson1","2022-11-24 21:50:56");
INSERT INTO tbl_audit VALUES("12","1","Backed up Database ","2022-11-24 22:14:22");
INSERT INTO tbl_audit VALUES("13","3","Logged in jayson3","2022-11-24 22:34:24");
INSERT INTO tbl_audit VALUES("14","0","Logged in ","2022-11-24 22:44:56");
INSERT INTO tbl_audit VALUES("15","0","Logged in ","2022-11-24 22:46:19");
INSERT INTO tbl_audit VALUES("16","0","Logged in ","2022-11-24 22:46:43");
INSERT INTO tbl_audit VALUES("17","0","Logged in ","2022-11-24 22:48:17");
INSERT INTO tbl_audit VALUES("18","0","Logged in ","2022-11-24 22:48:21");
INSERT INTO tbl_audit VALUES("19","0","Logged in ","2022-11-24 22:49:09");
INSERT INTO tbl_audit VALUES("20","0","Logged in ","2022-11-24 22:49:11");
INSERT INTO tbl_audit VALUES("21","0","Logged in ","2022-11-24 22:49:36");
INSERT INTO tbl_audit VALUES("22","0","Logged in ","2022-11-24 22:49:50");
INSERT INTO tbl_audit VALUES("23","0","Logged in ","2022-11-24 22:50:13");
INSERT INTO tbl_audit VALUES("24","0","Logged in ","2022-11-24 22:50:40");
INSERT INTO tbl_audit VALUES("25","0","Logged in ","2022-11-24 22:51:59");
INSERT INTO tbl_audit VALUES("26","2","Logged in jayson2","2022-11-24 22:52:08");
INSERT INTO tbl_audit VALUES("27","2","Logged in jayson2","2022-11-24 22:52:15");
INSERT INTO tbl_audit VALUES("28","1","Logged in jayson1","2022-11-24 22:52:22");
INSERT INTO tbl_audit VALUES("29","1","Logged in jayson1","2022-11-24 22:52:54");
INSERT INTO tbl_audit VALUES("30","1","Logged in ","2022-11-24 22:53:35");
INSERT INTO tbl_audit VALUES("31","0","Logged in ","2022-11-24 22:54:25");
INSERT INTO tbl_audit VALUES("32","0","Logged in ","2022-11-24 22:54:46");
INSERT INTO tbl_audit VALUES("33","0","Logged in ","2022-11-24 22:55:23");
INSERT INTO tbl_audit VALUES("34","0","Logged in ","2022-11-24 22:55:27");
INSERT INTO tbl_audit VALUES("35","0","Logged in ","2022-11-24 22:55:45");
INSERT INTO tbl_audit VALUES("36","0","Logged in jayson1","2022-11-24 22:55:52");
INSERT INTO tbl_audit VALUES("37","1","Logged in ","2022-11-24 22:56:33");
INSERT INTO tbl_audit VALUES("38","0","Logged in jayson1","2022-11-24 22:56:42");
INSERT INTO tbl_audit VALUES("39","0","Logged in ","2022-11-24 22:57:27");
INSERT INTO tbl_audit VALUES("40","0","Logged in ","2022-11-24 22:57:46");
INSERT INTO tbl_audit VALUES("41","0","Logged in jayson1","2022-11-24 22:58:30");
INSERT INTO tbl_audit VALUES("42","0","Logged in ","2022-11-24 22:59:05");
INSERT INTO tbl_audit VALUES("43","0","Logged in ","2022-11-24 22:59:20");
INSERT INTO tbl_audit VALUES("44","0","Logged in ","2022-11-24 22:59:24");
INSERT INTO tbl_audit VALUES("45","0","Logged in jayson2","2022-11-24 23:00:24");
INSERT INTO tbl_audit VALUES("46","0","Logged in jayson3","2022-11-24 23:00:47");
INSERT INTO tbl_audit VALUES("47","0","Logged in jayson1","2022-11-25 17:01:06");
INSERT INTO tbl_audit VALUES("48","0","Logged in jayson2","2022-11-25 17:01:59");
INSERT INTO tbl_audit VALUES("49","0","Logged in jayson3","2022-11-25 17:02:26");
INSERT INTO tbl_audit VALUES("50","0","Logged in jayson2","2022-11-26 10:02:30");
INSERT INTO tbl_audit VALUES("51","2","Logged in jayson2","2022-11-26 10:05:08");
INSERT INTO tbl_audit VALUES("52","2","Logged in ","2022-11-26 10:07:53");
INSERT INTO tbl_audit VALUES("53","0","Logged in jayson2","2022-11-26 10:09:01");
INSERT INTO tbl_audit VALUES("54","0","Logged in ","2022-11-26 10:14:05");
INSERT INTO tbl_audit VALUES("55","0","Logged in jayson2","2022-11-26 10:19:07");
INSERT INTO tbl_audit VALUES("56","2","Logged in jayson1","2022-11-26 10:26:11");
INSERT INTO tbl_audit VALUES("57","0","Logged in jayson2","2022-11-26 10:26:45");
INSERT INTO tbl_audit VALUES("58","2","Accepted an appointment id 5","2022-11-26 10:26:56");
INSERT INTO tbl_audit VALUES("59","0","Logged in jayson3","2022-11-26 10:28:48");
INSERT INTO tbl_audit VALUES("60","0","Logged in ","2022-11-26 10:36:58");
INSERT INTO tbl_audit VALUES("61","0","Logged in jayson1","2022-11-26 10:37:05");
INSERT INTO tbl_audit VALUES("62","1","Logged out user id 1","2022-11-26 18:29:33");
INSERT INTO tbl_audit VALUES("63","0","Logged in jayson1","2022-11-26 19:00:59");
INSERT INTO tbl_audit VALUES("64","1","Logged out user id 1","2022-11-26 19:09:07");
INSERT INTO tbl_audit VALUES("65","0","Logged in ","2022-11-26 19:09:42");
INSERT INTO tbl_audit VALUES("66","0","Logged in jayson1","2022-11-26 19:09:48");
INSERT INTO tbl_audit VALUES("67","1","Logged out user id 1","2022-11-26 19:11:46");
INSERT INTO tbl_audit VALUES("68","0","Logged in jayson1","2022-11-26 19:13:21");
INSERT INTO tbl_audit VALUES("69","1","Logged out user id 1","2022-11-26 19:31:45");
INSERT INTO tbl_audit VALUES("70","0","Logged in jayson1","2022-11-26 21:30:07");
INSERT INTO tbl_audit VALUES("71","1","Logged out user id 1","2022-11-26 21:35:37");
INSERT INTO tbl_audit VALUES("72","0","Logged in jayson1","2022-11-26 21:36:19");
INSERT INTO tbl_audit VALUES("73","1","Updated an appointment id 17","2022-11-26 21:37:03");
INSERT INTO tbl_audit VALUES("74","1","Accepted an appointment id 17","2022-11-26 21:40:34");
INSERT INTO tbl_audit VALUES("75","1","Logged out user id 1","2022-11-26 21:40:43");
INSERT INTO tbl_audit VALUES("76","0","Logged in jayson1","2022-11-26 21:41:10");
INSERT INTO tbl_audit VALUES("77","1","Added feedback of customer id 1","2022-11-26 21:41:32");
INSERT INTO tbl_audit VALUES("78","1","Logged out user id 1","2022-11-26 21:41:39");
INSERT INTO tbl_audit VALUES("79","0","Updated an appointment id 15","2022-11-29 21:09:51");
INSERT INTO tbl_audit VALUES("80","0","Updated an appointment id 15","2022-11-29 21:09:53");
INSERT INTO tbl_audit VALUES("81","0","Logged in jayson1","2022-12-01 22:12:47");
INSERT INTO tbl_audit VALUES("82","1","Logged out user id 1","2022-12-01 22:13:54");
INSERT INTO tbl_audit VALUES("83","0","Logged in jayson2","2022-12-01 22:14:12");
INSERT INTO tbl_audit VALUES("84","2","Logged out user id 2","2022-12-01 22:14:46");
INSERT INTO tbl_audit VALUES("85","0","Logged in jayson3","2022-12-01 22:14:52");
INSERT INTO tbl_audit VALUES("86","3","Logged out user id 3","2022-12-01 22:15:08");
INSERT INTO tbl_audit VALUES("87","0","Logged in jayson1","2022-12-01 22:16:50");
INSERT INTO tbl_audit VALUES("88","1","Logged out user id 1","2022-12-01 22:20:06");
INSERT INTO tbl_audit VALUES("89","0","Logged in jayson1","2022-12-01 22:22:23");
INSERT INTO tbl_audit VALUES("90","1","Logged out user id 1","2022-12-01 22:26:12");
INSERT INTO tbl_audit VALUES("91","0","Logged in jayson1","2022-12-01 22:29:37");
INSERT INTO tbl_audit VALUES("92","1","Logged out user id 1","2022-12-01 22:30:28");
INSERT INTO tbl_audit VALUES("93","0","Logged in jayson1","2022-12-01 22:33:41");
INSERT INTO tbl_audit VALUES("94","1","Deleted customer id 3","2022-12-01 22:34:08");
INSERT INTO tbl_audit VALUES("95","1","Retrieved customer id 3","2022-12-01 22:34:32");
INSERT INTO tbl_audit VALUES("96","1","Logged in jayson1","2022-12-01 23:12:01");
INSERT INTO tbl_audit VALUES("97","1","Deactivate user id 1","2022-12-01 23:17:10");
INSERT INTO tbl_audit VALUES("98","1","Deactivate user id 3","2022-12-01 23:17:42");
INSERT INTO tbl_audit VALUES("99","1","Deactivate user id 1","2022-12-01 23:31:44");
INSERT INTO tbl_audit VALUES("100","1","Deactivate user id 2","2022-12-01 23:31:53");
INSERT INTO tbl_audit VALUES("101","1","Activate user id 2","2022-12-01 23:33:07");
INSERT INTO tbl_audit VALUES("102","1","Deactivate user id 2","2022-12-01 23:33:28");
INSERT INTO tbl_audit VALUES("103","1","Deactivate user id 3","2022-12-01 23:33:30");
INSERT INTO tbl_audit VALUES("104","1","Deactivate user id 2","2022-12-01 23:33:31");
INSERT INTO tbl_audit VALUES("105","1","Activate user id 2","2022-12-01 23:33:45");
INSERT INTO tbl_audit VALUES("106","1","Deactivate user id 2","2022-12-01 23:35:06");
INSERT INTO tbl_audit VALUES("107","1","Activate user id 3","2022-12-01 23:35:08");
INSERT INTO tbl_audit VALUES("108","1","Activate user id 2","2022-12-01 23:38:20");
INSERT INTO tbl_audit VALUES("109","1","Activate user id 1","2022-12-01 23:38:22");
INSERT INTO tbl_audit VALUES("110","1","Activate user id 2","2022-12-01 23:38:23");
INSERT INTO tbl_audit VALUES("111","1","Activate user id 1","2022-12-01 23:38:26");
INSERT INTO tbl_audit VALUES("112","1","Deactivate user id 3","2022-12-01 23:38:26");
INSERT INTO tbl_audit VALUES("113","1","Deactivate user id 3","2022-12-01 23:38:28");
INSERT INTO tbl_audit VALUES("114","1","Deactivate user id 3","2022-12-01 23:38:28");
INSERT INTO tbl_audit VALUES("115","1","Deactivate user id 3","2022-12-01 23:38:29");
INSERT INTO tbl_audit VALUES("116","1","Deactivate user id 3","2022-12-01 23:38:29");
INSERT INTO tbl_audit VALUES("117","1","Deactivate user id 3","2022-12-01 23:38:30");
INSERT INTO tbl_audit VALUES("118","1","Deactivate user id 3","2022-12-01 23:38:30");
INSERT INTO tbl_audit VALUES("119","1","Deactivate user id 3","2022-12-01 23:38:30");
INSERT INTO tbl_audit VALUES("120","1","Deactivate user id 3","2022-12-01 23:38:30");
INSERT INTO tbl_audit VALUES("121","1","Deactivate user id 3","2022-12-01 23:38:30");
INSERT INTO tbl_audit VALUES("122","1","Deactivate user id 3","2022-12-01 23:38:31");
INSERT INTO tbl_audit VALUES("123","1","Deactivate user id 3","2022-12-01 23:38:31");
INSERT INTO tbl_audit VALUES("124","1","Deactivate user id 3","2022-12-01 23:38:31");
INSERT INTO tbl_audit VALUES("125","1","Deactivate user id 3","2022-12-01 23:38:31");
INSERT INTO tbl_audit VALUES("126","1","Deactivate user id 3","2022-12-01 23:38:31");
INSERT INTO tbl_audit VALUES("127","1","Activate user id 2","2022-12-01 23:38:35");
INSERT INTO tbl_audit VALUES("128","1","Activate user id 2","2022-12-01 23:38:37");
INSERT INTO tbl_audit VALUES("129","1","Deactivate user id 2","2022-12-01 23:39:03");
INSERT INTO tbl_audit VALUES("130","1","Deactivate user id 2","2022-12-01 23:39:04");
INSERT INTO tbl_audit VALUES("131","1","Activate user id 3","2022-12-01 23:39:05");
INSERT INTO tbl_audit VALUES("132","1","Activate user id 3","2022-12-01 23:39:05");
INSERT INTO tbl_audit VALUES("133","1","Activate user id 2","2022-12-01 23:39:18");
INSERT INTO tbl_audit VALUES("134","1","Deactivate user id 1","2022-12-01 23:39:19");
INSERT INTO tbl_audit VALUES("135","1","Deactivate user id 1","2022-12-01 23:39:20");
INSERT INTO tbl_audit VALUES("136","1","Deactivate user id 3","2022-12-01 23:39:21");
INSERT INTO tbl_audit VALUES("137","1","Deactivate user id 3","2022-12-01 23:39:23");
INSERT INTO tbl_audit VALUES("138","1","Deactivate user id 2","2022-12-01 23:41:13");
INSERT INTO tbl_audit VALUES("139","1","Deactivate user id 2","2022-12-01 23:41:15");
INSERT INTO tbl_audit VALUES("140","1","Activate user id 1","2022-12-01 23:41:56");
INSERT INTO tbl_audit VALUES("141","1","Activate user id 1","2022-12-01 23:41:57");
INSERT INTO tbl_audit VALUES("142","1","Activate user id 2","2022-12-01 23:41:59");
INSERT INTO tbl_audit VALUES("143","1","Activate user id 2","2022-12-01 23:42:00");
INSERT INTO tbl_audit VALUES("144","1","Activate user id 2","2022-12-01 23:42:00");
INSERT INTO tbl_audit VALUES("145","1","Deactivate user id 2","2022-12-01 23:42:17");
INSERT INTO tbl_audit VALUES("146","1","Deactivate user id 2","2022-12-01 23:42:17");
INSERT INTO tbl_audit VALUES("147","1","Deactivate user id 2","2022-12-01 23:42:18");
INSERT INTO tbl_audit VALUES("148","1","Deactivate user id 2","2022-12-01 23:42:19");
INSERT INTO tbl_audit VALUES("149","1","Activate user id 2","2022-12-01 23:43:31");
INSERT INTO tbl_audit VALUES("150","1","Deactivate user id 1","2022-12-01 23:43:33");
INSERT INTO tbl_audit VALUES("151","1","Activate user id 2","2022-12-01 23:43:35");
INSERT INTO tbl_audit VALUES("152","1","Deactivate user id 1","2022-12-01 23:43:37");
INSERT INTO tbl_audit VALUES("153","1","Deactivate user id 1","2022-12-01 23:43:38");
INSERT INTO tbl_audit VALUES("154","1","Activate user id 3","2022-12-01 23:43:41");
INSERT INTO tbl_audit VALUES("155","1","Activate user id 3","2022-12-01 23:43:42");
INSERT INTO tbl_audit VALUES("156","1","Activate user id 3","2022-12-01 23:43:42");
INSERT INTO tbl_audit VALUES("157","1","Deactivate user id 2","2022-12-01 23:44:35");
INSERT INTO tbl_audit VALUES("158","1","Deactivate user id 3","2022-12-01 23:44:37");
INSERT INTO tbl_audit VALUES("159","1","Deactivate user id 3","2022-12-01 23:44:39");
INSERT INTO tbl_audit VALUES("160","1","Deactivate user id 2","2022-12-01 23:44:41");
INSERT INTO tbl_audit VALUES("161","1","Activate user id 1","2022-12-01 23:44:42");
INSERT INTO tbl_audit VALUES("162","1","Activate user id 1","2022-12-01 23:44:44");
INSERT INTO tbl_audit VALUES("163","1","Activate user id 1","2022-12-01 23:44:45");
INSERT INTO tbl_audit VALUES("164","1","Activate user id 1","2022-12-01 23:44:46");
INSERT INTO tbl_audit VALUES("165","1","Activate user id 2","2022-12-01 23:45:51");
INSERT INTO tbl_audit VALUES("166","1","Activate user id 3","2022-12-01 23:45:56");
INSERT INTO tbl_audit VALUES("167","1","Deactivate user id 2","2022-12-01 23:45:59");
INSERT INTO tbl_audit VALUES("168","1","Activate user id 2","2022-12-01 23:46:24");
INSERT INTO tbl_audit VALUES("169","1","Deactivate user id 2","2022-12-01 23:46:50");
INSERT INTO tbl_audit VALUES("170","1","Logged out user id 1","2022-12-01 23:47:33");
INSERT INTO tbl_audit VALUES("171","0","Logged in jayson1","2022-12-01 23:47:49");
INSERT INTO tbl_audit VALUES("172","1","Deactivate user id 1","2022-12-01 23:47:56");
INSERT INTO tbl_audit VALUES("173","1","Activate user id 2","2022-12-01 23:50:30");
INSERT INTO tbl_audit VALUES("174","0","Logged in jayson1","2022-12-02 21:11:35");
INSERT INTO tbl_audit VALUES("175","1","Activate user id 1","2022-12-02 21:12:03");
INSERT INTO tbl_audit VALUES("176","1","Logged out user id 1","2022-12-02 21:21:35");
INSERT INTO tbl_audit VALUES("177","0","Logged in jayson1","2022-12-02 21:22:31");
INSERT INTO tbl_audit VALUES("178","1","Logged in jayson1","2022-12-02 23:47:38");
INSERT INTO tbl_audit VALUES("179","1","Edited promotion id 1","2022-12-02 23:47:50");
INSERT INTO tbl_audit VALUES("180","1","Edited promotion id 1","2022-12-02 23:47:55");
INSERT INTO tbl_audit VALUES("181","1","Logged out user id 1","2022-12-02 23:48:34");
INSERT INTO tbl_audit VALUES("182","0","Logged in jayson1id 1","2022-12-03 00:36:36");



CREATE TABLE `tbl_backup` (
  `BACKUP_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(10) NOT NULL,
  `BACKUP_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `BACKUP_FILE` varchar(50) NOT NULL,
  PRIMARY KEY (`BACKUP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_backup VALUES("1","1","2022-11-24 15:12:29","_backup_1669273949.sql");
INSERT INTO tbl_backup VALUES("2","1","2022-11-24 15:13:08","_backup_1669273988.sql");
INSERT INTO tbl_backup VALUES("3","1","2022-11-24 15:14:20","_backup_1669274060.sql");
INSERT INTO tbl_backup VALUES("4","1","2022-11-24 15:15:11","_backup_1669274111.sql");
INSERT INTO tbl_backup VALUES("5","1","2022-11-24 15:15:34","_backup_1669274134.sql");
INSERT INTO tbl_backup VALUES("6","1","2022-11-24 15:16:21","_backup_1669274181.sql");
INSERT INTO tbl_backup VALUES("7","1","2022-11-24 15:22:39","_backup_1669274559.sql");
INSERT INTO tbl_backup VALUES("8","1","2022-11-24 15:23:11","_backup_1669274591.sql");
INSERT INTO tbl_backup VALUES("9","1","2022-11-24 15:23:26","_backup_1669274606.sql");
INSERT INTO tbl_backup VALUES("10","1","2022-11-24 22:14:22","_backup_1669299262.sql");



CREATE TABLE `tbl_banner` (
  `BANNER_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `BANNER_NAME` varchar(25) NOT NULL,
  `BANNER_IMAGE` varchar(200) NOT NULL,
  `BANNER_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `BANNER_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`BANNER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_banner VALUES("1","0","34","Promotion-2022-12-02_23-47-50.jpg","2022-11-22 08:28:58","1");
INSERT INTO tbl_banner VALUES("2","0","Ads 2","Promotion-2022-11-22_08-47-50.jpg","2022-11-22 08:47:50","1");
INSERT INTO tbl_banner VALUES("3","0","3","Promotion-2022-11-22_08-48-01.jpg","2022-11-22 08:48:01","1");
INSERT INTO tbl_banner VALUES("4","0","4123333234234","Promotion-2022-11-24_17-30-33.webp","2022-11-22 08:48:10","1");



CREATE TABLE `tbl_category` (
  `CATEGORY_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CREATED_BY` int(10) NOT NULL,
  `CATEGORY_NAME` varchar(50) NOT NULL,
  `CATEGORY_DESCRIPTION` varchar(500) NOT NULL,
  `CATEGORY_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `CATEGORY_STATUS` int(2) NOT NULL,
  `CATEGORY_PICTURE` varchar(500) NOT NULL,
  PRIMARY KEY (`CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_category VALUES("1","1","Nail Services","All about nail service","2022-11-17 10:29:38","1","");
INSERT INTO tbl_category VALUES("2","1","Hair Services","All about hair services","2022-11-17 12:38:31","1","");
INSERT INTO tbl_category VALUES("3","1","Makeup Services","All about makeup services","2022-11-17 12:38:31","1","");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_customer VALUES("1","0","JFeguis","Jayson Bobadilla Feguis","9123456789","Female","RA 16 Caneville, Tabing-Ilog","2022-11-24 14:15:05","Customer-2022-11-24_17-00-02.jpg","1");
INSERT INTO tbl_customer VALUES("2","0","JFeguis","Jayson Bobadilla Feguis","9153456789","Male","RA 16 Caneville, Tabing-Ilog","2022-11-24 16:45:11","Customer-2022-11-24_16-45-11.jpg","1");
INSERT INTO tbl_customer VALUES("3","0","Jayson Bobadilla Feguis","jaysonfeguis121714@gmail.com","9519777916","Male","RA 16 Caneville, Tabing-Ilog","2022-11-24 16:45:42","Customer-2022-11-24_17-12-28.jpg","1");



CREATE TABLE `tbl_feedback` (
  `FEEDBACK_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(10) NOT NULL,
  `CREATED_BY` int(10) NOT NULL,
  `FEEDBACK_CONTENT` varchar(1000) NOT NULL,
  `FEEDBACK_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  `FEEDBACK_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`FEEDBACK_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_feedback VALUES("1","1","0","Excellent service. Staff are very welcoming and entertaining. The hair specialist who assisted me and did my hair nicely and neat, knows very well he is doing (Gella is the name if i remember it correctly). Definitely will come back here again and I highly recommend this to my friends and who ever can see this review. Kuddos! and thanks!","2022-11-24 14:15:20","1");
INSERT INTO tbl_feedback VALUES("2","1","0","123","2022-11-26 21:41:32","1");



CREATE TABLE `tbl_invoice` (
  `INVOICE_NUMBER` int(10) NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(10) NOT NULL,
  `CREATED_BY` int(10) NOT NULL,
  `INVOICE_DATETIME_CREATED` datetime DEFAULT NULL,
  PRIMARY KEY (`INVOICE_NUMBER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `tbl_invoice_detail` (
  `INVOICE_DETAIL_ID` int(10) NOT NULL AUTO_INCREMENT,
  `INVOICE_NUMBER` int(10) NOT NULL,
  `SERVICE_ID` int(10) NOT NULL,
  `NVOICE_DETAIL_DATETIME_CREATED` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`INVOICE_DETAIL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_product VALUES("1","Hair Color","Color: Maroon
For external use only","1500.00","2022-11-20 15:16:10","1","Product-2022-11-20_15-16-10.jpg","0");
INSERT INTO tbl_product VALUES("2","Hair Conditioner","Apply with water","10.00","2022-11-20 15:16:58","1","Product-2022-11-20_15-16-58.jpg","0");
INSERT INTO tbl_product VALUES("3","Creamsilk","use for hair","13.00","2022-11-20 16:26:46","1","Product-2022-11-20_16-26-46.jpg","0");
INSERT INTO tbl_product VALUES("4","Hair Iron","Warrant: 7days","1399.00","2022-11-20 16:28:11","1","Product-2022-11-20_16-28-11.jpg","0");
INSERT INTO tbl_product VALUES("5","Hair Oil","Used for hair","140.00","2022-11-20 16:30:14","1","Product-2022-11-20_16-30-14.jpg","0");
INSERT INTO tbl_product VALUES("6","Store Map","Location","10.99","2022-11-20 16:31:47","1","Product-2022-11-20_16-31-47.png","0");
INSERT INTO tbl_product VALUES("7","Hello World","1","1.00","2022-11-21 22:01:54","1","Product-2022-11-24_17-21-49.jpg","0");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_service VALUES("1","1","1","Nail Polish","120.00","2022-11-17 10:30:20","Service-2022-11-24_14-44-28.jpg","1");
INSERT INTO tbl_service VALUES("2","1","1","Foot Spa","300.00","2022-11-17 10:35:57","Service-2022-11-24_14-44-38.jpg","1");
INSERT INTO tbl_service VALUES("3","1","1","Nail Polish A","150.00","2022-11-17 10:37:28","Service-2022-11-24_14-44-47.jpg","1");
INSERT INTO tbl_service VALUES("4","2","1","Rebo234","1500.00","2022-11-17 12:39:56","Service-2022-11-24_17-40-56.jpg","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_user VALUES("1","jayson1","!Jayson123","Jayson","Feguis","jayson@gmail.com","9123456789","1","1","2022-11-17 10:28:29","User-2022-11-24_17-41-46.jpg","1");
INSERT INTO tbl_user VALUES("2","jayson2","!Jayson123","Jayson","Feguis","jayson123@gmail.com","9123456879","1","2","2022-11-24 21:17:32","User-2022-11-24_21-17-32.jpg","1");
INSERT INTO tbl_user VALUES("3","jayson3","!Jayson123","Jayson","Feguis","jysnbbdllfgs@gmail.com","9123456789","1","3","2022-11-24 21:18:20","User-2022-11-24_21-18-20.png","1");

