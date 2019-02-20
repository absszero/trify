<?php
namespace Tests;

use Symfony\Component\Console\Tester\CommandTester;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $application;

    protected function setUp()
    {
        $this->application = new \Symfony\Component\Console\Application();
        $this->migrate();
    }

    protected function tearDown()
    {
        db()->close();
    }

    protected function addCommand($class)
    {
        if (is_string($class)) {
            $class = new $class;
        }

        $this->application->add($class);
        $commands = $this->application->all();
        return end($commands);
    }

    protected function executeCommand($command, $input = [], $clourse = null)
    {
        $input['command'] = $command->getName();
        $commandTester = new CommandTester($command);

        if ($clourse) {
            $clourse($commandTester);
        }

        $commandTester->execute($input);
        return $commandTester;
    }

    protected function migrate()
    {
        $command = new \Absszero\Trify\MigrationCommand;
        $command->migrate();
    }
}
