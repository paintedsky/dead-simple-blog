<?php
include('Parsedown.php');

$base_url = '/blog/'; // URL of the homepage. Can be absolute or relative.
$blog_title = 'Painted Sky Blog';
$contact_email = 'blog@paintedsky.ca';

if ( !empty($_GET['post']) ) {
	// Single post page
	$post_name = filter_var($_GET['post'], FILTER_SANITIZE_NUMBER_INT);
	$file_path = __DIR__.'/content/'.$post_name.'.txt';
	if ( file_exists($file_path) ) {
		$file = fopen($file_path, 'r');
		$post_title = trim(fgets($file),'#');
		fclose($file);
		// Process the Markdown
		$parsedown = new Parsedown();
		$content = $parsedown->text(file_get_contents($file_path));
	} else {
		$content = '
			<h2>Not Found</h2>
			<p>Sorry, couldn\'t find a post with that name. Please try again, or go to the 
			<a href="<?php echo $base_url; ?>">home page</a> to select a different post.</p>';
	}
} else {
	// Blog main page - list all posts
	foreach (new DirectoryIterator(__DIR__.'/content/') as $file) {
		if ( $file->getType() == 'file' && strpos($file->getFilename(),'.txt') ) {
			$filename_no_ext = $file->getBasename('.txt');
			$file_path = __DIR__.'/content/'.$file->getFilename();
			$file = fopen($file_path, 'r');
			$post_title = trim(fgets($file),'#');
			fclose($file);
			$content .= '<h2 class="list-title"><a href="'.$base_url.'?post='.$filename_no_ext.'">'.$filename_no_ext.' - '.$post_title.'</a></h2>';
		}
	}
}
?>
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