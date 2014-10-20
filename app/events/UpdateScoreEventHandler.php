<?php
class UpdateScoreEventHandler {
 
    CONST EVENT = 'chat';
    CONST CHANNEL = 'chat';
  
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
     }
}
