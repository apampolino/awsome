<?php

namespace Awsome\Core;

use Awsome\Core\AwsomeRequest as Request;
use Awsome\Core\AwsomeResponse as Response;

Class Oauth {

	public function __construct() {

		Response::json_response(500);
	}

	private function loadRoutes() {

	}

	private function request() {

		return Request::get_request_headers();
	}
}