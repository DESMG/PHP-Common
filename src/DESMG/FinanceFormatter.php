<?php

namespace DESMG\DESMG;

use InvalidArgumentException;

class FinanceFormatter
{
    const int ROUND = 0;
    const int CEIL = 1;
    const int FLOOR = -1;
    /** @var int[] */
    const array ALLOWED_METHODS = [self::ROUND, self::CEIL, self::FLOOR];

    /**
     * Alias:
     * {@see c2y}
     */
    public static function c2d(int $c): float
    {
        return static::c2y($c);
    }

    /**
     * convert Cent to Yuan
     */
    public static function c2y(int $c): float
    {
        $y = substr($c, 0, -2);
        $c = substr($c, -2);
        return "$y.$c";
    }

    /**
     * Alias:
     * {@see y2c}
     */
    public static function d2c(float $d): int
    {
        return static::y2c($d);
    }

    /**
     * convert Yuan to Cent
     */
    public static function y2c(float $y): int
    {
        $y = explode('.', $y);
        if (count($y) != 2) {
            return bcmul($y[0], 100, 0);
        }
        return $y[0] . $y[1];
    }

    /**
     * format float number to fixed decimals
     */
    public static function format(float $number, int $decimals = 2, int $method = self::ROUND): float|int
    {
        if (!in_array($method, self::ALLOWED_METHODS)) {
            throw new InvalidArgumentException('Invalid method provided');
        }
        if ($method !== 0) {
            $method > 0 && $method = 1;
            $method < 0 && $method = -1;
            $pos = strpos($number, '.');
            if ($pos > 0) {
                $temp = bcmul($number, bcpow(10, $decimals, 0), 2);
                $temp = $method > 0 ? ceil($temp) : floor($temp);
                $number = bcdiv($temp, bcpow(10, $decimals, 0), 2);
            }
        }
        return number_format($number, $decimals, '.', '');
    }
}
