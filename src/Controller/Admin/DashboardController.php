<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\Couleur;
use App\Entity\Departement;
use App\Entity\Identification;
use App\Entity\Poils;
use App\Entity\Sexe;
use App\Entity\Statut;
use App\Entity\Taille;
use App\Entity\TypeAnimal;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Monique Degerine');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Statut', 'fas fa-list', statut::class);
        yield MenuItem::linkToCrud('Département', 'fas fa-list', departement::class);
        yield MenuItem::linkToCrud('Type Animal', 'fas fa-list', TypeAnimal::class);
        yield MenuItem::linkToCrud('Identification', 'fas fa-list', Identification::class);
        yield MenuItem::linkToCrud('Sexe', 'fas fa-list', Sexe::class);
        yield MenuItem::linkToCrud('Poils', 'fas fa-list', Poils::class);
        yield MenuItem::linkToCrud('Taille', 'fas fa-list', Taille::class);
        yield MenuItem::linkToCrud('Annonce', 'fas fa-list', Annonce::class);
        yield MenuItem::linkToCrud('Membre', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Couleur', 'fas fa-list', Couleur::class);
    }
}
