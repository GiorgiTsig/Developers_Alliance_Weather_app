<?php

namespace Giorgi\Tsignadze\Controller\Weather;

use Magento\Framework\App\Action\Action as ParentAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Json\Helper\Data;
use Giorgi\Tsignadze\Api\Data\WeatherInterface;
use Giorgi\Tsignadze\Api\WeatherRepositoryInterface;
use phpDocumentor\Reflection\Type;
use Giorgi\Tsignadze\Api\Data\WeatherInterfaceFactory;
use Magento\Framework\Message\ManagerInterface;


class CurlAction extends ParentAction implements HttpGetActionInterface, HttpPostActionInterface
{
    private DataPersistorInterface $dataPersistor;

    protected Curl $curl;

    protected WeatherInterface $weatherInterface;

    protected WeatherRepositoryInterface $WeatherRepositoryInterface;

    private WeatherInterfaceFactory $weatherInterfaceFactory;

    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        WeatherInterface $weatherInterface,
        WeatherInterfaceFactory $weatherInterfaceFactory,
        WeatherRepositoryInterface $WeatherRepositoryInterface,
        Curl $curl)
    {
        $this->curl=$curl;
        $this->WeatherInterfaceFactory=$weatherInterfaceFactory;
        $this->weatherInterface=$weatherInterface;
        $this->WeatherRepositoryInterface=$WeatherRepositoryInterface;
        $this->DataPersistorInterface=$dataPersistor;
        parent::__construct($context);
    }
    public function extractData(array $apiResult)
    {
        $temperatureData = $apiResult['main'];
        $sysData = $apiResult['sys'];

        return [
            WeatherInterface::COUNTRY => $sysData['country'],
            WeatherInterface::SUNRISE => $sysData['sunrise'],
            WeatherInterface::SUNSET => $sysData['sunset'],
            WeatherInterface::TEMPERATURE => $temperatureData['temp'],
            WeatherInterface::FEELS_LIKE => $temperatureData['feels_like'],
            WeatherInterface::PRESSURE => $temperatureData['pressure'],
            WeatherInterface::HUMIDITY => $temperatureData['humidity'],
            WeatherInterface::WIND_SPEED => $apiResult['wind']['speed'],
            WeatherInterface::CITY => $apiResult['name'],
            WeatherInterface::DESCRIPTION => $apiResult['weather'][0]['description']
        ];
    }

    public function execute()
    {
        $request = $this->getRequest();

        if ($request->isPost())
        {
            $city = $request->getParam('city');
            $this->curl->get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=6397e0f6406ec4947e593e26c7569ac2");
            $body = $this->curl->getBody();
            $json = json_decode($body, true);
            if ((int)$json['cod'] === 200) {
                $this->DataPersistorInterface->set('city', $city);
                $weatherData = $this->extractData($json);
                $openWeather = $this->WeatherInterfaceFactory->create();
                foreach ($weatherData as $key => $value) {
                    $openWeather->setData($key, $value);
                    $this->DataPersistorInterface->set($key, $value);
                }
                $this->WeatherRepositoryInterface->save($openWeather);
            } else {
                $this->messageManager->addErrorMessage("Please Enter correct current location");
            }
        }
        return $this->resultRedirectFactory->create()->setUrl("http://magento.localhost/weather/weather/index");
    }
}
