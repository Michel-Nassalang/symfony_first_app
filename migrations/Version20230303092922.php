<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230303092922 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE usercreate usercreate VARCHAR(255) DEFAULT NULL, CHANGE datecreate datecreate DATETIME DEFAULT NULL, CHANGE userdelete userdelete VARCHAR(255) DEFAULT NULL, CHANGE datedelete datedelete DATETIME DEFAULT NULL, CHANGE userupdate userupdate VARCHAR(255) DEFAULT NULL, CHANGE dateupdate dateupdate DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE depense CHANGE user_create user_create VARCHAR(255) DEFAULT NULL, CHANGE user_update user_update VARCHAR(255) DEFAULT NULL, CHANGE user_delete user_delete VARCHAR(255) DEFAULT NULL, CHANGE date_create date_create DATETIME DEFAULT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE etat_caisse CHANGE en_attente en_attente VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etat_service CHANGE user_create_es user_create_es VARCHAR(255) DEFAULT NULL, CHANGE datecreate_es datecreate_es DATETIME DEFAULT NULL, CHANGE userdelete_es userdelete_es VARCHAR(255) DEFAULT NULL, CHANGE datedelete_es datedelete_es DATETIME DEFAULT NULL, CHANGE userupdate_es userupdate_es VARCHAR(255) DEFAULT NULL, CHANGE dateupdate_es dateupdate_es DATETIME DEFAULT NULL, CHANGE code_es code_es VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ligne_commande CHANGE statut_lc statut_lc VARCHAR(255) DEFAULT NULL, CHANGE user_create_lc user_create_lc VARCHAR(255) DEFAULT NULL, CHANGE datecreate_lc datecreate_lc DATETIME DEFAULT NULL, CHANGE userdelete_lc userdelete_lc VARCHAR(255) DEFAULT NULL, CHANGE datedelete_lc datedelete_lc DATETIME DEFAULT NULL, CHANGE userupdate_lc userupdate_lc VARCHAR(255) DEFAULT NULL, CHANGE dateuser_lc dateuser_lc DATETIME DEFAULT NULL, CHANGE code_lc code_lc VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE sku sku VARCHAR(255) DEFAULT NULL, CHANGE usercreate usercreate VARCHAR(255) DEFAULT NULL, CHANGE datecreate datecreate DATETIME DEFAULT NULL, CHANGE userdelete userdelete VARCHAR(255) DEFAULT NULL, CHANGE datedelete datedelete DATETIME DEFAULT NULL, CHANGE userupdate userupdate VARCHAR(255) DEFAULT NULL, CHANGE dateupdate dateupdate DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE rapport CHANGE mntvente mntvente DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE service CHANGE user_create user_create VARCHAR(255) DEFAULT NULL, CHANGE user_update user_update VARCHAR(255) DEFAULT NULL, CHANGE user_delete user_delete VARCHAR(255) DEFAULT NULL, CHANGE date_create date_create DATETIME DEFAULT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE structure CHANGE usercreate usercreate VARCHAR(255) DEFAULT NULL, CHANGE datecreate datecreate DATETIME DEFAULT NULL, CHANGE userdelete userdelete VARCHAR(255) DEFAULT NULL, CHANGE datedelete datedelete DATETIME DEFAULT NULL, CHANGE userupdate userupdate VARCHAR(255) DEFAULT NULL, CHANGE dateupdate dateupdate DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE type_depense CHANGE user_create user_create VARCHAR(255) DEFAULT NULL, CHANGE user_update user_update VARCHAR(255) DEFAULT NULL, CHANGE user_delete user_delete VARCHAR(255) DEFAULT NULL, CHANGE date_create date_create DATETIME DEFAULT NULL, CHANGE date_update date_update DATETIME DEFAULT NULL, CHANGE date_delete date_delete DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE type_structure CHANGE usercreate usercreate VARCHAR(255) DEFAULT NULL, CHANGE datecreate datecreate DATETIME DEFAULT NULL, CHANGE userdelete userdelete VARCHAR(255) DEFAULT NULL, CHANGE datedelete datedelete DATETIME DEFAULT NULL, CHANGE userupdate userupdate VARCHAR(255) DEFAULT NULL, CHANGE dateupdate dateupdate DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(180) NOT NULL, ADD prenom VARCHAR(180) NOT NULL, ADD email VARCHAR(180) NOT NULL, ADD adresse LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie CHANGE description description VARCHAR(255) DEFAULT \'NULL\', CHANGE usercreate usercreate VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate datecreate DATETIME DEFAULT \'NULL\', CHANGE userdelete userdelete VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete datedelete DATETIME DEFAULT \'NULL\', CHANGE userupdate userupdate VARCHAR(255) DEFAULT \'NULL\', CHANGE dateupdate dateupdate DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE depense CHANGE user_create user_create VARCHAR(255) DEFAULT \'NULL\', CHANGE user_update user_update VARCHAR(255) DEFAULT \'NULL\', CHANGE user_delete user_delete VARCHAR(255) DEFAULT \'NULL\', CHANGE date_create date_create DATETIME DEFAULT \'NULL\', CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE etat_caisse CHANGE en_attente en_attente VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE etat_service CHANGE user_create_es user_create_es VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate_es datecreate_es DATETIME DEFAULT \'NULL\', CHANGE userdelete_es userdelete_es VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete_es datedelete_es DATETIME DEFAULT \'NULL\', CHANGE userupdate_es userupdate_es VARCHAR(255) DEFAULT \'NULL\', CHANGE dateupdate_es dateupdate_es DATETIME DEFAULT \'NULL\', CHANGE code_es code_es VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE ligne_commande CHANGE statut_lc statut_lc VARCHAR(255) DEFAULT \'NULL\', CHANGE user_create_lc user_create_lc VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate_lc datecreate_lc DATETIME DEFAULT \'NULL\', CHANGE userdelete_lc userdelete_lc VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete_lc datedelete_lc DATETIME DEFAULT \'NULL\', CHANGE userupdate_lc userupdate_lc VARCHAR(255) DEFAULT \'NULL\', CHANGE dateuser_lc dateuser_lc DATETIME DEFAULT \'NULL\', CHANGE code_lc code_lc VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE produit CHANGE categorie_id categorie_id INT NOT NULL, CHANGE description description VARCHAR(255) DEFAULT \'NULL\', CHANGE sku sku VARCHAR(255) DEFAULT \'NULL\', CHANGE usercreate usercreate VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate datecreate DATETIME DEFAULT \'NULL\', CHANGE userdelete userdelete VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete datedelete DATETIME DEFAULT \'NULL\', CHANGE userupdate userupdate VARCHAR(255) DEFAULT \'NULL\', CHANGE dateupdate dateupdate DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE rapport CHANGE mntvente mntvente DOUBLE PRECISION DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE service CHANGE user_create user_create VARCHAR(255) DEFAULT \'NULL\', CHANGE user_update user_update VARCHAR(255) DEFAULT \'NULL\', CHANGE user_delete user_delete VARCHAR(255) DEFAULT \'NULL\', CHANGE date_create date_create DATETIME DEFAULT \'NULL\', CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE structure CHANGE usercreate usercreate VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate datecreate DATETIME DEFAULT \'NULL\', CHANGE userdelete userdelete VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete datedelete DATETIME DEFAULT \'NULL\', CHANGE userupdate userupdate VARCHAR(255) DEFAULT \'NULL\', CHANGE dateupdate dateupdate DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE type_depense CHANGE user_create user_create VARCHAR(255) DEFAULT \'NULL\', CHANGE user_update user_update VARCHAR(255) DEFAULT \'NULL\', CHANGE user_delete user_delete VARCHAR(255) DEFAULT \'NULL\', CHANGE date_create date_create DATETIME DEFAULT \'NULL\', CHANGE date_update date_update DATETIME DEFAULT \'NULL\', CHANGE date_delete date_delete DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE type_structure CHANGE usercreate usercreate VARCHAR(255) DEFAULT \'NULL\', CHANGE datecreate datecreate DATETIME DEFAULT \'NULL\', CHANGE userdelete userdelete VARCHAR(255) DEFAULT \'NULL\', CHANGE datedelete datedelete DATETIME DEFAULT \'NULL\', CHANGE userupdate userupdate VARCHAR(255) DEFAULT \'NULL\', CHANGE dateupdate dateupdate DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE utilisateur DROP nom, DROP prenom, DROP email, DROP adresse');
    }
}
