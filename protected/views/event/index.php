<h1>Мероприятия</h1>
<pre>
<?
	foreach ($events as $event)
	{
		$code = TransliteUrl::encodeCyrillic($event->code);
		print "<a href=/event/$code>$event->name</a><br />$event->description<br />$event->place<br />$event->address<br />$event->start_date $event->end_date<hr>";
	}
?>
</pre>