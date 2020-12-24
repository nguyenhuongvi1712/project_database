drop table if exists users;
create table users (
	fullname varchar(30),
	username varchar(25) not null,
	email varchar(32) unique,
	tel_number varchar(11) not null,
	address varchar(70),
	password varchar(10) not null,
	level int default(0),
	user_id serial primary key,
	check(level in(0,1,2,3) and tel_number like '^[0-9]{9,10}$')
);
create table categories (
	category_id serial primary key,
	category_name varchar(25)
)
insert into categories(category_name)
values
('Điện thoại'),('Laptop'),('Máy tính bảng');

drop table if exists products;
create table products(
	product_id serial primary key,
	price numeric not null,
	thump_link varchar(150) not null,
	product_name varchar (70) not null,
	product_code varchar(15) not null,
	user_id int,
	create_time timestamptz,
	category_id int,
	constraint fk_user foreign key(user_id) references users(user_id),
	constraint fk_categpry foreign key(category_id) references categories(category_id),
	description varchar(1000),
	detail_desc varchar (2000)
)
insert into products(product_name,price,product_code,thump_link,description,detail_desc,create_time,user_id,category_id) values
('Dell Inspiron 5593 i5 1035G1',17990000,'N5I5513W','https://cdn.tgdd.vn/Products/Images/44/223682/hp-15s-fq1105tu-i5-193p7pa-223682-1-400x400.jpg','<ul><li>Màu Mystic Silver</li><li>CPU: AMD Ryzen 5, 3500U, 2.10 GHz</li><li>RAM: 8 GB, DDR4 (On board), 2400 MHz</li><li  data-spm-anchor-id="a2o4n.pdp.product_detail.i1.68a54224Y6aSIW">Ổ cứng: SSD 256GB NVMe PCIe</li><li >Màn hình: 15.6 inch, Full HD (1920 x 1080)</li><li >Card màn hình: Card đồ họa tích hợp, AMD Radeon Vega 8 Graphics</li><li >Cổng kết nối: 2 x USB 2.0, HDMI, USB 3.0, USB Type-C</li><li >Hệ điều hành: Windows 10 Home SL</li><li >Thiết kế: Vỏ kim loại nguyên khối, PIN liền</li><li>Kích thước: Dày 16.9 mm, 1.62 kg</li></ul>',
 '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, consequatur.</p>
        <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, molestiae nihil iusto officia porro rem alias labore iste reprehenderit aliquid!</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore molestias consequuntur libero quasi! Repellendus, amet debitis tempore iusto ullam aut sunt nulla iste, minus illum cupiditate eius ducimus explicabo eaque commodi fuga voluptatibus nostrum nobis ab suscipit aspernatur obcaecati. Odit iusto doloremque perspiciatis autem, harum blanditiis nisi esse fugit nulla!</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa voluptas, ratione earum eos nam minima excepturi quaerat veniam adipisci eius.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptatum!</p>','2020-11-15 ','1','2'
),
('Laptop Asus VivoBook X409JA i5',15490000,'EK052T','https://cdn.tgdd.vn/Products/Images/44/220976/asus-vivobook-x409ja-i5-ek052t-220976-400x400.jpg',
 '<ul><li>CPU:	Intel Core i5 Ice Lake, 1035G1, 1.00 GHz</li><li>RAM: 8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz</li><li>Card : Card đồ họa tích hợp, Intel UHD Graphics</li></ul>',
'<strong>Asus VivoBook X409JA i5 (EK052T) là dòng máy tính xách tay học tập văn phòng được thiết kế hiện đại, mỏng nhẹ tối ưu cho người cần di chuyển nhiều. Với cấu hình mạnh và màn hình tràn viền, X409JA đem đến trải nghiệm làm việc mượt mà, giải trí thoải mái.</strong><p>Laptop Asus VivoBook X409JA trang bị chip Core i5 thế hệ mới nhất của Intel chạy được hầu hết các ứng dụng văn phòng, học tập, thậm chí là sử dụng cho công việc thiết kế đồ hoạ 2D với những ứng dụng phổ biến như Photoshop, Ai,...</p><p>RAM của máy có thể nâng cấp tối đa lên 20 GB để tăng khả năng đa nhiệm, sử dụng đồ họa mượt mà hơn.</p>',
 '2020-11-15 ','1','2'
 ),
 ('Laptop Acer Aspire 3 A315 34 P26U',7490000,'NXHE3SV00H',
'https://cdn.tgdd.vn/Products/Images/44/224582/TimerThumb/acer-aspire-3-a315-n5030-nxhe3sv00h.jpg',
'<ul><li>CUP Intel Pentium,1.10 GHz</li><li>RAM 4 GB</li><li>Pin Li-lon 3 cell</li></ul>',
'<h2>Đặc điểm nổi bật của Acer Aspire 3 A315 34 P26U N5030/4GB/256GB/Win10 (NX.HE3SV.00H)
 Bộ sản phẩm chuẩn: Adapter sạc, Dây nguồn, Thùng máy       
 Acer Aspire 3 A315 34 P26U (NX.HE3SV.00H) được thiết kế phù hợp với nhu cầu học tập - văn phòng ở mức giá rẻ nhưng mượt mà với các tác vụ soạn thảo cơ bản cũng như lướt web, nghe nhạc giải trí.</h2><p>Là sản phẩm hướng đến đối tượng các bạn trẻ, Acer Aspire 3 A315 gây ấn tượng đầu tiên với gam màu đen mạnh mẽ, góc cạnh bo tròn tinh tế đẹp mắt, lớp vỏ nhựa nhám ít bám vân tay cũng rất hợp lý trên ngôn ngữ thiết kế này.</p>',
'2020-11-15 ','1','2') ,
('Điện thoại iPhone 11 Pro Max 64GB',30990000,'DTSMkkks',
'https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-512gb-190920-020958-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',       
'2020-11-15 ','1','1'),
('Điện thoại iPhone 11 256GB',23990000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/42/210648/iphone-11-256gb-black-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','1'),
 ('Máy tính bảng iPad Mini 7.9 inch Wifi Cellular 64GB (2019)',23990000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/522/202820/ipad-mini-79-inch-wifi-cellular-64gb-2019-gold-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','3'),
 ('Máy tính bảng Lenovo Tab E10 TB-X104L Đen',7999000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/522/200691/lenovo-tab-e10-tb-x104l-den-1-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','3'),
 ('Máy tính bảng Samsung Galaxy Tab S6',27999000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/522/208870/samsung-galaxy-tab-s6-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','3'),
 ('Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)',7495000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/522/200963/samsung-galaxy-tab-a-101-t515-2019-gold-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','3'),
 ('Điện thoại iPhone 11 Pro Max 64GB',7495000,'DTSMIP11',
'https://cdn.tgdd.vn/Products/Images/42/228744/iphone-12-pro-max-512gb-190920-020958-400x400.jpg',
'<ul><li>Màn hình:OLED, 6.5", Super Retina XDR</li><li>Hệ điều hành:iOS 13</li><li>Camera sau:3 camera 12 MP</li><li>CPU:	Apple A13 Bionic 6 nhân</li></ul>',
'<h2>Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.</h2><h3>Camera được cải tiến mạnh mẽ
</h3><p>Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.</p><img src="https://cdn.tgdd.vn/Products/Images/42/200533/iphone-11-pro-max-tgdd6-1.jpg" style="display: block;">',
 '2020-11-15 ','1','1');
 
create table carts (
	customer_id int,
	product_id int,
	quantity int,
	primary key(customer_id,product_id),
	foreign key(customer_id) references customers(customer_id) on delete cascade,
	foreign key(product_id) references products(product_id) on delete cascade
)

CREATE TABLE Customers (
	Customer_id serial NOT NULL,
	Name varchar(50) NOT NULL,
	Email varchar(40) NOT NULL,
	Password varchar(40) NOT NULL,
	Address varchar(60) NOT NULL,
	Phone varchar(11) NOT NULL,
	Gender char(10) NOT NULL,
	Admin int NOT NULL,
	CONSTRAINT Customers_pk PRIMARY KEY (Customer_id)
);
INSERT INTO customers(Name,Email,Password,Address,Phone,Gender,Admin)
	VALUES 
		('Admin', 'MariaAnders@abc.com', '13r345sd6', 'Obere Str. 57', '122055', 'Male', 1),
		('Ana Trujillo Emparedados y helados', 'AnaTrujillo@abc.com', '13r3456', 'Forsterstr. 57','2242055', 'Male', 0),
		('Around the Horn', 'ThomasHardy@abc.com', '894fv512', 'Obsbud Str. 57','042375055', 'Male', 0),
		('Bólido Comidas preparadas', 'MartínSommer@abc.com', '65413xc21', '35 King George','44542055', 'Female', 0),
		('Centro comercial Moctezuma', 'FranciscoChang@abc.com', '1bv6132', '23 Tsawassen Blvd.', '0174682055', 'Male', 0),
		('Eastern Connection', 'AnnDevon@abc.com', '354yt36', 'Obere Str. 57', '012452', 'Female', 0),
		('Folk och fä HB', 'MariaLarsson@abc.com', '79874sd132', 'Obere Str. 57', '01251255', 'Female', 0),
		('Franchi S.p.A.', 'PaoloAccorti@abc.com', '3213sdf21', 'Obere Str. 57', '0123545545', 'Female', 0),
		('Galería del gastrónomo', 'EduardoSaavedra@abc.com', 'hbfd654', 'Åkergatan 24', '01642055', 'Male', 0),
		('Godos Cocina Típica', 'JoséPedroFreyre@abc.com', '123456', 'C/ Romero, 33', '0162055', 'Male', 0),
		('Hanari Carnes', 'MarioPontes@abc.com', '123456', '2732 Baker Blvd.', '012359', 'Female', 0),
		('Comércio Mineiro', 'PedroAfonso@abc.com', '123456', 'Av. Brasil, 442', '015154055', 'Male', 0),
		('Hương Vi', 'huongvinguyen171200@gmail.com', 'Vianh1712', 'Số 6 Ngõ 2 Láng Hạ', '0912144209', 'Female', 0),
		('Cao Minh Hiếu', 'caominhhieu2801@gmail.com', 'caohieu2801', 'Hoài Đức, Hà Nội', '012345678', 'Male', 1);




create table products(
	product_id serial primary key,
	selling_price numeric not null,
	purchased_price numeric not null,
	thump_link varchar(150) not null,
	product_name varchar (70) not null,
	description varchar(3000)
)
create table smart_phone(
	product_id int primary key,
	screen varchar(50),
	battery_capacity varchar (50),
	rear_camera varchar(50),
	front_camera varchar(50),
	SIM varchar(50),
	RAM varchar(50),
	hdh varchar(30),
	CPU varchar(50),
	foreign key(product_id) references products(product_id) on delete cascade
)
select *from products;
select *from smart_phone

insert into products(product_name,selling_price,purchased_price,thump_link) values
('Điện thoại Samsung Galaxy A51 (8GB/128GB)',17990000,14000000,'https://cdn.tgdd.vn/Products/Images/42/220903/samsung-galaxy-a51-8gb-xanh-600x600.jpg'
);
insert into smart_phone values(
	1,'Super AMOLED, 6.5", Full HD+','4000 mAh, có sạc nhanh','Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP','32 MP','2 Nano SIM, Hỗ trợ 4G','8 GB','	Android 10','	Exynos 9611 8 nhân'
)
