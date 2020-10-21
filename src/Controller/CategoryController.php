<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        return $this->render('fronten/cathegories.html.twig');
    }

    /**
     * @Route("/show", name="show_category")
     */
    public function show()
    {
      return $this->render('fronten/livres.html.twig');
    }
}
