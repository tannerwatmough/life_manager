<?php
include('header.php');

// Checks if the $games array is populated.
$games = filter_input(INPUT_POST, 'games');
if ($games == NULL) {
  $games = filter_input(INPUT_GET, 'games');
}
// If games array still unpopulated, run database query to get habits.
if ($games == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");
  $games = get_all_games();
}
?>
<main>
    <h2>Collections</h2>

    <nav class="container">
        <a href="/life_manager/controller/books_controller.php">Books</a>
        <a href="/life_manager/controller/course_controller.php">Courses</a>
        <a href="/life_manager/controller/games_controller.php">Games</a>
    </nav>

    <button type="button" class="collapsible heading-medium active">Games</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Name</th>
            <th>Platform</th>
            <th>Length</th>
            <th>Recording</th>
            <th>Completed Date</th>
            <th>Notes</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($games as $game) : 
            // Populates game collection
            ?>
            <tr>
                <td><?php echo htmlspecialchars($game['name']); ?></td>
                <td><?php echo htmlspecialchars($game['platform']); ?></td>
                <td><?php echo htmlspecialchars($game['length']); ?></td>
                <td><?php echo htmlspecialchars($game['url']); ?></td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($game['completedDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($game['completedDate'])));
                    }
                ?>
                </td>
                <td><?php echo htmlspecialchars($game['notes']); ?></td>
                <td>
                <form action="https://localhost/life_manager/controller/games_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="game_id" 
                    value="<?php echo htmlspecialchars($game['gameId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <a href="/life_manager/controller/games_controller.php?action=add_view">Add Item</a>
</main>
<script src="/life_manager/scripts/script.js"></script>
<?php include('footer.php'); ?>