<?php
namespace Tests\Track;

class DelCommandTest extends \Tests\TestCase
{
    public function testDelTrack()
    {
        $id = db()->save([
            'url' => 'http://example.com/index.html'
        ]);

        $command = $this->addCommand('Absszero\Trify\Track\DelCommand');
        $tester = $this->executeCommand($command, ['id' => $id], function ($tester) {
            $tester->setInputs(array('yes'));
        });

        $this->assertEmpty(db()->find($id));
    }
}
