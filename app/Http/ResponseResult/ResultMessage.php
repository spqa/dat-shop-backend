<?php
/**
 * Created by PhpStorm.
 * User: super
 * Date: 12/3/2017
 * Time: 11:11 AM
 */

namespace App\Http\ResponseResult;


class ResultMessage
{

    public $error;
    public $message;

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}