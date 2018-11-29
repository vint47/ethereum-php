<?php

namespace Ethereum\DataType;

use Ethereum\RLP\Rlp;


class EthArray extends EthBytes
{
    public function addValue($value)
    {
        if (!is_array($this->value)) {
            $this->value = [];
        }

        $this->value[] = new EthQ($value);
    }

    public function validate($val, array $params)
    {
        $return = $val;

        return $return;
    }


    /**
     * Get hexadecimal string representation.
     */
    public function hexVal()
    {
        throw new \Exception('rlpVal');
        return $this->ensureHexPrefix($this->strToHex($this->value));
    }

    /**
     * @return string
     */
    public function encodedHexVal()
    {
        return $this->arrayToHex($this->value);
    }

    /**
     * Get string.
     */
    public function val()
    {
        return $this->value;
    }


    /**
     * Converts a array to Hex.
     *
     * @param array $array
     *   String to be converted.
     *
     * @return string
     *   Hex representation of the string.
     */
    public static function arrayToHex($array)
    {
        $hex = '';
        $arrayLength = count($array);
        $length = new EthQ($arrayLength);
        $hex = $length->hexVal();
        foreach ($array as $key=>$value){
            $hex .= self::removeHexPrefix($value->hexVal());
        }

        return $hex;
    }

    /**
     * Converts Hex to string.
     *
     * @see http://perldoc.perl.org/perlpacktut.html
     *
     * @param string $string
     *   Hex string to be converted to UTF-8.
     *
     * @return string
     *   String value.
     *
     * @throws Exception
     */
    public static function hexToStr($string)
    {
        throw new \Exception('rlpVal');
        return pack('H*', self::removeHexPrefix($string));
    }

    /**
     * @return string|int
     */
    public static function getDataLengthType()
    {
        return 'array';
    }

}
