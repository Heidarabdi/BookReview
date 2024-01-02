<?php
require_once "../database.php";
require_once "../utils/Alerts.php";
require_once "../queries.php";
?>


<main class="container flex flex-col items-center justify-center w-full h-full mx-auto my-10">
    <!-- see for more book text button with underline -->
    <div class="flex flex-col items-end justify-center w-full mb-5">
        <a href="../screens/books.php" class="text-3xl font-bold text-center text-gray-900 dark:text-white cursor-pointer  hover:underline hover:text-blue-500">
            See More Books </a>

    </div>
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    <?php
    $books = selectAllBooks($GLOBALS['conn']);
    // only show 3 books
    $books = array_slice($books, 0, 3);
    foreach ($books as $book) {
            include "../components/bookCard.php";
        } ?>


    </div>
    </main>