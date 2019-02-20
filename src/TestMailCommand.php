<?php
namespace Absszero\Trify;

use Absszero\Trify\Database;
use Absszero\Trify\Mail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestMailCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('mail:test')
        ->setDescription('Send a test mail');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mail = new Mail;
        $mail->send('test mail', 'this is a test mail');
    }
}
