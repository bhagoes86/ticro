<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20160727013138 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE issue_tag');
        $this->addSql('ALTER TABLE issues CHANGE id id VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE responses CHANGE id id VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE tags CHANGE id id VARCHAR(100) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE issue_tag (issue_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, tag_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_8C0D6ABE5E7AA58C (issue_id), INDEX IDX_8C0D6ABEBAD26311 (tag_id), PRIMARY KEY(issue_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issue_tag ADD CONSTRAINT FK_8C0D6ABE5E7AA58C FOREIGN KEY (issue_id) REFERENCES issues (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE issue_tag ADD CONSTRAINT FK_8C0D6ABEBAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE issues CHANGE id id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE responses CHANGE id id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE tags CHANGE id id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
