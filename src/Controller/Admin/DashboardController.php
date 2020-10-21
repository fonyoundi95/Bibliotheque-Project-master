<?php 

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Admin;
use App\Entity\Books;
use App\Entity\Author;
use App\Entity\Comment;
use App\Entity\Category;
use App\Controller\Admin\AdminCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
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
        yield MenuItem::linkToCrud('Author', 'fa fa-user', Author::class);
        yield MenuItem::linkToCrud('Category', 'fa fa-tags', Category::class);
        yield MenuItem::linkToCrud('Books', 'fa fa-file-pdf', Books::class);
        yield MenuItem::linkToCrud('Comment', 'far fa-comments', Comment::class);
    }

}

