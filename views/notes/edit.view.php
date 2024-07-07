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

		<form method="POST" action="/note" >  
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            
			<!--if action="/notes" attribute is not added in between form and method which means tht IT WILL BE SUBMITTING TO THE CURRENT PAGE-->
			<div class="col-span-full bg-white w-4/5 p-4 rounded-md flex flex-col">
		        <div class="mt-2">
			        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">
			        	Description
			        </label>
		            <textarea 
		            	autofocus
			            id="body" 
			            name="body" 
			            class="block w-full rounded-md border-0 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600							
			            sm:text-sm sm:leading-6" 
			            placeholder="Write your note here..." 
			            required
			            ><?= $_POST['body'] ?? '' ?><?php /* isset($_POST['body']) ? $_POST['body'] : '' 
						 NULL COALECING operator(??) works like for isset() by checking if the value exists or is not nulls */?><?= $note['body']?></textarea>

		            <?php if(isset($errors['body'])) : ?>
		            	<p class="text-red-500 mt-2 text-xs "><?= "*".$errors['body'] ?></p>
		            <?php endif; ?>
		        </div>
            

                <div class="bg-gra-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">

                    <a 
                    href = "/notes"
                    type="submit" class="inline-flex justify-center mt-5 rounded-md border border-transparent px-3 py-1 text-xl text-white bg-gray-500 transition-all duration-400 hover:duration-500 hover:bg-red-600 hover:text-white self-end">
                        Cancel
                    </a>

                    <button type="submit" class="inline-flex justify-center mt-5 rounded-md border border-transparent px-3 py-1 text-xl text-white bg-blue-800 transition-all duration-400 hover:duration-500 hover:bg-green-600 hover:text-white self-end">
                        Update
                    </button>
                </div>    
			</div>
		</form>
	</div>
</main>

<?php require base_path('views/partials/footer.php') ?>