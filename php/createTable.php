<html>
<head><title>Database Table Loading...</title></head>
<body>

<?php

 $host = "localhost";
 $username = "cisc332";
 $password = "cisc332password";
 $db_name = "KTCSNew";

   
$cxn = mysqli_connect($host,$username,$password, $db_name);
 // Check connection
 if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
  }

   // mysqli_query($cxn,"FLUSH TABLES;"); 

   mysqli_query($cxn,"drop table Car;");
   mysqli_query($cxn,"drop table Member;");
   mysqli_query($cxn,"drop table Admin");
   mysqli_query($cxn,"drop table Reservation;");
   mysqli_query($cxn,"drop table MemberRentalHistory;");
   mysqli_query($cxn,"drop table StatusType;");
   mysqli_query($cxn,"drop table CarRentalHistory;");
   mysqli_query($cxn,"drop table MaintenanceType;");
   mysqli_query($cxn,"drop table Maintenance;");
   mysqli_query($cxn,"drop table Location;");
   mysqli_query($cxn,"drop table Review;");
   mysqli_query($cxn,"drop table WriteReview;");
   mysqli_query($cxn,"drop table AdminResponse;");
   mysqli_query($cxn,"drop table MakeRes;");
   mysqli_query($cxn,"drop table CarLocated;");
   


   mysqli_query($cxn,"CREATE TABLE Car(
                VIN                       VARCHAR(40)    NOT NULL,
                Make                      CHAR(20)       NOT NULL,
                Model                     CHAR(20)       NOT NULL,
                Year                      YEAR           NOT NULL,               
                CurrentStatus             CHAR(20)       NOT NULL,
                LastORead       		  INTEGER,
                LastGasRead        		  INTEGER,
                DateMaintain              DATE,
                MaintainOdomterReading    INTEGER,
                PRIMARY KEY (VIN))ENGINE=InnoDB DEFAULT CHARSET=latin1;");

   mysqli_query($cxn,"CREATE TABLE Member (
                MNO                  INTEGER        NOT NULL,
                License              VARCHAR(40)    NOT NULL,
                FName                CHAR(20)       NOT NULL,
                LName                CHAR(20)       NOT NULL,
                Address              VARCHAR(40)	NOT NULL,
                City                 CHAR(40)    	NOT NULL,
                Province             CHAR(5)    	NOT NULL,
                Country              CHAR(40)    	NOT NULL,
                PhoneNo              BIGINT         NOT NULL,
                Email                VARCHAR(40)	NOT NULL,
                RegistrationDate     DATE	        NOT NULL,
                CreditNo     		 BIGINT         NOT NULL,
                CreditExpDate        DATE	        NOT NULL,
                
                MonthlyFee           INTEGER	    NOT NULL,
                -- UsageFee             INTEGER	    NOT NULL,
                Password             VARCHAR(40)    NOT NULL,
				PRIMARY KEY (MNO, License));");
				
	mysqli_query($cxn,"CREATE TABLE Admin(
                ID          BIGINT      NOT NULL,
                FName       CHAR(20)    NOT NULL,
                LName       CHAR(20)    NOT NULL,
				Position	CHAR(20)	NOT NULL,		
				Password	VARCHAR(40)	NOT NULL,
                PRIMARY KEY (ID));");			


   mysqli_query($cxn,"CREATE TABLE Reservation(
                ResNo       	VARCHAR(40)     NOT NULL,
                PickUPDate      DATE	        NOT NULL,
                PickUPTime      TIME	        NOT NULL,
                DropOFFDate     DATE	        NOT NULL,
                DropOFFTime     TIME	        NOT NULL,
                ResStatus    	CHAR(20)	    NOT NULL,
                PRIMARY KEY (ResNo));");
 
   mysqli_query($cxn,"CREATE TABLE MemberRentalHistory(
                ResNo       VARCHAR(40)    NOT NULL,
                MNO         INTEGER        NOT NULL,
                PRIMARY KEY (ResNo),
				FOREIGN KEY (ResNo) REFERENCES Reservation(ResNo),
				FOREIGN KEY (MNO) REFERENCES Member(MNO));");

   mysqli_query($cxn,"CREATE TABLE StatusType(
                StatusID       	INTEGER    	 NOT NULL,
                SName     		CHAR(20)  NOT NULL,               
                PRIMARY KEY (StatusID));");
   
   mysqli_query($cxn,"CREATE TABLE CarRentalHistory(
                ResNo       	VARCHAR(40)    NOT NULL,
                VIN         	VARCHAR(40)    NOT NULL,
                OReadPickup     INTEGER	       NOT NULL,
                OReadDropoff    INTEGER	       NOT NULL,
                StatusID		INTEGER	       NOT NULL,
                PRIMARY KEY (ResNo, VIN),
                FOREIGN KEY (StatusID) REFERENCES StatusType(StatusID),
				FOREIGN KEY (ResNo) REFERENCES Reservation(ResNo));");

   mysqli_query($cxn,"CREATE TABLE MaintenanceType(
                MTypeID       	INTEGER    	 NOT NULL,
                MName     		VARCHAR(40)  NOT NULL,               
                PRIMARY KEY (MTypeID));");

   mysqli_query($cxn,"CREATE TABLE Maintenance(
                MaintenanceID   INTEGER    	 NOT NULL,
                VIN         	VARCHAR(40)  NOT NULL,
                Date			DATE	     NOT NULL,
                MTypeID       	INTEGER    	 NOT NULL,
                MDescription    VARCHAR(1000)   NOT NULL,               
                PRIMARY KEY (MaintenanceID),
                FOREIGN KEY (VIN) REFERENCES Car(VIN),
				FOREIGN KEY (MTypeID) REFERENCES MaintenanceType(MTypeID));");


   mysqli_query($cxn,"CREATE TABLE Location(
                LocID				INTEGER			NOT NULL,
                Address             VARCHAR(40)		NOT NULL,
                City                 CHAR(40)    	NOT NULL,
                Province             CHAR(5)    	NOT NULL,
                Country              CHAR(40)    	NOT NULL,
                NumSpace            INTEGER	    	NOT NULL,
                PRIMARY KEY (LocID, Address));"); 
   				// PRIMARY KEY (Address)
				
   mysqli_query($cxn,"CREATE TABLE Review(
				        ReviewID			INTEGER			NOT NULL,
                CarReviewed            VARCHAR(40)    NOT NULL,
                ReviewText             VARCHAR(1000)   NOT NULL,
				PRIMARY KEY (ReviewID),
				FOREIGN KEY (CarReviewed) REFERENCES Car(VIN));");				
   
   mysqli_query($cxn,"CREATE TABLE WriteReview(
                ReviewID       INTEGER   NOT NULL,
                MNO             INTEGER   NOT NULL,
                FOREIGN KEY (ReviewID) REFERENCES Review(ReviewID),
				FOREIGN KEY (MNO) REFERENCES Member(MNO));");
				
	mysqli_query($cxn,"CREATE TABLE AdminResponse(
                ReviewID      INTEGER   	NOT NULL,
                ID             BIGINT       NOT NULL,
				ReplyText      VARCHAR(1000)   NOT NULL,
				FOREIGN KEY (ReviewID) REFERENCES Review(ReviewID),
				FOREIGN KEY (ID) REFERENCES Admin(ID));");

	   mysqli_query($cxn,"CREATE TABLE CarLocated(
   				VIN			VARCHAR(40)	    NOT NULL,
                LocID		INTEGER			NOT NULL,
                Address		VARCHAR(40)     NOT NULL,
                FOREIGN KEY (LocID, Address) REFERENCES Location(LocID, Address),
				FOREIGN KEY (VIN) REFERENCES Car(VIN));");
   
   mysqli_query($cxn,"CREATE TABLE MakeRes(
                ResNo       VARCHAR(40)    NOT NULL,
                VIN         VARCHAR(40)    NOT NULL,
                MNO         INTEGER        NOT NULL,
				FOREIGN KEY (ResNo) REFERENCES Reservation(ResNo),
				FOREIGN KEY (VIN) REFERENCES Car(VIN),
				FOREIGN KEY (MNO) REFERENCES Member(MNO));");

  
				
   //VIN, Make, Model, Year, CurrentStatus, LastORead, LastGasRead, DateMaintain, MaintainOdomterReading
   mysqli_query($cxn,"INSERT INTO Car VALUES
            ('A123', 'Porsche', 'Cayenne', 	'2009', 'in-use', 		'6000', '9', 		'2016-10-12', '178'),
            ('B345', 'Toyota', 	'Corolla', 	'2013', 'available', 	'128', '5', 		'2017-03-30', '100'),
            ('D156', 'BMW', 	'X6', 		'2012', 'available', 	'200', '5', 		'2016-11-20', '200'),
			('C123', 'Ford', 	'Escape', 	'2015', 'available', 	'10000', '5', 		'2016-03-30', '65'),
			('F435', 'Toyota', 	'Camry', 	'2012', 'in-use', 		'7000', '9', 		'2016-09-12', '190'),
			('C789', 'BMW', 	'X3', 		'2011', 'out-for-maintenance', '250', '6', '2014-01-07', '98'),
			('G873', 'Volkswagen', 'Beetle','2014',	'in-use', 		'6000', '9', 		'2016-10-12', '178'),
            ('B435', 'Jeep', 	'Wrangler', '2010', 'available', 	'500', '5', 		'2016-03-30', '100'),
			('E312', 'BMW', 	'X4', 		'2012', 'available', 	'200', '5',		 	'2016-11-20', '200');");

   //MNO, License, FName, LName, Address, City, Province, Country, PhoneNo, Email, RegistrationDate, CreditNo, CreditExpDate, MonthlyFee, Password
   mysqli_query($cxn,"INSERT INTO Member VALUES
            ('12435678', 'WAN-123',	'Franz', 	'Ferdinand', '478 Earl Street', 'Kingston', 'ON', 'Canada', '6131237899', 'birdinand@live.com', '2015-01-12', '4520111188887467', '2018-09-00', '10','franz123'),
            ('74234130', 'HBX-369', 'Lisa', 	'Prince', '980 Earl Street', 	'Kingston', 'ON', 'Canada', '6137483647', 'prince@shaw.ca', '2015-08-01', '4520388273624771', '2018-08-01', '10', 'lisa123'),
            ('56780990', 'HBX-499', 'Russle',	'Crowe', '1231 Walson Avenue', 	'Kingston', 'ON', 'Canada', '6047897901', 'rcrowe@gmail.com','2015-07-29', '4520978621098123', '2020-01-00', '10','crowe123'),
            ('34130197', 'HMC-465', 'Peter', 	'Taylor', '121 Maths Street', 	'Kingston', 'ON', 'Canada', '2147483647', 'ptaylor@hotmail.com', '2016-01-01', '5837746273624771', '2018-08-01', '10', 'pete123'),
            ('19734130', 'ASS-566', 'Jesus', 	'Joseph', '89 Abc Street', 		'Kingston', 'ON', 'Canada', '6139723632', 'jesusj@queensu.ca','2015-01-09', '4520129873019281', '2017-07-02', '10', 'jesus789'),          
            ('19374130','RFR-436', 	'Mark', 	'Smith', '286 Brock Street', 	'Kingston', 'ON', 'Canada', '4167483647', 'smith@gmail.com', '2014-08-01', '5837388273624771', '2018-08-01', '10', 'smith123'),
			('32134130', 'RBX-345',	'Richard', 	'Birch', '879 McEwen Drive',	'Kingston', 'ON', 'Canada', '4164783647', 'rbirch@gmail.com', '2016-08-01','5837398473624771', '2018-08-01', '10', 'dick123'),
			('97341230', 'LOS-365', 'Lisa ', 	'Laflame', '323 Newsanchor Road', 'Toronto', 'ON', 'Canada', '2147483247', 'llaflame@yahoo.ca', '2016-04-01','4520388210104771', '2018-08-01', '10', 'flame123');");
  
   // ID, FName, LName, Position, Password 
    mysqli_query($cxn, "INSERT INTO Admin values
            ('12345', 'Seema', 'Hejazi', 'Manager', 'abc123'),
            ('54321', 'Alex', 'Poole', 'Manager', 'abc234'),
            ('56789', 'Andrea', 'Kang', 'Staff', 'gce567'),
            ('67890', 'Brad', 'Pitt', 'Staff', 'pitts1');");
			
   // ResNo, PickUPDate, PickUPTime, DropOFFDate, DropOFFTime, ResStatus
   mysqli_query($cxn,"INSERT INTO Reservation values
            ('12345678', '2015-06-01', '12:00:00', '2015-06-03', '12:00:00', 'returned'),
            ('98765432', '2016-03-22', '10:30:00', '2016-03-28', '13:30:00', 'returned'),
            ('34567890', '2016-04-29', '15:00:00', '2016-05-04', '14:30:00', 'returned'),
            ('32765432', '2015-07-10', '10:30:00', '2015-07-11', '13:30:00', 'returned'),
			('98123432', '2016-01-16', '15:00:00', '2016-01-18', '13:30:00', 'returned');");
    
    // ResNo, MNO
    mysqli_query($cxn, "INSERT INTO MemberRentalHistory values
            ('12345678', '19734130'),
            ('98765432', '12435678'),
            ('34567890', '56780990'),
            ('32765432', '19734130'),
            ('98123432', '34130197');");

    // StatusID, SName
    mysqli_query($cxn, "INSERT INTO StatusType values
    		('1', 'normal'),
        	('2', 'damaged'),
        	('3', 'not running');");
    
    // ResNo, VIN, OReadPickup, OReadDropoff, StatusID
    mysqli_query($cxn, "INSERT INTO CarRentalHistory values
            ('12345678', 'A123', '250', '6000', '1'),
            ('98765432', 'B345', '0', '128', '1'),
            ('34567890', 'C789', '120', '250', '1');");

    // MTypeID, MName
    mysqli_query($cxn, "INSERT INTO MaintenanceType values
    		('1', 'scheduled'),
        	('2', 'repair'),
        	('3', 'body work');");

    // MaintenanceID, VIN, Date, MTypeID, MDescription
    mysqli_query($cxn,"INSERT INTO Maintenance values
    	('23', 'A123', '2015-12-03', '1', 'Routine check up, everything is up to standard.'),
		('24', 'B345', '2016-01-20', '2', 'Car not running, repair the starter.'),
		('25', 'D156',  '2016-03-03', '3', 'Scrapes and scratches fixed.'),
		('26', 'C123', '2016-05-05', '1','Routine checkup, all good in the hood.');");

    // LocID, Address, City, Province, Country, NumSpace
    mysqli_query($cxn, "INSERT INTO Location values
    		('1', '568 Princess Street', 'Kingston', 'ON', 'Canada', '30'),
			('2', '1780 Bath Road', 'Kingston', 'ON', 'Canada', '25'),
            ('3', '310 Bay Street','Toronto', 'ON', 'Canada', '20'),
            ('4', '198 Young Avenue','Kingston', 'ON', 'Canada', '17'),
            ('5', '23 River Street','Kingston', 'ON', 'Canada', '35');");

    //ReviewID, CarReviewed, ReviewText
    mysqli_query($cxn, "INSERT INTO Review values
            ('1234', 'A123', 'Thank you for letting me have a wonderful trip.'),
            ('5678', 'C789', 'The car is really comfortable, my family and I have a lot of fun.');");
    
    //ReviewID, MNO
    mysqli_query($cxn, "INSERT INTO WriteReview values
            ('1234', '19734130'),
            ('5678', '56780990');");
			
	//ReviewID, ID, ReplyText
	mysqli_query($cxn, "INSERT INTO AdminResponse values
            ('1234', '54321', 'Thank you for the comment!'),
            ('5678', '56789', 'Thank you for choosing KTCS!');");

	    //VIN, LocID, Address
    mysqli_query($cxn, "INSERT INTO CarLocated values
    		('A123', '3', '310 Bay Street'),
            ('B345', '5', '23 River Street'),
            ('D156', '1', '568 Princess Street'),
			('C123', '1', '568 Princess Street'),
			('F435', '2', '1780 Bath Road'),
			('C789', '4', '198 Young Avenue'),
			('G873', '2', '1780 Bath Road'),
            ('B435', '3', '310 Bay Street'),
			('E312', '3', '310 Bay Street');");
    
    //ResNo, VIN, MNO
    mysqli_query($cxn, "INSERT INTO MakeRes values
			('12345678', 'A123', '19734130'),
            ('98765432', 'B345', '12435678'),
			('34567890','C789', '56780990');");
    


   mysqli_close($cxn); 

echo "Database created...";

?>
</body></html>
