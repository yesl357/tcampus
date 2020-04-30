<h1 align="center"> apidoc </h1>

<p align="center">tcampus工具包/测试 </p>


## Installing

```shell
$ composer require yesl357/apidoc -vvv
```

## Usage

```php
use Yesl357\Apidoc\IpService;

$ipService = new IpService();

$ip = your ip;
$location = $ipService->getLocation($ip);

```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/yesl357/apidoc/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/yesl357/apidoc/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
