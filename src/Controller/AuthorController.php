<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="author")
     */
    public function index()
    {  
        $ripo = $this->getDoctrine()->getRepository(Author::class);
        $authors = $ripo->findAll();
        return $this->render('fronten/authors.html.twig', [
            'authors' => '$authors'
            ]);
            
    }


    /**
     * @Route("/authordetail", name="author_show")
     */
    public function show()
    {
        return $this->render('fronten/authordetail.html.twig');
    }
   

}
