<?php
include('header.php');

// Checks if the $books array is populated.
if ($books == NULL) {
    $books = filter_input(INPUT_POST, 'books');
}
if ($books == NULL) {
  $books = filter_input(INPUT_GET, 'books');
}
// If books array still unpopulated, run database query to get habits.
if ($books == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");
  $books = get_all_books();
}

if ($search_fl == NULL) {
    $search_fl = false;
    $search_results = NULL;
}
?>
<main>
    <h2>Collections</h2>

    <nav class="container">
        <a href="/life_manager/controller/books_controller.php">Books</a>
        <a href="/life_manager/controller/course_controller.php">Courses</a>
        <a href="/life_manager/controller/games_controller.php">Games</a>
    </nav>

    <button type="button" class="collapsible heading-medium active">Books</button>

    <section class="collapse">
        <?php if ($search_fl == true) {
            ?>
            <table>
                <tr>
                        <th>
                        <form action="https://localhost/life_manager/controller/books_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>
                        <form action="https://localhost/life_manager/controller/books_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_author" />
                            <input type="submit" value="Author" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/books_controller.php"
                            method="post">
                        <input type="hidden" name="action" value="order_by_genre" />
                            <input type="submit" value="Genre" />
                        </form>
                        </th>
                        <th>
                        <form action="https://localhost/life_manager/controller/books_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_platform" />
                            <input type="submit" value="Platform" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

                <?php foreach ($search_results as $search_result) : 
                    // Populates uncompleted book collection
                    if ($search_result['completedDate'] == NULL) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($search_result['name']); ?></td>
                        <td><?php echo htmlspecialchars($search_result['author']); ?></td>
                        <td><?php echo htmlspecialchars($search_result['genre']); ?></td>
                        <td><?php echo htmlspecialchars($search_result['platform']); ?></td>
                        <td>
                        <form action="https://localhost/life_manager/controller/books_controller.php"
                            method="post">
                            <!-- Hidden action to pass edit command. -->
                            <input type="hidden" name="action" 
                            value="edit_view" />
                            <input type="hidden" name="book_id" 
                            value="<?php echo htmlspecialchars($search_result['bookId']); ?>" />
                            <input type="submit" value="Edit" />
                        </form>
                        </td>
                    </tr>
                    <?php } endforeach; ?>
                </table>
                <br />
        <?php } ?>
            <form action="https://localhost/life_manager/controller/books_controller.php"
                method="post">
                <input type="text" name="search" />
                <input type="hidden" name="action" value="search" />
                <input type="submit" value="Search" />
            </form>
    </section>

    <button type="button" class="collapsible heading-medium active">Priority Books</button>

    <section class="collapse">
        <table>
        <tr>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_name" />
                    <input type="submit" value="Name" />
                </form>
                </th>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_author" />
                    <input type="submit" value="Author" /></th>
                </form>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                   <input type="hidden" name="action" value="order_by_genre" />
                    <input type="submit" value="Genre" />
                </form>
                </th>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_platform" />
                    <input type="submit" value="Platform" />
                </form>
                </th>
                <th>&nbsp;</th>
        </tr>

        <?php foreach ($books as $book) : 
            // Populates priority books
            if ($book['priority'] == 1) {

            ?>
            <tr>
                <td><?php echo htmlspecialchars($book['name']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['genre']); ?></td>
                <td><?php echo htmlspecialchars($book['platform']); ?></td>
                <td>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="book_id" 
                    value="<?php echo htmlspecialchars($book['bookId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
    </section>

    <button type="button" class="collapsible heading-medium active">Completed Books</button>

    <section class="collapse">
        <table>
        <tr>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_name" />
                    <input type="submit" value="Name" />
                </form>
                </th>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_author" />
                    <input type="submit" value="Author" /></th>
                </form>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                <input type="hidden" name="action" value="order_by_genre" />
                    <input type="submit" value="Genre" />
                </form>
                </th>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_platform" />
                    <input type="submit" value="Platform" />
                </form>
                </th>
                <th>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_date" />
                    <input type="submit" value="Completed Date" />
                </form>
                </th>
                <th>Summary</th>
                <th>&nbsp;</th>
        </tr>

        <?php foreach ($books as $book) : 
            // Populates completed book collection
            if ($book['completedDate'] != NULL) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($book['name']); ?></td>
                <td><?php echo htmlspecialchars($book['author']); ?></td>
                <td><?php echo htmlspecialchars($book['genre']); ?></td>
                <td><?php echo htmlspecialchars($book['platform']); ?></td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($book['completedDate'] == NULL) {
                    echo 'NULL';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($book['completedDate'])));
                    }
                ?>
                </td>
                <td><?php if ($book['summary'] != NULL) {echo 'See website for summary';}; ?></td>
                <td>
                <form action="https://localhost/life_manager/controller/books_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="book_id" 
                    value="<?php echo htmlspecialchars($book['bookId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
    </section>


    <a href="/life_manager/controller/books_controller.php?action=add_view">Add Item</a>

</main>
<script src="/life_manager/scripts/script.js"></script>
<?php include('footer.php'); ?>