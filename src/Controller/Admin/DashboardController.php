<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\AboutCategory;
use App\Entity\Carousel;
use App\Entity\Services;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('css/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gnp Info');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-tachometer-alt');
        yield MenuItem::linkToUrl('Retour au site', 'fas fa-home', '/');

        yield MenuItem::section('Gestion des utilisateurs');
        yield MenuItem::linkToCrud('Apprenants', 'fas fa-users', User::class);

        yield MenuItem::section('Gestion du carousel');
        yield MenuItem::linkToCrud('Carousel', 'fas fa-image', Carousel::class);

        yield MenuItem::section('Gestion des Services');
        yield MenuItem::linkToCrud('Services', 'fas fa-list', Services::class);

        yield MenuItem::section('Gestion à propos de nous');
        yield MenuItem::linkToCrud('A propos de nous', 'fas fa-info', About::class);
        yield MenuItem::linkToCrud('Catégory', 'fas fa-tag', AboutCategory::class);
    }
}
