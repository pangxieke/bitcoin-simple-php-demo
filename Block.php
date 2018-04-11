<?php

/**
 * Class Block
 */
class Block{

    private $index;

    private $timestamp;

    private $transcations;

    private $proof;

    private $previousHash;


    public function __construct($data)
    {
        $this->index = $data['index'];
        $this->timestamp = $data['timestamp'];
        $this->transcations = $data['transcations'];
        $this->proof = $data['proof'];
        $this->previousHash = $data['previousHash'];
    }

    public function blockHash()
    {
        $tranObj = new Transaction();
        $tranStr = $tranObj->getTranString();
        $str = $this->index . $this->timestamp . $tranStr . $this->proof . $this->previousHash;
        return hash('sha256', $str);
    }
}



