<?php


namespace EasySwoole\ApolloConfig;


use EasySwoole\HttpClient\HttpClient;

class Client
{
    /** @var Server */
    private $server;

    /*
     * 客户端信息
     */
    protected $ip;
    /*
     * 客户端属于哪个数据中心的
     */
    protected $dataCenter = 'defaultDataCenter';

    function __setServer(Server $server):Client
    {
        $this->server = $server;
        return $this;
    }

    /*
     * 拉取最新数据
     */
    function pull(string $namespace):?Configures
    {

        $url = $this->server->__toString().$namespace.'?'.http_build_query(
            [
                "ip"=>$this->ip,
                'dataCenter'=>$this->dataCenter
            ]
            );

        $http = new HttpClient($url);
        $ret = $http->get()->getBody();
        $json = json_decode($ret,true);
        if(is_array($json)){
            return new Configures([
                "releaseKey"=>$json['releaseKey'],
                'configurations'=>$json['configurations']
            ]);
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getDataCenter(): string
    {
        return $this->dataCenter;
    }

    /**
     * @param string $dataCenter
     */
    public function setDataCenter(string $dataCenter): void
    {
        $this->dataCenter = $dataCenter;
    }
}