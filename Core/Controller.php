<?php

namespace Core;

use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Response as SymfonyResqonse;

class Controller
{
    protected $twig;
    protected $request;
    protected $response;

    /**
     * ��ʼ����ע��container
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;

        // ��ʼ�� DB�� TODO Ӧ���� �¼������ķ�ʽ����ʼ�� ��Ϊ�п����ڲ���Ҫdb�������Ҳ��ʼ����
        $container->make('db');

        if(method_exists($this, '__init__')) {
            return call_user_func_array(array($this, '__init__'),array());
        }
    }

    /**
     * ��Ⱦģ��
     *
     * @param $tpl
     * @param $params
     * @return Response
     */
    public function render($tpl, $params = [])
    {
        $twig = $this->container->make('view');
        // ������html.twig��β
        return new SymfonyResqonse($twig->render($tpl . '.html.twig', $params, true));
    }

}
