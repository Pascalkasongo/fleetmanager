<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260621030803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi DROP FOREIGN KEY `FK_2EBCCA8F39EFED10`');
        $this->addSql('DROP INDEX IDX_2EBCCA8F39EFED10 ON suivi');
        $this->addSql('ALTER TABLE suivi ADD prochain_entretien DOUBLE PRECISION NOT NULL, DROP prochain_entretien_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE suivi ADD prochain_entretien_id INT DEFAULT NULL, DROP prochain_entretien');
        $this->addSql('ALTER TABLE suivi ADD CONSTRAINT `FK_2EBCCA8F39EFED10` FOREIGN KEY (prochain_entretien_id) REFERENCES maintenance (id)');
        $this->addSql('CREATE INDEX IDX_2EBCCA8F39EFED10 ON suivi (prochain_entretien_id)');
    }
}
