<?php

class BaseController extends Controller {

	private static $activeNavTitle = null;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public static function getNavigation(){

		$navigation['primary'] = array(
			new NavigationItem("Home", "/"),
			new NavigationItem("Signup", "/signup"),
			new NavigationItem("Points", "/points"),
			new NavigationItem("Judges", "/judges"),
			new NavigationItem("About", "/about"),
		);

		foreach($navigation['primary'] as $navItem){
			if(starts_with($navItem->getTitle(), self::$activeNavTitle)){
				$navItem->setActive();
			}
		}

		return $navigation;
	}

	public static function setActive($title) {
		self::$activeNavTitle = $title;
	}
}
