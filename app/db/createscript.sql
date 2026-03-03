-- Step: 01
-- ******************************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         10-02-2026   Arjan de Ruijter     Smartphones
-- ******************************************************

-- Verwijder database MVC_Basics_2509AB
DROP DATABASE IF EXISTS `MVC_Basics_2509AB`;

-- Maak een nieuwe database aan MVC_Basics_2509AB
CREATE DATABASE `MVC_Basics_2509AB`;

-- Gebruik database MVC_Basics_2509AB
USE `MVC_Basics_2509AB`;

-- Step: 02
-- ******************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         10-02-2026   Arjan de Ruijter     Tabel Smartphones
-- ******************************************************
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ******************************************************

CREATE TABLE Smartphones
(
     Id              SMALLINT        UNSIGNED NOT NULL AUTO_INCREMENT
    ,Merk            VARCHAR(50)              NOT NULL
    ,Model           VARCHAR(50)              NOT NULL
    ,Prijs           DECIMAL(6,2)              NOT NULL
    ,Geheugen        DECIMAL(4,0)              NOT NULL
    ,Besturingssysteem VARCHAR(25)             NOT NULL
    ,Schermgrootte   DECIMAL(3,2)              NOT NULL
    ,Releasedatum    DATE                     NOT NULL
    ,MegaPixels      DECIMAL(3,0)              NOT NULL
    ,IsActief        BIT                      NOT NULL DEFAULT 1
    ,Opmerking       VARCHAR(255)              NULL DEFAULT NULL
    ,DatumAangemaakt DATETIME(6)               NOT NULL DEFAULT NOW(6)
    ,DatumGewijzigd  DATETIME(6)               NOT NULL DEFAULT NOW(6)
    ,CONSTRAINT PK_Smartphones_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;

-- Step: 03
-- ******************************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         10-02-2026   Arjan de Ruijter     Vulling Smartphones
-- ******************************************************

INSERT INTO Smartphones
(
     Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
('Apple',   'iPhone 16 Pro',     1256.56,  64,  'iOS 18',      6.7, '2025-01-19',  50),
('Samsung','Galaxy S25 Ultra',   1539.00, 128,  'Android 15',  6.1, '2025-02-01', 200),
('Google', 'Pixel 9 Pro',         890.00, 1024, 'Android 15',  6.3, '2024-12-20', 100);
-- Step: 04
-- ******************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Sneakers
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         10-02-2026   Arjan de Ruijter     Tabel Sneakers
-- ******************************************************
-- Type (Hardloop, Basketbal, Casual)
-- ******************************************************

CREATE TABLE Sneakers
(
     Id              SMALLINT        UNSIGNED NOT NULL AUTO_INCREMENT
    ,Merk            VARCHAR(50)              NOT NULL
    ,Model           VARCHAR(50)              NOT NULL
    ,Type            VARCHAR(25)              NOT NULL
    ,Materiaal		 varchar(25)			  NOT NULL
    ,Gewicht		 VARCHAR(25)			  NOT NULL
    ,Releasedatum	 date			  			NOT NULL
    ,IsActief        BIT                      NOT NULL DEFAULT 1
    ,Opmerking       VARCHAR(255)              NULL DEFAULT NULL
    ,DatumAangemaakt DATETIME(6)               NOT NULL DEFAULT NOW(6)
    ,DatumGewijzigd  DATETIME(6)               NOT NULL DEFAULT NOW(6)
    ,CONSTRAINT PK_Sneakers_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;

-- Step: 05
-- ******************************************************
-- Doel : Vul de tabel Sneakers met gegevens
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         10-02-2026   Arjan de Ruijter     Vulling Sneakers
-- ******************************************************

INSERT INTO Sneakers
(
     Merk
    ,Model
    ,Type
    ,Materiaal
    ,Gewicht
    ,Releasedatum
)
VALUES
('Nike',       'Air Jordan 1',     'Hardloop',   'Leer',        '1Kg',    '1995-03-01'),
('Adidas',     'Yeezy Boost 350',  'Basketbal',  'Mesh',        '0.8Kg',  '2015-06-27'),
('New Balance','Pixel 9 Pro',      'Casual',     'Synthetisch', '0.9Kg',  '2022-09-15'),
('Trico',      'New Age',          'Casual',     'Synthetisch', '0.7Kg',  '2021-04-10'),
('Overlord',   'Tristar 6',        'Hardloop',   'Mesh',        '0.85Kg', '2020-11-05');

-- Step: 04
-- ******************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         03-03-2026   Arjan de Ruijter     Tabel Horloges
-- ******************************************************
-- Type (Analoog, Digitaal, Smartwatch)
-- ******************************************************

CREATE TABLE Horloges
(
     Id              SMALLINT        UNSIGNED NOT NULL AUTO_INCREMENT
    ,Merk            VARCHAR(50)              NOT NULL
    ,Model           VARCHAR(50)              NOT NULL
    ,Type            VARCHAR(25)              NOT NULL
    ,Materiaal       VARCHAR(25)              NOT NULL
    ,Diameter        VARCHAR(10)              NOT NULL
    ,Releasedatum    DATE                     NOT NULL
    ,IsActief        BIT                      NOT NULL DEFAULT 1
    ,Opmerking       VARCHAR(255)              NULL DEFAULT NULL
    ,DatumAangemaakt DATETIME(6)              NOT NULL DEFAULT NOW(6)
    ,DatumGewijzigd  DATETIME(6)              NOT NULL DEFAULT NOW(6)
    ,CONSTRAINT PK_Horloges_Id PRIMARY KEY (Id)
)
ENGINE=InnoDB;

-- Step: 05
-- ******************************************************
-- Doel : Vul de tabel Horloges met gegevens
-- ******************************************************
-- Versie     Datum        Auteur              Omschrijving
-- 01         03-03-2026   Arjan de Ruijter     Vulling Horloges
-- ******************************************************

INSERT INTO Horloges
(
    Merk
    ,Model
    ,Type
    ,Materiaal
    ,Diameter
    ,Releasedatum
)
VALUES
('Rolex',         'Submariner',        'Analoog',   'Staal',      '41mm', '2020-03-15'),
('Omega',         'Speedmaster',       'Analoog',   'Staal',      '42mm', '2021-06-01'),
('Apple',         'Series 9',          'Smartwatch','Aluminium',  '45mm', '2023-09-22'),
('Casio',         'G-Shock GA-2100',   'Digitaal',  'Kunststof',  '44mm', '2019-08-10'),
('Samsung',       'Galaxy Watch 6',    'Smartwatch','Aluminium',  '44mm', '2023-07-26');
