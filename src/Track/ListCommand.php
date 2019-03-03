<?php
namespace Absszero\Trify\Track;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ListCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('track')
        ->setDescription('List tracked urls');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fields = ['id', 'title', 'target', 'price', 'old_price', 'updated_at', 'created_at', 'url'];
        $io = new SymfonyStyle($input, $output);
        $io->table($fields, db()->get($fields));
    }
}
