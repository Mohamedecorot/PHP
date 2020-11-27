BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "products" (
	"id"	INTEGER,
	"name"	TEXT,
	"price"	REAL,
	"address"	TEXT,
	"city"	TEXT,
	CONSTRAINT "products_pk" PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "products" VALUES (1,'Bourdon',163893.0,'76, avenue Geneviève Antoine
04 197 Martinez','Traore-sur-Thibault');
INSERT INTO "products" VALUES (2,'Prevost SAS',553504.0,'place Amélie Navarro
93 809 Adam-la-Forêt','Vaillant');
INSERT INTO "products" VALUES (3,'Pascal',407563.0,'56, rue Anouk Etienne
48799 Ramos','Baillyboeuf');
INSERT INTO "products" VALUES (4,'Laroche Bonneau S.A.S.',328957.0,'7, place Michel Louis
21294 Tanguy-sur-Giraud','Ribeiro-sur-Pons');
INSERT INTO "products" VALUES (5,'Julien S.A.R.L.',789402.0,'4, chemin de Techer
73 960 Perrier','Guillon');
INSERT INTO "products" VALUES (6,'Chevallier',330611.0,'17, chemin Thibaut Courtois
59 205 Fontaine','Courtois');
INSERT INTO "products" VALUES (7,'Seguin S.A.R.L.',714005.0,'65, place Pinto
15 456 Dupuy','Marie-sur-Camus');
INSERT INTO "products" VALUES (8,'Gaudin',425785.0,'impasse Baron
70795 Roger','Da Costa');
INSERT INTO "products" VALUES (9,'Gerard Pires S.A.S.',725094.0,'900, rue Jacob
00958 Grosdan','Da CostaVille');
INSERT INTO "products" VALUES (10,'Neveu',382029.0,'18, boulevard Philippe Delmas
97979 Buisson','Hernandezdan');
INSERT INTO "products" VALUES (11,'Descamps S.A.',429124.0,'place Roger Delorme
94621 Martins','Muller-sur-Leclerc');
INSERT INTO "products" VALUES (12,'Nguyen SARL',308354.0,'484, impasse Jean Lebreton
45 802 Dos SantosBourg','Joseph');
INSERT INTO "products" VALUES (13,'Philippe',496874.0,'3, rue Baudry
25115 Pineau-sur-Roy','Lecoq');
INSERT INTO "products" VALUES (14,'Humbert SAS',745166.0,'avenue Charles Godard
79247 HamonVille','Joseph');
INSERT INTO "products" VALUES (15,'Gros S.A.S.',409523.0,'2, boulevard de Roussel
74 014 Levy','Samson-les-Bains');
INSERT INTO "products" VALUES (16,'Lombard Bodin S.A.R.L.',583590.0,'avenue Victoire Munoz
42 903 Auger','Lopes-sur-Hamel');
INSERT INTO "products" VALUES (17,'Valentin SA',252650.0,'78, rue Aubert
06 241 Guillot-sur-Parent','Bailly');
INSERT INTO "products" VALUES (18,'Duval',680351.0,'rue de Marchal
13 988 Morelnec','Becker-la-Forêt');
INSERT INTO "products" VALUES (19,'Pinto',655650.0,'40, avenue Étienne Moreau
25260 Marin-sur-Marechal','Blancnec');
INSERT INTO "products" VALUES (20,'Maurice Laine SARL',462923.0,'34, chemin de Rossi
59410 Couturierdan','Tessiernec');
INSERT INTO "products" VALUES (21,'Descamps',785082.0,'187, place de Mace
96 406 Robin','De Oliveira-les-Bains');
INSERT INTO "products" VALUES (22,'Daniel SARL',377372.0,'1, rue Tristan Hubert
18288 Herve-sur-Daniel','Lemoine');
INSERT INTO "products" VALUES (23,'Ribeiro et Fils',119435.0,'avenue de Pottier
08 772 Guyon-sur-Collin','Simonboeuf');
INSERT INTO "products" VALUES (24,'Leblanc S.A.',916892.0,'48, rue Henry
35 474 Meunier','Bourdon-sur-Mer');
INSERT INTO "products" VALUES (25,'Moreno S.A.',913234.0,'193, rue Hamon
62397 Robert','Dos Santos');
INSERT INTO "products" VALUES (26,'Vallee',759720.0,'impasse de Jean
93863 Aubert-sur-Mary','Delahaye');
INSERT INTO "products" VALUES (27,'Briand',399792.0,'776, impasse de Dupuis
99075 Regnier','Jeannec');
INSERT INTO "products" VALUES (28,'Alexandre',705033.0,'89, rue de Leconte
26 791 Rey','Duvalnec');
INSERT INTO "products" VALUES (29,'Bouvet Lucas et Fils',511295.0,'869, chemin Nath Rousset
25117 Bonneau','De OliveiraVille');
INSERT INTO "products" VALUES (30,'Rey Bouvier SAS',856081.0,'20, boulevard de Bertin
45193 Dufour-la-Forêt','Jacquet');
INSERT INTO "products" VALUES (31,'Laporte',592952.0,'947, rue Moreau
43 354 Cousinnec','Delmas-sur-Blin');
INSERT INTO "products" VALUES (32,'De Oliveira',774156.0,'415, rue Berthelot
68318 Collin','Brun');
INSERT INTO "products" VALUES (33,'Garcia',346285.0,'155, place de Guillaume
67461 Leger','Diaz');
INSERT INTO "products" VALUES (34,'Hardy Roy SARL',968917.0,'256, rue Martinez
94250 Tessier','Lucas');
INSERT INTO "products" VALUES (35,'Giraud',961752.0,'1, chemin Lombard
73542 PiresBourg','Jolynec');
INSERT INTO "products" VALUES (36,'Berger Meunier S.A.R.L.',518779.0,'18, boulevard Pottier
46911 Barbierboeuf','Pruvost');
INSERT INTO "products" VALUES (37,'Munoz et Fils',179138.0,'54, boulevard de Lopes
53303 Delahaye','Aubert-la-Forêt');
INSERT INTO "products" VALUES (38,'Albert',833213.0,'boulevard Anaïs Fischer
22648 DupuisVille','Guillaume');
INSERT INTO "products" VALUES (39,'Lambert',551996.0,'97, boulevard Anaïs Dias
40643 Moreau','Benard-sur-Adam');
INSERT INTO "products" VALUES (40,'Bailly SAS',837375.0,'62, place Chartier
32886 GimenezBourg','Francois');
INSERT INTO "products" VALUES (41,'Dubois',894866.0,'91, chemin Jacob
60 044 Ferreira-les-Bains','Techer-sur-Mer');
INSERT INTO "products" VALUES (42,'Jacob',308962.0,'80, rue de Brunet
76760 Guillotboeuf','Mercier');
INSERT INTO "products" VALUES (43,'Martineau',171986.0,'22, rue de Pineau
78 929 LemaitreVille','Mahe');
INSERT INTO "products" VALUES (44,'Cordier S.A.S.',854753.0,'rue de Bousquet
78090 Lenoir','Barbierboeuf');
INSERT INTO "products" VALUES (45,'Delannoy',751148.0,'8, avenue Susan Marty
34 768 Maury-sur-Mer','MenardVille');
INSERT INTO "products" VALUES (46,'Marin',836769.0,'33, rue Alves
35 036 LamyBourg','Ferreira-sur-Simon');
INSERT INTO "products" VALUES (47,'Riou Wagner S.A.R.L.',184544.0,'79, rue Roger Verdier
47 067 Baudrydan','FaureBourg');
INSERT INTO "products" VALUES (48,'Besnard',510510.0,'34, boulevard Mathilde Dupuis
71 017 Richard','MilletVille');
INSERT INTO "products" VALUES (49,'Riou Barbier SAS',401959.0,'9, rue Dijoux
23588 Perret-la-Forêt','Hebert-sur-Remy');
INSERT INTO "products" VALUES (50,'Martins Pineau SARL',987872.0,'40, rue de Goncalves
03075 Leroux','Carlier');
INSERT INTO "products" VALUES (51,'Gilbert Renard et Fils',165794.0,'92, rue Rolland
78 121 David','Perrot');
INSERT INTO "products" VALUES (52,'Lopez S.A.S.',266576.0,'8, impasse Victoire Blanchet
45 232 Barthelemy-sur-Descamps','Herve');
INSERT INTO "products" VALUES (53,'Camus',870797.0,'355, place Valentine Rousset
36 446 Gomez-les-Bains','Paul-sur-Mer');
INSERT INTO "products" VALUES (54,'Paris',251680.0,'4, impasse Richard
31 788 Leleu-sur-Arnaud','Hoarau');
INSERT INTO "products" VALUES (55,'Camus S.A.',614514.0,'47, boulevard de Boucher
29725 ColinVille','De Sousa');
INSERT INTO "products" VALUES (56,'Barbe',241532.0,'423, boulevard de Petitjean
32 783 Louisboeuf','Juliendan');
INSERT INTO "products" VALUES (57,'Philippe',802165.0,'rue Patrick Delahaye
99 260 Laroche','Delaunay');
INSERT INTO "products" VALUES (58,'Chauveau',111019.0,'2, impasse Schmitt
46071 Faure-les-Bains','PerrierVille');
INSERT INTO "products" VALUES (59,'Loiseau Louis SA',950346.0,'36, place Augustin Bousquet
48531 Renaultdan','Boyer-la-Forêt');
INSERT INTO "products" VALUES (60,'Francois S.A.R.L.',595876.0,'96, avenue Vincent Chauvin
42142 Auger','Meyer');
INSERT INTO "products" VALUES (61,'Vaillant Charles SAS',368438.0,'2, impasse de Bouvet
15 413 Joly','Perez');
INSERT INTO "products" VALUES (62,'Legendre',669799.0,'5, boulevard Wagner
20217 Ramos','Gaudin');
INSERT INTO "products" VALUES (63,'Da Costa',330019.0,'20, rue de Rolland
99 820 Perret','Lejeunenec');
INSERT INTO "products" VALUES (64,'Chartier',248603.0,'rue de Besnard
54312 Gautierboeuf','Martinez');
INSERT INTO "products" VALUES (65,'Lopez Michaud S.A.',723055.0,'3, chemin de Thierry
72 083 Hebert','MarchandVille');
INSERT INTO "products" VALUES (66,'Maillet',579403.0,'7, rue Étienne Lefebvre
73 219 Etienne','SchmittBourg');
INSERT INTO "products" VALUES (67,'Dias Riou S.A.',540190.0,'63, avenue Traore
43274 Chevalier','GauthierVille');
INSERT INTO "products" VALUES (68,'Voisin Huet S.A.S.',271355.0,'rue Suzanne Vaillant
08697 Gonzalezboeuf','Gautierdan');
INSERT INTO "products" VALUES (69,'Vaillant Pineau S.A.S.',981884.0,'rue Susanne Le Gall
51 998 Delorme-les-Bains','Lefebvre');
INSERT INTO "products" VALUES (70,'Brunel Masse S.A.R.L.',189002.0,'814, impasse Théophile Valentin
42 223 Bazin','Legrand-sur-Martinez');
INSERT INTO "products" VALUES (71,'Rocher',835189.0,'43, impasse de Fouquet
64723 FleuryVille','Gillet-sur-Guyon');
INSERT INTO "products" VALUES (72,'Jean',212199.0,'59, boulevard Collin
52 792 Robert-sur-Mer','Baron');
INSERT INTO "products" VALUES (73,'Moreau S.A.S.',532760.0,'57, boulevard Carpentier
83 192 Moreno','Torres');
INSERT INTO "products" VALUES (74,'Masson S.A.',983295.0,'69, impasse Thierry Fleury
13 477 Meunier','Gilbert');
INSERT INTO "products" VALUES (75,'Hardy Le Goff SARL',554250.0,'28, boulevard de Lemonnier
95478 Leclercq','Bousquet-sur-Mer');
INSERT INTO "products" VALUES (76,'Maury',425303.0,'5, avenue Arnaud
89393 Bouchetnec','Lemonnier');
INSERT INTO "products" VALUES (77,'Adam SARL',850168.0,'rue Théophile Bruneau
49847 Bourgeois','Marion-sur-Mer');
INSERT INTO "products" VALUES (78,'Gay',281242.0,'82, avenue de Perez
05 927 Payet','Berger');
INSERT INTO "products" VALUES (79,'Voisin Boutin S.A.',941556.0,'boulevard de Guillot
64476 Merlenec','Delorme');
INSERT INTO "products" VALUES (80,'Mathieu Collet SAS',176054.0,'31, chemin Pages
54 497 MorelVille','Toussaintboeuf');
INSERT INTO "products" VALUES (81,'Breton',399399.0,'402, place Zacharie Samson
82 821 Alexandrenec','Bousquet-sur-Foucher');
INSERT INTO "products" VALUES (82,'Blondel',127995.0,'7, impasse Marcelle Michaud
93 815 Mallet','BourdonBourg');
INSERT INTO "products" VALUES (83,'Delannoy',626977.0,'76, rue Alexandre
68 219 Evrard','Nguyen');
INSERT INTO "products" VALUES (84,'Chevalier',250235.0,'2, place Denis
55 878 Lambert','Normand');
INSERT INTO "products" VALUES (85,'Hardy Munoz S.A.S.',731050.0,'boulevard Gomes
48060 Grenier','Albert-sur-Bouvier');
INSERT INTO "products" VALUES (86,'Thibault SA',285668.0,'814, impasse de De Sousa
84 732 Rossi','Jourdan-les-Bains');
INSERT INTO "products" VALUES (87,'Guilbert',905712.0,'896, impasse de Bazin
88 452 Thibault-les-Bains','Wagner');
INSERT INTO "products" VALUES (88,'Chauvin Gomez S.A.',301541.0,'35, chemin de Thierry
22969 Giraud','Rodrigues-sur-Mer');
INSERT INTO "products" VALUES (89,'Picard S.A.',826338.0,'avenue Camille Garcia
02 127 Meunier','Guyotnec');
INSERT INTO "products" VALUES (90,'Morvan',101232.0,'27, place de Martinez
90 565 Cousin','Bourgeois-sur-Joly');
INSERT INTO "products" VALUES (91,'Faure et Fils',195249.0,'8, chemin de Leleu
62116 Lombard','Guyon');
INSERT INTO "products" VALUES (92,'Bernard',374492.0,'rue Eugène Traore
65770 Poulain','Bouvier');
INSERT INTO "products" VALUES (93,'Martel',193257.0,'580, impasse de Lombard
85 002 Henry-la-Forêt','Duhamel');
INSERT INTO "products" VALUES (94,'Delannoy Morvan et Fils',613845.0,'27, rue de Le Goff
37 432 Pasquier','Hardyboeuf');
INSERT INTO "products" VALUES (95,'Didier Loiseau S.A.',201986.0,'4, impasse de Joubert
91883 Camus','Martin');
INSERT INTO "products" VALUES (96,'Perrin Levy S.A.S.',379654.0,'183, avenue de Guilbert
10542 Lefort','Blanchard-sur-Delmas');
INSERT INTO "products" VALUES (97,'Marechal',546104.0,'8, avenue Lucie Mercier
78 165 Fischer','Rochernec');
INSERT INTO "products" VALUES (98,'Delmas Klein S.A.',363852.0,'rue de Dubois
83246 DelormeVille','Roche');
INSERT INTO "products" VALUES (99,'Bousquet SARL',177738.0,'40, boulevard Susanne Henry
61 079 Gerard','Bertin');
INSERT INTO "products" VALUES (100,'Buisson Gonzalez et Fils',503822.0,'81, rue de Michel
98074 Laroche-les-Bains','Julien');
COMMIT;
