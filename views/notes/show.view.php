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

		<form class="mt-6" method="POST">
		<input type="hidden" name="_method" value="$_DELETE">
		<input type="hidden" name="id" value="<?= $note['id'] ?>">
			<button class="text-sm text-red-500">Delete</button>
		</form>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>