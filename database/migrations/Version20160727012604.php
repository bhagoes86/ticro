<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20160727012604 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE issue_tag (issue_id VARCHAR(255) NOT NULL, tag_id VARCHAR(255) NOT NULL, INDEX IDX_8C0D6ABE5E7AA58C (issue_id), INDEX IDX_8C0D6ABEBAD26311 (tag_id), PRIMARY KEY(issue_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responses (id VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id VARCHAR(255) NOT NULL, slug VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issue_tag ADD CONSTRAINT FK_8C0D6ABE5E7AA58C FOREIGN KEY (issue_id) REFERENCES issues (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE issue_tag ADD CONSTRAINT FK_8C0D6ABEBAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE issues ADD public TINYINT(1) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE issue_tag DROP FOREIGN KEY FK_8C0D6ABEBAD26311');
        $this->addSql('DROP TABLE issue_tag');
        $this->addSql('DROP TABLE responses');
        $this->addSql('DROP TABLE tags');
        $this->addSql('ALTER TABLE issues DROP public');
    }
}
