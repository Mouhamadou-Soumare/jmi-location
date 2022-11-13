<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113211537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, id_v_id INT NOT NULL, id_c_id INT NOT NULL, date_d DATETIME NOT NULL, date_f DATETIME NOT NULL, valeur DOUBLE PRECISION NOT NULL, etat TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_17EB513A7D30207C (id_v_id), INDEX IDX_17EB513A1AF787D1 (id_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_loueur TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, caract JSON NOT NULL, location VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix_jour INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A7D30207C FOREIGN KEY (id_v_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A1AF787D1 FOREIGN KEY (id_c_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A1AF787D1');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A7D30207C');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vehicule');
    }
}
