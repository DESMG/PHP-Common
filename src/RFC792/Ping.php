<?php

namespace DESMG\RFC792;

use DateTime;
use Exception;
use RuntimeException;
use Socket;

class Ping
{
    private string $host;
    private false|Socket $socket;
    private int $timeout;
    private int|float $latency;
    private int|float $lossRate;

    public function __construct()
    {
        !defined('SOL_ICMP') && define('SOL_ICMP', getprotobyname('icmp'));
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_ICMP);
        socket_set_option($this->socket, SOL_SOCKET, SO_SNDTIMEO, ['sec' => 1, 'usec' => 0]);
        socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 1, 'usec' => 0]);
    }

    public function __destruct()
    {
        socket_close($this->socket);
    }

    /**
     * @return int[]
     */
    public function __serialize(): array
    {
        socket_close($this->socket);
        return [
            'host' => $this->host,
            'timeout' => $this->timeout,
        ];
    }

    /**
     * @param array $data
     * @return void
     */
    public function __unserialize(array $data): void
    {
        $this->host = $data['host'];
        $this->timeout = $data['timeout'];
        $this->socket = socket_create(AF_INET, SOCK_DGRAM, SOL_ICMP);
        socket_set_option($this->socket, SOL_SOCKET, SO_SNDTIMEO, ['sec' => $data['timeout'], 'usec' => 0]);
        socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => $data['timeout'], 'usec' => 0]);
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @param string $preferredDnsServer
     * @return bool
     * @throws Exception
     */
    public function setHost(string $host, string $preferredDnsServer = 'default'): bool
    {
        if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $this->host = $host;
            return true;
        }
        if ($preferredDnsServer == 'default') {
            $host = gethostbyname($host);
        } else {
            $host = dns_get_record($host, DNS_A);
            if (is_array($host) && count($host) > 0) {
                $host = $host[0]['ip'];
            }
        }
        if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $this->host = $host;
            return true;
        } else {
            trigger_error('Cannot resolve host: ' . $host, E_USER_WARNING);
            return false;
        }
    }

    /**
     * @return float|int
     */
    public function getLatency(): float|int
    {
        return $this->latency;
    }

    /**
     * @return float|int
     */
    public function getLossRate(): float|int
    {
        return $this->lossRate;
    }

    /**
     * @param int $times
     * @return string
     * @noinspection PhpUnused
     * @see          run
     */
    public function ping(int $times = 4): string
    {
        return $this->run($times);
    }

    public function run(int $times = 4): string
    {
        if (empty($this->host) || !filter_var($this->host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            throw new RuntimeException('Host must be set before running');
        }
        $output = '';
        $loss = 0;
        $latency = [];
        for ($i = 0; $i < $times; $i++) {
            $start = $this->getTimeus();
            $package = $this->getPackage($i);
            socket_sendto($this->socket, $package, strlen($package), 0, $this->host, 0);
            $len = socket_recv($this->socket, $buffer, 256, 0);
            !$len && $loss++;
            $end = $this->getTimeus();
            $time = $end - $start;
            $time < 1000000 && usleep(1000000 - $time);
            $len && $latency[] = number_format($time / 1000, 3, '.', '');
            $len && $output .= sprintf("%s %s %s %s ms", $this->host, bin2hex($package), bin2hex($buffer), number_format($time / 1000, 3, '.', '')) . PHP_EOL;
        }
        $sumLatency = array_sum($latency);
        $successTimes = count($latency);
        $avgLatency = $sumLatency == 0 ? 0 : ($successTimes == 0 ? 0 : $sumLatency / $successTimes);
        $this->latency = number_format($avgLatency, 3, '.', '');
        $lossRate = $loss / $times * 100;
        $this->lossRate = number_format($lossRate, 2, '.', '');
        return $output;
    }

    /**
     * @param int $seconds
     * @return void
     */
    public function setTimeout(int $seconds): void
    {
        $this->timeout = $seconds;
        socket_set_option($this->socket, SOL_SOCKET, SO_SNDTIMEO, ['sec' => $seconds, 'usec' => 0]);
        socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => $seconds, 'usec' => 0]);
    }

    /**
     * @param string $package
     * @return string
     */
    private function getCheckSum(string $package): string
    {
        strlen($package) % 2 && $package .= "\x00";
        $sum = array_sum(unpack('n*', $package));
        while ($sum >> 16) {
            $sum = ($sum >> 16) + ($sum & 0xffff);
        }
        return pack('n*', ~$sum);
    }

    /**
     * @param int $i
     * @return string
     */
    private function getPackage(int $i): string
    {
        $checksum = hex2bin('0000');
        $seq_number = hex2bin(str_pad($i, 4, '0', STR_PAD_LEFT));
        $package = hex2bin('0800') . $checksum . hex2bin('0000') . $seq_number . 'PingHost';
        $checksum = $this->getCheckSum($package);
        return hex2bin('0800') . $checksum . hex2bin('0000') . $seq_number . 'PingHost';
    }

    /**
     * @return float
     */
    private function getTimeus(): float
    {
        $date = new DateTime;
        return $date->format('Uu');
    }
}
