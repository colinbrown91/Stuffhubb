<!-- I dont think I need this. part of @makzumi calendar -->

<?php

namespace Makzumi\Calendar\Facades;

use Illuminate\Support\Facades\Facade;

class Calendar extends Facade {
	protected static function getFacadeAccessor() {
		return 'calendar';
	}

}
