<?php

require 'ampify.php';

?>
<!DOCTYPE html>
<html ⚡ lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href​="https://fonts.googleapis.com/css?family=Trirong"​>
    <link rel="preload" as="script" href="https://cdn.ampproject.org/v0.js">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- Import other AMP Extensions here -->
    <style amp-custom>
    body {
	font-family: "Tritong", serif;
	line-height: 1.5;
}
body>* {
	max-width: 40em;
	margin: 0 auto;
}
a, a:link, a:visited {
	color: #08c;
}
a:hover {
	color: #0bf;
}
a:active {
	color: #046;
}
h1.blog-title a {
	text-decoration: none;
}
h2.list-title a {
	color: #000;
	text-decoration: none;
}
hr {
	border: none;
	border-top: 1px solid #ccc;
}
footer {
	color: #888;
	padding: 1em;
	margin: 2em auto 0;
	background: #eee;
	font-style: italic;
	box-sizing: border-box;
}
    </style>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

    <link rel="canonical" href=".">
    <title><?php if ( !empty($_GET['post']) ) { echo $post_title.' - '; } ?><?php echo $blog_title; ?></title>
</head>
<body>
	<header>
		<h1 class="blog-title"><a href="<?php echo $base_url; ?>"><?php echo $blog_title; ?></a></h1>
		<hr />
	</header>
        <article>
                <?php echo $content; ?>
        </article>
	<footer>
		This blog does not offer comment functionality. If you'd like to discuss any of the topics 
		written about here, you can <a href="mailto:blog@paintedsky.ca">send an email</a>.
	</footer>
</body>
</html>
