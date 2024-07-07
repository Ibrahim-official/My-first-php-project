<?php
require base_path('views/partials/header.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
	<div class="mx-auto py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
		<a href="/notes" class="text-blue-700 hover:underline">Go Back to Notes...</a>
		</p>
		<p><?= htmlspecialchars($note['body']) ?></p>

		<footer class="mt-6">
			<a href = "/note/edit?id=<?= $note['id'] ?>" class="inline-flex justify-center mt-5 rounded-md border border-transparent px-3 py-1 text-xl text-white bg-gray-500 transition-all duration-400 hover:duration-500 hover:bg-gray-600 hover:text-white self-end">Edit</a>

			<form class="mt-6" method="POST" action="/destroy">
				<input type="hidden" name="_method" value="DELETE"> 
				<input type="hidden" name="id" value="<?= $note['id'] ?>">
					
				<button type="submit" class="inline-flex justify-center mt-5 rounded-md border border-transparent px-3 py-1 text-xl text-white bg-gray-500 transition-all duration-400 hover:duration-500 hover:bg-red-600 hover:text-white self-end">
					Delete
				</button> 
			</form>

		</footer>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>