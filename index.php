<?php
spl_autoload_register('loader');
function loader($className){
    require_once $className . '.php';
}

//挖矿
(new Proof())->addBlock();

$chain = new Chain();

echo '<pre>';
print_r($chain->getChain());
echo '</pre>';
