<?php

namespace App\Service\Task\TaskScript;


use Core\Model;

class CheckSign extends ScriptBase implements ScriptInterface
{

    /**
     * ���ǩ������
     *
     * @param array $task
     * @param int $uid
     *
     * @return mixed
     */
    public function check($task, $uid)
    {
        $this->task = $task;
        $this->uid = $uid;

        /**
         * ǩ�������Ƿ���ǰǩ������
         */
        $model = new Model();
        $check_sign = $model->find('select * from video_user_check_sign where uid=:uid',array('uid'=>$uid));

        if (!$check_sign) {
            return 'can_apply';
        }

        if ($task['relatedid']) {
            $isDo = $model->find('select * from video_task_user where relatedid=? and uid=?', array($task['relatedid'], $user['uid']));
            // ��û���������û����ɸ�����ʱ
            if (!$isDo || $isDo['status'] != 1) {
                return 'can_apply';
            }
        }

        /**
         * �����ֵ
         */
        $s = date('Ymd',time())-date('Ymd',strtotime($check_sign['last_time']));
        if($s==0){
            return 'all';
        }

        if($s >= 1){
            return 'can_apply';
        }

    }

    public function checkCsc()
    {

    }
}