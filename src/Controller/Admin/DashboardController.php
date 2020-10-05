<?php 

namespace App\Controller\Admin;

use App\Controller\Admin\AdminCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use App\Entity\Admin;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin")
     */
    public function index(): Response
    {

        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        
        return $this->redirect($routeBuilder->setController(AdminCrudController::class)->generateUrl());
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Important');
        yield MenuItem::linkToCrud('Admin', 'fa fa-user', Admin::class);
        yield MenuItem::linkToCrud('User', 'fa fa-user', User::class);
    }

}

