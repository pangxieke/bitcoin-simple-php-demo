<?php
class Proof{

    /**
     * 挖矿工作量 简易方法
     *
     * @return int
     * @author pangxie
     * @date 2018/4/11
     */
    public static function getProof(){
        return random_int(100, 999);
    }

    /**
     * 挖矿
     *
     * @author pangxie
     * @date 2018/4/11
     */
    public function addBlock(){
        $chain = new Chain();
        $lastBlock = $chain->getLastBlock();

        $lastBlockTime = $lastBlock['timestamp'];
        $new = time();

        if($new >= $lastBlockTime + 10){
            $data = [
                'index' => $lastBlock['index'] + 1,
                'timestamp' => $new,
                'transcations' => (new Transaction())->getTrans(),
                'proof' => Proof::getProof(),
                'previousHash' => $chain->getLastBlockHash(),
            ];
            $obj = new Block($data);
            $hash =  $obj->blockHash();
            $data['hash'] = $hash;

            $chain->add($data);
        }
    }
}