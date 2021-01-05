<?php


namespace App\Security\Authorization\Voter;


use App\Entity\Incident;
use App\Service\Roles\RolesService;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class IncidentVoter extends Voter
{
    public const INCIDENT_CREATE = 'INCIDENT_CREATE';
    public const INCIDENT_READ = 'INCIDENT_READ';
    public const INCIDENT_UPDATE = 'INCIDENT_UPDATE';
    public const INCIDENT_DELETE = 'INCIDENT_DELETE';

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
     * @param Incident|null $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $roles = $token->getRoleNames();
        $permissions = $this->rolesService->checkPermissions($roles);

        return in_array($attribute, $permissions['incident'], true);
    }

    private function supportedAttributes(): array
    {
        return [
            self::INCIDENT_CREATE,
            self::INCIDENT_READ,
            self::INCIDENT_UPDATE,
            self::INCIDENT_DELETE,
        ];
    }
}