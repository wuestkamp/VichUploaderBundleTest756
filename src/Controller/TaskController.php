<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Service\Task\TaskHandler;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends Controller
{
    /**
     * @Route("/task/create", name="task_create")
     * @return Response
     */
    public function create(Request $request, TaskHandler $taskHandler)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taskHandler->save($task);
            return $this->redirect($this->generateUrl('task_edit', ['id' => $task->getId()]));
        }

        return $this->render('task/create.html.twig', [
            'task' => $task,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/task/{id}/edit", name="task_edit")
     * @return Response
     */
    public function edit(Request $request, Task $task, TaskHandler $taskHandler)
    {
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $taskHandler->save($task);
            return $this->redirect($this->generateUrl('task_edit', ['id' => $task->getId()]));
        }

        return $this->render('task/edit.html.twig', [
            'task' => $task,
            'form' => $form->createView()
        ]);
    }
}