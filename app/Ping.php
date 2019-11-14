<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ping extends Model
{
    /**
	 * Ping a given post by port
	 *
	 * @param string $host
	 * @param int $port
	 * @param int $timeout
	 *
	 * @return array $status
	 */
	public function pingTo ($host, $port, $timeout)
	{
		// Stop warning error to stop execution
		error_reporting (E_ALL ^ E_WARNING);

		$success = false;

		if ($file = fsockopen ($host, $port, $errorCode, $errorMessage, $timeout)) {
			$success = true;
		} else {
			$success = false;
		}

		fclose ($file);

		$status = array(
			'host' => $host,
			'port' => $port,
			'code' => $errorCode,
			'message' => $errorMessage,
			'success' => $success
		);

		return $status;
	}
}
