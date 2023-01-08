CREATE database pojistovna ;
use pojistovna ;
create table uzivatele(
	id int NOT NULL AUTO_INCREMENT,
	fname varchar(100),
    lname varchar(100),
    age int,
    pnumber varchar(15),
    primary key(id)
);

insert into uzivatele(fname , lname, age, pnumber) 
values ("Jan" ,"Novák" , 34, "725459651") ;





