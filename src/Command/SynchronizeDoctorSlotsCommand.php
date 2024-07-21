<?php

declare(strict_types=1);

namespace App\Command;

use App\DoctorSlotsSynchronizer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class SynchronizeDoctorSlotsCommand extends Command
{
    protected static $defaultName = 'app:synchronize-doctor-slots';

    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Synchronizes doctor slots.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $synchronizer = new DoctorSlotsSynchronizer($this->entityManager);
        $synchronizer->synchronizeDoctorSlots();

        $output->writeln('Doctor slots synchronized successfully.');

        return Command::SUCCESS;
    }
}