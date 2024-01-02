<?php
include_once '../components/header.php';
include_once '../database.php';
include_once '../queries.php';
include_once '../utils/Alerts.php';

// Check if user is logged in

if (!isset($_SESSION['username'])) {
    // User is not logged in
    showError('You need to login to access this page.');
    return;
}

// Get book id from query string
$id = $_GET['id'];

// Get book from database
$book = selectBook($GLOBALS['conn'], $id);

// Check if book exists
if (!$book) {
    // Book does not exist
    showError('Book does not exist.');
    return;
}

// session the book id
$_SESSION['book_id'] = $id;


?>

<main class="flex flex-col items-center justify-center min-h-screen py-2 bg-gray-50 sm:px-6 lg:px-8">
    <section class="flex flex-col items-center justify-center w-full px-20 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Edit Book</h1>
        <p class="mt-4 text-lg text-gray-600">Edit a book in the library</p>
    </section>
    <section class="flex flex-col items-center justify-center w-full px-20 py-10">
        <form action="../controllers/editBookController.php" method="POST" class="flex flex-col items-center justify-center w-full px-20 py-10" enctype="multipart/form-data">
            <!-- Image upload -->
            <div class="flex items-center justify-center w-full">
                <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semi bold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="image" name="image" type="file" class="hidden" accept="image/*" value="<?php echo $book['cover'] ?>"
                </label>
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="title" class="mb-2 text-lg text-gray-600">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required value="<?php echo $book['title'] ?>">
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="author" class="mb-2 text-lg text-gray-600">Author</label>
                <input type="text" name="author" id="author" placeholder="Author" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required value="<?php echo $book['author'] ?>">
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="description" class="mb-2 text-lg text-gray-600">Description</label>
                <!--                text rich-->
                <textarea cols="10" rows="10" name="description" id="description" placeholder="Description" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required><?php echo $book['description'] ?></textarea>
            </div>
            <!-- input of increment and decrement of 5  that hve a + and - button -->
            <div class="flex flex-col w-full mb-4">
                <label for="quantity" class="mb-2 text-lg text-gray-600">Rating</label>
                <div class="flex items-center">
                    <button type="button" id="decrement" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">-</button>
                    <input type="number" name="rating" id="quantity" max="10" class="px-1 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required value="<?php echo $book['rating'] ?>">
                    <button type="button" id="increment" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">+</button>
                </div>
            </div>

            <script>
                const increment = document.getElementById('increment');
                const decrement = document.getElementById('decrement');
                const quantity = document.getElementById('quantity');

                increment.addEventListener('click', () => {
                    if (quantity.value < 10) {
                        quantity.value = parseInt(quantity.value) + 1;
                    }
                });

                <!-- decrement-->
                decrement.addEventListener('click', () => {
                    if (quantity.value > 0) {
                        quantity.value = parseInt(quantity.value) - 1;
                    }
                });

            </script>

            <button type="submit" class="w-full px-3 py-4 mt-8 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Update Book</button>
        </form>

    </section>

</main>

