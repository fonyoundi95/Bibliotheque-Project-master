<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200924213916 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, image_file VARCHAR(255) NOT NULL, upload_image VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, birthday VARCHAR(255) NOT NULL, bibliography VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, author_id INT DEFAULT NULL, number_of_page INT NOT NULL, publishing_house VARCHAR(255) NOT NULL, resume VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, file_attach VARCHAR(255) NOT NULL, file_upload VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, image_upload VARCHAR(255) NOT NULL, INDEX IDX_4A1B2A9212469DE2 (category_id), INDEX IDX_4A1B2A92F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books_user (books_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_AE1A76667DD8AC20 (books_id), INDEX IDX_AE1A7666A76ED395 (user_id), PRIMARY KEY(books_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, image_category VARCHAR(255) NOT NULL, image_file VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A9212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE books_user ADD CONSTRAINT FK_AE1A76667DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE books_user ADD CONSTRAINT FK_AE1A7666A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD role LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92F675F31B');
        $this->addSql('ALTER TABLE books_user DROP FOREIGN KEY FK_AE1A76667DD8AC20');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A9212469DE2');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE books_user');
        $this->addSql('DROP TABLE category');
        $this->addSql('ALTER TABLE user DROP role');
    }
}
