<?php

namespace App\Controller;

use App\Entity\NewsletterEmail;
use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter')]
    public function suscribe(): Response
    {
        $newsletterEmail = new NewsletterEmail();
        $form = $this->createForm(NewsletterType::class);
        return $this->render('newsletter/newsletter.html.twig', [
            'form' => $form,
        ]);
    }
}
