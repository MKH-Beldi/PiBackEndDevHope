<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704114122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, gouvernorate_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D5B0234D7A95E5D (gouvernorate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gouvernorate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_dr (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, status VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATE DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, cin VARCHAR(255) DEFAULT NULL, office_tel VARCHAR(255) DEFAULT NULL, mobile_tel VARCHAR(255) DEFAULT NULL, img_profil VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, name_lab VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8D93D6498BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_specialty_dr (user_id INT NOT NULL, specialty_dr_id INT NOT NULL, INDEX IDX_5B838408A76ED395 (user_id), INDEX IDX_5B83840851D07789 (specialty_dr_id), PRIMARY KEY(user_id, specialty_dr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234D7A95E5D FOREIGN KEY (gouvernorate_id) REFERENCES gouvernorate (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user_specialty_dr ADD CONSTRAINT FK_5B838408A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specialty_dr ADD CONSTRAINT FK_5B83840851D07789 FOREIGN KEY (specialty_dr_id) REFERENCES specialty_dr (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234D7A95E5D');
        $this->addSql('ALTER TABLE user_specialty_dr DROP FOREIGN KEY FK_5B83840851D07789');
        $this->addSql('ALTER TABLE user_specialty_dr DROP FOREIGN KEY FK_5B838408A76ED395');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE gouvernorate');
        $this->addSql('DROP TABLE specialty_dr');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_specialty_dr');
    }
}
