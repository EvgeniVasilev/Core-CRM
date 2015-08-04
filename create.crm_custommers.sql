create table if not exists crm_customres (
 cstm_id int (11) not null auto_increment,
 cstm_fname varchar (20) not null default 'None',
 cstm_sname varchar (20) not null default 'None',
 cstm_lname varchar (20) not null default 'None',
 cstm_email varchar (30) not null default 'some@gmail.com',
 cstm_tel varchar (30) not null default '0000-00-00-00',  
 cstm_country varchar (30) not null default 'None',
 cstm_state varchar (20) not null default 'None',   
 cstm_city varchar (20) not null default 'None',
 cstm_street varchar (20) not null default 'None',
 cstm_zip int (11) not null default '00000',
 comments varchar (255) not null default 'Nothing said!',
 cstm_date_joined  date not null default '0000-00-00',   
 Primary Key (cstm_id),
 Fulltext Key (cstm_fname, cstm_sname, cstm_lname, cstm_country)   
)