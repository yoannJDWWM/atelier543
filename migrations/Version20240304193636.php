<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304193636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet_images ADD projet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet_images ADD CONSTRAINT FK_C2B60E3CC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('CREATE INDEX IDX_C2B60E3CC18272 ON projet_images (projet_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet_images DROP FOREIGN KEY FK_C2B60E3CC18272');
        $this->addSql('DROP INDEX IDX_C2B60E3CC18272 ON projet_images');
        $this->addSql('ALTER TABLE projet_images DROP projet_id');
    }
}
