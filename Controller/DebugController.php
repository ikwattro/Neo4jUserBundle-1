<?php

namespace Neo4jUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DebugController extends Controller
{
    public function finduserbyemailAction($email)
    {
    
        $em = $this->container->get('neo4j.user_manager');  
        
        // Find one User with more than one criteria
        //$user = $em->findAny($email);           
        
        $user = $em->findUserByUsernameOrEmail($email);    

        return $this->render('Neo4jUserBundle:Debug:finduserbyemail.html.twig', array('email' => $email, 'user' =>$user));
    }    
    
    public function finduserbyidAction($id)
    {
    
        $em = $this->container->get('neo4j.user_manager');  
        
        // Find one User with more than one criteria
        //$user = $em->findAny($email);           
        
        $user = $em->findUserById($id);    
        
        return $this->render('Neo4jUserBundle:Debug:finduserbyid.html.twig', array('id' => $id, 'user' =>$user));
    }
}