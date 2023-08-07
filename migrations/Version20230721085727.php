<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230721085727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE structure (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE structure_team (structure_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_75FAD43D2534008B (structure_id), INDEX IDX_75FAD43D296CD8AE (team_id), PRIMARY KEY(structure_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE structure_team ADD CONSTRAINT FK_75FAD43D2534008B FOREIGN KEY (structure_id) REFERENCES structure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE structure_team ADD CONSTRAINT FK_75FAD43D296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team DROP age, DROP adresse, DROP tel, DROP mail, DROP cv, DROP photo');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE structure_team DROP FOREIGN KEY FK_75FAD43D2534008B');
        $this->addSql('ALTER TABLE structure_team DROP FOREIGN KEY FK_75FAD43D296CD8AE');
        $this->addSql('DROP TABLE structure');
        $this->addSql('DROP TABLE structure_team');
        $this->addSql('ALTER TABLE team ADD age INT NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD tel VARCHAR(255) NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD cv VARCHAR(255) NOT NULL, ADD photo VARCHAR(255) NOT NULL');
    }
}
