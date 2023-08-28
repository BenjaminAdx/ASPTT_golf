<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/article/{id}', name: 'article', methods: ['GET', 'POST'])]
    public function show(Article $article, Request $request, EntityManagerInterface $manager): Response
    {
        $data = $request->request->all();
        $user = $this->getUser();
        $data2 = [$user->getUserIdentifier() => $data];
        var_dump($data2);

        $jsondata = json_encode($data2);

        $article->setformData($jsondata);
        $manager->flush();

        $formFields = $article->getForm()->getFields();

        return $this->render('article/index.html.twig', [
            'article' => $article,
            'formFields' => $formFields,
        ]);
    }
}
