<?php
require base_path('views/partials/header.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<ul class="list-disc">
	    <?php foreach ($notes as $note) :?>
	    	<li>
	    		<a href="/note?id=<?= $note['id'] ?>" class = "text-blue-700 hover:underline">
					<?= (strlen($note['body']) > $limit) ? htmlspecialchars(substr($note['body'], 0, $limit)) . '...' : htmlspecialchars($note['body']) ?>
				</a>
	   		</li>
	    <?php endforeach;?>
		</ul>

		<p class="mt-6">
			<a href="note/create" class="mt-5 text-blue-700 font-medium rounded-md px-2 py-1 text-l bg-gray-400 transition-all duration-400 hover:duration-500 hover:bg-gray-500 hover:text-white">Create a new Note</a>
		</p>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>