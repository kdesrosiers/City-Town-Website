CREATE TABLE `department` (
  `deptID` int(20) NOT NULL AUTO_INCREMENT,
  `deptName` varchar(100) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  PRIMARY KEY (`deptID`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

CREATE TABLE `feedback` (
  `feedbackID` int(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(40) NOT NULL,
  `concernType` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `dateSubmitted` varchar(25) NOT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`feedbackID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

CREATE TABLE `forms` (
  `formID` int(20) NOT NULL AUTO_INCREMENT,
  `type_ID` int(20) NOT NULL,
  `user_ID` int(20) NOT NULL,
  `submitDate` varchar(25) NOT NULL,
  `reviewEmp` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `AlarmAd` varchar(100) NOT NULL,
  `AD` varchar(50) NOT NULL,
  `TA` varchar(50) NOT NULL,
  `LO` varchar(75) NOT NULL,
  `CS` varchar(100) NOT NULL,
  `ACname` varchar(100) NOT NULL,
  `ACaddress` varchar(100) NOT NULL,
  `ACphone` varchar(15) NOT NULL,
  `Ename1` varchar(50) NOT NULL,
  `Ephone1` varchar(15) NOT NULL,
  `Ename2` varchar(50) NOT NULL,
  `Ephone2` varchar(15) NOT NULL,
  `Ename3` varchar(50) DEFAULT NULL,
  `Ephone3` varchar(15) DEFAULT NULL,
  `appElecSig` varchar(50) NOT NULL,
  `police` int(20) DEFAULT NULL,
  `fire` int(20) DEFAULT NULL,
  `clerk` int(20) DEFAULT NULL,
  `administrator` int(20) DEFAULT NULL,
  `curdepartment` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`formID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

CREATE TABLE `payments` (
  `paymentId` int(20) NOT NULL AUTO_INCREMENT,
  `user_ID` int(20) NOT NULL,
  `ccSecCode` int(3) NOT NULL,
  `ccType` varchar(30) NOT NULL,
  `form_ID` int(20) NOT NULL,
  `amountPaid` decimal(10,2) NOT NULL,
  `ccExpDate` varchar(25) DEFAULT NULL,
  `ccNumber` varchar(256) NOT NULL,
  PRIMARY KEY (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

CREATE TABLE `typeOfForm` (
  `typeID` int(20) NOT NULL AUTO_INCREMENT,
  `formType` varchar(100) NOT NULL,
  `startdept` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `userName` varchar(40) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `fName` varchar(25) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `secQuest` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `cellNumber` varchar(15) DEFAULT NULL,
  `dept_ID` int(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `dateSigned` datetime DEFAULT NULL,
  `questions` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;