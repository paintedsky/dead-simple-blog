# Dead Simple Blog

Version 1.1 (2022-11-15)

- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [Other Versions](#other-versions)
- [Attributions](#attributions)

I've wanted for a long time to create a simple way of blogging that eschews basically all bells and whistles. Many "flat file" Content Management Systems exist already, as well as "static site generators", but none of these that I looked at were simple enough for my liking.

I don't want to have to install Ruby, or Python, or Composer, or whatever else on a server to run a blog. On the other hand, installing WordPress or one of the other popular PHP-based CMSes for this use case is like hammering in a nail with a sledgehammer.

Many people dislike PHP, and while it has its warts, I like it. I like using (vanilla) PHP simply because it is nearly ubiquitous. Having to install or configure it is often unnecessary because it is usually *already* installed, configured, and running.

I wanted to use plain text files, but some formatting is nice -- Markdown was the obvious solution for this, since it offers quite a lot of options in terms of text formatting, without sacrificing the readability of the plain text itself. I was not keen on adding dependencies but I found [Parsedown](http://parsedown.org) which offers Markdown parsing by including a single PHP file. I can deal with that.

That's really all there is to it -- dead simple PHP-based templating, and Markdown-formatted plain text content.

I know I'm probably forgetting about a million edge cases, but I want to keep it simple. So, we'll roll with this for now and add features as they become necessary.

## Installation

Download the files and upload them to a webserver somewhere. That's it!

## Usage

1. Duplicate `config-default.php` as `config-custom.php`, and change the config variables to your liking.
2. Create text files with a NUMERIC file name, I use YYYY-MM-DD date-based names (e.g. 2018-10-30.md).
3. Format text files with Markdown, or not. Whatever. ;)
4. If you need to link to image/video/audio/etc. files, you can upload them to the media folder.
4. Upload text files to the `content` directory.
5. You're done!!

## Changelog

### Version 1.1

- Updated Parsedown to 1.7.4
- Config has now been moved to `config-default.php`, added support for `config-custom.php`
- Added dark mode! Adjust the `APPEARANCE` constant to enable
- Change default file type to .md files instead of .txt. Adjust `FILE_EXT` constant if needed
- Reorganize folder structure (CSS and fonts are now in `/src`)
- Small text update to `/content/drafts/AboutDrafts.md`
- Defined `$content` in global scope to avoid PHP errors in some configurations
- Added default favicon at `/img/favicon.png`
- Including `fonts.css` in `<head>` instead of using @import for better caching behaviour
- Added file hash query strings to `<link>` tags in `<head>` for better caching behaviour
- `index.php` now uses `<main>` for content on list view and `<article>` on single post view
- List view now explicitly sorts posts using `sortPosts()` function - default is sorting by filename, descending

## Other Versions

User @shoaiyb has a fork going with additional features that I didn't think were "absolutely necessary" but if you want some extra bells and whistles, I recommend checking out [his fork](https://github.com/shoaiyb/dead-simple-blog).

## Attributions

- [Parsedown](https://github.com/erusev/parsedown) by Emanuil Rusev
- [Blog Icon](https://thenounproject.com/icon/blog-3557350/) by Gregor Cresnar from [Noun Project](https://thenounproject.com)
