<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210704123435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE consultation_symptom (consultation_id INT NOT NULL, symptom_id INT NOT NULL, INDEX IDX_A1C1014262FF6CDF (consultation_id), INDEX IDX_A1C10142DEEFDA95 (symptom_id), PRIMARY KEY(consultation_id, symptom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symptom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE consultation_symptom ADD CONSTRAINT FK_A1C1014262FF6CDF FOREIGN KEY (consultation_id) REFERENCES consultation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consultation_symptom ADD CONSTRAINT FK_A1C10142DEEFDA95 FOREIGN KEY (symptom_id) REFERENCES symptom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consultation_symptom DROP FOREIGN KEY FK_A1C10142DEEFDA95');
        $this->addSql('DROP TABLE consultation_symptom');
        $this->addSql('DROP TABLE symptom');
    }
}
