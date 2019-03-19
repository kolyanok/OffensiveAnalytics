<?php

declare(strict_types=1);


class OffensiveAnalytics {
	const P = 'пПnPp';
	const I = 'иИiI1u';
	const E = 'еЕeE';
	const D = 'дДdD';
	const Z = 'зЗ3zZ3';
	const M = 'мМmM';
	const U = 'уУyYuU';
	const O = 'оОoO0';
	const L = 'лЛlL';
	const S = 'сСcCsS';
	const A = 'аАaA@';
	const N = 'нНhH';
	const G = 'гГgG';
	const CH = 'чЧ4';
	const K = 'кКkK';
	const C = 'цЦcC';
	const R = 'рРpPrR';
	const H = 'хХxXhH';
	const YI = 'йЙy';
	const YA = 'яЯ';
	const YO = 'ёЁ';
	const YU = 'юЮ';
	const B = 'бБ6bB';
	const T = 'тТtT';
	const HS = 'ъЪ';
	const SS = 'ьЬ';
	const Y = 'ыЫ';
	const SH = "шшЩЩ";
	const V = "вВvVBb";
	const EXCEPTIONS = [
		'команд', 'рубл', 'премь', 'оскорб', 'краснояр', 'бояр', 'ноябр', 'карьер', 'мандат',
		'употр', 'плох', 'интер', 'веер', 'фаер', 'феер', 'hyundai', 'тату', 'браконь',
		'roup', 'сараф', 'держ', 'слаб', 'ридер', 'истреб', 'потреблять',  'коридор', 'sound', 'дерг',
		'подоб', 'коррид', 'дубл', 'курьер', 'экст', 'try', 'enter', 'oun', 'aube', 'ibarg', '16',
		'kres', 'глуб', 'ebay', 'eeb', 'shuy', 'ансам', 'cayenne', 'ain', 'oin', 'тряс', 'ubu', 'uen',
		'uip', 'oup', 'кораб', 'боеп', 'деепр', 'хульс', 'een', 'ee6', 'ein', 'сугуб', 'карб', 'гроб',
		'лить', 'рсук', 'влюб', 'хули', 'хуле', 'ляп', 'граб', 'ибог', 'вело', 'ебэ', 'перв', 'eep', 'ying', 'бляшка',
		'laun', 'чаепитие', 'oub', 'мандарин', 'гондольер', 'гоша', 'фраг', 'гав', 'говор', 'гавор',
		'помога', 'памага', 'гов', 'огонь', 'o1b2', 'ведро', 'догон', 
	];

	public static function getOffensive(string $text, string $replace = "*") : array{
        
		     	preg_match_all('/
		\b\d*(
			\w*[' . self::P . '][' . self::I . self::E . '][' . self::Z . self::S . '][' . self::D . ']\w* # пизда
		|
		\w*[' . self::P . '][' . self::Z . '][' . self::D . '][' . self::C . ']\w* # пздц
		|w*[3][\.,][1][4][' . self::Z . '][' . self::D . ']\w* #3.14здец
		)\b
		/xu', $text, $mat[0]);
		   preg_match_all('/
		    \b\d*(
		   (?:[^' . self::I . self::U . '\s]+|' . self::N . self::I . ')?(?<!стра)[' . self::H . '][' . self::U . '][' . self::YI . self::E . self::YA . self::YO . self::I . self::L . self::YU . '](?!иг)\w* # хуй; не пускает "подстрахуй", "хулиган"
		|
		  \w*[' . self::N . '][' . self::I . '][' . self::H . '][' . self::U . '][' . self::YA . ']*\w* #Нихуя
		        
		        )\b
		/xu', $text, $mat[1]);
		  preg_match_all('/
		     \b\d*(
		       \w*[' . self::B . '][' . self::L . '](?:
				[' . self::YA . ']+[' . self::D . self::T . ']?
				|
				[' . self::I . ']+[' . self::D . self::T . ']+
				|
				[' . self::I . ']+[' . self::A . ']+
			)(?!х)\w* # бля, блядь; не пускает "бляха"
		       
		       )\b
		/xu', $text, $mat[2]);
		  preg_match_all('/
		     \b\d*(
		       (?:
				\w*[' . self::YI . self::U . self::E . self::A . self::O . self::HS . self::SS . self::Y . self::YA . '][' . self::E . self::YO . self::YA . '][' . self::B . self::P . '](?!ы\b|ол)\w* # не пускает "еёбы", "наиболее", "наибольшее"...
				|
				[' . self::E . self::YO . '][' . self::B . ']\w*
				|
				[' . self::I . '][' .
					self::B . '][' . self::A . ']\w+
				|
				[' . self::YI . '][' . self::O . '][' . self::B . self::P . ']\w*
			) # ебать
		       
		       )\b
		/xu', $text, $mat[3]);                                 
      
		for($n = 0; $n < count($mat); $n++)
		{
		
		$m[$n]=$mat[$n][1];
		for($i = 0; $i < count($m[$n]); $i++){
			$word = mb_strtolower($m[$n][$i]);
			foreach(self::EXCEPTIONS as $exception){
				if(mb_strpos($word, $exception) !== false){
					unset($m[$n][$i], $word);
					break;
				}
			}
			if(isset($word)){
				$m[$n][$i] = str_replace([' ', ',', ';', '.', '!', '-', '?', "\t", "\n"], '', $m[$n][$i]);
			}
		}
		
	}
	return $m;
}
}
