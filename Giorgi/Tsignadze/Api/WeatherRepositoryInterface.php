<?php

namespace Giorgi\Tsignadze\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Giorgi\Tsignadze\Api\Data\WeatherInterface;

interface WeatherRepositoryInterface
{
    public function save(WeatherInterface $weather);

    public function get($weatherId);

    public function getList($searchCriteria);

    public function delete(WeatherInterface $weather);

    public function deleteById($weatherId);
}
