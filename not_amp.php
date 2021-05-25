<!DOCTYPE html>
<html>
<head>
	<title><?php if ( !empty($_GET['post']) ) { echo $post_title.' - '; } ?><?php echo $blog_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css" />
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
		written about here, you can <a href="mailto:<?php echo $contact_email; ?>">send an email</a>.
	</footer>
</body>
</html>
