<?php

namespace App;

class Request
{
    protected $postData;
    protected $getData;

    public function __construct($postData, $getData)
    {
        $this->postData = $postData;
        $this->getData  = $getData;
    }

    public function isPost(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getPostData(): array
    {
        return $this->postData;
    }

    /**
     * @return mixed
     */
    public function getGetData(): array
    {
        return $this->getData;
    }


}