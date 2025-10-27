<?php declare(strict_types=1);

namespace EdgeTelemetrics\ZeroTrust\Common;

readonly class SSLCertificate {
    public function __construct(public string $cert, public string $key, public string $ca) {}
}