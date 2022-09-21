<?php

namespace Giorgi\Tsignadze\Ui\DataProvider\Weather\Grid;


use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Giorgi\Tsignadze\Api\Data\WeatherInterface;

class Collection extends SearchResult
{
    protected function initSelect()
    {
            $this->addFilterToMap(WeatherInterface::ID, 'main_table.' . WeatherInterface::ID);
            $this->addFilterToMap(WeatherInterface::CITY, 'main_table.' . WeatherInterface::CITY);
            $this->addFilterToMap(WeatherInterface::COUNTRY, 'main_table.' . WeatherInterface::COUNTRY);
            $this->addFilterToMap(WeatherInterface::DESCRIPTION, 'main_table.' . WeatherInterface::DESCRIPTION);
            $this->addFilterToMap(WeatherInterface::TEMPERATURE, 'main_table.' . WeatherInterface::TEMPERATURE);
            $this->addFilterToMap(WeatherInterface::FEELS_LIKE, 'main_table.' . WeatherInterface::FEELS_LIKE);
            $this->addFilterToMap(WeatherInterface::PRESSURE, 'main_table.' . WeatherInterface::PRESSURE);
            $this->addFilterToMap(WeatherInterface::HUMIDITY, 'main_table.' . WeatherInterface::HUMIDITY);
            $this->addFilterToMap(WeatherInterface::WIND_SPEED, 'main_table.' . WeatherInterface::WIND_SPEED);
            $this->addFilterToMap(WeatherInterface::SUNRISE, 'main_table.' . WeatherInterface::SUNRISE);
            $this->addFilterToMap(WeatherInterface::SUNSET, 'main_table.' . WeatherInterface::SUNSET);
            parent::_initSelect();

    }
}
