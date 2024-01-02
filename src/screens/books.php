<?php
include_once "../database.php";
include_once "../components/header.php";

include_once "../queries.php";

$books = selectAllBooks($GLOBALS['conn']);

echo '
<main class="container flex flex-col items-center justify-center w-full h-full mx-auto my-10">
<h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white cursor-pointer  hover:underline hover:text-blue-500 my-10"
>Books</h2>
<div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
';
foreach ($books as $book) {
    include "../components/bookCard.php";
}
echo '
</div>
</main>';