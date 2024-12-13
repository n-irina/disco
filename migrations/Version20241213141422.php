<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241213141422 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album ADD picture_path VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE singer ADD composer_id INT DEFAULT NULL, ADD picture_path VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE singer ADD CONSTRAINT FK_98B619977A8D2620 FOREIGN KEY (composer_id) REFERENCES composer (id)');
        $this->addSql('CREATE INDEX IDX_98B619977A8D2620 ON singer (composer_id)');
        $this->addSql('ALTER TABLE song ADD picture_path VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album DROP picture_path');
        $this->addSql('ALTER TABLE singer DROP FOREIGN KEY FK_98B619977A8D2620');
        $this->addSql('DROP INDEX IDX_98B619977A8D2620 ON singer');
        $this->addSql('ALTER TABLE singer DROP composer_id, DROP picture_path');
        $this->addSql('ALTER TABLE song DROP picture_path');
    }
}
