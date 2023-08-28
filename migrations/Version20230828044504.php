<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230828044504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, form_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, image1 VARCHAR(255) DEFAULT NULL, image2 VARCHAR(255) DEFAULT NULL, image3 VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, form_data JSON DEFAULT NULL, INDEX IDX_23A0E665FF69B7D (form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_form_field (form_id INT NOT NULL, form_field_id INT NOT NULL, INDEX IDX_D175AD0F5FF69B7D (form_id), INDEX IDX_D175AD0FF50D82F4 (form_field_id), PRIMARY KEY(form_id, form_field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E665FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
        $this->addSql('ALTER TABLE form_form_field ADD CONSTRAINT FK_D175AD0F5FF69B7D FOREIGN KEY (form_id) REFERENCES form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE form_form_field ADD CONSTRAINT FK_D175AD0FF50D82F4 FOREIGN KEY (form_field_id) REFERENCES form_field (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E665FF69B7D');
        $this->addSql('ALTER TABLE form_form_field DROP FOREIGN KEY FK_D175AD0F5FF69B7D');
        $this->addSql('ALTER TABLE form_form_field DROP FOREIGN KEY FK_D175AD0FF50D82F4');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE form_form_field');
    }
}
