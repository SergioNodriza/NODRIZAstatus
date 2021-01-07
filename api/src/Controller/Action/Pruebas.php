<?php


namespace App\Controller\Action;

use App\Entity\Service;
use App\Entity\User;
use App\Exceptions\UserNotFoundException;
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

    /**
     * @Route("/8", name="pruebas")
     * @return Response
     */
    public function tryRoles(): Response
    {
        $rolesArray = [
            "ROLE_1",
            "ROLE_2",
            "ROLE_ADMIN"
        ];

        $count = 0;

        $user = $this->userRepository->findOneBy(['id' => '184a312c-ff1f-4fcf-b2e9-d09938f217df']);
        $roles = $user->getRoles();

        foreach ($roles as $role) {

            if (in_array($role, $rolesArray, true)) {
                $count++;
            }
        }

        return (new Response($count));
    }

    /**
     * @Route("/9", name="pruebas")
     * @return Response
     */
    public function tryRoles2(): Response
    {
        $user = $this->userRepository->findOneBy(['id' => '184a312c-ff1f-4fcf-b2e9-d09938f217df']);
        $roles = $user->getRoles();

        $bool = in_array("ROLE_ADMIN", $roles, true);
        return (new Response($bool));
    }

    /**
     * @Route("/10", name="pruebas")
     * @return Response
     */
    public function tryRoles3(): Response
    {
        $rol = "ROLE_EMPRESA_1";

        if (str_starts_with($rol, "ROLE_EMPRESA_")) {
            $rol = "ROL_EMPRESA_";
        }

        switch($rol) {
            case "ADMIN":
                $permissions = 1;
                break;
            case "ROL_EMPRESA_":
                $permissions = 2;
                break;
            default:
                $permissions = 0;
                break;
        }

        return (new Response($permissions));
    }


    /**
     * @Route("/11", name="pruebas")
     * @return Response
     */
    public function tryException(): Response
    {
        $username = 'Admin2';

        if (!$user = $this->userRepository->findOneBy(['name' => $username])) {
            throw UserNotFoundException::fromName($username);
        }

        $id = $user->getId();

        return (new Response($id));
    }
}