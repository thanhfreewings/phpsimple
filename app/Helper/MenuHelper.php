<?php namespace App\Helper;

class MenuHelper{
	public static $menu = 'home';
	public static function get($menu){
		if(self::$menu == $menu) return 'active';
		return '';
	}
	public static function set($menu){
		self::$menu = $menu;
	}		
}