<?php
/**
 * extensions from hundreds of the Import And Export Data extensions in the market as derived from MageTun Ranking which is using Magento developement Tunisia scores, rating reviews, search results, social metrics.
 * Copyright (C) 2018  Magento developement Tunisia
 *
 * This file is part of MageTun/ImportExport.
 *
 * MageTun/ImportExport is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace MageTun\ImportExport\Console\Command;

use Magento\Framework\Filesystem\DirectoryList;
use MageTun\ImportExport\Helper\Data as helper;
use MageTun\ImportExport\Model\Import as ImportData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class Import extends Command
{
    protected $_IMPORT_TYPE = ["customer", "product", "order"];
    protected $FILENAME = "customer.csv";
    const NAME_ARGUMENT = "name";
    const NAME_OPTION = "option";
    const DS = DIRECTORY_SEPARATOR;

    protected $OBJECT_MANAGER;
    protected $IMPORT;
    protected $HELPER;
    protected $_DIR;

    public function __construct(ImportData $import,
                                helper $helper,
                                DirectoryList $dir
    )
    {
        $this->_DIR = $dir;
        $this->IMPORT = $import;
        $this->HELPER = $helper;
        parent::__construct();
    }

    protected function getObjectManager()
    {
        return $this->OBJECT_MANAGER;
    }


    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    )
    {
        $argument = $input->getArgument(self::NAME_ARGUMENT);
        $option = $input->getOption(self::NAME_OPTION);
        $this->createService($output, $argument, $option);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("magetun_importexport:import");
        $this->setDescription("Import CSV file");
        $this->setDefinition([
            new InputArgument(self::NAME_ARGUMENT, InputArgument::OPTIONAL, "Name"),
            new InputOption(self::NAME_OPTION, "-a", InputOption::VALUE_NONE, "Option functionality")
        ]);
        parent::configure();
    }

    protected function sayFastObject($service)
    {
        $service->sayFastObject();
    }

    /**
     * {@inheritdoc}
     */
    protected function saySlowObject($service)
    {
        $service->saySlowObject();
    }

    protected function getCustomerInterface()
    {
        return $this->IMPORT->getCustomer();
    }

    protected function getFile()
    {
        $path = $this->_DIR->getPath('var');
        //$path.= $path.DIRECTORY_SEPARATOR.
    }

    protected function getCsvToArray()
    {
        return $this->HELPER->csvToArray($this->getFile());
    }

    /**
     * {@inheritdoc}
     */
    protected function createService($output, $argument, $option)
    {
        $output->writeln($this->HELPER->setName());
        var_dump($this->getCustomerInterface()->get('marouan.ben.mansour@gmail.com')->getId());

    }
}
