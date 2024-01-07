<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102131722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author_book_association (author_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_ED4B96ECF675F31B (author_id), INDEX IDX_ED4B96EC16A2B381 (book_id), PRIMARY KEY(author_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE author_book_association ADD CONSTRAINT FK_ED4B96ECF675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE author_book_association ADD CONSTRAINT FK_ED4B96EC16A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author_book_association DROP FOREIGN KEY FK_ED4B96ECF675F31B');
        $this->addSql('ALTER TABLE author_book_association DROP FOREIGN KEY FK_ED4B96EC16A2B381');
        $this->addSql('DROP TABLE author_book_association');
    }
}
