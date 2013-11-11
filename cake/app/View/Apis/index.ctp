<?php
	$url = 'dj0zaiZpPUhVbjh2bFpBUzBoeiZzPWNvbnN1bWVyc2VjcmV0Jng9MmE-';
	//UPLから情報を取ってくる
	$suga = simplexml_load_file('http://b.hatena.ne.jp/sugawarax/rss');
	//var_dump($suga);
	echo $this->html->tag('h2',$this->html->link($suga->channel->title, $suga->channel->link));
	foreach($suga->item as $wara){
		echo $this->html->tag('h3',$wara->title);
		echo $this->html->tag('h4',$this->html->link($wara->link,$wara->link));
		echo $this->html->tag('h4',$wara->description);
		$content = $wara->title;
		$abc = simplexml_load_file('http://jlp.yahooapis.jp/KeyphraseService/V1/extract?appid='.$url.'&sentence='.urlencode($content).'');
		//var_dump($abc);
		echo $this->html->tag('h4',"キーワード:".$abc->Result->Keyphrase);
	}
