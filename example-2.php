<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" xml:lang="es-ES">
<head>
	<title>jQuery Tabi plugin example page</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	
	<script type="text/javascript" src="js/jquery-1.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.tabi.js"></script>
	<script type="text/javascript">
		jQuery(function() {
			jQuery('ul.my-tab-system').tabi();
		});
	</script>
	
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
	
	<!--[if IE]>
		<link rel="stylesheet" href="css/stylesIE.css" type="text/css" media="screen" />
	<![endif]-->
	
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/stylesIE6.css" type="text/css" media="screen" />
	<![endif]-->
	
	<!--[if IE 7]>
		<link rel="stylesheet" href="css/stylesIE7.css" type="text/css" media="screen" />
	<![endif]-->
	
	<!--[if IE 8]>
		<link rel="stylesheet" href="css/stylesIE8.css" type="text/css" media="screen" />
	<![endif]-->
</head>
<body>
<div id="wrapper">
	<div id="header">
		<a href="index.html" title="Tabi, a jQuery plugin for tabbed interfaces"><img src="images/layout/logo.png" alt="Tabi, a jQuery plugin for tabbed interfaces" /></a>
		<h1>Example 02 - Setting default tab</h1>
	</div>
	
	<hr />
	
	<div id="main">
		<div class="example">
			<?php
				$tab = $_GET['tab']==null?4:$_GET['tab'];
			?>
			<ul class="my-tab-system group">
				<li class="tabi-0 <?= $tab==1?'current-tab':'' ?>"><a href="example-2.php?tab=1#group0-1">Lorem</a></li>
				<li class="tabi-0 <?= $tab==2?'current-tab':'' ?>"><a href="example-2.php?tab=2#group0-2">Ipsum</a></li>
				<li class="tabi-0 <?= $tab==3?'current-tab':'' ?>"><a href="example-2.php?tab=3#group0-3">Dolor</a></li>
				<li class="tabi-0 <?= $tab==4?'current-tab':'' ?>"><a href="example-2.php?tab=4#group0-4">About this example</a></li>
				<li class="tabi-1 <?= $tab==5?'current-tab':'' ?>"><a href="example-2.php?tab=5#group1-1">Consectetur</a></li>
				<li class="tabi-1 <?= $tab==6?'current-tab':'' ?>"><a href="example-2.php?tab=6#group1-2">Adipiscing</a></li>
				<li class="tabi-2 <?= $tab==7?'current-tab':'' ?>"><a href="example-2.php?tab=7#group2-1">Sit Amet</a></li>
				<li class="tabi-2 <?= $tab==8?'current-tab':'' ?>"><a href="example-2.php?tab=8#group2-2">Eiusmod</a></li>
				<li class="tabi-2 <?= $tab==9?'current-tab':'' ?>"><a href="example-2.php?tab=9#group2-3">Tempor</a></li>
			</ul>
			<div class="content">
				<div id="group0-1">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group0-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group0-3">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group0-4">
					<h2>How can I set the default tab?</h2>
					
					<p>By default, Tabi shows the first tab of the last row. If you want to change that behaviour (like I have done in these example) you just need to add <code>class="current-tab"</code> to the <code>LI</code> element that you want to be active when the page loads. Take a look at the code:</p>
					
<pre><code>&lt;ul class="my-tab-system group"&gt;
	&lt;li class=&quot;tabi-0&quot;&gt;&lt;a href=&quot;#group0-1&quot;&gt;Lorem&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-0&quot;&gt;&lt;a href=&quot;#group0-2&quot;&gt;Ipsum&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-0&quot;&gt;&lt;a href=&quot;#group0-3&quot;&gt;Dolor&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-0 <strong>current-tab</strong>&quot;&gt;&lt;a href=&quot;#group0-4&quot;&gt;About this example&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-1&quot;&gt;&lt;a href=&quot;#group1-1&quot;&gt;Consectetur&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-1&quot;&gt;&lt;a href=&quot;#group1-2&quot;&gt;Adipiscing&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-2&quot;&gt;&lt;a href=&quot;#group2-1&quot;&gt;Sit Amet&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-2&quot;&gt;&lt;a href=&quot;#group2-2&quot;&gt;Code&lt;/a&gt;&lt;/li&gt;
	&lt;li class=&quot;tabi-2&quot;&gt;&lt;a href=&quot;#group2-3&quot;&gt;Styles&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;</code></pre>

					<p>This is a powerful tool, because it lets you define wich tab is visible. Imagine, for example, that you want your server code define the visible tab, how can you do that? With this configuration system you can.</p>
				</div>
				<div id="group1-1">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group1-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group2-1">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group2-2">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div id="group2-3">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>
	</div>
	
	<div id="footer">
		<p>Yayyy :) Hope you like it! If not, contact me at: <strong>juan.g.hurtado at gmail [dot] com</strong></p>
	</div>
</div>
</body>
</html>
