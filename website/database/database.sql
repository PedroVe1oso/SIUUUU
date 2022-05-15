
DROP TABLE IF EXISTS Account;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Phone;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Category;

/*******************************************************************************
   Create Tables
********************************************************************************/
CREATE TABLE Account
(
    id INTEGER NOT NULL,
    firstName NVARCHAR(25) NOT NULL,
    lastName NVARCHER(25) NOT NULL,
    phoneNumber NVARCHAR(9) NOT NULL UNIQUE,
    email NVARCHAR(100) NOT NULL UNIQUE,
    password NVARCHAR(255) NOT NULL,
    birthDate DATE NOT NULL,
    isOwner BIT DEFAULT 0 NOT NULL,
    isAdmin BIT DEFAULT 0 NOT NULL,
    signUpDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_Account PRIMARY KEY  (id)
);

CREATE TABLE Restaurant
(
    id INTEGER NOT NULL,
    name NVARCHAR(50)  NOT NULL,
    address NVARCHAR(250) NOT NULL,
    ownerId INTEGER NOT NULL,
    signUpDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_Restaurant PRIMARY KEY  (id),
    FOREIGN KEY (ownerId) REFERENCES Account (id)
        ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE Phone
(
    phoneNumber NVARCHAR(9) NOT NULL,
    restaurantId INTEGER NOT NULL,
    CONSTRAINT Pk_Phone PRIMARY KEY (phoneNumber),
    FOREIGN KEY (restaurantId) REFERENCES Restaurant (id)
        ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE Dish
(
    id INTEGER NOT NULL,
    name NVARCHAR(50)  NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    description NVARCHAR(200) NOT NULL,
    restaurantId INTEGER NOT NULL,
    categoryId INTEGER NOT NULL,
    CONSTRAINT PK_Dish PRIMARY KEY  (id),
    FOREIGN KEY (restaurantId) REFERENCES Restaurant (id)
        ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY (categoryId) REFERENCES Category (id)
        ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE Category
(
    id INTEGER NOT NULL,
    name NVARCHAR(50)  NOT NULL,
    CONSTRAINT PK_Category PRIMARY KEY  (id)
);

/*******************************************************************************
   Create Foreign Keys
********************************************************************************/
CREATE INDEX IFK_RestaurantId ON Restaurant (id);

CREATE INDEX IFK_Category ON Category (id);

/*******************************************************************************
   Populate Tables
********************************************************************************/

INSERT INTO Account (firstName, lastName, phoneNumber, email, password, birthDate) VALUES ('Pedro', 'Veloso', '917879879', '1@gmail.com', 'admin', '2004-10-20');
INSERT INTO Account (firstName, lastName, phoneNumber, email, password, birthDate) VALUES ('Jorge', 'Jesus', '968767564', '2@gmail.com', 'admin', '2003-1-13');
INSERT INTO Account (firstName, lastName, phoneNumber, email, password, birthDate) VALUES ('Bruno', 'Carvalho', '938762512', '3@gmail.com', 'admin', '2001-5-4');

INSERT INTO Restaurant (name, address, ownerId) VALUES ('Ola', 'Praça da Liberdade 126, 4000-322 Porto', '1');
INSERT INTO Restaurant (name, address, ownerId) VALUES ('Adeus', 'Estr. Exterior da Circunvalação 8114-8116, 4200-163 Porto', '2');
INSERT INTO Restaurant (name, address, ownerId) VALUES ('Té Logo', 'Av. de Fernão de Magalhães 1647/59, 4350-170 Porto', '3');

INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('918789987', '1');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('252034678', '1');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('967345192', '2');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('250873248', '3');

INSERT INTO Category (name) VALUES ('Carnes');
INSERT INTO Category (name) VALUES ('Peixe');

INSERT INTO Dish (name, price, description, restaurantid, categoryid) VALUES ('Lasanha', 12.60, 'DELICIA', '1', '1');
INSERT INTO Dish (name, price, description, restaurantid, categoryid) VALUES ('Arroz de Pata', 21.50, 'kidijfunr,uiaejf,naer,frnio+mksdfmf sfkjsdn fjksdm fsjdkç', '1', '1');
INSERT INTO Dish (name, price, description, restaurantid, categoryid) VALUES ('Bacalhoa com Natas', 17.50, 'kidijfunr,uiaejf,naer,frnio+mksdfmf sfkjsdn fjksdm fsjdkç', '3', '2');
