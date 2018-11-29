<?php

namespace Ethereum\DataType;

use Ethereum\RLP\Rlp;


class EthArrayAddress extends EthArray
{
    public function addValue($value)
    {
        if (!is_array($this->value)) {
            $this->value = [];
        }

        $this->value[] = new EthD32Left($value);
    }
}
