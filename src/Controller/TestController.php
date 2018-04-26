<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/test")
     * @return Response
     */
    public function index(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            var_dump($task);
            exit;
        }

        return $this->render('test/index.html.twig', [
            'task' => $task,
            'form' => $form->createView()
        ]);
    }
}