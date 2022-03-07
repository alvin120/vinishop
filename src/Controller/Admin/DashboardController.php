<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\User;
use App\Entity\Vinyl;
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
            ->setTitle('Vinishop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
           yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
           yield MenuItem::linkToCrud('Vinyles', 'fas fa-record-vinyl', Vinyl::class);
            yield MenuItem::linkToCrud('Categories', 'fas fa-music', Categorie::class);

    }
}
