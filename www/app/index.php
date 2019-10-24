<?php
require('generate.php');

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

$loader = new Loader();
$loader->registerNamespaces(
	[
		'Ovo' => __DIR__ . '/models/',
	]
);

$loader->register();

$di = new FactoryDefault();
$di->set(
	'db',
	function(){
		return new PdoMysql([
			'host' => '172.18.0.2',
			'username' => 'ovo',
			'password' => 'ovo',
			'dbname' => 'ovo'
		]);
	}

);

$app = new Micro($di);

//menggunakan kelas Generate
$generate = new Generate();

//mengatur nilai awal balance
$balance = 200;

$phql = 'SELECT id, random_reward FROM Ovo\Reward';
$rewardss = $app->modelsManager->executeQuery($phql);

foreach ($rewardss as $reward){

	$random_reward = $reward->random_reward;
	$id = $reward->id;

	//membuat reward
	$reward = $generate->reward($random_reward);

	if($balance > $reward){
		$balance = $generate->balance($balance, $reward);
	}else if($reward > $balance){
		$reward = $balance;
		$balance = 0;
	}else{
		$balance = 0;
	}

	//membuat reward dan balance/daily limit reward
	$phql = 'UPDATE Ovo\Reward SET balance='.$balance.', get_reward='.$reward.' WHERE id='.$id;
	$app->modelsManager->executeQuery($phql);

}

$app->get(
	'/reward',
	function() use ($app){
		$phql = 'SELECT * FROM Ovo\Reward';
		$rewards = $app->modelsManager->executeQuery($phql);
		$data = [];

		foreach ($rewards as $reward){
			$data [] = [
				'name' => $reward->name,
				'random_reward' => $reward->random_reward,
				'get_reward' => $reward->get_reward,
				'balance' => $reward->balance
			];
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
);

$app->handle();
?>
