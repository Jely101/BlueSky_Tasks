<?php 

//src/Command/CreateTaskCommand.php

namespace App\Command;

use App\Entity\BlueSkyTask;
use App\Controller\BlueSkyTaskController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Question\Question;

class CreateTaskCommand extends Command
{
    
    protected static $defaultName = 'db:insert-task';

    private $taskTitle;
    private $taskDescription;
    private $task;
    private $blueSkyTaskController;
    
    public function __construct(BlueSkyTaskController $blueSkyTaskController)
    {
        $this->blueSkyTaskController = $blueSkyTaskController;

        parent::__construct();
    }

    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $helper = $this->getHelper('question');
        $question = new Question('Please enter a title for the Task: ');
        $taskTitle = $helper->ask($input, $output, $question);

        $question = new Question('Please enter a description for the Task: ');
        $taskDescription = $helper->ask($input, $output, $question);

        if($taskTitle == NULL || $taskDescription == NULL){
            $output->writeln('Title and Description needed to insert a task, please try again.');
            return Command::FAILURE;
        }
        else{
            $task = new BlueSkyTask();
            $task->SetTitle($taskTitle);
            $task->SetDescription($taskDescription);

            $this->blueSkyTaskController->CreateBlueSkyTask($task);
            $output->writeln('New Task successfully added to the database');
            return Command::SUCCESS;
        }
    }
}