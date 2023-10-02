<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * Retrieves and displays an article.
     *
     * @param Article $article The article entity.
     * @param Request $request The request object.
     * @param EntityManagerInterface $manager The entity manager.
     * @throws Some_Exception_Class description of exception
     * @return Response The response object.
     */
    #[Route('/article/{id}', name: 'article', methods: ['GET', 'POST'])]
    public function show(Article $article, Request $request, EntityManagerInterface $manager): Response
    {


        $data = $request->request->all();
        $user = $this->getUser();
        $data2 = [$user->getUserIdentifier() => $data];

        if (!empty($data2[$user->getUserIdentifier()])) {
            $existingData = json_decode($article->getFormData(), true, 512, JSON_OBJECT_AS_ARRAY);
            if (!empty($existingData)) {
                $newData = array_merge($existingData, $data2);
            } else {
                $newData = $data2;
            }
            $jsondata = json_encode($newData, JSON_UNESCAPED_UNICODE);


            $article->setformData($jsondata);

            $manager->flush();
        }

        $formDataOrder = json_decode($article->getFormData(), true, 512, JSON_OBJECT_AS_ARRAY);
        if (!empty($formDataOrder)) {
            ksort($formDataOrder);
            $formData = array_map(function ($array) {
                ksort($array);
                return $array;
            }, $formDataOrder);
        } else {
            $formData = [];
        }


        $formFields = $article->getForm()->getFields();

        return $this->render('article/index.html.twig', [
            'article' => $article,
            'formFields' => $formFields,
            'formData' => $formData,
        ]);
    }

    #[Route('/article', name: 'article.all', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/indexAll.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }
}
