<?php
/**
 * 交易记录
 * Class Transaction
 */
class Transaction{

    public $transcations = [];

    public function getTrans(){
        return $this->transcations;
    }

    public function setTrans($new){
        array_push($this->transcations, $new);
    }

    public function getTranString(){
        $tranStr = '';
        if($this->transcations){
            foreach($this->transcations as $val){
                $tranStr .= $val;
            }
        }
        return $tranStr;
    }
}