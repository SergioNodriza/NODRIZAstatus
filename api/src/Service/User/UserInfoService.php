<?php


namespace App\Service\User;


use App\Entity\User;
use App\Repository\UserRepository;

class UserInfoService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function info(String $username, String $id): User
    {
        return $this->userRepository->findOneBy(["id" => $id, "name" => $username]);
    }
}