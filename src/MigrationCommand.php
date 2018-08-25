<?php
namespace Absszero\PSStore;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('migrate')
        ->setDescription('migrate database tables');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sql = "CREATE TABLE IF NOT EXISTS prices (
  id int(11) NOT NULL,
  title varchar(255) DEFAULT NULL,
  url varchar(2083) NOT NULL,
  updated_at datetime DEFAULT NULL,
  PRIMARY KEY (id)
);";
        db()->query($sql);
        $output->writeln('<info>table <comment>prices</comment> created.</info>');
    }
}
