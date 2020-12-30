<?php


namespace App\Controller\Action\User;

use App\Entity\User;
use App\Service\User\UserUpdateService;

class UpdateUser
{
    private UserUpdateService $userUpdateService;

    public function __construct(UserUpdateService $userUpdateService)
    {

        $this->userUpdateService = $userUpdateService;
    }

    public function __invoke(User $data): User
    {
        return $this->userUpdateService->create($data);
    }
}