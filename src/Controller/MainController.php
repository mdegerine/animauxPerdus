<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main_home")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route ("/guideA", name="main_guideA")
     */
    public function guideA(): Response
    {
        return $this->render('main/guideA.html.twig');
    }

}
