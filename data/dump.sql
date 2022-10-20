BEGIN TRANSACTION;
--PRAGMA foreign_keys=false;

--сначала все удаляем!!!
DROP TABLE IF EXISTS "orders";
DROP TABLE IF EXISTS "peoples";
DROP TABLE IF EXISTS "order_types";
DROP TABLE IF EXISTS "sex";
DROP TABLE IF EXISTS "positions";
DROP TABLE IF EXISTS "departments";
DROP TABLE IF EXISTS "autos";

--создаем таблицы и заполняем тестовыми данными

--список автомобилей
CREATE TABLE IF NOT EXISTS "autos" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"autonum"	TEXT,
	"autotype"	TEXT,
	"status"	TEXT
);
INSERT INTO "autos" ("autonum","autotype","status") VALUES
 ('А 123 ВС 34','TOYOTA CAMRY','Действует'),
 ('А 234 ТН 34','CHEVROLET NIVA 21230-55','Неактивна');

--отделы
CREATE TABLE IF NOT EXISTS "departments" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"dep"	TEXT,
	"department"	TEXT
);
INSERT INTO "departments" ("dep","department") VALUES
 ('АУП','Руководство'),
 ('АИР','Аппарат (исполнители) при руководстве'),
 ('ОКТСГНО','Отдел по контролю за техническим состоянием газовых и нефтяных объектов'),
 ('ГКНБОГ','Группа по контролю за надежностью и безопасностью объектов газоснабжения'),
 ('ОКНБЭО','Отдел по контролю за надежностью и безопасностью энергетических объектов'),
 ('ОЭК','Отдел экологического контроля'),
 ('ОКЭИГ','Отдел по контролю за эффективным использованием газа'),
 ('ОКСиКР','Отдел по контролю за строительством и капитальным ремонтом'),
 ('ПО','Производственный отдел'),
 ('ОВП','Отдел ведомственной приемки');

--должности
CREATE TABLE IF NOT EXISTS "positions" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"position"	TEXT
);
INSERT INTO "positions" ("position") VALUES
  ('Начальник управления'),
  ('Заместитель начальника управления по контролю за промышленной безопасностью'),
  ('Главный инженер'),
  ('Начальник отдела'),
  ('Руководитель группы'),
  ('Заместитель начальника отдела'),
  ('Ведущий инженер'),
  ('Ведущий инженер (МТР)'),
  ('Ведущий инженер (сюрвейер)'),
  ('Ведущий инженер по контролю диагностических работ'),
  ('Ведущий инженер по сварке'),
  ('Ведущий специалист по охране труда'),
  ('Инженер 1 категории'),
  ('Инженер 1 категории (МТР)'),
  ('Инженер 1 категории (сюрвейер)'),
  ('Техник 1 категории'),
  ('Cпециалист 1 категории'),
  ('Секретарь руководителя'),
  ('Водитель автомобиля'),
  ('Инженер 1 категории по контролю диагностических работ'),
  ('Ведущий специалист');

--пол
CREATE TABLE IF NOT EXISTS "sex" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"sex"	TEXT
);
INSERT INTO "sex" ("sex") VALUES
 ('мужской'),
 ('женский'),
 ('другой');

--тип  приказа (с символами табеля)
CREATE TABLE IF NOT EXISTS "order_types" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"type"	TEXT,
	"letter"	TEXT,
	"priority"	INTEGER
);
INSERT INTO "order_types" ("id","type","letter","priority") VALUES
 (1,'Продолжительность работы в дневное время','Я',1000),
 (2,'Продолжительность работы в ночное время','Н',100),
 (3,'Продолжительность работы в выходные и нерабочие праздничные дни','РВ',100),
 (4,'Продолжительность сверхурочной работы','С',1000),
 (5,'Продолжительность работы вахтовым методом','ВМ',1000),
 (6,'Служебная командировка','К',10),
 (7,'Повышение квалификации с отрывом от работы','ПК',100),
 (8,'Повышение квалификации с отрывом от работы в другой местности','ПМ',100),
 (9,'Ежегодный основной оплачиваемый отпуск','ОТ',10),
 (10,'Ежегодный дополнительный оплачиваемый отпуск','ОД',10),
 (11,'Дополнительный отпуск в связи с обучением с сохранением среднего заработка работникам, совмещающим работу с обучением','У',1000),
 (12,'Сокращенная продолжительность рабочего времени для обучающихся без отрыва от производства с частичным сохранением заработной','УВ',1000),
 (13,'Дополнительный отпуск в связи с обучением без сохранения заработной платы','УД',1000),
 (14,'Отпуск по беременности и родам (отпуск в связи с усыновлением новорожденного ребенка)','Р',100),
 (15,'Отпуск по уходу за ребенком до достижения им возраста трех лет','ОЖ',100),
 (16,'Отпуск без сохранения заработной платы, предоставляемый работнику по разрешению работодателя','ДО',100),
 (17,'Отпуск без сохранения заработной платы при условиях, предусмотренных действующим законодательством Российской Федерации','ОЗ',1000),
 (18,'Ежегодный дополнительный отпуск без сохранения заработной платы','ДБ',1000),
 (19,'Временная нетрудоспособность (кроме случаев, предусмотренных кодом "Т") с назначением пособия согласно законодательству','Б',10),
 (20,'Временная нетрудоспособность без назначения пособия в случаях, предусмотренных законодательством','Т',1000),
 (21,'Сокращенная продолжительность рабочего времени против нормальной продолжительности рабочего дня в случаях, предусмотренных законодательством','ЛЧ',1000),
 (22,'Время вынужденного прогула в случае признания увольнения, перевода на другую работу или отстранения от работы незаконными с восстановлением на прежней работе','ПВ',1000),
 (23,'Невыходы на время исполнения государственных или общественных обязанностей согласно законодательству','Г',1000),
 (24,'Прогулы (отсутствие на рабочем месте без уважительных причин в течение времени, установленного законодательством)','ПР',1000),
 (25,'Продолжительность работы в режиме неполного рабочего времени по инициативе работодателя в случаях, предусмотренных законодательством','НС',1000),
 (26,'Выходные дни (еженедельный отпуск) и  нерабочие праздничные дни','В',1000),
 (27,'Дополнительные выходные дни (оплачиваемые)','ОВ',1000),
 (28,'Дополнительные выходные дни (без сохранения заработной платы)','НВ',1000),
 (29,'Забастовка (при условиях и в порядке, предусмотренных законом)','ЗБ',1000),
 (30,'Неявки по невыясненным причинам (до выяснения обстоятельств)','НН',10),
 (31,'Время простоя по вине работодателя','РП',1000),
 (32,'Время простоя по причинам, не зависящим от работодателя и работника','НП',1000),
 (33,'Время простоя по вине работника','ВП',1000),
 (34,'Отстранение от работы (недопущение к работе) с оплатой (пособием) в соответствии с законодательством','НО',1000),
 (35,'Отстранение от работы (недопущение к работе) по причинам, предусмотренным законодательством, без начисления заработной платы','НБ',1000),
 (36,'Время приостановки работы в случае задержки выплаты заработной платы','НЗ',1000),
 (37,'Время неявок на работу при прохождении работником диспансеризации в соответствии с законодательством с сохранением за ним места работы (должности) и среднего заработка','Д',1000);

