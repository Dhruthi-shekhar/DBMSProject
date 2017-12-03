create table TRAIN(Train_ID varchar(20),Train_Name varchar(20),Seats_Class1 int,Seats_Class2 int,Seats_Class3 int,Fare_class1 int,Fare_class2 int,Fare_class3 int,Source_Station varchar(20),Destination_Station varchar(20));

create table TRAIN_ROUTES(Train_ID varchar(20),Source_Station varchar(20),Destination_Station varchar(20),Source_Station_Time varchar(10),Destination_Station_Time varchar(10));

create table STATIONS(Station_ID varchar(20), Station_Name varchar(20));

create table TRAIN_AVAILABILITY(Train_ID varchar(20),Available_days date);

create table PASSENGER_DETAILS(Passenger_No int,Passenger_Name varchar(20),Age int,Gender varchar(1),Disability varchar(1),Email_ID varchar(20),Source_Station varchar(20),Destination_Station varchar(20));

create table PASSENGER_RESERVATION_DETAILS(Train_ID varchar(20),Passenger_No int,Status varchar(20),Class int,Fare int,Reservation_Date date);

create table DISCOUNTS(Age int, Disability varchar(10),Discount int);

create table RESERVATION(Train_ID varchar(20),Seats int,Seats_available_in_waiting int,Reservation_Date date,Class int);


