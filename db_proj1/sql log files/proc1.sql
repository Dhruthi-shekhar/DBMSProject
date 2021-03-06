delimiter //
create procedure calc_disc(IN class_var int(11),IN age_var int(11),IN disab_var varchar(1),IN train_var varchar(20),IN source_var varchar(20), IN dest_var varchar(20),OUT dis_fare int)
BEGIN
declare class_t,age_t,dis_t,fare_t int;
declare disabl_t varchar(1);
declare train_t,fclass varchar(20);
select
	(
	CASE
		WHEN class_var= 1 THEN Fare_Class1
		WHEN class_var=2 THEN Fare_Class2
		ELSE Fare_Class3
	END) into fare_t
	from TRAIN where Train_ID=train_var and Source_Station=source_var and Destination_Station= dest_var;

select max(Age) into age_t from DISCOUNTS where Age<=age_var and Disability=disab_var;

select Discount into dis_t from DISCOUNTS where Age=age_t and Disability=disab_var;

set dis_fare=(((100-dis_t)/100)*fare_t);
END //
delimiter ;


