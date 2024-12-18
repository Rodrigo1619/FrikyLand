<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PostController extends AbstractController
{   /* Se puede mandar parametros a la ruta, en este caso decimos quiero encontrar el id de un Post (que esta en el index)
        #[Route('/post/{id}', name: 'app_post')]
        public function index(Post $post): Response
    */
    /* Hay otra forma con el que puedo buscar un id de un post y es de la forma que se muestra en el codigo */

    //utiliznado entity manager
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/post/{id}', name: 'app_post')]
    public function index($id): Response
    {
        //trayendo el post
        $post = $this->em->getRepository((Post::class))->findAll();
        return $this->render('post/index.html.twig', [
            'post' => $post,
            
        ]);
    }
}
