<?php

namespace Core;

use Illuminate\Container\Container;

/**
 * �������
 *
 * Class Service
 * @package Core
 */
class Service
{
    /**
     * ����ע��
     * @var
     */
    protected $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
//        var_dump($container->config);
    }
}