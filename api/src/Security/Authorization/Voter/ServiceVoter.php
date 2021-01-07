<?php


namespace App\Security\Authorization\Voter;


use App\Entity\Service;
use App\Service\Roles\RolesService;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ServiceVoter extends Voter
{
    public const SERVICE_CREATE = 'SERVICE_CREATE';
    public const SERVICE_READ = 'SERVICE_READ';
    public const SERVICE_UPDATE = 'SERVICE_UPDATE';
    public const SERVICE_DELETE = 'SERVICE_DELETE';

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
     * @param Service|null $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $roles = $token->getRoleNames();
        $permissions = $this->rolesService->checkPermissions($roles);

        try {
            return in_array($attribute, $permissions['service'], true);
        }  catch (\Exception $exception) {
            return false;
        }
    }

    private function supportedAttributes(): array
    {
        return [
            self::SERVICE_CREATE,
            self::SERVICE_READ,
            self::SERVICE_UPDATE,
            self::SERVICE_DELETE,
        ];
    }
}