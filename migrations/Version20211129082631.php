<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211129082631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE basket (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE basket_product (basket_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_17ED14B41BE1FB52 (basket_id), INDEX IDX_17ED14B44584665A (product_id), PRIMARY KEY(basket_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, pay_to VARCHAR(255) DEFAULT NULL, order_rank INT NOT NULL, color VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, email_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', phone_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', deleted TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_responsability (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, company_id INT NOT NULL, type INT NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, email_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', phone_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', deleted TINYINT(1) NOT NULL, INDEX IDX_7469EBCCA76ED395 (user_id), INDEX IDX_7469EBCC979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, company_id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT NOT NULL, stock INT DEFAULT NULL, active TINYINT(1) NOT NULL, deleted TINYINT(1) NOT NULL, INDEX IDX_D34A04AD979B1AD6 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, admin TINYINT(1) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, email_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', phone_list LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', deleted TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_basket (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, date DATE NOT NULL, price INT NOT NULL, quantity INT NOT NULL, INDEX IDX_47144B464584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE basket_product ADD CONSTRAINT FK_17ED14B41BE1FB52 FOREIGN KEY (basket_id) REFERENCES basket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE basket_product ADD CONSTRAINT FK_17ED14B44584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_responsability ADD CONSTRAINT FK_7469EBCCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE company_responsability ADD CONSTRAINT FK_7469EBCC979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user_basket ADD CONSTRAINT FK_47144B464584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE basket_product DROP FOREIGN KEY FK_17ED14B41BE1FB52');
        $this->addSql('ALTER TABLE company_responsability DROP FOREIGN KEY FK_7469EBCC979B1AD6');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD979B1AD6');
        $this->addSql('ALTER TABLE basket_product DROP FOREIGN KEY FK_17ED14B44584665A');
        $this->addSql('ALTER TABLE user_basket DROP FOREIGN KEY FK_47144B464584665A');
        $this->addSql('ALTER TABLE company_responsability DROP FOREIGN KEY FK_7469EBCCA76ED395');
        $this->addSql('DROP TABLE basket');
        $this->addSql('DROP TABLE basket_product');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE company_responsability');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_basket');
    }
}
