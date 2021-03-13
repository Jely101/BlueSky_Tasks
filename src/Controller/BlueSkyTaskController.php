<?php

namespace App\Controller;

use App\Entity\BlueSkyTask;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class BlueSkyTaskController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/blue/sky/task", name="create_blue_sky_task")
     */
    public function CreateBlueSkyTask(BlueSkyTask $blueSkyTask)
    {
        //saving the task to be added
        $this->entityManager->persist($blueSkyTask);

        //executing the query to add the saved task
        $this->entityManager->flush();
    }
}
