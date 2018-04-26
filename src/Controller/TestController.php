<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    /**
     * @Route("/test")
     * @return Response
     */
    public function index()
    {
        $number = mt_rand(0, 100);

        /*return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );*/

        return $this->render('test/index.html.twig', [
            'number' => $number
        ]);
    }
}