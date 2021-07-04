<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704121949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation (id INT AUTO_INCREMENT NOT NULL, diagnostic LONGTEXT DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, weight_patient VARCHAR(255) DEFAULT NULL, height_patient VARCHAR(255) DEFAULT NULL, body_temperature VARCHAR(255) DEFAULT NULL, blood_pressure VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE schedule ADD consultation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE schedule ADD CONSTRAINT FK_5A3811FB62FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id)');
        $this->addSql('CREATE INDEX IDX_5A3811FB62FF6CDF ON schedule (consultation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE schedule DROP FOREIGN KEY FK_5A3811FB62FF6CDF');
        $this->addSql('DROP TABLE consultation');
        $this->addSql('DROP INDEX IDX_5A3811FB62FF6CDF ON schedule');
        $this->addSql('ALTER TABLE schedule DROP consultation_id');
    }
}
