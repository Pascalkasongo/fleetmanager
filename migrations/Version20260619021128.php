<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260619021128 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, kilometrage DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, cout VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prochain_entretien DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE vehicule ADD maintenance_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DF6C202BC FOREIGN KEY (maintenance_id) REFERENCES maintenance (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DF6C202BC ON vehicule (maintenance_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DF6C202BC');
        $this->addSql('DROP INDEX IDX_292FFF1DF6C202BC ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP maintenance_id');
    }
}
