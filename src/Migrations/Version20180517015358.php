<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180517015358 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE forecast (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_match_id INT NOT NULL, score1 INT NOT NULL, score2 INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_2A9C784479F37AE5 (id_user_id), INDEX IDX_2A9C78447A654043 (id_match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbmatch (id INT AUTO_INCREMENT NOT NULL, id_squad1_id INT NOT NULL, id_squad2_id INT NOT NULL, date DATETIME NOT NULL, score1 INT NOT NULL, score2 INT NOT NULL, INDEX IDX_7C0EB70FF35B78F (id_squad1_id), INDEX IDX_7C0EB70F1D801861 (id_squad2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, birthday DATE NOT NULL, sex VARCHAR(10) NOT NULL, adress VARCHAR(70) NOT NULL, city VARCHAR(50) NOT NULL, phone VARCHAR(12) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE points (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, point INT NOT NULL, INDEX IDX_27BA8E2979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE squad (id INT AUTO_INCREMENT NOT NULL, flag VARCHAR(30) NOT NULL, name VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, INDEX IDX_D87F7E0C3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_person_id INT DEFAULT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_8D93D649A14E0760 (id_person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forecast ADD CONSTRAINT FK_2A9C784479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forecast ADD CONSTRAINT FK_2A9C78447A654043 FOREIGN KEY (id_match_id) REFERENCES tbmatch (id)');
        $this->addSql('ALTER TABLE tbmatch ADD CONSTRAINT FK_7C0EB70FF35B78F FOREIGN KEY (id_squad1_id) REFERENCES squad (id)');
        $this->addSql('ALTER TABLE tbmatch ADD CONSTRAINT FK_7C0EB70F1D801861 FOREIGN KEY (id_squad2_id) REFERENCES squad (id)');
        $this->addSql('ALTER TABLE points ADD CONSTRAINT FK_27BA8E2979F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C3256915B FOREIGN KEY (relation_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A14E0760 FOREIGN KEY (id_person_id) REFERENCES person (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE forecast DROP FOREIGN KEY FK_2A9C78447A654043');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A14E0760');
        $this->addSql('ALTER TABLE tbmatch DROP FOREIGN KEY FK_7C0EB70FF35B78F');
        $this->addSql('ALTER TABLE tbmatch DROP FOREIGN KEY FK_7C0EB70F1D801861');
        $this->addSql('ALTER TABLE forecast DROP FOREIGN KEY FK_2A9C784479F37AE5');
        $this->addSql('ALTER TABLE points DROP FOREIGN KEY FK_27BA8E2979F37AE5');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C3256915B');
        $this->addSql('DROP TABLE forecast');
        $this->addSql('DROP TABLE tbmatch');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE points');
        $this->addSql('DROP TABLE squad');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE user');
    }
}
