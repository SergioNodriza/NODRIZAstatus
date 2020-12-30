<?php


namespace App\Controller\Action\User;


use App\Entity\User;
use App\Service\User\UserCreateService;

class CreateUser
{
    private UserCreateService $userCreateService;

    public function __construct(UserCreateService $userCreateService)
    {
        $this->userCreateService = $userCreateService;
    }

    public function __invoke(User $data): User
    {
        return $this->userCreateService->create($data);
    }
}