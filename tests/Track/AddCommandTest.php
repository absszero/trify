<?php
namespace Tests\Track;

class AddCommandTest extends \Tests\TestCase
{
    public function testAddTrack()
    {
        $command = $this->addCommand('Absszero\PSStore\Track\AddCommand');
        $input = ['url' => 'http://example.com/add.html'];
        $this->executeCommand($command, $input);
        $track = db()->select()[0];

        $this->assertEquals($input['url'], $track['url']);
    }
}
