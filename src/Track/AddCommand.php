<?php
namespace Absszero\PSStore\Track;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('track:add')
        ->setDescription('Add a url to track')
        ->addArgument('url', InputArgument::REQUIRED, 'The tracking url');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $url = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
        if (false === $url) {
            $output->writeln('<error>Incorrect url:</error>');
            return;
        }

        $data = [
            'url' => $url,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        db()->save($data);
        $output->writeln('<info>A track created.</info>');
    }
}
