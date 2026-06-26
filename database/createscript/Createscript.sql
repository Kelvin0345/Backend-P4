USE breezedemo;
DROP TABLE if exists allergeen;
CREATE TABLE Allergeen
(
    Id              INT UNSIGNED         NOT NULL AUTO_INCREMENT
   ,Naam            VARCHAR(100)         NOT NULL
   ,Omschrijving    VARCHAR(255)              NULL DEFAULT NULL
   ,IsActief        BIT                  NOT NULL DEFAULT 1
   ,Opmerking       VARCHAR(255)              NULL DEFAULT NULL
   ,DatumAangemaakt DATETIME(6)          NOT NULL DEFAULT NOW(6)
   ,DatumGewijzigd  DATETIME(6)          NOT NULL DEFAULT NOW(6)
   ,CONSTRAINT        PK_Allergeen_Id      PRIMARY KEY (Id)
) ENGINE=InnoDB;


INSERT INTO Allergeen 
(
Naam
,Omschrijving 
) 
VALUES 
('Gluten', 'Eiwit dat voorkomt in onder andere tarwe, rogge en gerst.')
,('Pinda', 'Aardnoot die hevige allergische reacties kan veroorzaken.')
,('Koemelk', 'Allergie voor het eiwit in koemelk.');