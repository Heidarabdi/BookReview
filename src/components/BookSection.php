
<main class="container flex items-center justify-space-between flex-wrap mx-auto p-5 space-y-5">
    <!-- see for more book text button with underline -->
    <div class="flex flex-col items-end justify-center w-full mb-5">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white cursor-pointer  hover:underline hover:text-blue-500">
            See More Books </h2>

    </div>

        <!-- Book Section -->
        <?php for ($i = 0; $i <8; $i++) {
            include "../components/bookCard.php";
        } ?>



    </main>