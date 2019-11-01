<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CommandSecond extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-user';
    const ITERATIONS = 2;

    protected function configure()
    {
        $this
            ->setName('print_message_many_times')
            ->setDescription('Print the message many times')
            ->addArgument('text', InputArgument::REQUIRED, '')
            ->addOption(
                'iterations',
                'i',
                InputOption::VALUE_OPTIONAL,
                'How many times should the message be printed',
                self::ITERATIONS
            );
    }

    protected function print_message(string $text, $iterations = 2)
    {
        return str_repeat($text, (is_null($iterations) || $iterations < 1 ? self::ITERATIONS : $iterations));
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln($this->print_message($input->getArgument('text'), $input->getOption('iterations')));
    }
}
