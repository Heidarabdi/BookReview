<!-- component -->
<!-- This is an example component -->
<div class="max-w-xl mx-auto mx-10">


    <div class="bg-white shadow-md rounded-lg max-w-sm w-[280px] dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg h-80 w-full object-cover"
                 src="<?php echo $book['cover'] ?>" alt="product image">
        </a>
        <div class="px-2 pb-4">
            <a href="#">
                <h3 class="text-gray-900 font-bold text-xl tracking-tight dark:text-white"> <?php echo $book['title'] ?> </h3>
            </a>
            <p class="mt-1 text-gray-700 text-md dark:text-gray-200"> <?php echo $book['author'] ?> </p>
            <div class="flex items-center mt-1 mb-2">
                <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
                <span class="bg-blue-100 text-blue-800 text-xs font-bold mr-1 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3"><?php echo $book['rating'] ?></span>
            </div>
            <div class="flex items-end justify-end">
<!--                   Edit and Delete-->
                <a href="../screens/editBook.php?id=<?php echo $book['id'] ?>" class="text-gray-900 dark:text-white text-sm font-bold mr-3 border-2 border-gray-900 dark:border-white rounded-md px-3 py-1 hover:bg-green-500 hover:text-white bg-green-400">
                    Edit
                </a>
                <a href="../controllers/deleteBookController.php?id=<?php echo $book['id'] ?>" class="text-gray-900 dark:text-white text-sm font-bold mr-3 border-2 border-gray-900 dark:border-white rounded-md px-3 py-1 hover:bg-red-500 hover:text-white bg-red-400">
                    Delete</a>
             </div>
        </div>
    </div>
</div>