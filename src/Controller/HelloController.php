<?php

namespace App\Controller;

use App\Entity\Article;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializationContext ;

class HelloController extends AbstractController
{

    /**
     * @var SerializerInterface
     */
    protected $serialize ;


    public function __construct( SerializerInterface $serialize )
    {
        $this->serialize = $serialize ;
    }


    /**
     * @Route("/articles/{id}", name="article_show")
     */
    public function showAction()
    {


        $article = new Article();
        $article
            ->setTitle('Mon premier article')
            ->setContent('Le contenu de mon article.')
        ;

        $data = $this->serialize->serialize($article, 'json' , SerializationContext::create()->setGroups(array('detail')) );
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



    /**
     * @Route("/created", name="article_create",methods={"POST"} )
     *
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $article = $this->serialize->deserialize($data, 'App\Entity\Article', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('article created!', Response::HTTP_CREATED);
    }



    /**
     * @Route("/articles", name="article_list", Methods={"GET"} )
     */
    public function listAction()
    {
        $articles = $this->getDoctrine()->getRepository('App:Article')->findAll();
        $data = $this->serialize->serialize($articles, 'json' , SerializationContext::create()->setGroups(array('list')) );

        $response = new Response($data , Response::HTTP_CREATED );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



/**
     * @Route("/", name="welcome_api")
     */
    public function index(): Response
    {
      return new JsonResponse(array(
          'message' => 'hello api',
          'code'    => Response::HTTP_CREATED
      ));
    }
}
