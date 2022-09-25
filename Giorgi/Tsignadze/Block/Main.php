<?php

namespace Giorgi\Tsignadze\Block;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\Element\Template;
use Giorgi\Tsignadze\Api\Data\WeatherInterface;
use Giorgi\Tsignadze\Model\ResourceModel\Weather\CollectionFactory;


class Main extends Template
{
    protected $WeatherCollectionFactory;

    public function __construct(
        Template\Context $context,
        WeatherInterface $WeatherInterface,
        DataPersistorInterface $dataPersistor,
        CollectionFactory $WeatherCollectionFactory,
        array $data = [])
    {
        $this->WeatherInterface=$WeatherInterface;
        $this->WeatherCollectionFactory = $WeatherCollectionFactory;
        $this->DataPersistorInterface=$dataPersistor;
        parent::__construct($context, $data);
    }


    public function getcity()
    {
        $city = $this->DataPersistorInterface->get('city');
        $this->DataPersistorInterface->clear('city');
        return $city;
    }

    public function getcountry()
    {
        $country = $this->DataPersistorInterface->get('Country');
        $this->DataPersistorInterface->clear('Country');
        return $country;
    }

    public function getdescription()
    {
        $description = $this->DataPersistorInterface->get('description');
        $this->DataPersistorInterface->clear('description');
        return $description;
    }

    public function gettemperature()
    {
        $temperature = $this->DataPersistorInterface->get('temperature');
        $this->DataPersistorInterface->clear('temperature');
        return $temperature;
    }

    public function getfeelslike()
    {
        $feelslike = $this->DataPersistorInterface->get('feels like');
        $this->DataPersistorInterface->clear('feels like');
        return $feelslike;
    }

    public function getpressure()
    {
        $pressure = $this->DataPersistorInterface->get('pressure');
        $this->DataPersistorInterface->clear('pressure');
        return $pressure;
    }

    public function gethumidity()
    {
        $humidity = $this->DataPersistorInterface->get('humidity');
        $this->DataPersistorInterface->clear('humidity');
        return $humidity;
    }

    public function getwindspeed()
    {
        $windspeed = $this->DataPersistorInterface->get('wind speed');
        $this->DataPersistorInterface->clear('wind speed');
        return $windspeed;
    }

    public function getsunrise()
    {
        $sunrise = $this->DataPersistorInterface->get('sunrise');
        $this->DataPersistorInterface->clear('sunrise');
        if ($sunrise)
        {
            return date('m/d/Y H:i:s', $sunrise);
        }
        return null;
    }

    public function getsunset()
    {
        $sunset = $this->DataPersistorInterface->get('sunset');
        $this->DataPersistorInterface->clear('sunset');
        if ($sunset)
        {
            return date('m/d/Y H:i:s', $sunset);
        }
        return null;
    }

    public function getWeatherData()
    {
        return $this->WeatherCollectionFactory->create();
    }

}
