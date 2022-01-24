<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiPostController extends AbstractController
{
   private $entityManager;
   private $serializer;
   private $validator;

   public function __construct(
       EntityManagerInterface $entityManager,
       SerializerInterface $serializer,
       ValidatorInterface $validator
       )
   {
       $this->entityManager = $entityManager;
       $this->serializer = $serializer;
       $this->validator = $validator;
   }

   /**
    * @return Response
    */
    #[Route('/api/post', name: 'api_post_index', methods:'GET')]
    public function index(): Response
    {
        return $this->json($this->entityManager->getRepository(Post::class)->findAll(), 200, [], ["groups" => "post:read"]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    #[Route('/api/post', name: 'api_post_store', methods:'POST')]
    public function store(Request $request): Response
    {
        $json = $request->getContent();

        try {
            //Convert JSON to Object
            $post = $this->serializer->deserialize($json, Post::class, "json");
            $post->setCreatedAt(new \DateTime());
    
            //Create error
            $errors = $this->validator->validate($post);
    
            if (count($errors) > 0) {
                //Create JSON error
                return $this->json($errors, 400);
            }
            
            //Save data
            $this->entityManager->persist($post);
            //Send data in db
            $this->entityManager->flush();
    
            return $this->json($post, 201, [], ["groups" => "post:read"]);

        } catch (NotEncodableValueException $e) {
            return $this->json([
                "status" => 400,
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
