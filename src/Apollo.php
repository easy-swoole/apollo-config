<?php


namespace EasySwoole\ApolloConfig;


use EasySwoole\Config\TableConfig;

class Apollo extends TableConfig
{
    protected $namespace = [];
    /*
     * 同步配置
     */
    function sync()
    {

    }

    function setNameSpace(array $data):Apollo
    {
        $this->namespace = $data;
        return $this;
    }

    function getNameSpace()
    {
        return $this->namespace;
    }
}