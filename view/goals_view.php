<?php
include('header.php');

// Checks if the $goals array is populated.
if ($goals == NULL) {
    $goals = filter_input(INPUT_POST, 'goals');
}
if ($goals == NULL) {
  $goals = filter_input(INPUT_GET, 'goals');
}
// If goals array still unpopulated, run database query to get habits.
if ($goals == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/collection_database.php");
  $goals = get_all_goals();
}

?>
<main>
    <h2>Goals</h2>

    <button type="button" class="collapsible heading-medium active">Career Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 10) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>

    <button type="button" class="collapsible heading-medium active">Environment Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 6) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>

    <button type="button" class="collapsible heading-medium active">Growth Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 11) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>

    <button type="button" class="collapsible heading-medium active">Health Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 7) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>

    <button type="button" class="collapsible heading-medium active">Life Management Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 9) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>

    <button type="button" class="collapsible heading-medium active">Relationship Goals</button>

    <section class="collapse">
            <table>
                <tr>
                    <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_name" />
                            <input type="submit" value="Name" />
                        </form>
                        </th>
                        <th>Info</th>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_priority" />
                            <input type="submit" value="Priority" /></th>
                        </form>
                        <th>
                        <form action="https://localhost/life_manager/controller/goals_controller.php"
                            method="post">
                            <input type="hidden" name="action" value="order_by_date" />
                            <input type="submit" value="Due Date" />
                        </form>
                        </th>
                        <th>&nbsp;</th>
                </tr>

            <?php foreach ($goals as $goal) : 
            // Populates Career goals
                if ($goal['category'] == 8) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
                <br />
    </section>


    <button type="button" class="collapsible heading-medium active">Completed Goals</button>

    <section class="collapse">
        <table>
        <tr>
            <th>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_name" />
                    <input type="submit" value="Name" />
                </form>
            </th>
            <th>Info</th>
            <th>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_priority" />
                    <input type="submit" value="Priority" /></th>
                </form>
            <th>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <input type="hidden" name="action" value="order_by_date" />
                    <input type="submit" value="Due Date" />
                </form>
            </th>
            <th>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- <input type="hidden" name="action" value="order_by_date" /> -->
                    <input type="submit" value="Completed Date" />
                </form>
            </th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($goals as $goal) : 
            // Populates goal collection
            if ($goal['completedDate'] != NULL) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($goal['name']); ?></td>
                <td><?php echo htmlspecialchars($goal['info']); ?></td>
                <td><?php echo htmlspecialchars($goal['priority']); ?></td>
                <td>
                <?php 
                    // If dueDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['dueDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['dueDate'])));
                    }
                ?>
                </td>
                <td>
                <?php
                    // If completedDate is NULL, it will set date to 1970, so instead null.
                    if ($goal['completedDate'] == NULL) {
                        echo 'NULL';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($goal['completedDate'])));
                    }
                ?>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/goals_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit_view" />
                    <input type="hidden" name="goal_id" 
                    value="<?php echo htmlspecialchars($goal['goalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } endforeach; ?>
        </table>
    </section>


    <a href="/life_manager/controller/goals_controller.php?action=add_view">Add Item</a>

</main>
<script src="/life_manager/scripts/script.js"></script>
<?php include('footer.php'); ?>