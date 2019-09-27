<?php
/*
* This is the file content program for check field for compliance pattern
*/
class Check {
	private static $pattern_email = '/^.+@[a-zA-Z]{1,10}\.[a-zA-Z]{1,5}$/';
	private static $pattern_phone = '/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/';

	public  function goCheck( $value ) {
		if( ( preg_match( self::$pattern_email, $value ) ) xor ( preg_match( self::$pattern_phone, $value ) ) )
			return true;
		else
			return false;
	}
}
