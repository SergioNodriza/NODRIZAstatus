<?php

namespace ContainerKCUYlKB;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLiipTestFixtures_Services_DatabaseToolCollectionService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'liip_test_fixtures.services.database_tool_collection' shared service.
     *
     * @return \Liip\TestFixturesBundle\Services\DatabaseToolCollection
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/liip/test-fixtures-bundle/src/Services/DatabaseToolCollection.php';

        $container->services['liip_test_fixtures.services.database_tool_collection'] = $instance = new \Liip\TestFixturesBundle\Services\DatabaseToolCollection($container, ($container->privates['annotations.reader'] ?? $container->getAnnotations_ReaderService()));

        $instance->add(($container->privates['liip_test_fixtures.services_database_tools.orm_database_tool'] ?? $container->load('getLiipTestFixtures_ServicesDatabaseTools_OrmDatabaseToolService')));
        $instance->add(($container->privates['liip_test_fixtures.services_database_tools.orm_sqlite_database_tool'] ?? $container->load('getLiipTestFixtures_ServicesDatabaseTools_OrmSqliteDatabaseToolService')));
        $instance->add(($container->privates['liip_test_fixtures.services_database_tools.mongodb_database_tool'] ?? $container->load('getLiipTestFixtures_ServicesDatabaseTools_MongodbDatabaseToolService')));
        $instance->add(($container->privates['liip_test_fixtures.services_database_tools.phpcr_database_tool'] ?? $container->load('getLiipTestFixtures_ServicesDatabaseTools_PhpcrDatabaseToolService')));

        return $instance;
    }
}