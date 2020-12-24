create table users (
	fullname varchar(30),
	username varchar(25) not null,
	email varchar(32) unique,
	tel_number varchar(11) not null,
	address varchar(70),
	password varchar(10) not null,
	level int default(0),
	user_id serial primary key,
	check(level in(0,1,2,3) and tel_number like '%0-9%')
);
