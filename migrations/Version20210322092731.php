<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322092731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, section_id INT DEFAULT NULL, title VARCHAR(120) NOT NULL, slug VARCHAR(120) NOT NULL, description LONGTEXT DEFAULT NULL, content LONGTEXT DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_23A0E66D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_category (article_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_53A4EDAA7294869C (article_id), INDEX IDX_53A4EDAA12469DE2 (category_id), PRIMARY KEY(article_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_member (id INT AUTO_INCREMENT NOT NULL, name_society VARCHAR(100) DEFAULT NULL, adress VARCHAR(120) DEFAULT NULL, complement VARCHAR(150) NOT NULL, zipcode VARCHAR(5) DEFAULT NULL, city VARCHAR(150) DEFAULT NULL, phone_desk VARCHAR(14) DEFAULT NULL, phone_gsm VARCHAR(14) DEFAULT NULL, email_society VARCHAR(100) DEFAULT NULL, siret VARCHAR(100) DEFAULT NULL, ape VARCHAR(100) DEFAULT NULL, is_rgpd TINYINT(1) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_member_type_product (card_member_id INT NOT NULL, type_product_id INT NOT NULL, INDEX IDX_F65E814119F30AA (card_member_id), INDEX IDX_F65E81415887B07F (type_product_id), PRIMARY KEY(card_member_id, type_product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, create_at DATETIME NOT NULL, upadate_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fam_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, card_member_id INT DEFAULT NULL, username VARCHAR(100) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(100) DEFAULT NULL, last_name VARCHAR(100) DEFAULT NULL, email VARCHAR(120) NOT NULL, is_verified TINYINT(1) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, type_member VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_70E4FA78F85E0677 (username), UNIQUE INDEX UNIQ_70E4FA7819F30AA (card_member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, state VARCHAR(20) NOT NULL, is_menu TINYINT(1) NOT NULL, meta_keywords LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', meta_description LONGTEXT DEFAULT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', position INT DEFAULT NULL, publish_at DATETIME DEFAULT NULL, publish_end DATE DEFAULT NULL, is_publish TINYINT(1) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_140AB620F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_section (page_id INT NOT NULL, section_id INT NOT NULL, INDEX IDX_D713917AC4663E4 (page_id), INDEX IDX_D713917AD823E37A (section_id), PRIMARY KEY(page_id, section_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parameter (id INT AUTO_INCREMENT NOT NULL, name_site VARCHAR(100) NOT NULL, title_site VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, is_online TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, producer_id INT DEFAULT NULL, type_id INT DEFAULT NULL, family_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_D34A04AD89B658FE (producer_id), INDEX IDX_D34A04ADC54C8C93 (type_id), INDEX IDX_D34A04ADC35E566A (family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, id_name VARCHAR(20) DEFAULT NULL, name_name VARCHAR(50) DEFAULT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_category ADD CONSTRAINT FK_53A4EDAA12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_member_type_product ADD CONSTRAINT FK_F65E814119F30AA FOREIGN KEY (card_member_id) REFERENCES card_member (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_member_type_product ADD CONSTRAINT FK_F65E81415887B07F FOREIGN KEY (type_product_id) REFERENCES type_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7819F30AA FOREIGN KEY (card_member_id) REFERENCES card_member (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620F675F31B FOREIGN KEY (author_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE page_section ADD CONSTRAINT FK_D713917AC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_section ADD CONSTRAINT FK_D713917AD823E37A FOREIGN KEY (section_id) REFERENCES section (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD89B658FE FOREIGN KEY (producer_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC54C8C93 FOREIGN KEY (type_id) REFERENCES type_product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC35E566A FOREIGN KEY (family_id) REFERENCES fam_product (id)');
        $this->addSql('DROP TABLE producer');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA7294869C');
        $this->addSql('ALTER TABLE card_member_type_product DROP FOREIGN KEY FK_F65E814119F30AA');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA7819F30AA');
        $this->addSql('ALTER TABLE article_category DROP FOREIGN KEY FK_53A4EDAA12469DE2');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC35E566A');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620F675F31B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD89B658FE');
        $this->addSql('ALTER TABLE page_section DROP FOREIGN KEY FK_D713917AC4663E4');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D823E37A');
        $this->addSql('ALTER TABLE page_section DROP FOREIGN KEY FK_D713917AD823E37A');
        $this->addSql('ALTER TABLE card_member_type_product DROP FOREIGN KEY FK_F65E81415887B07F');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC54C8C93');
        $this->addSql('CREATE TABLE producer (id INT AUTO_INCREMENT NOT NULL, name_society VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adress VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, complement VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, zipcode VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, city VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, phone_desk VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone_gsm VARCHAR(14) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(120) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, siret VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ape VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, create_at DATETIME NOT NULL, update_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_category');
        $this->addSql('DROP TABLE card_member');
        $this->addSql('DROP TABLE card_member_type_product');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE fam_product');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_section');
        $this->addSql('DROP TABLE parameter');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE type_product');
    }
}
