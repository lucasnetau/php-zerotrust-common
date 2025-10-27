<?php declare(strict_types=1);

namespace EdgeTelemetrics\ZeroTrust\Common;

readonly class Origin {
    public function __construct(public string $scheme, public string $host, public int $port) {}

    public function getAddress() : string {
        return "$this->scheme://$this->host:$this->port";
    }

    public function getSocketAddress() : string {
        return "$this->host:$this->port";
    }
}