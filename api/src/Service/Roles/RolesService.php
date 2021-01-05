<?php

namespace App\Service\Roles;

class RolesService
{
    private const ADMIN = "ROLE_ADMIN";
    private const BUSINESS = "ROLE_EMPRESA_";
    private const USER_PERMISSIONS = ["USER_CREATE", "USER_READ", "USER_UPDATE", "USER_DELETE"];
    private const PRODUCT_PERMISSIONS = ["PRODUCT_CREATE", "PRODUCT_READ", "PRODUCT_UPDATE", "PRODUCT_DELETE"];
    private const SERVICE_PERMISSIONS = ["SERVICE_CREATE", "SERVICE_READ", "SERVICE_UPDATE", "SERVICE_DELETE"];
    private const INCIDENT_PERMISSIONS_TOTAL = ["INCIDENT_CREATE", "INCIDENT_READ", "INCIDENT_UPDATE", "INCIDENT_DELETE"];
    private const INCIDENT_PERMISSIONS = ["INCIDENT_CREATE", "INCIDENT_READ", "INCIDENT_UPDATE"];

    public function checkPermissions(Array $roles): array
    {
        $permissions = [];

        foreach ($roles as $rol) {

            if (str_starts_with($rol, self::BUSINESS)) {
                $rol = self::BUSINESS;
            }

            switch($rol) {
                case self::ADMIN:
                    $permissions = [
                        'user' => self::USER_PERMISSIONS,
                        'product' => self::PRODUCT_PERMISSIONS,
                        'service' => self::SERVICE_PERMISSIONS,
                        'incident' => self::INCIDENT_PERMISSIONS_TOTAL
                    ];
                    break;
                case self::BUSINESS:
                    $permissions = [
                        self::INCIDENT_PERMISSIONS
                    ];
                    break;
                default:
                    break;
            }
        }
        return $permissions;
    }
}