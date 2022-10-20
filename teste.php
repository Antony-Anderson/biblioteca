<pre>
	<?php
	require_once "app/Models/Livro.php";
	$livro = new Livro();
	print_r($livro->find(19));
	?>
</pre>
