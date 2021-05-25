<?php
    # Replace img, audio, and video elements with amp custom elements
    $content = str_ireplace(
        ['<img','<video','/video>','<audio','/audio>'],
        ['<amp-img','<amp-video','/amp-video>','<amp-audio','/amp-audio>'],
        $content
    );

    # Add closing tags to amp-img custom element
    $content = preg_replace('/<amp-img(.*?)\/?>/', '<amp-img$1></amp-img>',$content);

    # Whitelist of HTML tags allowed by AMP
    $content = strip_tags($content,'<h1><h2><h3><h4><h5><h6><a><p><ul><ol><li><blockquote><q><cite><ins><del><strong><em><code><pre><svg><table><thead><tbody><tfoot><th><tr><td><dl><dt><dd><article><section><header><footer><aside><figure><time><abbr><div><span><hr><small><br><amp-img><amp-audio><amp-video><amp-ad><amp-anim><amp-carousel><amp-fit-rext><amp-image-lightbox><amp-instagram><amp-lightbox><amp-twitter><amp-youtube>');
?>
