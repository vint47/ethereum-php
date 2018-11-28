<?php

namespace Ethereum\DataType;
use Math_BigInteger;

class EthPassphrase extends EthQ
{
    public function __construct($passfrase, array $params = [])
    {
        parent::__construct($passfrase, $params);
    }

    public function validate($val, array $params)
    {
        return $val;
    }

    public function val()
    {
            return $this->value;
    }

    public function hexVal()
    {
        return $this->value;
    }
}
