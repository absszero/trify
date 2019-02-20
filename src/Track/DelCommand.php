<?php
namespace Absszero\Trify\Track;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DelCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('track:del')
        ->setDescription('Delete a track')
        ->addArgument('id', InputArgument::REQUIRED, 'The track id');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $io = new SymfonyStyle($input, $output);
        $result = $io->confirm('Delete the track?', false);
        if ($result) {
            db()->delete($id);
            $output->writeln('<info>The track deleted.</info>');
        }
    }
}

