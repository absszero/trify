<?php
namespace Tests\Track;

use Absszero\Trify\Crawler;

class TargetCommandTest extends \Tests\TestCase
{
    public function testGo()
    {
        $id = db()->save([
            'url' => '1234',
        ]);
        $target = 100;

        $command = $this->addCommand(new \Absszero\Trify\Track\TargetCommand);
        $tester = $this->executeCommand($command, ['id' => $id, 'target' => $target]);

        $track = db()->find($id);
        $this->assertEquals($track['target'], $target);
    }
}
