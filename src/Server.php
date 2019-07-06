<?php


namespace EasySwoole\ApolloConfig;


use EasySwoole\Spl\SplBean;

class Server extends SplBean
{
    protected $server = '';
    protected $appId = '';
    protected $cluster = 'defaultCluster';

    /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @param string $server
     */
    public function setServer(string $server): void
    {
        $this->server = $server;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     */
    public function setAppId(string $appId): void
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getCluster(): string
    {
        return $this->cluster;
    }

    /**
     * @param string $cluster
     */
    public function setCluster(string $cluster): void
    {
        $this->cluster = $cluster;
    }

    function __toString()
    {
        return implode("/",[
            $this->server,
            'configs',
            $this->appId,
            $this->cluster
        ]).'/';
    }
}