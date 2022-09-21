<?php

namespace Giorgi\Tsignadze\Model\ResourceModel\Weather;

use Giorgi\Tsignadze\Model\ResourceModel\Weather as ResourceModel;
use Giorgi\Tsignadze\Model\Weather as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'weather_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
