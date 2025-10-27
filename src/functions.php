<?php declare(strict_types=1);

namespace EdgeTelemetrics\ZeroTrust\Common;

function extractClientAuthFromStream($stream_or_context): array
{
    $sslOptions = stream_context_get_options($stream_or_context);
    if (isset($sslOptions['ssl']['peer_certificate'])) {
        $cert = $sslOptions['ssl']['peer_certificate'];
        $details = openssl_x509_parse($cert);
        openssl_x509_export($cert, $pem);
        return [
            'SSL_CLIENT_CERT' => $pem,
            'SSL_CLIENT_S_DN_CN' => $details['subject']['CN'],
            'SSL_CLIENT_S_DN_O' => $details['subject']['O'],
            'SSL_CLIENT_S_DN_OU' => $details['subject']['OU'],
            'SSL_CLIENT_S_SN_Email' => $details['subject']['emailAddress'],
            'SSL_CLIENT_M_SERIAL' => $details['serialNumber']
        ];
    }
    return [];
}