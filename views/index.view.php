<?php
require ('partials/header.php');
require ('partials/nav.php');
require ('partials/banner.php');
?>

<main>
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

<p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the Home page.</p>

</div>
</main>

<?php require ('partials/footer.php') ?>