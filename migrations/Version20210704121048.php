<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704121048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, user_dr_id INT NOT NULL, user_patient_id INT DEFAULT NULL, day DATE NOT NULL, start_hour TIME DEFAULT NULL, end_hour TIME DEFAULT NULL, is_available TINYINT(1) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_5A3811FB1064A9FD (user_dr_id), INDEX IDX_5A3811FBCCEE5495 (user_patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB1064A9FD FOREIGN KEY (user_dr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBCCEE5495 FOREIGN KEY (user_patient_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE schedule');
    }
}
