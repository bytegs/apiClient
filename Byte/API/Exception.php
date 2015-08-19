<?php
namespace Byte\API;
class Exception extends \Exception
{
    protected $result;
    public function __construct($message="", $code=0 , Exception $previous=NULL, $result)
    {
        $this->result = $result;
        parent::__construct($message, $code, $previous);
    }
    public function getResult()
    {
        return $this->result;
    }
}
