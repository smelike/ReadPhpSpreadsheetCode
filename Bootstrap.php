<?php
/*
	@20180415
	vendor/phpoffice/phpspreadsheet/src/Bootstrap.php
*/

/**
 * Bootstrap for PhpSpreadsheet classes.
 */

// This sucks, but we have to try to find the composer autoloader


/*
	定义一个数组，存放两种情况下的 autoload.php 访问路径.
	第一种：phpspreadsheet 是直接被拷贝到 vendor；
	第二种：phpspreadsheet 作为通过 composer 安装的依赖；
	
*/
$paths = [
    __DIR__ . '/../vendor/autoload.php', // In case PhpSpreadsheet is cloned directly
    __DIR__ . '/../../../autoload.php', // In case PhpSpreadsheet is a composer dependency.
];

// foreach  循环遍历，判断文件是否存在，存在则引入，退出。
foreach ($paths as $path) {
    if (file_exists($path)) {
        require_once $path;

        return;
    }
}

// 文件不存在，抛出异常。
throw new \Exception('Composer autoloader could not be found. Install dependencies with `composer install` and try again.');
