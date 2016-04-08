-- 创建课程表数据库
CREATE database course charset = utf8;
use course;
-- 创建课程数据表
CREATE TABLE computer_course(
c_id int not null PRIMARY KEY auto_increment,
c_week CHAR (5) not null,
c_am1 VARCHAR (20),
c_am2 VARCHAR (20),
c_pm1 VARCHAR (20),
c_pm2 VARCHAR (20),
c_evening VARCHAR (20),
c_class VARCHAR (20)
)charset utf8;

-- 创建用户表
CREATE TABLE computer_user(
u_id int not null PRIMARY KEY auto_increment,
u_name VARCHAR (10),
u_email CHAR (20),
u_class VARCHAR (20)
)charset utf8;

-- 增加一个字段
-- alter table computer_course change class c_class varchar(20);
-- 更新班级信息
UPDATE computer_course set class='网络工程1301';
-- 插入课程数据
insert into computer_course VALUES (null,'周一','网络程序设计(JAVA)--A504','无线网络与移动计算--D503','现代交换原理--D403','招聘与就业指导','');
insert into computer_course VALUES (null,'周二','网络规划与设计--B205','TCP/IP原理与应用--D503','','','');
insert into computer_course VALUES (null,'周三','无线网络与移动计算--D503','现代交换原理--D502','','','文献检索--E413');
insert into computer_course VALUES (null,'周四','TCP/IP原理与应用--D503','网络规划与设计--B202','','','');
insert into computer_course VALUES (null,'周五','','网络程序设计(JAVA)--D101','','','');

-- 插入用户
insert into computer_user VALUES (null,'刘卓豪','1589300156@qq.com','网络工程1301');
insert into computer_user VALUES (null,'罗宏','1034996580@qq.com','网络工程1301');