delimiter $$
create trigger checkstat
	after INSERT on PASSENGER_RESERVATION_DETAILS
	FOR EACH ROW
	BEGIN
	set @flag=0;
	set @flag1=0;
	set @noofcon=0;
	set @stat=5;
	set @stat1=5;
	select count(*) into @flag from PASSENGER_RESERVATION_DETAILS where Train_ID=new.Train_ID and Class=new.Class and Status="Confirm";
	select count(*) into @flag1 from PASSENGER_RESERVATION_DETAILS where Train_ID=new.Train_ID and Class=new.Class and Status="Waiting";
	select Seats into @noofcon from RESERVATION where Train_ID=new.Train_ID and Class=new.Class;
	select if((@flag < @noofcon),0,1) into @stat;
	select if((@flag1>4),2,1) into @stat1; 
END$$
delimiter ;
