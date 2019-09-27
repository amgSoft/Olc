<?php
/**
 * This class contains static property and methods to work with language
 */
class Lang{
	private static $lang = array( "emptyName"=>"Pole Název je prázdné",
	                              "emptyLastName"=>"Pole příjmení je prázdné",
	                              "emptyDate"=>"Zvolte datum narození",
	                              "emptyStatus"=>"Vaš rodinný stav",
	                              "emptySitizen"=>"Vyberte si své občanství",
	                              "emptyEducation"=>"Vyberte si své vzdělání",
	                              "emptyPhone"=>"Pole Tel je prázdné",
	                              "emptyEmail"=>"Pole e-mailu je prázdné",
	                              "incorrectPhone"=>"Nesprávné tel. Číslo",
	                              "incorrectEmail"=>"Nesprávná e-mail adresa",
	                              "iKnow"=>"Vyberte něco, co víte",
	                              "tooBig"=>"Soubor je příliš velký",
	                              "noAllow"=>"Typ souboru není povolen",
	                              "404"=>"ERROR 404 <br /> Page not fount"

								  );
	private static $viewArr = array('quiz');
	private static $status = array('','Ženatý','Svobodní');
	private static $citizenship = array('','Ukrajinské','České','Rumunské','Amerycké');
	private static $education = array('','Vysokoškolské','Středoškolské s maturitou','Výuční list','Základní');


	public static function getLang( $idName ){
		return self::$lang[ $idName ];
	}
	public static function getView(){
		return self::$viewArr;
	}
	public static function getStatus(){
		return self::$status;
	}
	public static function getCitizen(){
		return self::$citizenship;
	}
	public static function getEducation(){
		return self::$education;
	}

}