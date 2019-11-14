<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ping as Ping;

class HomeController extends Controller
{
    /**
     * About page
     * @return \Illuminate\Routing\Route
     */
	public function index ()
	{
        return view ('home');
	}

	/**
	 * Ping to check network connection
	 * of a given port
	 * @return \Illuminate\Routing\Route
	 */
	public function ping (Request $request)
	{
		$data = $request->all();

		$isIp = (bool) ip2long ($data['ip']);

		$isPort = is_numeric ($data['port']);
		
		$stop = (
			$isIp == false || 
			$isPort == false || 
			isset ($data['ip']) == false || 
			isset ($data['port']) == false
		);

		// Verify data
		if ($stop) {
			$request->session ()->flash ('error', 'Invalid Data Input');
			return redirect ()->route ('home');
		}
		

		$ip = $data['ip'];
		$port = $request['port'];

		$ping = new Ping;
		$status = $ping->pingTo ($ip, $port, 3);

		$request->session ()->flash ('status', $status);

		return redirect ()->route ('home');
	}
}









