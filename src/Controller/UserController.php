<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class UserController extends AbstractController{
    
    // public function index(){
    //    return $this->render('user/users.html.twig');
    // }
    
    public function getUsers(EntityManagerInterface $em): Response
    {
        
        //$em = $this->getDoctrine()->getManager();
        $listUsers = $em->getRepository('App::Users')->findAll([], ['name' => 'ASC']);
        
        return $this->render('user/users.html.twig', [
            'listUsers' => $listUsers
        ]);
    }
    
}
