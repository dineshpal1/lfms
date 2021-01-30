<?php
namespace App\Customfacade;
use Illuminate\Support\Facades\Facade;
class CustomfacadeFacade extends Facade
{
	protected  static function getFacadeAccessor()
	{
		return "customfacade";
	}
}





