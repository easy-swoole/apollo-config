<?php


namespace EasySwoole\ApolloConfig;


class Client
{
    private $server;

    function __construct(Server $server)
    {
        $this->server = $server;
    }

    function pull(string $namespace,$releaseKey)
    {
        $url = $this->server->__toString().$namespace.http_build_query([
                'releaseKey' => $releaseKey,
                'ip' => $this->server->getClientIp(),]);
        var_dump($url);
    }
}