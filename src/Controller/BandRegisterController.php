<?php

namespace App\Controller;

use App\Form\BandRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BandRegisterController extends AbstractController
{
    #[Route('/band/register', name: 'app_band_register')]
    public function index(): Response
    {
        return $this->render('band_register/index.html.twig', [
            'controller_name' => 'BandRegisterController',
        ]);
    }

    public function edit(
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(BandRegisterType::class);
    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Ici, on va ajouter plus tard la logique pour gérer l'upload du fichier
    
            $em->flush();
        }
    
        return $this->render('user/edit.html.twig', [
            'form' => $form,
            
        ]);
    }
}
