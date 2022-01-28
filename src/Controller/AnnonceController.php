<?php

namespace App\Controller;


use App\Entity\Annonce;
use App\Entity\Commentaire;
use App\Entity\Images;
use App\Form\AnnonceType;
use App\Form\CommentaireType;
use App\Form\SearchAnnoncesType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/annonces")
 */
class AnnonceController extends AbstractController
{
    /**
     * @Route("/", name="annonce_index", methods={"GET", "POST"})
     */
    public function index(Request $request,AnnonceRepository $annonceRepository): Response
    {
        $formSearch = $this->createForm(SearchAnnoncesType::class);
        $formSearch->handleRequest($request);

        if ($formSearch->isSubmitted()) {
            $SearchDepartement = $formSearch ['departement']->getData();
            $SearchStatut = $formSearch ['statut']->getData();
            $SearchTypeAnimal = $formSearch ['typeAnimal']->getData();


            return $this->render('annonce/index.html.twig', [
                'formSearch' => $formSearch->createView(),
                'annonces' => $annonceRepository->findByFiltre($SearchDepartement, $SearchStatut, $SearchTypeAnimal)

            ]);
        }
        return $this->render('annonce/index.html.twig', [
            'formSearch' => $formSearch->createView(),
            'annonces' =>$annonceRepository->findDefault(),
        ]);

    }


    /**
     * ajouter une annonce
     * @Route("/new", name="annonce_new", methods={"GET", "POST"})
     */
    public function new(Request $request): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setDate(new \DateTime());
            $annonce->setUser($this->getUser());
            $images = $form->get('images')->getData();

            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new Images();
                $img->setName($fichier);
                $annonce->addImage($img);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            $this->addFlash('success', 'L annonce a bien été ajouté');

            return $this->redirectToRoute('annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/new.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/{id}", name="annonce_show", methods={"GET"})
     */
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="annonce_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {

        if ($this->getUser() == $annonce->getUser()) {

            $form = $this->createForm(AnnonceType::class, $annonce);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $images = $form->get('images')->getData();

                // On boucle sur les images
                foreach($images as $image){
                    // On génère un nouveau nom de fichier
                    $fichier = md5(uniqid()).'.'.$image->guessExtension();

                    // On copie le fichier dans le dossier uploads
                    $image->move(
                        $this->getParameter('images_directory'),
                        $fichier
                    );

                    // On crée l'image dans la base de données
                    $img = new Images();
                    $img->setName($fichier);
                    $annonce->addImage($img);
                }

                $entityManager->flush();
                return $this->redirectToRoute('annonce_show', ['id' => $annonce->getId()], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('annonce/edit.html.twig', [
                'annonce' => $annonce,
                'form' => $form,
            ]);

        }

        $this->addFlash('warning', 'vous ne pouvez pas modifier cette annonce');
        return $this->redirectToRoute('annonce_index');
    }

    /**
     * @Route("/{id}", name="annonce_delete", methods={"POST"})
     */
    public function delete(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {

        if ($this->getUser() == $annonce->getUser()) {
            if ($this->isCsrfTokenValid('delete' . $annonce->getId(), $request->request->get('_token'))) {
                $annonce->setUser($this->getUser());
                $entityManager->remove($annonce);
                $entityManager->flush();
            }


            return $this->redirectToRoute('annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        $this->addFlash('warning', 'vous ne pouvez pas supprimer cette annonce');
        return $this->redirectToRoute('annonce_index');

    }


    /**
     * @Route("/{id}/commentaires/ajouter", name="annonce_ajouter_commentaire",
     *     requirements={"id"="\d+"})
     */
    public function ajouterCommentaire(int $id, Request $request, EntityManagerInterface $em)
    {
        $annonce = $em->getRepository(Annonce::class)->find($id);
        if (!$annonce) {
            throw $this->createNotFoundException("annonce inconnu");
        }
        $commentaire = new Commentaire();
        $commentaire->setAnnonce($annonce);
        $commentaire->setUser($this->getUser());
        $formCommentaire = $this->createForm(CommentaireType::class, $commentaire);
        $formCommentaire->handleRequest($request);
        if ($formCommentaire->isSubmitted() && $formCommentaire->isValid()) {
            //$commentaire->setDateCreation(new \DateTime());
            $em->persist($commentaire);
            $em->flush();
            $this->addFlash("success", "Le commentaire a été ajouté");
            return $this->redirectToRoute("annonce_show", ['id' => $id]);
        }
        return $this->render("annonce/ajouter_commentaire.html.twig", [
            'formCommentaire' => $formCommentaire->createView()
        ]);
    }

    /**
     * @Route("/commentaires/modifier/{id}", name="annonce_modifier_commentaire",
     *     requirements={"id"="\d+"})
     */
    public function modifierCommentaire(int $id, Request $request,
                                        EntityManagerInterface $em) {
        $this->denyAccessUnlessGranted("ROLE_USER");
        $commentaire = $em->getRepository(Commentaire::class)->find($id);
        if (!$commentaire) {
            throw $this->createNotFoundException("Commentaire inconnu");
        }
        if ($commentaire->getUser() != $this->getUser()) {
            throw $this->createAccessDeniedException("Vous n'avez les droits de modification");
        }
        $formCommentaire = $this->createForm(CommentaireType::class, $commentaire);
        $formCommentaire->handleRequest($request);
        if ($formCommentaire->isSubmitted() && $formCommentaire->isValid()) {
            $commentaire->setDateModification(new \DateTime());
            $em->persist($commentaire);
            $em->flush();
            $this->addFlash("success", "Le commentaire a été modifié");
            return $this->redirectToRoute("annonce_show",
                ['id' => $commentaire->getAnnonce()->getId()]);
        }
        return $this->render("annonce/modifier_commentaire.html.twig", [
            'formCommentaire' => $formCommentaire->createView()
        ]);
    }

    /**
     * @Route("/supprime/image/{id}", name="annonce_delete_image", methods={"DELETE"})
     */
    public function deleteImage(Images $image, Request $request){
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
            // On récupère le nom de l'image
            $nom = $image->getName();
            // On supprime le fichier
            unlink($this->getParameter('images_directory').'/'.$nom);

            // On supprime l'entrée de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
}
