<?php

namespace JuheApi\Call\OfficialAccount;

use JuheApi\Kernel\Http;
use JuheApi\Kernel\XML;
use JuheApi\ReplyMsg\ReplyMsg;

class ServiceProvider
{
    private $config = [];
    private $message = null;
    
    public function __construct($config = null)
    {
        $this->config = $config;
    }
    
    public function push($call, $MsgType = null)
    {
        if (!$this->message) {
            echo '解析数据';
            $message = file_get_contents("php://input");
            if (!$this->message = XML::parse($message)) {
                echo '消息解析失败，消息内容：' . $message;
                return false;
            }
        }
        
        // 指定消息类型
        if ($MsgType) {
            // 如：event.CLICK
            if (strpos($MsgType, '.')) {
                list($MsgType, $Event) = explode('.', $MsgType);
                if ($this->message['MsgType'] == $MsgType && $this->message['Event'] == $Event) {
                    $call($this->message, $_GET, new ReplyMsg($this->message));
                }

            } else if ($this->message['MsgType'] == $MsgType) {
                $call($this->message, $_GET, new ReplyMsg($this->message));
            }
            
        } else {
            $call($this->message, $_GET, new ReplyMsg($this->message));
        }
    }
}
