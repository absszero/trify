<?php
namespace Absszero\Trify\Track;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TargetCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('track:target')
        ->setDescription('Set a target price')
        ->addArgument('id', InputArgument::REQUIRED, 'The track id')
        ->addArgument('target', InputArgument::REQUIRED, 'The target price');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $target = $input->getArgument('target');
        $track = db()->find($id);

        if ($track) {
            $track['target'] = $target;
            db()->save($track, $id);
            $output->writeln('<info>Target price updated.</info>');
        }
    }
}
