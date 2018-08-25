<?php
namespace Absszero\PSStore;

use Absszero\PSStore\Database;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('migrate')
        ->setDescription('Migrate database tables');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . Database::TABLE . " (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  url varchar(2083) NOT NULL,
  price int(10) unsigned DEFAULT NULL,
  old_price int(10) unsigned DEFAULT NULL,
  created_at datetime DEFAULT NULL,
  updated_at datetime DEFAULT NULL,
  PRIMARY KEY (id)
);";
        db()->query($sql);
        $output->writeln('<info>Table created.</info>');
    }
}
