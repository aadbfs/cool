-- Game of Thrones PrePop DATABASE
-- Alexandre Silva
-- major houses only from the current generations +1
-- no bastards or wives
-- spoiler alert through season 6, episode 10

-- insert into UChars
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (1, "Eddard Stark", "Stark", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (2, "Lyanna Stark", "Stark", "F", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (3, "Brandon Stark", "Stark", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (4, "Benjen Stark", "Stark", "M", "MISSING");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (5, "Rickon Stark", "Stark", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (6, "Robb Stark", "Stark", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (7, "Bran Stark", "Stark", "M", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (8, "Sansa Stark", "Stark", "F", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (9, "Arya Stark", "Stark", "F", "ALIVE");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (10, "Tywin Lannister", "Lannister", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (11, "Joanna Lannister", "Lannister", "F", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (12, "Cersei Lannister", "Lannister", "F", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (13, "Jaime Lannister", "Lannister", "M", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (14, "Tyrion Lannister", "Lannister", "M", "ALIVE");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (15, "Doran Martell", "Martell", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (16, "Oberyn Martell", "Martell", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (17, "Trystane Martell", "Martell", "M", "DEAD");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (18, "Balon Greyjoy", "Greyjoy", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (19, "Yara Greyjoy", "Greyjoy", "F", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (20, "Theon Greyjoy", "Greyjoy", "M", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (21, "Rodrik Greyjoy", "Greyjoy", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (22, "Maron Greyjoy", "Greyjoy", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (23, "Aeron Greyjoy", "Greyjoy", "M", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (24, "Euron Greyjoy", "Greyjoy", "M", "ALIVE");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (25, "Aerys Targaryen", "Targaryen", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (26, "Viserys Targaryen", "Targaryen", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (27, "Daenerys Targaryen", "Targaryen", "F", "ALIVE");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (28, "Rhaegar Targaryen", "Targaryen", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (29, "Aegon VI Targaryen", "Targaryen", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (30, "Rhaenys Targaryen", "Targaryen", "F", "MISSING");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (31, "Jon Targaryen", "Targaryen", "M", "ALIVE");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (32, "Jon Arryn", "Arryn", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (33, "Robert Arryn", "Arryn", "M", "ALIVE");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (34, "Mace Tyrell", "Tyrell", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (35, "Margaery Tyrell", "Tyrell", "F", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (36, "Loras Tyrell", "Tyrell", "M", "DEAD");

INSERT INTO UChar (char_id, name, house, gender, status) VALUES (42, "Robert Baratheon", "Baratheon", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (43, "Renly Baratheon", "Baratheon", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (37, "Stannis Baratheon", "Baratheon", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (38, "Joffrey Baratheon", "Baratheon", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (39, "Tommen Baratheon", "Baratheon", "M", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (40, "Myrcella Baratheon", "Baratheon", "F", "DEAD");
INSERT INTO UChar (char_id, name, house, gender, status) VALUES (41, "Shireen Baratheon", "Baratheon", "F", "DEAD");

-- insert into houses
INSERT INTO house (house_name) VALUES ("Stark");
INSERT INTO house (house_name) VALUES ("Lannister");
INSERT INTO house (house_name) VALUES ("Martell");
INSERT INTO house (house_name) VALUES ("Greyjoy");
INSERT INTO house (house_name) VALUES ("Targaryen");
INSERT INTO house (house_name) VALUES ("Arryn");
INSERT INTO house (house_name) VALUES ("Tyrell");
INSERT INTO house (house_name) VALUES ("Baratheon");

-- insert into charHouse
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Stark" 
	AND u.house ="Stark" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Targaryen" 
	AND u.house ="Targaryen" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Lannister" 
	AND u.house ="Lannister" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Greyjoy" 
	AND u.house ="Greyjoy" 
);

INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Baratheon" 
	AND u.house ="Baratheon" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Tyrell" 
	AND u.house ="Tyrell" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Arryn" 
	AND u.house ="Arryn" 
);
INSERT INTO charHouse   
(
	SELECT u.char_ID, h.house_id FROM house h INNER JOIN UChar u on h.house_name = u.house
	WHERE h.house_name ="Martell" 
	AND u.house ="Martell" 
);

-- insert into status
INSERT INTO status (curStat) VALUES ("ALIVE");
INSERT INTO status (curStat) VALUES ("DEAD");
INSERT INTO status (curStat) VALUES ("MISSING");

-- insert into charStat
INSERT INTO charStat   
(
	SELECT u.char_ID, s.stat_id FROM status s INNER JOIN UChar u on s.curStat = u.status
	WHERE s.curStat ="DEAD" 
	AND u.status ="DEAD" 
);

INSERT INTO charStat   
(
	SELECT u.char_ID, s.stat_id FROM status s INNER JOIN UChar u on s.curStat = u.status
	WHERE s.curStat ="ALIVE" 
	AND u.status ="ALIVE" 
);

INSERT INTO charStat   
(
	SELECT u.char_ID, s.stat_id FROM status s INNER JOIN UChar u on s.curStat = u.status
	WHERE s.curStat ="MISSING" 
	AND u.status ="MISSING" 
);