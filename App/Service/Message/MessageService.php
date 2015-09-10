<?php

namespace App\Service\Message;

use App\Models\Messages;
use Core\Service;

class MessageService extends Service
{

    /**
     * ����һ����Ϣ һ��һ
     */
    public function sendMessage()
    {


    }

    /**
     * �����û�id��ȡ��Ӧ������
     *
     * @param $uid int ��id
     * @param int $num ��ҳ������
     * @return mixed
     */
    public function getMessageByUid($uid,$num=10)
    {
        $msg = Messages::where('rec_uid',$uid)->orderBy('id','desc')->paginate($num);
        return $msg;
    }

    /**
     * �����û�id �� ��Ϣ���� ��ȡ��Ӧ������
     *
     * @param $uid int ��id
     * @param $type int ��Ϣ����id Ĭ��2Ϊ�û�˽��
     * @param int $num ��ҳ������
     * @return mixed
     */
    public function getMessageByUidAndType($uid,$type=2,$num=10)
    {
        $msg = Messages::where('rec_uid',$uid)->where('category',$type)
            ->orderBy('id','desc')->paginate($num);
        return $msg;
    }
}