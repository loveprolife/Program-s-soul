1.适配器模式

![image](https://github.com/loveprolife/IMG/blob/master/shipeiqi.gif)

<?php

interface Target {
	public function sampleMethod1 ();
	public function sampleMethod2 ();
}

class Adaptee {
	public function sampleMethod1 () {
		echo 'Adaper sampleMethod1<br/>';
	}
}

class Apapter implements Target {
	private $_adaptee = NULL;

	public function __construct (Adaptee $adaptee) {
		$this->_adaptee = $adaptee;
	}

	public function sampleMethod1 () {
		$this->_adaptee->sampleMethod1();
	}

	public function sampleMethod2 () {
		echo 'Adaper sampleMethod2<br/>';
	}
}

class Client {
	public static function main () {
		$adaptee = new Adaptee();
		
		$adapter = new Apapter($adaptee);
		$adapter->sampleMethod1();
		$adapter->sampleMethod2();
	}
}

Client::main();
?>






2.桥接模式

![image](https://github.com/loveprolife/IMG/blob/master/qiaojiemoshi.png)

<?php

abstract class AbstractRoad {
	private $_icar;
	public function setIcar($icar){}
	public function Run(){}
}

class SpeedWay extends AbstractRoad {
	public function setIcar ($icar) {
		$this->_icar = $icar;
	}

	public function Run () {
		$this->_icar->icarFunction();
		echo ':在高速公路上。';
	}
}

class Street extends AbstractRoad {
	public function setIcar ($icar) {
		$this->_icar = $icar;
	}

	public function Run () {
		$this->_icar->icarFunction();
		echo ':在路上。';
	}
}

interface ICar {
	public function icarFunction();
}

class Jeep implements ICar {
	public function icarFunction () {
		echo '吉普车跑';
	}
}

class Bus implements ICar {
	public function icarFunction () {
		echo '公交车跑';
	}
}

class client {
	public static function main () {
		$speedWay = new SpeedWay();
		$speedWay->setIcar(new Jeep());
		$speedWay->Run();
		echo '<br/>';
		$speedWay->setIcar(new Bus());
		$speedWay->Run();

		echo '<hr/>';
		$street = new Street();
		$street->setIcar(new Jeep());
		$street->Run();
		echo '<br/>';
		$street->setIcar(new Bus());
		$street->Run();
	}
}

client::main();
?>





合成模式

装饰器模式

门面模式

代理模式

享元模式
