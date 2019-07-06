# apollo-config

Easyswoole Apollo 配置中心

## 示例代码
```

use EasySwoole\ApolloConfig\Server;
use EasySwoole\ApolloConfig\Apollo;

go(function (){
    $server = new Server([
        'server'=>'http://106.12.25.204:8080',
        'appId'=>'easyswoole'
    ]);

    $config = new Apollo();
    /*
     * 设置当前客户端所处的数据中心名字，可选
     */
    $config->getClient()->setDataCenter('testDataCenter');

    $config->setServer($server);
    /*
     * 配置需要同步的配置项namespace
     */
    $config->setNameSpace([
        'mysql'
    ]);
    /*
     * 进行配置项同步
     */
    $config->sync();

    var_dump($config->getConf('mysql'));
    var_dump($config->getConf('mysql.db'));
    var_dump($config->getReleaseKey('mysql'));

});
```

> 自己自己添加定时器进行定时同步