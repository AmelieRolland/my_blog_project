<?php

namespace App\Controller;

use App\Data\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'Mon Super Blog',
            'articles' => $articles
        ]);
    }

    #[Route('/contact', name:'app_contact')]

    public function contact()
    {
        return $this->render('index/contact.html.twig');
    }

    #[Route('/category/{id}', name: "category_item")]
public function item(Category $category): Response
{
  return $this->render('category/item.html.twig', [
    'category' => $category
  ]);
}
    
}
