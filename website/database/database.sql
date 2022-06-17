
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Restaurant;
DROP TABLE IF EXISTS Phone;
DROP TABLE IF EXISTS Dish;
DROP TABLE IF EXISTS Category;

/*******************************************************************************
   Create Tables
********************************************************************************/
CREATE TABLE Users
(
    id INTEGER NOT NULL,
    firstName NVARCHAR(25) NOT NULL,
    lastName NVARCHAR(25) NOT NULL,
    phoneNumber NVARCHAR(9) NOT NULL UNIQUE,
    email NVARCHAR(100) NOT NULL UNIQUE,
    password NVARCHAR(255) NOT NULL,
    birthDate INTEGER NOT NULL,
    gender NVARCHAR(6) NOT NULL,
    isOwner INTEGER DEFAULT 0 NOT NULL,
    isAdmin INTEGER DEFAULT 0 NOT NULL,
    signUpDate INTEGER DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_Account PRIMARY KEY  (id)
);

CREATE TABLE Restaurant
(
    id INTEGER NOT NULL,
    name NVARCHAR(50)  NOT NULL,
    address NVARCHAR(250) NOT NULL,
    thumbnail NVARCHAR(250) NOT NULL,
    ownerId INTEGER NOT NULL,
    signUpDate INTEGER DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_Restaurant PRIMARY KEY  (id),
    FOREIGN KEY (ownerId) REFERENCES Users (id)
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
    price NUMERIC(6,2) NOT NULL,
    description NVARCHAR(200) NOT NULL,
    thumbnail NVARCHAR(250) NOT NULL,
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
    thumbnail NVARCHAR(250) NOT NULL,
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

INSERT INTO Users (firstName, lastName, phoneNumber, email, password, birthDate, gender) VALUES ('Pedro', 'Veloso', '917879879', '1@gmail.com', '$2y$10$fzTTt1GsFpHCRx0htjil5ejz6Fmcw9TpUV3LKwyOfiUQ6wIGnxEpu', '2004-10-20', 'Male');

INSERT INTO Restaurant (name, address, thumbnail, ownerId) VALUES ('Ferrugem', 'Rua das Pedrinhas 32 Portela VNF, Vila Nova de Famalicão 4770-379 Portugal', 'ferrugem.jpg','1');
INSERT INTO Restaurant (name, address, thumbnail, ownerId) VALUES ('Mikado', 'Avenida dos Descobrimentos, 840, Vila Nova de Famalicão 4760-011 Portugal', 'mikado.jpg','1');
INSERT INTO Restaurant (name, address, thumbnail, ownerId) VALUES ('Pensão Santo António', 'Praça D. Maria II, 1714, Vila Nova de Famalicão 4760-111 Portugal', 'pensaosantonio.jpg','1');
INSERT INTO Restaurant (name, address, thumbnail, ownerId) VALUES ('ME.AT Famalicão', 'Avenida 25 de abril, 22, Vila Nova de Famalicão 4760-101 Portugal', 'meatfamalicao.jpg','1');
INSERT INTO Restaurant (name, address, thumbnail, ownerId) VALUES ('Lounge', 'R. Mário Cesariny 444 Loja 1, Vila Nova de Famalicão 4760-010 Portugal', 'lounge.jpg','1');

INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('+351 252 911 700', '1');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('+351 912 503 308', '2');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('+351 252 322 704', '3');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('+351 935 441 144', '4');
INSERT INTO Phone (phoneNumber, restaurantId) VALUES ('+351 935 517 018', '5');

INSERT INTO Category (name, thumbnail) VALUES ('Breakfast', 'Breakfast.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Burgers', 'Burgers.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Chinese', 'Chinese.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Country Food', 'CountryFood.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Fast Food', 'FastFood.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Gluten-free', 'Gluten-free.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Hot Dogs', 'HotDogs.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Ice Cream', 'IceCream.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Indian', 'Indian.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Italian', 'Italian.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Japanese', 'Japanese.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Mexican', 'Mexican.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Pizza', 'Pizza.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Seafood', 'Seafood.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Soup & Salad', 'SoupSalad.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Steaks', 'Steaks.jpg');
INSERT INTO Category (name, thumbnail) VALUES ('Sushi', 'Sushi.jpg');

INSERT INTO Dish (name, price, description, thumbnail, restaurantid, categoryid) VALUES ('Lasanha', 12.60, 'DELICIA', '/website/assets/images/dishes/thumbnails/1.jpg', '1', '1');
INSERT INTO Dish (name, price, description, thumbnail, restaurantid, categoryid) VALUES ('Arroz de Pata', 21.50, 'kidijfunr,uiaejf,naer,frnio+mksdfmf sfkjsdn fjksdm fsjdkç', '/website/assets/images/dishes/thumbnails/2.jpg', '1', '1');
INSERT INTO Dish (name, price, description, thumbnail, restaurantid, categoryid) VALUES ('Bacalhoa com Natas', 17.50, 'kidijfunr,uiaejf,naer,frnio+mksdfmf sfkjsdn fjksdm fsjdkç', '/website/assets/images/dishes/thumbnails/3.jpg', '3', '2');
