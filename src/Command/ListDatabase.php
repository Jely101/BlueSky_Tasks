<?php
namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\ConsoleOutputInterface;

class ListDatabase extends Command
{
    protected static $defaultName = 'db:list';


    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $connectionParams = array(
        'url' => 'mysql://root:@localhost/bluesky_db',
        );

        try{
            $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

        }catch(PDOExeption $e){
            echo "PDO Connection Failed: " . $e->getMessage();
        }

        $sql = "SELECT * FROM blue_sky_task";
        $stmt = $conn->query($sql);
        $mask = "|%3.3s |%-30.30s |%-100.100s|\n";
        printf($mask, 'ID', 'Title', 'Description');

        while(($row = $stmt->fetchAssociative()) !== false){
            $id = $row['id'];
            $title = $row['title'];
            $desc = $row['description'];
            printf($mask, $id, $title, $desc);
        }
        return Command::SUCCESS;
    }
}