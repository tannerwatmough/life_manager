<?php
include('header.php');

$habits = filter_input(INPUT_POST, 'habits');
if ($habits == NULL) {
  $habits = filter_input(INPUT_GET, 'habits');
}
if ($habits == NULL) {
  require_once($_SERVER['DOCUMENT_ROOT']."/life_manager/model/habit_database.php");
  $habits = get_all_habits();
}
?>
<main>
  <h2>Daily Routines</h2>

  <h3>Morning Routine</h3>

  <section>
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        if ($habit['category'] == 1) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" onClick="window.location.reload()" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <h3 id="health_rout">Health Routine</h3>

  <section>
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        if ($habit['category'] == 3) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="hidden" name="location" value="#health_rout" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="hidden" name="location" value="#health_rout" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#health_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <h3 id="learn_rout">Learning Routine</h3>

  <section>
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        if ($habit['category'] == 2) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#learn_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
    <p>
      Note: Current course work includes Software Engineering, Networking, Network Security, Web Development, Data Structures and Algorithms, CompTIA A+, and other courses.
    </p>
  </section>

  <h3 id="clean_rout">Cleaning Routine</h3>

  <section>
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        if ($habit['category'] == 4) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php" 
                method="post">
                <input type="hidden" name="location" value="#clean_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <h3 id="night_rout">Night Routine</h3>

  <section>
    <table>
      <tr>
        <th>Habit</th>
        <th>Description</th>
        <th>Current Streak</th>
        <th>Longest Streak</th>
        <th>Start Date</th>
        <th>Last Completed Date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($habits as $habit) : 
        if ($habit['category'] == 5) {
          ?>
          <tr>
            <td><?php echo htmlspecialchars($habit['name']); ?></td>
            <td><?php echo htmlspecialchars($habit['info']); ?></td>
            <td><?php echo htmlspecialchars($habit['currStreak']); ?></td>
            <td><?php echo htmlspecialchars($habit['maxStreak']); ?></td>
            <td>
              <?php echo htmlspecialchars(date('n/j/Y', strtotime($habit['startDate']))); ?>
            </td>
            <td>
              <?php 
                if ($habit['lastDate'] == NULL) {
                  echo 'null';
                } else {
                  echo htmlspecialchars(date('n/j/Y', strtotime($habit['lastDate'])));
                }
              ?>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php" 
                method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
            <td>
              <form action="https://localhost/life_manager/controller/daily_controller.php"
                 method="post">
                <input type="hidden" name="location" value="#night_rout" />
                <input type="hidden" name="action" 
                  value="edit" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="Edit" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>
</main>
<?php include('footer.php'); ?>