<?php
declare(strict_types=1);
namespace Cs\AbuseApi\Model;

use Magento\Framework\Model\AbstractModel;
use Cs\AbuseApi\Model\ResourceModel\PiresAbuseIpCheck as ResourceModel;

class PiresAbuseIpCheck extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class); // Initialize the resource model
    }
}
