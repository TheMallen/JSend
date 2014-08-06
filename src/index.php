<?php

namespace themallen\JSend;

class JSend {
    private $status = 'success';
    private $data = null;
    private $message = null;

    public function status($status  = null)
    {
        if (isset($status)) {
            $this->status = $status;
            return $this;
        } else {
            return $this->status;
        }
    }

    public function data($data = null)
    {
        if (isset($data)) {
            $this->data = $data;
            return $this;
        } else {
            return $this->data;
        }
    }

    public function message($message = null)
    {
        if (isset($message)) {
            $this->message = $message;
            return $this;
        } else {
            return $this->message;
        }
    }

    public function success($data = null)
    {
        if(isset($data)) {
            $this->data($data);
        }
        $this->status('success');
        return $this;
    }

    public function fail($message = null)
    {
        if(isset($message)) {
            $this->message($message);
        }
        $this->status('fail');
        return $this;
    }

    public function error($message = null)
    {
        if(isset($message)) {
            $this->message($message);
        }
        $this->status('error');
        return $this;
    }

    public function __toString()
    {
        $dataArray = array();
        if ($this->status) {
            $dataArray['status'] = $this->status;
        }
        if ($this->data) {
            $dataArray['data'] = $this->data;
        }
        if ($this->message) {
            $dataArray['message'] = $this->message;
        }
        return json_encode($dataArray);
    }

    public function output(){
        echo $this->__toString();
    }
}