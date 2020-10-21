<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LivreController extends AbstractController
{
    /**
     * @Route("/livre", name="livre")
     */
    public function index()
    {
        return $this->render('fronten/livres.html.twig', [
            'controller_name' => 'LivreController',
        ]);
    }

    /**
     * @Route("/livreShow", name="livre_show")
     */
    public function show()
    {
        return $this->render('fronten/livredetail.html.twig');
    }

}
