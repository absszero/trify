<?php
namespace Absszero\PSStore;

class Mail
{
    const SUBJECT = 'PS Store, Discount!';
    const TRACK_FORMAT = '%s, Price:%d,
%s

';

    private $config;
    private $mailer;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../config/mail.php';
        $this->mailer = $this->mailer();
    }

    protected function mailer()
    {
        // Create the Transport
        $transport = (new \Swift_SmtpTransport($this->config['host'], $this->config['port'], $this->config['encryption']))
            ->setUsername($this->config['user'])
            ->setPassword($this->config['pass']);

        // Create the Mailer using your created Transport
        return new \Swift_Mailer($transport);
    }

    public function send($subject, $body)
    {
        // Create a message
        $message = (new \Swift_Message($subject))
           ->setBody($body)
           ->setFrom($this->config['from'])
           ->setTo($this->config['to']);

        return $this->mailer->send($message);
    }

    public function find($tracks)
    {
        if (empty($tracks)) {
            return;
        }

        $body = '';
        foreach ($tracks as $track) {
            $body .= sprintf(self::TRACK_FORMAT, $track['title'], $track['price'], $track['url']);
        }
        $this->send(self::SUBJECT, $body);
    }
}
