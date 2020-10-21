<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="ind")
     */
    public function index()
    {
        return $this->render('fronten/index.html.twig');
    }
    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function aboutus()
    {
        return $this->render('fronten/aboutus.html.twig');
    }
}
