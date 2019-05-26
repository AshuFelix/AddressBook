<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190524162828 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__address_book AS SELECT id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, email, picture, birthday FROM address_book');
        $this->addSql('DROP TABLE address_book');
        $this->addSql('CREATE TABLE address_book (id INTEGER NOT NULL, firstname VARCHAR(40) NOT NULL COLLATE BINARY, lastname VARCHAR(40) NOT NULL COLLATE BINARY, street VARCHAR(40) NOT NULL COLLATE BINARY, streetnumber VARCHAR(10) NOT NULL COLLATE BINARY, zip INTEGER NOT NULL, city VARCHAR(50) NOT NULL COLLATE BINARY, country VARCHAR(40) NOT NULL COLLATE BINARY, phonenumber VARCHAR(15) NOT NULL COLLATE BINARY, email VARCHAR(100) NOT NULL COLLATE BINARY, picture VARCHAR(25) DEFAULT NULL COLLATE BINARY, birthday VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO address_book (id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, email, picture, birthday) SELECT id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, email, picture, birthday FROM __temp__address_book');
        $this->addSql('DROP TABLE __temp__address_book');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__address_book AS SELECT id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, birthday, email, picture FROM address_book');
        $this->addSql('DROP TABLE address_book');
        $this->addSql('CREATE TABLE address_book (id INTEGER NOT NULL, firstname VARCHAR(40) NOT NULL, lastname VARCHAR(40) NOT NULL, street VARCHAR(40) NOT NULL, streetnumber VARCHAR(10) NOT NULL, zip INTEGER NOT NULL, city VARCHAR(50) NOT NULL, country VARCHAR(40) NOT NULL, phonenumber VARCHAR(15) NOT NULL, email VARCHAR(100) NOT NULL, picture VARCHAR(25) DEFAULT NULL, birthday VARCHAR(8) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO address_book (id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, birthday, email, picture) SELECT id, firstname, lastname, street, streetnumber, zip, city, country, phonenumber, birthday, email, picture FROM __temp__address_book');
        $this->addSql('DROP TABLE __temp__address_book');
    }
}
