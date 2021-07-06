<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210706185215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certificat (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, nbr_rest_day INT DEFAULT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_27448F7762FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, gouvernorate_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2D5B0234D7A95E5D (gouvernorate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, publication_id INT NOT NULL, contente LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C38B217A7 (publication_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, diagnostic LONGTEXT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, weight_patient VARCHAR(255) DEFAULT NULL, height_patient VARCHAR(255) DEFAULT NULL, body_temperature VARCHAR(255) DEFAULT NULL, blood_pressure VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consultation_symptom (consultation_id INT NOT NULL, symptom_id INT NOT NULL, INDEX IDX_A1C1014262FF6CDF (consultation_id), INDEX IDX_A1C10142DEEFDA95 (symptom_id), PRIMARY KEY(consultation_id, symptom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_medical_exam (id INT AUTO_INCREMENT NOT NULL, medical_exam_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, url_file VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C8D6B764118FBE5F (medical_exam_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gouvernorate (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medical_exam (id INT AUTO_INCREMENT NOT NULL, consultation_id INT NOT NULL, user_lab_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, observation_lab VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_6B480CEE62FF6CDF (consultation_id), INDEX IDX_6B480CEE7DB08E8 (user_lab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinance (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, prescription LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_4F7DE88162FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, user_dr_id INT NOT NULL, img_cover VARCHAR(255) DEFAULT NULL, biography VARCHAR(255) DEFAULT NULL, current_position VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION DEFAULT NULL, academic_training LONGTEXT DEFAULT NULL, work_experience LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E6D6B2971064A9FD (user_dr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, user_dr_id INT NOT NULL, title VARCHAR(255) NOT NULL, contente LONGTEXT DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_AF3C67791064A9FD (user_dr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, user_dr_id INT NOT NULL, user_patient_id INT DEFAULT NULL, consultation_id INT DEFAULT NULL, day DATE NOT NULL, start_hour TIME DEFAULT NULL, end_hour TIME DEFAULT NULL, is_available TINYINT(1) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_5A3811FB1064A9FD (user_dr_id), INDEX IDX_5A3811FBCCEE5495 (user_patient_id), INDEX IDX_5A3811FB62FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_dr (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, status VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATE DEFAULT NULL, sex VARCHAR(255) DEFAULT NULL, cin VARCHAR(255) DEFAULT NULL, office_tel VARCHAR(255) DEFAULT NULL, mobile_tel VARCHAR(255) DEFAULT NULL, img_profil VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, name_lab VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_8D93D6498BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_specialty_dr (user_id INT NOT NULL, specialty_dr_id INT NOT NULL, INDEX IDX_5B838408A76ED395 (user_id), INDEX IDX_5B83840851D07789 (specialty_dr_id), PRIMARY KEY(user_id, specialty_dr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certificat ADD CONSTRAINT FK_27448F7762FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234D7A95E5D FOREIGN KEY (gouvernorate_id) REFERENCES gouvernorate (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE consultation_symptom ADD CONSTRAINT FK_A1C1014262FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation_symptom ADD CONSTRAINT FK_A1C10142DEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE file_medical_exam ADD CONSTRAINT FK_C8D6B764118FBE5F FOREIGN KEY (medical_exam_id) REFERENCES medical_exam (id)');
        $this->addSql('ALTER TABLE medical_exam ADD CONSTRAINT FK_6B480CEE62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE medical_exam ADD CONSTRAINT FK_6B480CEE7DB08E8 FOREIGN KEY (user_lab_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ordinance ADD CONSTRAINT FK_4F7DE88162FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT FK_E6D6B2971064A9FD FOREIGN KEY (user_dr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67791064A9FD FOREIGN KEY (user_dr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB1064A9FD FOREIGN KEY (user_dr_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FBCCEE5495 FOREIGN KEY (user_patient_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user_specialty_dr ADD CONSTRAINT FK_5B838408A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specialty_dr ADD CONSTRAINT FK_5B83840851D07789 FOREIGN KEY (specialty_dr_id) REFERENCES specialty_dr (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE certificat DROP FOREIGN KEY FK_27448F7762FF6CDF');
        $this->addSql('ALTER TABLE consultation_symptom DROP FOREIGN KEY FK_A1C1014262FF6CDF');
        $this->addSql('ALTER TABLE medical_exam DROP FOREIGN KEY FK_6B480CEE62FF6CDF');
        $this->addSql('ALTER TABLE ordinance DROP FOREIGN KEY FK_4F7DE88162FF6CDF');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB62FF6CDF');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234D7A95E5D');
        $this->addSql('ALTER TABLE file_medical_exam DROP FOREIGN KEY FK_C8D6B764118FBE5F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C38B217A7');
        $this->addSql('ALTER TABLE user_specialty_dr DROP FOREIGN KEY FK_5B83840851D07789');
        $this->addSql('ALTER TABLE consultation_symptom DROP FOREIGN KEY FK_A1C10142DEEFDA95');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE medical_exam DROP FOREIGN KEY FK_6B480CEE7DB08E8');
        $this->addSql('ALTER TABLE profil DROP FOREIGN KEY FK_E6D6B2971064A9FD');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67791064A9FD');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB1064A9FD');
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FBCCEE5495');
        $this->addSql('ALTER TABLE user_specialty_dr DROP FOREIGN KEY FK_5B838408A76ED395');
        $this->addSql('DROP TABLE certificat');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP TABLE consultation_symptom');
        $this->addSql('DROP TABLE file_medical_exam');
        $this->addSql('DROP TABLE gouvernorate');
        $this->addSql('DROP TABLE medical_exam');
        $this->addSql('DROP TABLE ordinance');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE specialty_dr');
        $this->addSql('DROP TABLE symptom');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_specialty_dr');
    }
}
