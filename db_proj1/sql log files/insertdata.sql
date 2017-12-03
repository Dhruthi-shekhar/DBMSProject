insert into STATIONS values("1531","Bangalore"),("1783","Mysore"),("1283","Mumbai"),("8746","Hubli");

INSERT INTO DISCOUNTS (Age, Disability, Discount) VALUES
(0, "N", 50),
(0, "Y", 70),
(6, "N", 0),
(6, "Y", 40),
(60, "N", 40),
(60, "Y", 80);

insert into TRAIN values(1234,"Tippu Express",5,10,20,120,100,80,"Bangalore","Hubli"),(5678,"B-M Express",6,11,21,200,180,100,"Bangalore","Mumbai"),(9101,"Kempegowda Express",7,12,22,120,80,60,"Mysore","Bangalore"),(1213,"Yeshwanthpur express",8,13,23,120,100,80,"Hubli","Bangalore");

INSERT INTO RESERVATION (Train_ID, Seats_available_in_waiting, Reservation_Date, Class, Seats) VALUES
("1234", 5, "2020-11-17", 1, 5),
("1234", 5, "2020-11-17", 2, 10),
("1234", 5,"2020-11-17", 3, 20),
("5678", 5, "2021-11-17", 1, 6),
("5678", 5, "2021-11-17", 2, 11),
("5678", 5, "2021-11-17", 3, 21);

insert into TRAIN_ROUTES values("1234","Bangalore","Hubli","18:00","21:00"),("5678","Bangalore","Mumbai","21:00","06:00"),("9101","Mysore","Bangalore","10:00","13:00"),("1213","Hubli","Bangalore","21:00","06:00");

insert into TRAIN_AVAILABILITY values("1234","20/11/17"),("5678","21/11/17"),("9101","22/11/17"),("1213","23/11/17"),("1234","24/11/17"),("5678","25/11/17"),("9101","26/11/17"),("1213","27/11/17");

