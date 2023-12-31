<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230721091221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structure ADD statut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE team DROP age, DROP adresse, DROP tel, DROP mail, DROP cv, DROP photo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structure DROP statut');
        $this->addSql('ALTER TABLE team ADD age INT NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD tel VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD cv VARCHAR(255) NOT NULL, ADD photo VARCHAR(255) NOT NULL');
    }
}
