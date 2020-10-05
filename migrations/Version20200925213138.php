<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200925213138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author ADD update_image DATETIME NOT NULL');
        $this->addSql('ALTER TABLE books ADD update_file DATETIME NOT NULL, ADD update_image DATETIME NOT NULL');
        $this->addSql('ALTER TABLE category ADD update_image DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author DROP update_image');
        $this->addSql('ALTER TABLE books DROP update_file, DROP update_image');
        $this->addSql('ALTER TABLE category DROP update_image');
    }
}
