<?php
include('header.php');

// Checks if the $habits array is populated.
$seasonals = filter_input(INPUT_POST, 'seasonals');
if ($seasonals == NULL) {
  $seasonals = filter_input(INPUT_GET, 'seasonals');
}
// If habits array still unpopulated, run database query to get habits.
if ($seasonals == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/task_database.php");
  $seasonals = get_all_seasonal();
}
?>
<main>
    <nav class="container">
        <a href="/life_manager/controller/day_controller.php">Daily Tasks</a>
        <a href="/life_manager/controller/week_controller.php">Weekly Tasks</a>
        <a href="/life_manager/controller/month_controller.php">Monthly Tasks</a>
        <a href="/life_manager/controller/seasonal_controller.php">Seasonal Tasks</a>
    </nav>

    <h2>Seasonal Routines</h2>
    
    <button type="button" class="collapsible heading-medium active">Spring - March 21</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($seasonals as $seasonal) : 
            // Populates seasonal cleaning table with all seasonals where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($seasonal['category'] == 12 || $seasonal['category'] == 16) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($seasonal['name']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['info']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($seasonal['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    <button type="button" class="collapsible heading-medium active" id="summer">Summer - June 21</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($seasonals as $seasonal) : 
            // Populates seasonal cleaning table with all seasonals where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($seasonal['category'] == 13 || $seasonal['category'] == 16) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($seasonal['name']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['info']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($seasonal['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="location" value="#summer" />
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="location" value="#summer" />
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="location" value="#summer" />
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

    <button type="button" class="collapsible heading-medium active" id="fall">Fall - September 21</button>

    <section class="collapse">
        <table>
            <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            </tr>

            <?php foreach ($seasonals as $seasonal) : 
            // Populates seasonal cleaning table with all seasonals where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($seasonal['category'] == 14 || $seasonal['category'] == 16) {
                ?>
                <tr>
                <td><?php echo htmlspecialchars($seasonal['name']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['info']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['maxStreak']); ?></td>
                <td>
                    <!-- Formats time properly for table -->
                    <?php echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['startDate']))); ?>
                </td>
                <td>
                    <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($seasonal['lastDate'] == NULL) {
                        echo 'null';
                    } else {
                        echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['lastDate'])));
                    }
                    ?>
                </td>
                <td>
                    <!-- Absolute path to ensure user can reach controller without error -->
                    <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="location" value="#fall" />
                    <input type="hidden" name="action" 
                        value="decrement_value" />
                    <input type="hidden" name="season_id" 
                        value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="-" />
                    </form>
                </td>
                <td>
                    <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="location" value="#fall" />
                    <input type="hidden" name="action" 
                        value="increment_value" />
                    <input type="hidden" name="season_id" 
                        value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                    </form>
                </td>
                <td>
                    <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="location" value="#fall" />
                    <input type="hidden" name="action" 
                        value="edit" />
                    <input type="hidden" name="season_id" 
                        value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="Edit" />
                    </form>
                </td>
                </tr>
                <?php } else {continue;} endforeach; ?>
        </table>
    </section>


    <button type="button" class="collapsible heading-medium active" id="winter">Winter - December 21</button>

    <section class="collapse">
        <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Current Streak</th>
            <th>Longest Streak</th>
            <th>Start Date</th>
            <th>Last Completed Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($seasonals as $seasonal) : 
            // Populates seasonal cleaning table with all seasonals where categoryId is 6
            // which corresponds to a cleaning routine. 
            // TO DO: Likely should be a variable which is associated with category 
            // name to category id. 
            if ($seasonal['category'] == 15 || $seasonal['category'] == 16) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($seasonal['name']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['info']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['currStreak']); ?></td>
                <td><?php echo htmlspecialchars($seasonal['maxStreak']); ?></td>
                <td>
                <!-- Formats time properly for table -->
                <?php echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['startDate']))); ?>
                </td>
                <td>
                <?php 
                    // If lastDate is NULL, it will set date to 1970, so instead null.
                    if ($seasonal['lastDate'] == NULL) {
                    echo 'null';
                    } else {
                    echo htmlspecialchars(date('n/j/Y', strtotime($seasonal['lastDate'])));
                    }
                ?>
                </td>
                <td>
                <!-- Absolute path to ensure user can reach controller without error -->
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Decrement here. -->
                    <input type="hidden" name="action" 
                    value="decrement_value" />
                    <input type="hidden" name="location" value="#winter" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="-" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass commands. Increment here. -->
                    <input type="hidden" name="action" 
                    value="increment_value" />
                    <input type="hidden" name="location" value="#winter" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="+" onClick="window.location.reload()" />
                </form>
                </td>
                <td>
                <form action="https://localhost/life_manager/controller/seasonal_controller.php"
                    method="post">
                    <!-- Hidden action to pass edit command. -->
                    <input type="hidden" name="action" 
                    value="edit" />
                    <input type="hidden" name="location" value="#winter" />
                    <input type="hidden" name="season_id" 
                    value="<?php echo htmlspecialchars($seasonal['seasonalId']); ?>" />
                    <input type="submit" value="Edit" />
                </form>
                </td>
            </tr>
            <?php } else {continue;} endforeach; ?>
        </table>
    </section>

</main>
<script src="/life_manager/scripts/script.js"></script>
<?php include('footer.php'); ?>