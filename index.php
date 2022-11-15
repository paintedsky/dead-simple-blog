<?php
include('Parsedown.php');

$base_url = '/blog/';					// URL of the homepage. Can be absolute or relative.
$blog_title = 'Painted Sky Blog';
$contact_email = 'blog@paintedsky.ca';
$file_ext = 'md';						// The type of files used for your content. Usually 'md' or 'txt'
$appearance = 'light';					// light or dark mode
$content = '';
$is_post = !empty($_GET['post']);		// Whether we're viewing the main list or a single post

function sortPosts($a, $b) {
	$a_value = $a->getFilename();
	$b_value = $b->getFilename();
	return strcmp($b_value, $a_value); // Reversed to get descending
}

if ( $is_post ) {
	// Single post page
	$post_name = filter_var($_GET['post'], FILTER_SANITIZE_NUMBER_INT);
	$file_path = __DIR__.'/content/'.$post_name.'.'.$file_ext;
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
			<a href="'.$base_url.'">home page</a> to select a different post.</p>';
	}
} else {
	// Blog main page - list all posts
	$files = new DirectoryIterator(__DIR__.'/content/');
	$files_array = [];
	foreach ($files as $file) {
		if ( $file->isFile() && $file->getExtension() == $file_ext ) {
			array_push($files_array, $file->getFileInfo());
		}
	}
	usort($files_array, 'sortPosts'); // See sortPosts() function above
	foreach ($files_array as $file) {
		$filename_no_ext = $file->getBasename('.'.$file_ext);
		$file_pointer = $file->openFile();
		$post_title = trim($file_pointer->fgets(),'#');
		$content .= '<h2 class="list-title"><a href="'.$base_url.'?post='.$filename_no_ext.'">'.$filename_no_ext.' - '.$post_title.'</a></h2>';
	}
}

// Appending file hashes to the <link> hrefs allows us to cache the files indefinitely, 
// but immediately serve a new version once the file changes.
$style_hash = hash('md5', file_get_contents(__DIR__.'/src/css/style-'.$appearance.'.css'));
$fonts_hash = hash('md5', file_get_contents(__DIR__.'/src/css/fonts.css'));
$icon_hash  = hash('md5', file_get_contents(__DIR__.'/img/favicon.png'));

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if ( !empty($_GET['post']) ) { echo $post_title.' - '; } ?><?php echo $blog_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="src/css/style-<?php echo $appearance; ?>.css?v=<?php echo $style_hash; ?>" />
	<link rel="stylesheet" href="src/css/fonts.css?v=<?php echo $fonts_hash; ?>" />
	<link rel="icon" type="image/png" href="img/favicon.png?v=<?php echo $icon_hash; ?>" />
</head>
<body>
	<header>
		<h1 class="blog-title"><a href="<?php echo $base_url; ?>"><?php echo $blog_title; ?></a></h1>
	</header>
	<?php 
	$tag = $is_post ? 'article' : 'main';
	echo '<'.$tag.'>'.$content.'</'.$tag.'>';
	?>
	<footer>
		This blog does not offer comment functionality. If you'd like to discuss any of the topics 
		written about here, you can <a href="mailto:<?php echo $contact_email; ?>">send an email</a>.
	</footer>
</body>
</html>