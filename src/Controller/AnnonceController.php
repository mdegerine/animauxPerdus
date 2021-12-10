<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonce_list")
     */
    public function list(): Response
    {
        return $this->render('annonce/list.html.twig');
    }

    /**
     * @Route("/annonces/detail/{id}", name="annonce_detail", requirements={"id"="\d+"})
     */
    public function detail(): Response
    {
        return $this->render('annonce/detail.html.twig');
    }
}
