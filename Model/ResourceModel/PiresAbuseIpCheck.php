<?php
declare(strict_types=1);

namespace Cs\AbuseApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PiresAbuseIpCheck extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('pires_abuseip_check', 'id'); // Define the table name and primary key
    }
}

