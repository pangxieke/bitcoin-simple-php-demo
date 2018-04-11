<?php
/**
 * black chain
 * Class Chain
 */
class Chain{
    private $chain = [];

    private $fileName = 'chain.txt';    //

    public function __construct()
    {
        $this->chain = $this->read();

        //创世区块
        if(empty($this->chain)){
            $this->init();
        }
    }

    public function getChain(){
        return $this->chain;
    }

    public function add($new){
        $this->chain[] = $new;
        $this->save();
    }

    /**
     * 最新区块
     *
     * @return mixed
     * @author pangxie
     * @date 2018/4/11
     */
    public function getLastBlock(){
        return end($this->chain);
    }

    public function getLastBlockHash(){
        $data = $this->getLastBlock();
        $obj = new Block($data);
        return $obj->blockHash();
    }

    /**
     * 创世区块
     *
     * @author pangxie
     * @date 2018/4/11
     */
    public function init(){
        $data = [
            'index' => 0,
            'timestamp' => time(),
            'transcations' => ['this is first'],
            'proof' => Proof::getProof(),
            'previousHash' => '',
        ];

        $obj = new Block($data);
        $hash =  $obj->blockHash();
        $data['hash'] = $hash;
        $this->add($data);
    }

    public function save(){
        file_put_contents($this->fileName, json_encode($this->chain));
    }

    public function read(){
        return json_decode(file_get_contents($this->fileName), true);
    }
}


