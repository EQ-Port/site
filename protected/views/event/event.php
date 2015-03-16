<h1><? echo $event['name']; ?></h1>
<pre>
<?
	print "$event[description]<br />$event[place]<br />$event[address]<br />$event[start_date] $event[end_date]<hr>";
?>
</pre>