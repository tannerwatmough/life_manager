<?php
include('header.php');

// Checks if the $courses array is populated.
$courses = filter_input(INPUT_POST, 'courses');
if ($courses == NULL) {
  $courses = filter_input(INPUT_GET, 'courses');
}
// If courses array still unpopulated, run database query to get habits.
if ($courses == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");
  $courses = get_all_courses();
}
?>
<main>
    <h2>Collections</h2>

    <nav class="container">
        <a href="/life_manager/controller/books_controller.php">Books</a>
        <a href="/life_manager/controller/course_controller.php">Courses</a>
        <a href="/life_manager/controller/games_controller.php">Games</a>
    </nav>

    <button type="button" class="collapsible heading-medium active">Courses</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Name</th>
            <th>Area</th>
            <th>Location</th>
            <th>Completed Date</th>
            <th>Notes</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($courses as $course) : 
            // Populates course collection
            ?>
            <tr>
                <td><?php echo htmlspecialchars($course['name']); ?></td>
                <td><?php echo htmlspecialchars($course['area']); ?></td>
                <td><?php echo htmlspecialchars($course['url']); ?></td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($course['completedDate'] == NULL) {
                    echo 'NULL';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($course['completedDate'])));
                    }
                ?>
                </td>
                <td><?php echo htmlspecialchars($course['notes']); ?></td>
                <td>
                <form action="https://localhost/life_manager/controller/course_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="course_id" 
                    value="<?php echo htmlspecialchars($course['courseId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <a href="/life_manager/controller/course_controller.php?action=add_view">Add Item</a>
</main>
<script src="/life_manager/scripts/script.js"></script>
<?php include('footer.php'); ?>