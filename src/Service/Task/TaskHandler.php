<?php

namespace App\Service\Task;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class TaskHandler
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(Task $task)
    {
        $this->em->persist($task);
        $this->em->flush();
    }
}