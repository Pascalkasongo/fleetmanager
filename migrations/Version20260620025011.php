<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260620025011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suivi (id INT AUTO_INCREMENT NOT NULL, kilometrage_actuel DOUBLE PRECISION NOT NULL, date DATE NOT NULL, ecart DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, vehicule_id INT DEFAULT NULL, prochain_entretien_id INT DEFAULT NULL, INDEX IDX_2EBCCA8F4A4A3511 (vehicule_id), INDEX IDX_2EBCCA8F39EFED10 (prochain_entretien_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F4A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT FK_2EBCCA8F39EFED10 FOREIGN KEY (prochain_entretien_id) REFERENCES maintenance (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F4A4A3511');
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY FK_2EBCCA8F39EFED10');
        $this->addSql('DROP TABLE suivi');
    }
}
