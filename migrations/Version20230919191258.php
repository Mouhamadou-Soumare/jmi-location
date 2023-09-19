<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230919191258 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE facturation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE utilisateur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE vehicule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE facturation (id INT NOT NULL, id_v_id INT NOT NULL, id_c_id INT NOT NULL, date_d TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_f TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, valeur DOUBLE PRECISION NOT NULL, etat BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_17EB513A7D30207C ON facturation (id_v_id)');
        $this->addSql('CREATE INDEX IDX_17EB513A1AF787D1 ON facturation (id_c_id)');
        $this->addSql('CREATE TABLE utilisateur (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_loueur BOOLEAN NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
        $this->addSql('CREATE TABLE vehicule (id INT NOT NULL, type VARCHAR(255) NOT NULL, caract JSON NOT NULL, location VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, prix_jour INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A7D30207C FOREIGN KEY (id_v_id) REFERENCES vehicule (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A1AF787D1 FOREIGN KEY (id_c_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE facturation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE utilisateur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE vehicule_id_seq CASCADE');
        $this->addSql('ALTER TABLE facturation DROP CONSTRAINT FK_17EB513A7D30207C');
        $this->addSql('ALTER TABLE facturation DROP CONSTRAINT FK_17EB513A1AF787D1');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vehicule');
    }
}
