<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230824084443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postale INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrat_location (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, INDEX IDX_E751939167B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, img VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, vehicule_obtenue_id INT DEFAULT NULL, genres_id INT DEFAULT NULL, images_id INT DEFAULT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_292FFF1D8A4CE2A8 (vehicule_obtenue_id), INDEX IDX_292FFF1D6A3B2603 (genres_id), INDEX IDX_292FFF1DD44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule_obtenue (id INT AUTO_INCREMENT NOT NULL, contrat_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_B33687721823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat_location ADD CONSTRAINT FK_E751939167B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D8A4CE2A8 FOREIGN KEY (vehicule_obtenue_id) REFERENCES vehicule_obtenue (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6A3B2603 FOREIGN KEY (genres_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DD44F05E5 FOREIGN KEY (images_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE vehicule_obtenue ADD CONSTRAINT FK_B33687721823061F FOREIGN KEY (contrat_id) REFERENCES contrat_location (id)');
        $this->addSql('ALTER TABLE user ADD conditions_id INT DEFAULT NULL, ADD adresses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C5FBDC0F FOREIGN KEY (conditions_id) REFERENCES condition_generale (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64985E14726 FOREIGN KEY (adresses_id) REFERENCES adresse (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649C5FBDC0F ON user (conditions_id)');
        $this->addSql('CREATE INDEX IDX_8D93D64985E14726 ON user (adresses_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64985E14726');
        $this->addSql('ALTER TABLE contrat_location DROP FOREIGN KEY FK_E751939167B3B43D');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D8A4CE2A8');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6A3B2603');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DD44F05E5');
        $this->addSql('ALTER TABLE vehicule_obtenue DROP FOREIGN KEY FK_B33687721823061F');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE contrat_location');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE vehicule_obtenue');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C5FBDC0F');
        $this->addSql('DROP INDEX UNIQ_8D93D649C5FBDC0F ON user');
        $this->addSql('DROP INDEX IDX_8D93D64985E14726 ON user');
        $this->addSql('ALTER TABLE user DROP conditions_id, DROP adresses_id');
    }
}