--сотрудники
CREATE TABLE IF NOT EXISTS "peoples" (
 	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
 	"lname"	TEXT NOT NULL,
 	"fname"	TEXT NOT NULL,
 	"mname"	TEXT NOT NULL,
 	"birthday"	DATE DEFAULT NULL,
 	"sexid"	INTEGER REFERENCES "sex"("id"),
 	"departmentid"	INTEGER REFERENCES "departments"("id"),
 	"positionid"	INTEGER REFERENCES "positions"("id"),
 	"tab_N"	TEXT DEFAULT NULL,
 	"orderdate"	DATE,
	"fired" BOOLEAN DEFAULT 0
);
INSERT INTO "peoples" ("lname","fname","mname","birthday","sexid","departmentid","positionid","tab_N","orderdate","fired") VALUES
  ('Иванов','Иван','Иванович','1980-01-01',1,9,7,'1111',NULL,0),
  ('Петров','Петр','Петрович',NULL,1,10,8,'2222',NULL,0),
  ('Семенов','Семен','Семенович',NULL,1,9,8,'3333',NULL,0);

--приказы
CREATE TABLE IF NOT EXISTS "orders" (
	"id"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"peopleid"	INTEGER REFERENCES "peoples"("id"),
	"typeid"	INTEGER REFERENCES "order_types"("id"),
	"bdate"	DATE,
	"edate"	DATE,
	-- "objectid"	INTEGER REFERENCES "objects"("id"),
	"object"	TEXT,
	"numorder"	TEXT,
	"autoid"	INTEGER REFERENCES "autos"("id"),
	"SZsend"	BOOLEAN,
	"AOsend"	BOOLEAN,
	"AOreceive"	BOOLEAN,
	"plan"	BOOLEAN
);

-----------------
----- VIEWS -----
-----------------

DROP VIEW IF EXISTS "all_autos";
CREATE VIEW all_autos AS SELECT
			 a.id AS id,
       a.autotype || ' (' || a.autonum || ')' AS auto
  FROM autos AS a;

DROP VIEW IF EXISTS "all_orders_2021";
CREATE VIEW all_orders_2021 AS SELECT
			 o.id,
       p.lname || ' ' || p.fname || ' ' || p.mname AS fullname,
       d.department,
       mt.type,
       date('now', 'start of month') AS bmonth,
       o.bdate,
       o.edate,
       date('now', 'start of month', '+1 month', '-1 day') AS emonth,
       o.object,
       o.numorder,
       o.AOsend,
       o.AOreceive
  FROM orders AS o
       JOIN
       peoples AS p ON p.id = o.peopleid
       JOIN
       departments AS d ON p.departmentid = d.id
       JOIN
       order_types AS mt ON mt.id = o.typeid
 WHERE o.edate < date('2021-12-31');
 -- WHERE o.edate > date('now');

DROP VIEW IF EXISTS "all_peoples";
CREATE VIEW all_peoples AS SELECT
			 p.id AS id,
       p.lname || ' ' || p.fname || ' ' || p.mname AS fullname,
       p.departmentid,
       d.department,
       pos.position
  FROM peoples AS p
       JOIN
       sex AS s ON p.sexid = s.id
       JOIN
       departments AS d ON p.departmentid = d.id
       JOIN
       positions AS pos ON p.positionid = pos.id
 WHERE p.fired = 0
 ORDER BY p.departmentid,
          p.positionid;

DROP VIEW IF EXISTS "all_types";
CREATE VIEW all_types AS SELECT
			 t.id AS id,
       '(' || t.letter || ') ' || CAST (X'09' AS TEXT) || t.type AS type
  FROM order_types AS t
 ORDER BY t.priority;

COMMIT;
