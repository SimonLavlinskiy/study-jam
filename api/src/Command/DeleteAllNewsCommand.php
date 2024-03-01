<?php

namespace App\Command;

use App\Repository\NewsRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DeleteAllNewsCommand extends Command
{
    protected static $defaultName = 'app:deleteAllNews';

    public function __construct(
        private readonly NewsRepository $newsRepository
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Удалить все новости из базы данных.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $delete = $io->confirm('Вы действительно хотите удалить все записи?');
        if ($delete) {
            try {
                $this->newsRepository->deleteAllNews();
                $io->info("Записи успешно удалены.");
                return Command::SUCCESS;
            } catch (\Exception $e) {
                $io->error("delete all news error: {$e->getMessage()}");
                return Command::FAILURE;
            }
        }else{
             $io->info("Вы отменили действие.");
            return Command::INVALID;
        }
    }

}