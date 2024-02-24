<?php
declare(strict_types=1);

namespace Cs\AbuseApi\Model\ResourceModel\PiresAbuseIpCheck;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Cs\AbuseApi\Model\PiresAbuseIpCheck as Model;
use Cs\AbuseApi\Model\ResourceModel\PiresAbuseIpCheck as ResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id'; // Primary key field name

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
        // Initialize the model and resource model
    }
}
