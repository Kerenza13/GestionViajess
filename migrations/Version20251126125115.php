<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251126125115 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE viaje (id INT AUTO_INCREMENT NOT NULL, destino_ida VARCHAR(255) NOT NULL, transporte_ida VARCHAR(255) NOT NULL, salida_ida_datetime DATETIME NOT NULL, llegada_destino_datetime DATETIME NOT NULL, lugar_vuelta VARCHAR(255) NOT NULL, transporte_vuelta VARCHAR(255) NOT NULL, salida_vuelta_datetime DATETIME NOT NULL, llegada_origen_datetime DATETIME NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE viaje');
    }
}
