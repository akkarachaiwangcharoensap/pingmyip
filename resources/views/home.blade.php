<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
	<meta name="description" content="Pinging your ip let you verify if the given port is available for the traffic to go in. This can be helpful when you want to verify if your web server is responding properly by pinging your http web server ip address with port 80">
	<meta name="keywords" content="free pinging service, can you see me, ping my ip, is my port open, is port working, ping, TCP, what is my ip, ping your ip">
	<meta name="author" content="Akkarachai Wangcharoensap (Aki)">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Ping My Ip</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
	<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124580171-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-124580171-1');
	</script>

	<!-- Google adsense -->
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-1101628235873846",
	    enable_page_level_ads: true
	  });
	</script>

</head>
<body>
	<div class="container-fluid" id="home-container">
		<div class="row">

			<div class="col-lg-7 col-md-7 col-sm-7">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="about">
							<h1>PingMyIp.Org</h1>
							<hr>
							<p>
								PingMyIp.org is a free service that lets you test your connectivity of your ports. For an example, if you are an advance user, and wanting to open a web server. You will most likely need to open port 80 or HTTP. The process of opening a port is called portforwarding. PingMyIp.org helps you test your connectivity by trying to access the given ip and its port. If it succeeds, it means your web server is visible to outside networks. If not, it means your port is closed. Your web server is not visible to any outside networks.
							</p>
						</div><!-- .about -->	
					</div>
				</div>
			
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form action="{{ route ('ping') }}" method="POST" class="form-group action-form">
							<div class="ip">
								<label>Ip Address</label>
								<input type="text" name="ip" class="form-control" value="{{ $_SERVER['REMOTE_ADDR'] }}">
							</div>
							<div class="port">
								<label>Port</label>
								<input type="text" name="port" class="form-control">
							</div>
							<input type="submit" value="Ping" class="btn btn-primary float-right ping-button"/>

							@if (Session::has ('error'))
								<p class="status-text text-danger">
									{{ Session::get ('error')}}
								</p>
							@endif

							@if (Session::has ('status'))
								@php
									$status = Session::get ('status');
								@endphp
								@if ($status ['code'] != 0 || empty($status ['message']) == false)
									<p class="status-text text-danger">
										Status: Error,
										Host: {{ $status['host'] }}, 
										Port: {{ $status['port'] }},
										Code: {{ $status['code'] }}, 
										Message: {{ $status['message'] }}
									</p>

								@else
									<p class="status-text text-success">
										Status: Success, 
										Host: {{ $status['host'] }},
										Port: {{ $status['port'] }},
										Code: {{ $status['code'] }},
										Message: Port is open
									</p>
								@endif
							@endif

							{{ csrf_field() }}
						</form><!-- .action-form -->	
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="about">
							<h1>Why Ping Your IP?</h1>
							<hr>
							<p>
								Pinging your ip let you verify if the given port is available for the traffic to go in. This can be helpful when you want to verify if your web server is responding properly by pinging your http web server ip address with port 80. Please note that, this "ping" service does not use ICMP protocol.
							</p>
							<h1>Portforwarding</h1>
							<hr>
							<p>
								Portforwarding let you open the port connection to outside network. Most of the time, you would try to limit the ports that you want the traffic to go in. This is because it is security risky. By openning multiple ports. You let annoymous / strangers to penetrate your network as well as possibilities for hackings or malwares.
							</p>
						</div><!-- .about -->
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="term-of-services">
								<h1>Term of Services</h1>
								<hr>

								<p>
									This service is free to use. Please do not use this service in any suspicious way. Do not use this service to spam, distrupt, and do any ill to any individual. Lastly, please do not attempt to hack/distrupt this service for any purposes. This service is for testing purposes. If you want to use this service other than testing purposes. Please consider using other service.
								</p>

						</div><!-- .term-of-services -->
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="privacy-policy">
							<h1>Privacy Policy</h1>
							<hr>

							<b>
								What information do I collect?
							</b>
							<p>
								I do collect your browser data such as your ip address to determine the usage and traffic of the site.
							</p>

							<b>
								What information is being used for?
							</b>
							<p>
								When you visit this site, I collect your data to determine the flow of traffic of this service. Specficially, I use Google Analytic to determine the traffic and user engagement of this service. If you have any concern with Google privacy policy. Please refer to its <a href="https://policies.google.com/privacy">privacy policy</a> for more information.
							</p>

							<b>Your consent</b>
							<p>
								By using this service, you are consent to my privacy policy and term of services.
							</p>

							<b>Contact</b>
							<p>
								If you have any question or concern regarding this privacy policy. Feel free to contact <a href="mailto:akkarachaiwangcharoensap@gmail.com">me</a>
							</p>

						</div><!-- .privacy-policy -->
					</div>
				</div>
			</div><!-- .col-lg-7 .col-md-7 .col-sm-7 -->

			<div class="col-lg-5 col-md-5 col-sm-5">
				<div class="info">
					<h1>Common TCP Ports</h1>
					<table class="table">
						<thead>
							<tr>
								<th>Port #</th>
								<th>Port Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20 / 21</td>
								<td>FTP (File Transfer Protocol)</td>
							</tr>
							<tr>
								<td>22</td>
								<td>SSH (Secure Shell)</td>
							</tr>
							<tr>
								<td>23</td>
								<td>Telnet</td>
							</tr>
							<tr>
								<td>25</td>
								<td>SMTP (Simple Mail Transfer Protocol)</td>
							</tr>
							<tr>
								<td>53</td>
								<td>DNS (Dynamic Name System)</td>
							</tr>
							<tr>
								<td>80</td>
								<td>HTTP (Hypertext Transfer Protocol)</td>
							</tr>
							<tr>
								<td>110</td>
								<td>POP (Post Office Protocol)</td>
							</tr>
							<tr>
								<td>143</td>
								<td>IMAP (Internet Message Access Protocol)</td>
							</tr>
							<tr>
								<td>443</td>
								<td>HTTPS (Hypertext Transfer Protocol Secure)</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .info -->
			</div><!-- .col-lg-5 col-md-5 col-sm-5 -->
		</div><!-- .row -->
	</div>
</body>
</html>