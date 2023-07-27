<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230715034242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD product VARCHAR(255) DEFAULT NULL, ADD orderdate VARCHAR(255) DEFAULT NULL, ADD ordernumber VARCHAR(255) DEFAULT NULL, ADD totalprice VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD name VARCHAR(255) DEFAULT NULL, ADD image VARCHAR(255) DEFAULT NULL, ADD price VARCHAR(255) DEFAULT NULL, ADD description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP product, DROP orderdate, DROP ordernumber, DROP totalprice');
        $this->addSql('ALTER TABLE products DROP name, DROP image, DROP price, DROP description');
    }
}
