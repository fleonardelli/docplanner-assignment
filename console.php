<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Application;
use Doctrine\ORM\EntityManager;
use App\Command\SynchronizeDoctorSlotsCommand;

// Create EntityManager
$paths = [__DIR__ . '/src/Entity'];
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: $paths,
    isDevMode: true
);

// Database configuration parameters for in-memory SQLite
$conn = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'memory' => true,
]);

// Obtaining the entity manager
$entityManager = new EntityManager($conn, $config);

// Create the console application and add commands
$application = new Application();
$application->add(new SynchronizeDoctorSlotsCommand($entityManager));

// Run the app
$application->run();
