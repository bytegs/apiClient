<?php
namespace Byte\Auth;
class User
{
  public function __construct($apiKey, $url = NULL)
  {
    $this->url = $url;
    $this->apiKey = $apiKey;
    $this->curl = new \Curl;
    $this->curl->headers["X-Auth-Token"] = $apiKey;
  }
  public function get($path)
  {
    $res = $this->curl->get($this->url.$path);
    $ret = json_decode($res->body, true);
    if($ret == NULL)
    {
      throw new \Byte\API\Exception("Return no JSON", 0, NULL, $res);
    }
    return $ret;
  }
  public function post($path, $data = [])
  {
    $res = $this->curl->post($this->url.$path, $data);
    $ret = json_decode($res->body, true);
    if($ret == NULL)
    {
      throw new \Byte\API\Exception("Return no JSON", 0, NULL, $res);
    }
    return $ret;
  }

}
