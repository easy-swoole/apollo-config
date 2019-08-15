<?php


namespace EasySwoole\ApolloConfig;


use EasySwoole\Config\TableConfig;

class Apollo extends TableConfig
{
    /** @var Server */
    private $server;
    /** @var Client */
    private $client;
    private $namespace = [];


    function __construct(bool $isDev = true)
    {
        $this->client = new Client();
        parent::__construct($isDev);
    }

    /*
     * 同步配置
     */
    function sync($namespace = null,$merge = true):?Configures
    {
        if($namespace !== null){
            $list = [$namespace];
        }else{
            $list = $this->namespace;
        }

        foreach ($list as $namespace){
            $ret = $this->client->pull($namespace);
            if($ret && $merge){
                $this->setConf($namespace,$ret->getConfigurations());
                $this->setConf("releaseKey_".$namespace,$ret->getReleaseKey());
            }
            return $ret;
        }
        return null;
    }

    function getReleaseKey($namespace)
    {
        return $this->getConf("releaseKey_".$namespace);
    }

    function setNameSpace(array $data):Apollo
    {
        $this->namespace = $data;
        return $this;
    }

    function getNameSpace():array
    {
        return $this->namespace;
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function setServer(Server $server): Apollo
    {
        $this->server = $server;
        $this->client->__setServer($server);
        return $this;
    }


    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): Apollo
    {
        $this->client = $client;
        return $this;
    }
}