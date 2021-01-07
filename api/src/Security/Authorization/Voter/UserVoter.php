<?php

namespace App\Security\Authorization\Voter;

use App\Entity\User;
use App\Service\Roles\RolesService;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use function in_array;

class UserVoter extends Voter
{
    public const USER_CREATE = 'USER_CREATE';
    public const USER_READ = 'USER_READ';
    public const USER_UPDATE = 'USER_UPDATE';
    public const USER_DELETE = 'USER_DELETE';

    private RolesService $rolesService;

    public function __construct(RolesService $rolesService) {

        $this->rolesService = $rolesService;
    }

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, $this->supportedAttributes(), true);
    }

    /**
     * @param string $attribute
     * @param User|null $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $roles = $token->getRoleNames();
        $permissions = $this->rolesService->checkPermissions($roles);

        try {
            return in_array($attribute, $permissions['user'], true);
        }  catch (\Exception $exception) {
            return false;
        }
    }

    private function supportedAttributes(): array
    {
        return [
            self::USER_CREATE,
            self::USER_READ,
            self::USER_UPDATE,
            self::USER_DELETE,
        ];
    }
}