<?php
include_once '../components/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<main class="flex flex-col items-center justify-center min-h-screen py-2 bg-gray-50 sm:px-6 lg:px-8">
    <section class="flex flex-col items-center justify-center w-full px-20 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Add Book</h1>
        <p class="mt-4 text-lg text-gray-600">Add a book to the library</p>
    </section>
    <section class="flex flex-col items-center justify-center w-full px-20 py-10">
        <form action="../controllers/addBookController.php" method="POST" class="flex flex-col items-center justify-center w-full px-20 py-10" enctype="multipart/form-data">
        <!--            file upload-->
            <div class="flex items-center justify-center w-full">
                <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="image" name="image" type="file" class="hidden" required accept="image/*">
                </label>
            </div>

            <div class="flex flex-col w-full mb-4">
                <label for="title" class="mb-2 text-lg text-gray-600">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="author" class="mb-2 text-lg text-gray-600">Author</label>
                <input type="text" name="author" id="author" placeholder="Author" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
            </div>
            <div class="flex flex-col w-full mb-4">
                <label for="description" class="mb-2 text-lg text-gray-600">Description</label>
<!--                text rich-->
                <textarea cols="10" rows="10" name="description" id="description" placeholder="Description" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required></textarea>
            </div>
            <!-- input of increment and decrement of 5  that hve a + and - button -->
            <div class="flex flex-col w-full mb-4">
    <label for="quantity" class="mb-2 text-lg text-gray-600">Rating</label>
    <div class="flex items-center">
        <button type="button" id="decrement" class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">-</button>
        <input type="number" name="rating" id="quantity" max="10"  value="0" class="px-1 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" required>
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

            <button type="submit" class="w-full px-3 py-4 mt-8 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Add Book</button>
        </form>

    </section>

</main>
