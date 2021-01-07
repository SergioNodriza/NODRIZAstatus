<?php


namespace App\Security\Authorization\Voter;


use App\Entity\Product;
use App\Service\Roles\RolesService;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ProductVoter extends Voter
{
    public const PRODUCT_CREATE = 'PRODUCT_CREATE';
    public const PRODUCT_READ = 'PRODUCT_READ';
    public const PRODUCT_UPDATE = 'PRODUCT_UPDATE';
    public const PRODUCT_DELETE = 'PRODUCT_DELETE';

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
     * @param Product|null $subject
     * @param TokenInterface $token
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $roles = $token->getRoleNames();
        $permissions = $this->rolesService->checkPermissions($roles);

        try {
            return in_array($attribute, $permissions['product'], true);
        }  catch (\Exception $exception) {
            return false;
        }
    }

    private function supportedAttributes(): array
    {
        return [
            self::PRODUCT_CREATE,
            self::PRODUCT_READ,
            self::PRODUCT_UPDATE,
            self::PRODUCT_DELETE,
        ];
    }
}