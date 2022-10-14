<?php

namespace App\Controller\Admin;

use App\Entity\Membre;
use App\Entity\Produit;
use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<b> BACKOFFICE MyShop</b>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');
        yield MenuItem::section('MyShop');
        yield MenuItem::linkToCrud('Produit', 'fa fa-list', Produit::class);
        yield MenuItem::section('Membre');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Membre::class);
        yield MenuItem::section('commande');
        yield MenuItem::linkToCrud('commande', 'fa fa-list', Commande::class);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);


    }
}
