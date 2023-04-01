<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401191927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $roles = ['ROLE_ADMIN', 'ROLE_USER'];
        $roles = json_encode($roles);
        //pass is admin
        $this->addSql('INSERT INTO user (email, roles, password, name, surname) VALUES ("admin@eventio.com", \''.$roles.'\', "$2y$13$uFayV1tnxyreRCRWIo1VZOpE4mxPSTsV/ldzSbM7D2W9pVhlupjo6", "Admin", "User")');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
