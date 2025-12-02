create database zoo_db;

use zoo_db;

CREATE TABLE Habitat (
    IdHab INT PRIMARY KEY AUTO_INCREMENT,
    NomHab VARCHAR(100) NOT NULL UNIQUE,
    Description_Hab VARCHAR(500) NOT NULL
);

CREATE TABLE Animal (
    IdAnimal INT PRIMARY KEY AUTO_INCREMENT,
    NomAnimal VARCHAR(100) NOT NULL,
    Type_alimentaire VARCHAR(50) not null,
    Url_image VARCHAR(100) not null,
    IdHab INT NOT NULL,
    constraint fk_habite FOREIGN KEY (IdHab) REFERENCES Habitat(IdHab),
    constraint ch_typeanimal check (
        Type_alimentaire = "Carnivore"
        or Type_alimentaire = "Herbivore"
        or Type_alimentaire = "Omnivore"
    )
);

insert into
    Habitat (NomHab, Description_Hab) value (
        "Savane",
        "Une savane est une vaste étendue d'herbes, souvent tropicale, parsemée d'arbres ou d'arbustes clairsemés, et caractérisée par un climat à deux saisons distinctes : une saison humide et une saison sèche"
    );

insert into
    Habitat (NomHab, Description_Hab) value (
        "Jungle",
        "La jungle est une forêt tropicale humide, dense et luxuriante, caractérisée par une biodiversité exceptionnellement riche et des arbres qui se battent pour la lumière."
    );

insert into
    Habitat (NomHab, Description_Hab) value (
        "Désert",
        "Un désert est une région durablement très sèche, avec peu de précipitations et une forte évaporation, qui peut être chaude ou froide."
    );

insert into
    Habitat (NomHab, Description_Hab) value (
        "Océan",
        "Un océan est une vaste étendue d'eau salée qui couvre environ 71 % de la surface de la Terre, formant un système unique et interconnecté"
    );

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("lion", "Carnivore", "lion.png", 1);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("tigre", "Carnivore", "tigre.png", 1);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("zèbre", "Herbivore", "zebre.png", 1);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("éléphant", "Herbivore", "Url_image", 1);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("pingouin", "Carnivore", "pingouin.png", 2);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("panda", "Herbivore", "panda.png", 2);

insert into
    Animal (NomAnimal, Type_alimentaire, Url_image, IdHab) value ("panda", "Herbivore", "tortue.png", 2);

update Animal set NomAnimal = "lion africain" where IdAnimal = 1;
update Animal set Url_image = "lion_africain.png" where IdAnimal = 1; 


delete from Animal where IdAnimal = 4;    

select * from Habitat; -- affiche toutes les habitats 
 -- affiche tous les animaux et leur habitat 
select * from Animal,Habitat where Animal.IdHab = Habitat.IdHab;

select * from Animal , habitat where Animal.IdHab = Habitat.IdHab and  habitat.NomHab= "Savane";
select * from Animal , habitat where Animal.IdHab = Habitat.IdHab and  habitat.NomHab= "Jungle";


