<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CommandFirst extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-user';

    protected function configure()
    {
        $this
            ->setName('say_hello')
            ->setDescription('Return "Привет, <аргумент>"')
            ->addArgument('text', InputArgument::REQUIRED, '');
    }

    protected function sayHello(string $text)
    {
        return 'Привет, ' . $text;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->sayHello($input->getArgument('text')));
    }
}
