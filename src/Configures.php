<?php


namespace EasySwoole\ApolloConfig;


use EasySwoole\Spl\SplBean;

class Configures extends SplBean
{
    protected $releaseKey;
    protected $configurations = [];

    /**
     * @return mixed
     */
    public function getReleaseKey()
    {
        return $this->releaseKey;
    }

    /**
     * @param mixed $releaseKey
     */
    public function setReleaseKey($releaseKey): void
    {
        $this->releaseKey = $releaseKey;
    }

    /**
     * @return array
     */
    public function getConfigurations(): array
    {
        return $this->configurations;
    }

    /**
     * @param array $configurations
     */
    public function setConfigurations(array $configurations): void
    {
        $this->configurations = $configurations;
    }
}