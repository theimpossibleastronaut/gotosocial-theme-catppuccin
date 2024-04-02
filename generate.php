<?php

$template = @file_get_contents("catppuccin-theme-variant.css");
if ($template === false) {
	die("Failed to read template file");
}

$themes = [
	"latte",
	"frappe",
	"macchiato",
	"mocha",
];

$accents = [
	"rosewater",
	"flamingo",
	"pink",
	"mauve",
	"red",
	"maroon",
	"peach",
	"yellow",
	"green",
	"teal",
	"sky",
	"sapphire",
	"blue",
	"lavender",
];

foreach ($themes as $theme) {
	foreach ($accents as $accent) {
		$css = str_replace("{{THEME}}", $theme, $template);
		$css = str_replace("{{ACCENT}}", $accent, $css);
		$filename = "dist/catppuccin-$theme-$accent.css";
		file_put_contents($filename, $css);
		echo "Generated $filename\n";
	}
}