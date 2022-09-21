<?php

namespace Giorgi\Tsignadze\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Weather extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'weather_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('weather', 'weather_id');
        $this->_useIsObjectNew = true;
    }
}
