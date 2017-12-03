alter table STATIONS add primary key(Station_Name);

alter table DISCOUNTS add constraint primary key(Age,Disability);

alter table TRAIN add constraint primary key(Train_ID);
alter table TRAIN add constraint foreign key(Source_Station) references STATIONS(Station_Name)on delete cascade on update cascade;
alter table TRAIN add constraint foreign key(Destination_Station) references STATIONS(Station_Name)on delete cascade on update cascade;

alter table RESERVATION add constraint foreign key(Train_ID) references TRAIN(Train_ID) on delete cascade on update cascade;
alter table RESERVATION add constraint primary key(Train_ID,Reservation_Date,Class);

alter table TRAIN_ROUTES add constraint foreign key(Source_Station) references STATIONS(Station_Name)on delete cascade on update cascade;
alter table TRAIN_ROUTES add constraint foreign key(Destination_Station) references STATIONS(Station_Name)on delete cascade on update cascade;
alter table TRAIN_ROUTES add constraint primary key(Train_ID,Source_Station,Destination_Station);

alter table TRAIN_AVAILABILITY add constraint foreign key(Train_ID) references TRAIN(Train_ID) on delete cascade on update cascade;
alter table TRAIN_AVAILABILITY add constraint primary key(Train_ID);

alter table PASSENGER_DETAILS add constraint foreign key(Source_Station) references STATIONS(Station_Name) on delete cascade on update cascade;
alter table PASSENGER_DETAILS add constraint foreign key(Destination_Station) references STATIONS(Station_Name) on delete cascade on update cascade;
alter table PASSENGER_DETAILS add constraint primary key(Passenger_No);

alter table PASSENGER_RESERVATION_DETAILS add constraint foreign key(Passenger_No) references PASSENGER_DETAILS(Passenger_No) on delete cascade on update cascade;

alter table PASSENGER_RESERVATION_DETAILS add constraint foreign key(Train_ID) references TRAIN(Train_ID) on delete cascade on update cascade;
alter table PASSENGER_RESERVATION_DETAILS add constraint primary key(Train_ID,Passenger_No);






