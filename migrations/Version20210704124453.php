<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704124453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE file_medical_exam (id INT AUTO_INCREMENT NOT NULL, medical_exam_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, url_file VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C8D6B764118FBE5F (medical_exam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_exam (id INT AUTO_INCREMENT NOT NULL, consultation_id INT NOT NULL, user_lab_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, observation_lab VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_6B480CEE62FF6CDF (consultation_id), INDEX IDX_6B480CEE7DB08E8 (user_lab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file_medical_exam ADD CONSTRAINT FK_C8D6B764118FBE5F FOREIGN KEY (medical_exam_id) REFERENCES medical_exam (id)');
        $this->addSql('ALTER TABLE medical_exam ADD CONSTRAINT FK_6B480CEE62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE medical_exam ADD CONSTRAINT FK_6B480CEE7DB08E8 FOREIGN KEY (user_lab_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file_medical_exam DROP FOREIGN KEY FK_C8D6B764118FBE5F');
        $this->addSql('DROP TABLE file_medical_exam');
        $this->addSql('DROP TABLE medical_exam');
    }
}
