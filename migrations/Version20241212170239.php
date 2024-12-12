<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241212170239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album_song (album_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_57E658E11137ABCF (album_id), INDEX IDX_57E658E1A0BDB2F3 (song_id), PRIMARY KEY(album_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composer_song (composer_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_1D0923E57A8D2620 (composer_id), INDEX IDX_1D0923E5A0BDB2F3 (song_id), PRIMARY KEY(composer_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE singer_song (singer_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_58B4FF1F271FD47C (singer_id), INDEX IDX_58B4FF1FA0BDB2F3 (song_id), PRIMARY KEY(singer_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE singer_album (singer_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_152AA9D9271FD47C (singer_id), INDEX IDX_152AA9D91137ABCF (album_id), PRIMARY KEY(singer_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album_song ADD CONSTRAINT FK_57E658E11137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_song ADD CONSTRAINT FK_57E658E1A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composer_song ADD CONSTRAINT FK_1D0923E57A8D2620 FOREIGN KEY (composer_id) REFERENCES composer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composer_song ADD CONSTRAINT FK_1D0923E5A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE singer_song ADD CONSTRAINT FK_58B4FF1F271FD47C FOREIGN KEY (singer_id) REFERENCES singer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE singer_song ADD CONSTRAINT FK_58B4FF1FA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE singer_album ADD CONSTRAINT FK_152AA9D9271FD47C FOREIGN KEY (singer_id) REFERENCES singer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE singer_album ADD CONSTRAINT FK_152AA9D91137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album_song DROP FOREIGN KEY FK_57E658E11137ABCF');
        $this->addSql('ALTER TABLE album_song DROP FOREIGN KEY FK_57E658E1A0BDB2F3');
        $this->addSql('ALTER TABLE composer_song DROP FOREIGN KEY FK_1D0923E57A8D2620');
        $this->addSql('ALTER TABLE composer_song DROP FOREIGN KEY FK_1D0923E5A0BDB2F3');
        $this->addSql('ALTER TABLE singer_song DROP FOREIGN KEY FK_58B4FF1F271FD47C');
        $this->addSql('ALTER TABLE singer_song DROP FOREIGN KEY FK_58B4FF1FA0BDB2F3');
        $this->addSql('ALTER TABLE singer_album DROP FOREIGN KEY FK_152AA9D9271FD47C');
        $this->addSql('ALTER TABLE singer_album DROP FOREIGN KEY FK_152AA9D91137ABCF');
        $this->addSql('DROP TABLE album_song');
        $this->addSql('DROP TABLE composer_song');
        $this->addSql('DROP TABLE singer_song');
        $this->addSql('DROP TABLE singer_album');
    }
}
