<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726191446 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE empresa_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE socio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE empresa (id INT NOT NULL, nome VARCHAR(255) NOT NULL, cnpj VARCHAR(14) NOT NULL, endereco VARCHAR(255) NOT NULL, telefone VARCHAR(20) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN empresa.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN empresa.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE socio (id INT NOT NULL, empresa_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, cpf VARCHAR(11) NOT NULL, telefone VARCHAR(20) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_38B65309521E1991 ON socio (empresa_id)');
        $this->addSql('COMMENT ON COLUMN socio.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN socio.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE socio ADD CONSTRAINT FK_38B65309521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE empresa_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE socio_id_seq CASCADE');
        $this->addSql('ALTER TABLE socio DROP CONSTRAINT FK_38B65309521E1991');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE socio');
    }
}
