<?php
namespace Absszero\Trify;

use Absszero\Trify\Database;
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
        $this->migrate();
        $output->writeln('<info>Table created.</info>');
    }

    public function migrate()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . Database::TABLE . " (
  %s,
  title varchar(255) DEFAULT NULL,
  url varchar(2083) NOT NULL,
  price int(10) DEFAULT NULL,
  old_price int(10) DEFAULT NULL,
  target int(10) DEFAULT NULL,
  created_at datetime DEFAULT NULL,
  updated_at datetime DEFAULT NULL
  %s
);";
        $sql = db()->autoIncrement($sql);
        db()->query($sql);
    }
}
