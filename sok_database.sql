

CREATE TABLE `employee` (
  `emp_id` varchar(11) NOT NULL,
  `emp_user` varchar(255) NOT NULL,
  `emp_pass` varchar(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_phone` varchar(10) DEFAULT NULL,
  `emp_level` int(1) DEFAULT 1,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO employee VALUES("adminsun01","adminsun","adminsun","จิรายุทธ","มิตรอธิพันธ์","ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120","0984644447","3");
INSERT INTO employee VALUES("charkit01","charkit","charkit","สมหมาย","มือถือ","เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ","0611465166","1");
INSERT INTO employee VALUES("sunny01","jirayut","jirayut","อเนกต์","ประสงค์","ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120","0984644447","1");
INSERT INTO employee VALUES("taray01","taray","taray","ชาคริต","โชติ","เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ","0984442919","2");
INSERT INTO employee VALUES("w1213","awdaw","awdaw","dawd","wdawda","awdaw","1231231222","1");
INSERT INTO employee VALUES("wanchai101","wanchai","wanchai","วันชัย","แซ่ลิ้ม","124 หนองกระทุ่ม อ.เมือง จ.นครราชสีมา","0979645942","1");



CREATE TABLE `inventory` (
  `inv_id` varchar(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_image` text NOT NULL,
  `inv_qty` int(11) NOT NULL DEFAULT 0,
  `inv_min` int(11) DEFAULT NULL,
  `inv_size` varchar(64) DEFAULT NULL,
  `inv_sub_id` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO inventory VALUES("awd001","น้ำเงินเข้ม","product221011054720948556312.jpg","88","0","XL","awd001L");
INSERT INTO inventory VALUES("awd001L","น้ำเงินเข้ม","product221011054720948556312.jpg","0","0","L","");
INSERT INTO inventory VALUES("P0001","แดงสด","product220928091025362843737.jpg","212","0","XL","P0001L");
INSERT INTO inventory VALUES("P0001L","แดงสด","product220922075052824375242.jpg","8","0","L","");
INSERT INTO inventory VALUES("P0002","ดำน้ำเงิน","product220922075110864403562.jpg","2","0","XL","P0002L");
INSERT INTO inventory VALUES("P0002L","ดำน้ำเงิน","product220922075110864403562.jpg","1","0","L","");
INSERT INTO inventory VALUES("P0003","ดำด้าน","product220928085751429695178.jpg","44","0","XL","P0003L");
INSERT INTO inventory VALUES("P0003L","ดำด้าน","product220922075128397224401.jpg","0","0","L","");
INSERT INTO inventory VALUES("p00awd","แดงจ๊าด","product221010053159721337948.jpg","15","20","XL","p00awdL");
INSERT INTO inventory VALUES("p00awdL","แดงจ๊าด","product221002033142491402077.jpg","10","0","L","");



CREATE TABLE `reported` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `report_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO reported VALUES("1","sok2022-09-21_02-43-13-pm.pdf","2022-09-21 19:43:13");
INSERT INTO reported VALUES("2","sok2022-09-28_04-12-46-pm.pdf","2022-09-28 21:12:46");
INSERT INTO reported VALUES("3","sok2022-10-02_03-41-34-pm.pdf","2022-10-02 20:41:34");
INSERT INTO reported VALUES("4","sok2022-10-10_05-33-15-am.pdf","2022-10-10 10:33:15");
INSERT INTO reported VALUES("5","sok2022-10-11_05-42-47-am.pdf","2022-10-11 10:42:47");
INSERT INTO reported VALUES("6","sok2022-10-11_06-52-14-am.pdf","2022-10-11 11:52:14");
INSERT INTO reported VALUES("7","sok2022-10-11_07-16-47-am.pdf","2022-10-11 12:16:47");



CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_company` varchar(255) NOT NULL,
  `sup_address` text NOT NULL,
  `sup_email` varchar(255) DEFAULT NULL,
  `sup_phone` varchar(10) DEFAULT NULL,
  `sale_name` varchar(255) NOT NULL,
  `sale_position` varchar(255) NOT NULL,
  `sale_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO supplier VALUES("1","บริษัท กัลฟ์ เอ็นเนอร์จี ดีเวลลอปเมนท์ จำกัด (มหาชน)","87 อาคาร เอ็มไทย ทาวเวอร์ ออลซีซั่น เพลส ชั้น 11 ถนนวิทยุ แขวงลุมพินี เขตปทุมวัน กรุงเทพมหานคร 10330","sustainability@gulf.co.th","0208044990","นายสมพงษ์ มะนาว","พนักงานขาย","0984151963");
INSERT INTO supplier VALUES("2","กันกุล เอ็นจิเนียริ่ง จำกัด (มหาชน)","1177 อาคารเพิร์ล แบงก์ค็อก ถ. พหลโยธิน แขวง พญาไท เขตพญาไท กรุงเทพมหานคร 10400","ir@gunkul.com","0224258000","นางสาวซาร่า จอร์จ","พนักงาน","0821519592");
INSERT INTO supplier VALUES("3","บริษัท แสนสิริ จำกัด (มหาชน)","เลขที่ 59 ซอยริมคลองพระโขนง​ แขวงพระโขนงเหนือ
เขตวัฒนา​ กรุงเทพมหานคร 10110","cs@sansiri.com","0202778888","นางสาวแม่มณี ทองสุก","พนักงานขาย","0912555995");
INSERT INTO supplier VALUES("4","บริษัท คอมเซเว่น จำกัด (มหาชน)","549/1 ถนนสรรพาวุธ แขวงบางนาใต้ เขตบางนา กรุงเทพมหานคร 10260","ir@comseven.com","0201777777","นางสาวออมเงิน ถอนยาก","พนักงานขาย","0983619878");



CREATE TABLE `transfer` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `t_status` int(1) NOT NULL,
  `t_qty` int(11) unsigned NOT NULL,
  `emp_id` varchar(11) DEFAULT NULL,
  `inv_id` varchar(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  KEY `fk_emp` (`emp_id`),
  KEY `fk_inv_trans` (`inv_id`),
  KEY `fk_sup_trans` (`sup_id`),
  CONSTRAINT `fk_emp_trans` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inv_trans` FOREIGN KEY (`inv_id`) REFERENCES `inventory` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sup_trans` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO transfer VALUES("1","2022-09-22 12:51:53","1","48","wanchai101","P0003","4");
INSERT INTO transfer VALUES("2","2022-09-22 12:52:08","2","4","wanchai101","P0003","4");
INSERT INTO transfer VALUES("3","2022-09-28 13:58:11","1","3","wanchai101","P0002","2");
INSERT INTO transfer VALUES("4","2022-09-28 13:58:21","2","1","wanchai101","P0002","2");
INSERT INTO transfer VALUES("5","2022-09-28 14:11:46","1","222","wanchai101","P0001","1");
INSERT INTO transfer VALUES("6","2022-09-28 14:11:56","2","10","wanchai101","P0001","1");
INSERT INTO transfer VALUES("7","2022-09-28 14:12:03","2","2","wanchai101","P0001L","1");
INSERT INTO transfer VALUES("8","2022-10-02 20:36:29","1","15","sunny01","p00awd","2");
INSERT INTO transfer VALUES("10","2022-10-11 10:48:27","1","93","wanchai101","awd001","3");
INSERT INTO transfer VALUES("11","2022-10-11 10:49:45","2","5","wanchai101","awd001","3");

