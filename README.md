FinalProjectPHP
===============

Position:
    username
    symbol
    amount
    buyPrice

User:
    username
    password
    email
    cash
    Portfolio



Tables Creation:
    Positions:
        CREATE TABLE Positions (
        `id` INT NOT NULL AUTO_INCREMENT,
        `Username` VARCHAR(40) NOT NULL,
        `Symbol` VARCHAR(40) NOT NULL,
        `Amount` INT(40) NOT NULL,
        `BuyPrice` FLOAT(40) NOT NULL,
        PRIMARY KEY(`id`)
        );



