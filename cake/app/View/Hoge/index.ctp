<?php
$url = "http://b.hatena.ne.jp/rsksound/favorite.rss";
		$contents = simplexml_load_file($url);
		//debug($contents);
		echo $contents->channel->title;
		echo "<br />";
		echo $contents->item[0]->title;
	?>