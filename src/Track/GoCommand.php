<?php
namespace Absszero\PSStore\Track;

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
            $this->crawler = new \Absszero\PSStore\Crawler;
        }

        $tracks = db()->select(['url', 'id', 'price'], \PDO::FETCH_GROUP|\PDO::FETCH_ASSOC);
        $urls = array_keys($tracks);

        $bodies = $this->crawler->request($urls);
        $data = \Absszero\PSStore\Parser::parse($bodies);
        $now = date('Y-m-d H:i:s');
        $observer = new \Absszero\PSStore\Observer;
        foreach ($data as $url => $meta) {
            if (!$meta) {
                continue;
            }
            $track = $tracks[$url];
            $track['title'] = $meta->name;
            $track['url'] = $url;
            $track['updated_at'] = $now;
            $track['old_price'] = $track['price'];
            $track['price'] = $meta->offers[0]->price;

            db()->save($track, $track['id']);

            $observer->watch($track);
        }

        $mail = new \Absszero\PSStore\Mail;
        $mail->find($observer->tracks());
    }
}
