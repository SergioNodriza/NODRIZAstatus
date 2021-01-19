<?php


namespace App\Controller\Action\User;


use App\Service\User\UserInfoService;
use Symfony\Component\HttpFoundation\Request;

class InfoUser
{
    private UserInfoService $userInfoService;

    public function __construct(UserInfoService $userInfoService)
    {

        $this->userInfoService = $userInfoService;
    }

    public function __invoke(Request $request)
    {
        $token = $request->cookies->get("BEARER");
        $tokenParts = explode(".", $token);
        $tokenPayload = base64_decode($tokenParts[1]);

        $username = json_decode($tokenPayload)->username;
        $id = json_decode($tokenPayload)->id;

        return $this->userInfoService->info($username, $id);
    }
}