-- Structure for table 'generals_data'
create table if not exists `generals_data`(
  `id_data` int(11) not null,
  `center` varchar(45) default null,
  `company` int(11) default null,
  `users` varchar (45) default null,
  `password` varchar (45) default null,
  `nameuser` varchar(45) default null,
  primary key (`id_data`)

)ENGINE=InnoDB CHARSET=latin1;

-- Insert 'general_data'
insert into generals_data(id_data,company,center,users,password,nameuser)
value("1","LevData","312456","admin","root","Administrador");

-- Structure for table 'students_data'
create table if not exists `students_data`(
  `id_students` int(11) not null AUTO_INCREMENT,
  `id_enrolment` bigint (50) default null,
  `keysp` varchar(45) default null,
  `keymt` varchar(45) default null,
  `keyen` varchar(45) default null,
  `firstname` varchar(45) default null,
  `lastname` varchar (45) default null,
  `sltname` varchar(45) default null,
  `dateofbirth` varchar(45) default null,
  `dateofregistry` varchar(45) default null,
  `schoolgrade` varchar(45) default null,
  `schoolname` varchar(45) default null,
  `sex` varchar(45) default null,
  `address` varchar(50) default null,
  `numberext` varchar(45) default null,
  `numberint` varchar(45) default null,
  `colony` varchar(45) default null,
  `city` varchar(45) default null,
  `state` varchar (45) default null,
  `postalcode` int(11) default null,
  `lada` int(11) default null,
  `phonehome` int(11) default null,
  `betweenstreet` varchar(45) default null,
  `andstreet` varchar(45) default null,
  `advocacym` varchar(500) default null,
  `newregi` varchar(45) default null,
  `transfered` varchar(45) default null,

  PRIMARY KEY (`id_students`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'Assignatures'
create table if not exists `assignatures`(
  `id_assg` int(11) not null AUTO_INCREMENT,
  `nameassg` varchar(45) default null,
  primary key (`id_assg`)

)ENGINE=InnoDB CHARSET=latin1;

-- Insert 'assignatures'
insert into assignatures(id_assg,nameassg)
 value("1","Español"),("2","Matemáticas"),("3","Inglés"),("4","Both(SP, MAT)"),("5","Both(SP, EN)"),("6","Both(MAT, EN)");

-- Stricture for table 'students_assignatures'
create table if not exists `students_assignatures`(
  `id_asstud` int(11) not null AUTO_INCREMENT,
  `id_studentasg` int(11) default null,
  `id_assgst` int(11) default null,
  primary key (`id_asstud`),
  key `id_studentasg` (`id_studentasg`),
  key `id_assgst` (`id_assgst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `students_assignatures`
  ADD CONSTRAINT `id_assgn` FOREIGN KEY (`id_assgst`) REFERENCES `assignatures` (`id_assg`);
ALTER TABLE `students_assignatures`
  ADD CONSTRAINT `id_studn` FOREIGN KEY (`id_studentasg`) REFERENCES `students_data` (`id_students`);

-- Structure for table 'payments'
create table if not exists `payments`(
  `id_payment` int(11) not null AUTO_INCREMENT,
  `folio` int(11) default null,
  `amount` int(20) default null,
  `metpay` varchar(45) default null,
  `dateofpay` varchar(45) default null,
  `whoget` varchar(45) default null,
  `whopay` varchar(45) default null,
  `assignatures` varchar(45) default null,
  `additional` varchar(45) default null,
  `formpay` varchar(45) default null,
  `commits` varchar(45) default null,
  primary key (`id_payment`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'students payments'
create table if not exists `students_payments`(
  `id_payments` int(11) not null AUTO_INCREMENT,
  `id_stupay` int(11) not null,
  `id_paymtst` int(11) not null,
  primary key (`id_payments`),
  key `id_stupay` (`id_stupay`),
  key `id_paymtst` (`id_paymtst`)

)ENGINE=InnoDB CHARSET=latin1;


ALTER TABLE `students_payments`
  ADD CONSTRAINT `id_paymtst` FOREIGN KEY (`id_paymtst`) REFERENCES `payments` (`id_payment`);
ALTER TABLE `students_payments`
  ADD CONSTRAINT `id_stupay` FOREIGN KEY (`id_stupay`) REFERENCES `students_data` (`id_students`);

-- Structure for table 'Informacion_tutor'
create table if not exists `tutor_information`(
  `id_tutor` int(11) not null AUTO_INCREMENT,
  `firstnametutor` varchar(45) default null,
  `lastnametutor` varchar(45) default null,
  `sltsnametutor` varchar(45) default null,
  `email` varchar(45) default null,
  `phoneoffice` int(11) default null,
  `ocupation` varchar(45) default null,
  primary key (`id_tutor`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'student_tutor'
create table if not exists `student_tutor`(
  `ìd_stur` int(11) not null AUTO_INCREMENT,
  `idstudtrs` int(11) not null,
  `idtutorst` int(11) not null,
  primary key (`ìd_stur`),
  key `ìdstudtrs` (`idstudtrs`),
  key `ìdtutorst` (`idtutorst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `student_tutor`
  ADD CONSTRAINT `idstudtrs` FOREIGN KEY (`idstudtrs`) REFERENCES `students_data` (`id_students`);
ALTER TABLE `student_tutor`
  ADD CONSTRAINT `idtutorst` FOREIGN KEY (`idtutorst`) REFERENCES `tutor_information` (`id_tutor`);

-- Structure for table 'emergency'
create table if not exists `emergency`(
  `id_emergency` int(11) not null AUTO_INCREMENT,
  `firstnameamer` varchar(45) default null,
  `phoneofem` int(11) default null,
  `cellphone` int(11) default null,
  primary key (`id_emergency`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'student_emergency'
create table if not exists `student_emergency`(
  `ìd_stumg` int(11) not null AUTO_INCREMENT,
  `idstudmg` int(11) not null,
  `idemerst` int(11) not null,
  primary key (`ìd_stumg`),
  key `ìdstudmg` (`idstudmg`),
  key `ìdemerst` (`idemerst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `student_emergency`
  ADD CONSTRAINT `idstudmg` FOREIGN KEY (`idstudmg`) REFERENCES `students_data` (`id_students`);
ALTER TABLE `student_emergency`
  ADD CONSTRAINT `idemerst` FOREIGN KEY (`idemerst`) REFERENCES `emergency` (`id_emergency`);

-- Structure for table 'meets'
create table if not exists `meets`(
  `id_meets` int(11) not null AUTO_INCREMENT,
  `internet` varchar(45) default null,
  `ad` varchar(45) default null,
  `articule` varchar(45) default null,
  `review` varchar(45) default null,
  `publiext` varchar(45) default null,
  `testimonialfa` varchar(45) default null,
  `testimonialfr` varchar(45) default null,
  `testimonialsc` varchar(45) default null,
  `othermed` varchar(45) default null,
  primary key (`id_meets`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'student_meets'
create table if not exists `student_meets`(
  `ìd_stumts` int(11) not null AUTO_INCREMENT,
  `idstudmts` int(11) not null,
  `idmetst` int(11) not null,
  primary key (`ìd_stumts`),
  key `idstudmts` (`idstudmts`),
  key `idmetst` (`idmetst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `student_meets`
  ADD CONSTRAINT `idstudmts` FOREIGN KEY (`idstudmts`) REFERENCES `students_data` (`id_students`);
ALTER TABLE `student_meets`
  ADD CONSTRAINT `idmetst` FOREIGN KEY (`idmetst`) REFERENCES `meets_kumon` (`id_meets`);


-- Structure for table 'Registry_reason'
create table if not exists `registry_reason`(
  `id_reason` int(11) not null AUTO_INCREMENT,
  `bestcalmat` varchar(45) default null,
  `gradesuppr` varchar(45) default null,
  `bestaptsc` varchar(45) default null,
  `testimonialfa` varchar(45) default null,
  `testimonialfr` varchar(45) default null,
  `testimonialsc` varchar(45) default null,
  `otherrea` varchar(45) default null,
  primary key (`id_reason`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'student_reasons'
create table if not exists `student_reasons`(
  `ìd_stursn` int(11) not null AUTO_INCREMENT,
  `idstudrsn` int(11) not null,
  `idrsnst` int(11) not null,
  primary key (`ìd_stursn`),
  key `idstudrsn` (`idstudrsn`),
  key `idrsnst` (`idrsnst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `student_reasons`
  ADD CONSTRAINT `idstudrsn` FOREIGN KEY (`idstudrsn`) REFERENCES `students_data` (`id_students`);
ALTER TABLE `student_reasons`
  ADD CONSTRAINT `idrsnst` FOREIGN KEY (`idrsnst`) REFERENCES `registry_reason` (`id_reason`);


-- Structure for table 'Waited_results'
create table if not exists `waited_results`(
  `id_result` int(11) not null AUTO_INCREMENT,
  `bestcalsch` varchar(45) default null,
  `createsoldmat` varchar(45) default null,
  `icremetconce` varchar(45) default null,
  `agilcalmental` varchar (45) default null,
  `createaptstudy` varchar(45) default null,
  `incremetautost` varchar(45) default null,
  `otherresul` varchar(45) default null,
  primary key (`id_result`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'student_results'
create table if not exists `student_results`(
  `ìd_stursl` int(11) not null AUTO_INCREMENT,
  `idstudrsl` int(11) not null,
  `idrslst` int(11) not null,
  primary key (`ìd_stursl`),
  key `idstudrsl` (`idstudrsl`),
  key `idrslst` (`idrslst`)

)ENGINE=InnoDB CHARSET=latin1;

ALTER TABLE `student_results`
  ADD CONSTRAINT `idstudrsl` FOREIGN KEY (`idstudrsl`) REFERENCES `students_data` (`id_students`);
ALTER TABLE `student_results`
  ADD CONSTRAINT `idrslst` FOREIGN KEY (`idrslst`) REFERENCES `waited_results` (`id_result`);

-- Structure for table 'use_for_instructorin'
create table if not exists `use_for_instructorin`(
  `id_in` int(11) not null AUTO_INCREMENT,
  `assignature` varchar(45) default null,
  `application_test` varchar(45) default null,
  `main_point` varchar(45) default null,
  `time_test` varchar(45) default null,
  `test_hits` varchar(45) default null,
  primary key (`id_in`)

)ENGINE=InnoDB CHARSET=latin1;

-- Structure for table 'use_for_instructorout'
create table if not exists `use_for_instructorout`(
  `id_out` int(11) not null AUTO_INCREMENT,
  `assignature` varchar(45) default null,
  `actual_nivel` varchar(45) default null,
  `id_studentsout` varchar(45) default null,
  `numberkumonout` varchar (45) default null,
  primary key (`id_out`)

)ENGINE=InnoDB CHARSET=latin1;




