<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260618021924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affectation (id INT AUTO_INCREMENT NOT NULL, motif VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE chauffeur ADD affectation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chauffeur ADD CONSTRAINT FK_5CA777B86D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('CREATE INDEX IDX_5CA777B86D0ABA22 ON chauffeur (affectation_id)');
        $this->addSql('ALTER TABLE vehicule ADD affectation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D6D0ABA22 FOREIGN KEY (affectation_id) REFERENCES affectation (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1D6D0ABA22 ON vehicule (affectation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE affectation');
        $this->addSql('ALTER TABLE chauffeur DROP FOREIGN KEY FK_5CA777B86D0ABA22');
        $this->addSql('DROP INDEX IDX_5CA777B86D0ABA22 ON chauffeur');
        $this->addSql('ALTER TABLE chauffeur DROP affectation_id');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D6D0ABA22');
        $this->addSql('DROP INDEX IDX_292FFF1D6D0ABA22 ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP affectation_id');
    }
}
