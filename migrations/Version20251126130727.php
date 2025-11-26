<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251126130727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actividad (id INT AUTO_INCREMENT NOT NULL, fechahora DATETIME NOT NULL, lugar VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE viajeros ADD id_actividad_id INT NOT NULL');
        $this->addSql('ALTER TABLE viajeros ADD CONSTRAINT FK_71FD11BA43D58FB8 FOREIGN KEY (id_actividad_id) REFERENCES actividad (id)');
        $this->addSql('CREATE INDEX IDX_71FD11BA43D58FB8 ON viajeros (id_actividad_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE actividad');
        $this->addSql('ALTER TABLE viajeros DROP FOREIGN KEY FK_71FD11BA43D58FB8');
        $this->addSql('DROP INDEX IDX_71FD11BA43D58FB8 ON viajeros');
        $this->addSql('ALTER TABLE viajeros DROP id_actividad_id');
    }
}
