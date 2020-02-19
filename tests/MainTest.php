<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class MainTest extends TestCase
{
	public function testBasicMatDetection(): void
    {
            $this->assertEquals(array(0=>array(), 1=>array(), 2=>array(), 3=>array()), OffensiveAnalytics::getOffensive("тут мата нет!"));
    }
   public function testDifficultMatDetection(): void
    {
            $this->assertEquals(array(0=>array(), 1=>array(), 2=>array(), 3=>array()), OffensiveAnalytics::getOffensive("Не психуй! Застрахуй! Не оскорблять! Углублять!"));
    }
   public function testMatClassification(): void
    {
            $this->assertEquals(array(0=>array(), 1=>array(), 2=>array("блядь", "блядь"), 3=>array("ебет")), OffensiveAnalytics::getOffensive("\"Станция Речной вокзал -Поезд дальше не идет\". А меня блядь не ебет! Я сюда блядь и желал!"));
    }
   public function testMatAntiBypass(): void
    {
    				$arr = OffensiveAnalytics::getOffensive("\"Станция Речной вокзал -Поезд дальше не идет\". А меня блядь не ебет! Я сюда блядь и желал!");
            $this->assertEquals(3, count($arr[2]) + count($arr[3]));
    }
   public function testExceptions(): void
   {	
 				  	$this->assertEquals(array(0=>array(), 1=>array(), 2=>array(), 3=>array()), OffensiveAnalytics::getOffensive("Ведро - не мобила, hyundai - не машина!"));			
   }
}