<?php

namespace App\Controller;


use App\Entity\Annonce;
use App\Repository\AnimalRepository;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route ("/annonces")
 */

class AnnonceController extends AbstractController
{
    /**
     * liste d'annonces
     * @Route("/", name="annonce_list")
     */
    public function list(AnnonceRepository $annonceRepository): Response
    {
        //Recuperer les annonces dans la base
        //$annonceRepository = $this->getDoctrine()->getRepository(Annonce::class);

        $annonces = $annonceRepository->findAll();
        dump($annonces);
        return $this->render('annonce/list.html.twig', [ 'annonces'=> $annonces]);
    }

    /**
     * detail d'une annonce
     * @Route("/{id}", name="annonce_detail", requirements={"id"="\d+"})
     */
    public function detail(int $id, AnimalRepository $animalRepository) : Response

    {
        dump($id);
        return $this->render('annonce/detail.html.twig');
    }

    /**
     * ajouter une annonce
     * @Route("/ajouter", name="annonce_ajouter")
     */
    public function ajouter(EntityManagerInterface $em): Response {
        //TODO / TRAITER UN FORMULAIRE

        $annonce = new Annonce();
        $annonce->setStatut("aperçu");
        $annonce->setDate(new \DateTime());
        $annonce->setDepartement("vaucluse");
        $annonce->setVille("mazan");
        $annonce->setRue("chemin le piol");

        $em->persist($annonce);
        dump($annonce);
        $em->flush();
        dump($annonce);

        return $this->render("annonce/ajouter.html.twig");
    }
}
