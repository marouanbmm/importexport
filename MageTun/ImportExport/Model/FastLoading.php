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
namespace MageTun\ImportExport\Model;


class FastLoading
{
    protected $SLOWLOADING;

    public function __construct(SlowLoading\Proxy $slowLoading)
    {
        $this->SLOWLOADING = $slowLoading;
        $this->getSlowValue();
    }

    public function getFastValue()
    {
        return 'FastLoading value';
    }

    public function getSlowValue()
    {
        return $this->SLOWLOADING->getCustomer();
    }
}