<?php

namespace App\Controller\Admin;

use App\Entity\About;
use App\Entity\Admin;
use App\Entity\Header;
use App\Entity\Projet;
use App\Entity\Impress;
use App\Entity\Message;
use App\Entity\Competence;
use App\Entity\Commentaire;
use App\Entity\Information;
use App\Entity\ProjetImages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\InformationCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(InformationCrudController::class)->generateUrl());

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

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Atelier 543');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Gestion des entités');
        
        yield MenuItem::linkToCrud('Informations', 'fa fa-info', Information::class);
        yield MenuItem::linkToCrud('Messages', 'fa fa-envelope', Message::class);
        yield MenuItem::linkToCrud('Projets', 'fa fa-project-diagram', Projet::class);
        yield MenuItem::linkToCrud('Projet Images', 'fa fa-image', ProjetImages::class);
        yield MenuItem::linkToCrud('Admins', 'fa fa-user', Admin::class);
        yield MenuItem::linkToCrud('Headers', 'fa fa-header', Header::class);
        yield MenuItem::linkToCrud('Impress', 'fa fa-header', Impress::class);
        yield MenuItem::linkToCrud('Commentaire', 'fa fa-header', Commentaire::class);
        yield MenuItem::linkToCrud('About', 'fa fa-header', About::class);
        yield MenuItem::linkToCrud('Competences', 'fa fa-header', Competence::class);




        


    }
}
