<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210201075317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(100) DEFAULT NULL, last_name VARCHAR(100) DEFAULT NULL, email VARCHAR(120) NOT NULL, is_verified TINYINT(1) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_70E4FA78F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, state VARCHAR(20) NOT NULL, is_menu TINYINT(1) NOT NULL, meta_keywords LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', meta_description LONGTEXT DEFAULT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', position INT DEFAULT NULL, publish_at DATETIME DEFAULT NULL, publish_end DATE DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_140AB620F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parameter (id INT AUTO_INCREMENT NOT NULL, name_site VARCHAR(100) NOT NULL, title_site VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, is_online TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620F675F31B FOREIGN KEY (author_id) REFERENCES member (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620F675F31B');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE parameter');
    }
}
