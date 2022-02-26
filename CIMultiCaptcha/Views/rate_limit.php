<!DOCTYPE html>
<html lang="<?=$getLocale;?>" dir="<?php if($getLocale == 'fa' | $getLocale == 'ar'){
	echo 'rtl';
};?>">
<head>
	<meta charset="UTF-8">
	<title><?=$browser_title;?></title>
	<meta name="description" content="<?=$browser_description;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- STYLES -->
	<style {csp-style-nonce}>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}
		*:focus {
			background-color: rgba(221, 72, 20, .2);
			outline: none;
		}
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: rgba(247, 248, 249, 1);
			padding: .4rem 0 0;
		}
		.ERRR{
			background-color: rgba(221, 72, 20, .8);
			background-color 300ms ease, color 300ms ease;
		}

		header .heroe {
			margin: 0 auto;
			max-width: 1100px;
			padding: 1rem 1.75rem 1.75rem 1.75rem;
		}
		header .heroe h1 {
			font-size: 2.5rem;
			font-weight: 500;
		}
		header .heroe h2 {
			font-size: 1.5rem;
			font-weight: 300;
		}
		section {
			margin: 0 auto;
			max-width: 1100px;
			padding: 2.5rem 1.75rem 3.5rem 1.75rem;
		}
		section h1 {
			margin-bottom: 2.5rem;
		}
		section h2 {
			font-size: 120%;
			line-height: 2.5rem;
			padding-top: 1.5rem;
		}
		section pre {
			background-color: rgba(247, 248, 249, 1);
			border: 1px solid rgba(242, 242, 242, 1);
			display: block;
			font-size: .9rem;
			margin: 2rem 0;
			padding: 1rem 1.5rem;
			white-space: pre-wrap;
			word-break: break-all;
		}
		section code {
			display: block;
		}
		section a {
			color: rgba(221, 72, 20, 1);
		}
		section svg {
			margin-bottom: -5px;
			margin-right: 5px;
			width: 25px;
		}
		.further {
			bottom: 0px;
			background-color: rgba(247, 248, 249, 1);
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			border-top: 1px solid rgba(242, 242, 242, 1);

		}
		.further h2:first-of-type {
			padding-top: 0;
			
		}
	</style>
</head>

<body>
<!-- HEADER:HEROE SECTION -->
<header>
	<div class="heroe">
		<h1><?=$header_title;?></h1>
		<h2><?php echo sprintf($header_description,$number_requests,$refill_period);?></h2>
	</div>
</header>
<!-- CONTENT -->
<section>
	<pre><code><?=$form_description;?></code></pre>
	<?php echo CIMC_ERROR();?>
	<br>
		<?= form_open('/ratelimit') ?>
			<?php
                echo CIMC_JS($captcha_name);
                echo CIMC_HTML([
                                'captcha_name'=>$captcha_name
                             ]);   
			?>
			<div><input type="submit" name="submit" value="<?=$submit;?>" /></div>

		</form>
</section>

<div class="further">
	<section>
		<h1><?=$title_rate_limit;?></h1>
		<h2>
			<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><rect x='32' y='96' width='64' height='368' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='224' x2='240' y2='224' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><line x1='112' y1='400' x2='240' y2='400' style='fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/><rect x='112' y='160' width='128' height='304' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><rect x='256' y='48' width='96' height='416' rx='16' ry='16' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/><path d='M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z' style='fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px'/></svg>
			<?=$learn_rate_limit;?>
		</h2>
		<p><?=$explain_rate_limit;?></p>
	</section>
</div>

</body>
</html>