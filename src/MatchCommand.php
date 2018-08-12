<?php

namespace Calculator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MatchCommand extends Command
{
    public function configure()
    {
        $this->setName('match')
             ->setDescription('Calculator')
            ->addArgument('a', InputArgument::REQUIRED, 'First param')
            ->addArgument('operation', InputArgument::REQUIRED, 'Operation')
            ->addArgument('b', InputArgument::REQUIRED, 'Second param');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $math = new Match();
            $msg = $math->calc(
                $input->getArgument('a'),
                $input->getArgument('b'),
                $input->getArgument('operation')
            );
        } catch (\Throwable $e) {
            $msg = $e->getMessage();
        }

        $output->writeln($msg);
    }
}