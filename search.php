<table>
  <thead>
    <tr>
      <th>Tag</th>
      <th>Repository Name</th>
      <th>Description</th>
      <th>Maintainer</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (isset($_POST["searchValue"])) {
      $searchValue = $_POST["searchValue"];
  
      // Connect to MySQL database
      $servername = "localhost";
      $username = "root";
      $password = "password";
      $dbname = "test";
      $conn = new mysqli($servername, $username, $password, $dbname);
  
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
      // Search for records with matching content
      $sql = "SELECT * FROM repository_index WHERE tag LIKE '%$searchValue%'";
      $result = $conn->query($sql);
  
      // Display results
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?php echo $row["tag"]; ?></td>
      <td><?php echo $row["repo_name"]; ?></td>
      <td><?php echo $row["description"]; ?></td>
      <td><?php echo $row["maintainer"]; ?></td>
    </tr>
    <?php
        }
      } else {
        echo "<tr><td colspan='4'>No results found.</td></tr>";
      }
  
      $conn->close();
    }
    ?>
  </tbody>
</table>
