<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210104112819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE incident CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE incident_service CHANGE incident_id incident_id VARCHAR(255) NOT NULL, CHANGE service_id service_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE id id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE service CHANGE id id VARCHAR(255) NOT NULL, CHANGE product_id product_id VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE incident_service CHANGE incident_id incident_id INT NOT NULL, CHANGE service_id service_id INT NOT NULL');
        $this->addSql('ALTER TABLE product CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE service CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE product_id product_id INT NOT NULL');
    }
}
