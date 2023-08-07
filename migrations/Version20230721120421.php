<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230721120421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team_team (team_source INT NOT NULL, team_target INT NOT NULL, INDEX IDX_15015264299138AA (team_source), INDEX IDX_1501526430746825 (team_target), PRIMARY KEY(team_source, team_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_15015264299138AA FOREIGN KEY (team_source) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_team ADD CONSTRAINT FK_1501526430746825 FOREIGN KEY (team_target) REFERENCES team (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team_team DROP FOREIGN KEY FK_15015264299138AA');
        $this->addSql('ALTER TABLE team_team DROP FOREIGN KEY FK_1501526430746825');
        $this->addSql('DROP TABLE team_team');
    }
}
