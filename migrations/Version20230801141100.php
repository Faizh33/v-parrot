<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230801141100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', brand VARCHAR(50) NOT NULL, model VARCHAR(50) NOT NULL, price INT NOT NULL, entry_into_service DATE NOT NULL, milage INT NOT NULL, gearbox VARCHAR(50) DEFAULT NULL, license VARCHAR(50) DEFAULT NULL, color VARCHAR(50) DEFAULT NULL, doors_nb INT DEFAULT NULL, seat_nb INT DEFAULT NULL, fiscal_power INT DEFAULT NULL, din_power INT DEFAULT NULL, consumption NUMERIC(3, 1) DEFAULT NULL, crit_air INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_option (id INT AUTO_INCREMENT NOT NULL, car_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', options VARCHAR(255) NOT NULL, INDEX IDX_42EEEC42C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE repair (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, comment LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_option ADD CONSTRAINT FK_42EEEC42C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_option DROP FOREIGN KEY FK_42EEEC42C3C6F69F');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_option');
        $this->addSql('DROP TABLE repair');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE user');
    }
}
