<?php

namespace Giorgi\Tsignadze\Api\Data;


interface WeatherInterface
{
    const ID = "weather_id";
    const CITY = "city";
    const COUNTRY = "country";
    const DESCRIPTION = "description";
    const TEMPERATURE = "temperature";
    const FEELS_LIKE = "feels like";
    const PRESSURE = "pressure";
    const HUMIDITY = "humidity";
    const WIND_SPEED = "wind speed";
    const SUNRISE = "sunrise";
    const SUNSET = "sunset";

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param string $city
     * @return mixed
     */
    public function setCity(string $city);

    /**
     * @return mixed
     */
    public function getCity();

    /**
     * @param string $country
     * @return mixed
     */
    public function setCountry(string $country);

    /**
     * @return mixed
     */
    public function getCountry();

    /**
     * @param string $description
     * @return mixed
     */
    public function setDescription(string $description);

    /**
     * @return mixed
     */
    public function getDescription();

    /**
     * @param float $temperature
     * @return mixed
     */
    public function setTemperature(float $temperature);

    /**
     * @return mixed
     */
    public function getTemperature();

    /**
     * @param int $feelsLike
     * @return mixed
     */
    public function setFeelsLike(int $feelsLike);

    /**
     * @return mixed
     */
    public function getFeelsLike();

    /**
     * @param int $pressure
     * @return mixed
     */
    public function setPressure(int $pressure);

    /**
     * @return int
     */
    public function getPressure();

    /**
     * @param int $humidity
     * @return mixed
     */
    public function setHumidity(int $humidity);

    /**
     * @return mixed
     */
    public function getHumidity();

    /**
     * @param float $windSpeed
     * @return mixed
     */
    public function setWindSpeed(float $windSpeed);

    /**
     * @return mixed
     */
    public function getWindSpeed();

    /**
     * @param string $sunrise
     * @return mixed
     */
    public function setSunrise(string $sunrise);

    /**
     * @return mixed
     */
    public function getSunrise();

    /**
     * @param string $sunset
     * @return mixed
     */
    public function setSunset(string $sunset);

    /**
     * @return mixed
     */
    public function getSunset();
}
