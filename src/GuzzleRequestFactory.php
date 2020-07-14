<?php

namespace Universe\Api;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use Involta\Universe\RequestFactory;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;

class GuzzleRequestFactory implements RequestFactory
{
    public function build(string $method, string $url): RequestInterface
    {
        return new Request($method, $url);
    }

    public function createStream($data): StreamInterface
    {
        return Psr7\stream_for($data);
    }
}