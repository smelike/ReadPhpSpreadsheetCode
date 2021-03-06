<?php
/*
  vendor/composer/autoload_real.php
  
  @20180410
 */
 
// autoload_real.php @generated by Composer

class ComposerAutoloaderInit76b982e74f91b60dd43bcc25083d2d45
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }
		
		/*
			@param1: autoload_function - 注册自动加载函数 ComposerAutoloaderInit76b982e74f91b60dd43bcc25083d2d45：：loadClassLoader
			
			@param2: throw(true/false) - autoload_function 无法成功注册时，spl_autoload_register() 抛出异常
			
			@param3: prepend(true/false) - true, spl_autoload_register() 会添加函数到队列之首，而不是队列尾部

			@return: True - success, False - failure
			
		*/
        spl_autoload_register(array('ComposerAutoloaderInit76b982e74f91b60dd43bcc25083d2d45', 'loadClassLoader'), true, true);
		
		/* 
			通过前面注册的 autoload_function，实现加载类 \Composer\Autoload\ClassLoader 
			
			实例化 \Composer\Autoload\ClassLoader 类
			
		*/
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
		
		/*
			通过 spl_autoload_unregister() 注销自动加载函数
			
			Removes a function from the autoload queue.
			If the queue is activated and empty after removing the given function then it will be deactivated.
			
			When this function [results in] the queue being deactivated, any __autoload function that previously existed will not be reactivated.
			
		*/
        spl_autoload_unregister(array('ComposerAutoloaderInit76b982e74f91b60dd43bcc25083d2d45', 'loadClassLoader'));

		/*
			判断当前PHP 版本是否大于 > 50600，是否定义常数 HHVM_VERSION，是否存在函数 zend_load_file_encoded
			
			结果为 True，调用 autoload_static.php
			
			结果为 False， 调用 autoload_namespaces.php
		*/
        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
		
		/*
			Operator Precedence
			
			comparison  >= PHP_VERSION_ID >= 50600  -> true
			
			logical ! && ||
			
			&& !defined('HHVM_VERSION') -> true
			
			&& (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded()) -> (true || !zend_loader_file_encoded())
			(||, 短路特性-只要左侧条件为真，后面的条件就不再执行)
			
			结果： $useStaticLoader 为 true
		*/
		
		//var_dump($useStaticLoader);
        if ($useStaticLoader) {
		
			// 引入 autoload_static.php 
            require_once __DIR__ . '/autoload_static.php';
			// 调用 autoload_static.php 文件中的类 ComposerStaticInit76b982e74f91b60dd43bcc25083d2d45 静态方法 getInitializer()
            call_user_func(\Composer\Autoload\ComposerStaticInit76b982e74f91b60dd43bcc25083d2d45::getInitializer($loader));
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

		// 调用 $loader 的 register 方法
		// register 方法主要就是将 当前对象的 loadClass 作为 autoloader 追加到 spl 自动加载队列。
        $loader->register(true);

		// 返回 $loader 对象给 autoload.php 
        return $loader;
    }
}
