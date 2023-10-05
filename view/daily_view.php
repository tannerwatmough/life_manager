<?php
include('header.php');
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
              <form action="daily_controller.php" method="post">
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="daily_controller.php" method="post">
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <h3>Health Routine</h3>

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
              <form action="daily_controller.php" method="post">
                <input type="hidden" name="action" 
                  value="decrement_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="-" />
              </form>
            </td>
            <td>
              <form action="daily_controller.php" method="post">
                <input type="hidden" name="action" 
                  value="increment_value" />
                <input type="hidden" name="habit_id" 
                  value="<?php echo htmlspecialchars($habit['dailyId']); ?>" />
                <input type="submit" value="+" />
              </form>
            </td>
          </tr>
          <?php } else {continue;} endforeach; ?>
    </table>
  </section>

  <h3>Learning Routine</h3>
  <ul>
    <li>Art [Drawing] - Website or Instagram</li>
    <li>Code - GitHub Commits</li>
    <li>Writing - Website, 200 words per day</li>
    <li>Reading - 5 minutes per day min. Summary when book is done</li>
    <li>French - Duolingo</li>
    <li>Guitar - Periodic videos on progress</li>
    <li>Photography - Website or Instagram</li>
    <li>Bucket pst - Video or photography cool ones</li>
    <li>Gaming - Stream and/or Record It</li>
    <li>Movie - Summary post watch on website [Movie database on site]</li>
    <li>Digital Cleanup (Notion, Bookmarks, YouTube Playlist)</li>
    <li>Cooking</li>
    <li>Course Work
        <ul>
            <li>Software Engineering</li>
            <li>Networking</li>
            <li>Network Security</li>
            <li>Web Development</li>
            <li>DSA</li>
            <li>CompTIA A+</li>
            <li>Other Courses</li>
          </ul>
    </li>
  </ul>


  <h3>Cleaning Routine</h3>
  <ul>
    <li>Change out towels</li>
    <li>Take out garbage for all rooms</li>
    <li>General tidy of all rooms</li>
    <li>Wash dishes</li>
    <li>Deal with mail</li>
    <li>Wipe down stove top</li>
    <li>Sweep floors of all rooms</li>
    <li>Wipe down the bathtub</li>
    <li>Clean toilet inside and out</li>
    <li>Clean any wood cutting boards with 1:1 vinegar/water mix after each use</li>
    <li>Clean mirrors</li>
    <li>Disinfect kitchen counter tops, back splash, and sink</li>
    <li>Wipe shower screens</li>
    <li>Wipe dining and coffee tables</li>
    <li>Wipe bathroom sinks and counter tops</li>
  </ul>
  

  <h3>Night Routine</h3>
  <ul>
    <li>Shower</li>
    <li>Skin Care</li>
    <li>Evening Tea</li>
    <li>Journal</li>
    <li>Brush and Floss</li>
    <li>Meditate</li>
    <li>Bed before 11pm</li>
    <li>Reading - 5 minutes per day min. Summary when book is done</li>
  </ul>
</main>
<?php include('footer.php'); ?>