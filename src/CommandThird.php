<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class CommandThird extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-user';

    protected function configure()
    {
        $this
            ->setName('quest')
            ->setDescription('Survey');
    }
    
    protected function formatter($name, $age, $gender)
    {
        return 'Здравствуйте, ' . $name . '. Ваш возраст: ' . $age . ', пол: ' . $gender . '.';
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        
        $name = $helper->ask($input, $output, new Question('Введите ваше имя: ', 'EMPTY'));
        $age = $helper->ask($input, $output, new Question('Введите ваш возраст: ', 'EMPTY'));
        
        $gender = $helper->ask($input, $output, new ChoiceQuestion(
            'Выберите ваш пол: ',
            ['М', 'Ж']
        ));
        
        $output->writeln($this->formatter($name, $age, $gender));
    }
     
}
