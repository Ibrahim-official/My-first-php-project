<?php
require base_path('views/partials/header.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-1">
			<a href="/notes" class="text-blue-700 hover:underline">Go Back to Notes...</a>
		</p>
		<form method="POST">  
			<!-- action="/notes" attribute is not added in between form and method which means tht IT WILL BE SUBMITTING TO THE CURRENT PAGE-->
			<div class="col-span-full bg-white w-4/5 p-4 rounded-md flex flex-col">
		        <div class="mt-2">
			        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">
			        	Description
			        </label>
		            <textarea 
		            	autofocus
			            id="body" 
			            name="body" 
			            class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 				ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 					focus:ring-inset focus:ring-indigo-600
        		            		<?php if(isset($errors['body'])) : ?>
		            					ring-red-500 
	        					    <?php endif; ?>
			            sm:text-sm sm:leading-6" 
			            placeholder="Write your note here..." 
			            required
			            <?php /* required */ ?>
			            <?php /* As attributes cannot be commentted out just like that in html */ ?>
			            ><?= $_POST['body'] ?? '' ?><?php /* isset($_POST['body']) ? $_POST['body'] : '' */ /* NULL COALECING operator(??) works like for isset()by checking if the value exists or is not nulls */?></textarea>

		            <?php if(isset($errors['body'])) : ?>
		            	<p class="text-red-500 mt-2 text-xs "><?= "*".$errors['body'] ?></p>
		            <?php endif; ?>

		            <?php if(isset($okMsg)) : ?>
		            	<p class="text-blue-700 mt-2 font-medium text-xs "><?= $okMsg ?></p>
		            <?php endif; ?>
		        </div>
				<button type="submit" class="mt-5 rounded-md px-3 py-1 text-xl text-white bg-blue-800 transition-all duration-400 hover:duration-500 hover:bg-gray-600 hover:text-white self-end">
					Save
				</button>
			</div>
		</form>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>