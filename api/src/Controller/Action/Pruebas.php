<?php


namespace App\Controller\Action;

use App\Entity\Service;
use App\Entity\User;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use App\Service\Password\EncoderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Pruebas extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ProductRepository $productRepository;
    private EncoderService $encoderService;
    private UserRepository $userRepository;

    public function __construct(EntityManagerInterface $entityManager, ProductRepository $productRepository, EncoderService $encoderService,
                                UserRepository $userRepository)
    {
        $this->entityManager = $entityManager;
        $this->productRepository = $productRepository;
        $this->encoderService = $encoderService;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/1", name="pruebas")
     * @return Response
     */
    public function tryService(): Response
    {

        $service = new Service();
        $service->setName('Prueba');

        $product = $this->productRepository->findOneBy(["id" => 1]);
        $service->setProduct($product);

        //dd($product, $service);

        $this->entityManager->persist($service);
        $this->entityManager->flush();

        return(new Response('hola'));
    }

    /**
     * @Route("/2", name="pruebas")
     * @return Response
     */
    public function tryUser(): Response
    {

        $user = new User();
        $user->setName('Automatico5');
        $user->setPassword($this->encoderService->generateEncodedPassword($user, 'Automatico5'));

        $roles = ['ROLE_USER'];

        if ($roles) {
            foreach ($roles as $rol) {
                $user->addRoles($rol);
            }
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return(new Response('hola'));
    }

    /**
     * @Route("/3", name="pruebas")
     * @return Response
     */
    public function tryExplode(): Response
    {
        $var = '/api/services/14';

        $slice = explode("/", $var);

        $salida = $slice[0];
        $salida .= '-';
        $salida .= $slice[1];
        $salida .= '-';
        $salida .= $slice[2];
        $salida .= '-';
        $salida .= $slice[3];

        $salida2 = substr($var, strrpos($var, '/') + 1);

        return(new Response($salida2));
    }

    /**
     * @Route("/4", name="pruebas")
     * @return JsonResponse
     */
    public function tryJson(): JsonResponse
    {
        $products = $this->productRepository->findAll();
        $nombres = [];

        foreach ($products as $product) {
            $nombres[] = $product->getName();
        }

        return (new JsonResponse($nombres));
    }

    /**
     * @Route("/5", name="pruebas")
     * @return Response
     */
    public function tryRegex(): Response
    {
        $password = 'aB3456$';
        $pattern = "/!@#$%^&*-_/";

        if (strpbrk($pattern, $password)) {
            return (new Response('Si'));
        } else {
            return (new Response('No'));
        }
    }

    /**
     * @Route("/6", name="pruebas")
     * @return Response
     */
    public function tryArray(): Response
    {
        $info = array(
            "sign" => "+",
            "state" => "estado",
        );

        //$info = array();

        return (new Response($info['sign']));
    }

    /**
     * @Route("/7", name="pruebas")
     * @return Response
     */
    public function tryUuid(): Response
    {
        $user = $this->userRepository->findOneBy(['id' => '4e3e6c60-a9ed-4f54-8d6b-9f48d9bbbfb5']);
        $id = $user->getId();

        return (new Response($id));
    }
}