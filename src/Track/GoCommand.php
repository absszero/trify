<?php
namespace Absszero\Trify\Track;

use Absszero\Trify\Parser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GoCommand extends Command
{
    private $crawler;

    public function __construct($crawler = null)
    {
        parent::__construct();
        $this->crawler = $crawler;
    }

    protected function configure()
    {
        $this
        ->setName('track:go')
        ->setDescription('track urls');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->crawler) {
            $this->crawler = new \Absszero\Trify\Crawler;
        }

        $tracks = db()->get(['url', 'id', 'price', 'target'], \PDO::FETCH_GROUP|\PDO::FETCH_ASSOC);
        $urls = array_keys($tracks);

        $bodies = $this->crawler->request($urls);
        $metas = (new Parser)->parse($bodies);
        $observer = new \Absszero\Trify\Observer;
        foreach ($metas as $url => $meta) {
            $track = $tracks[$url];
            $track['old_price'] = $track['price'];
            $track = array_merge($track, $meta->getData());
            db()->save($track, $track['id']);

            $observer->watch($track);
        }

        $mail = new \Absszero\Trify\Mail;
        $mail->find($observer->tracks());
    }
}
