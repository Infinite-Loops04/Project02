<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Features Implementation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
            line-height: 1.6;
        }
        section {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: auto;
        }
        h1 {
            color: #003366;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #1f3b6e;
            margin-top: 20px;
        }
        ul {
            margin-left: 20px;
        }
    </style>
</head>
<body>

<div class="filter-container">
  <label for="filterJob">Job Title:</label>
  <select id="filterJob" onchange="filterTable()">
    <option value="">All</option>
    <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
    <option value="Ethical Hacker">Ethical Hacker</option>
    <option value="Computer Forensic Analyst">Computer Forensic Analyst</option>
    <option value="IT Security">IT Security</option>
  </select>

  <label for="filterLocation">Location:</label>
  <select id="filterLocation" onchange="filterTable()">
    <option value="">All</option>
    <option value="Melbourne">Melbourne</option>
    <option value="Sydney">Sydney</option>
    <option value="Brisbane">Brisbane</option>
    <option value="Work from home">Work from home</option>
</select>
    <button onclick="filterTable()">search</button>
</div>
<?php
require_once 'settings.php';
$query = "SELECT title, location_1, salary_entry FROM jobs";
$result = mysqli_query($conn, $query);
 if (isset($_GET['title']) || isset($_GET['location_1']) || isset($_GET['salary_entry'])) {
    $title = $_GET['title'] ?? ''; 
    $location = $_GET['location_1'] ?? '';
    $salary = $_GET['salary_entry'] ?? '';
    $query .= " WHERE title LIKE '%" . mysqli_real_escape_string($conn, $title) . "%' 
                AND location_1 LIKE '%" . mysqli_real_escape_string($conn, $location) . "%' 
                AND salary_entry LIKE '%" . mysqli_real_escape_string($conn, $salary) . "%'";
} else {
    $query .= " ORDER BY title ASC";
}
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='5' id='jobsTable'>";
    echo "<tr><th>Job Title</th><th>Location</th><th>Entry Salary</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td><a href='jobs.php?title=" . urlencode($row['title']) . "'>" . htmlspecialchars($row['title']) . "</a></td>";
        echo "<td>" . htmlspecialchars($row['location_1']) . "</td>";
        echo "<td>" . htmlspecialchars($row['salary_entry']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}
mysqli_close($conn);
?>


<script>
function sortTable(n) {
  const table = document.getElementById("jobsTable");
  let rows, switching, i, x, y, shouldSwitch, dir = "asc", switchcount = 0;
  switching = true;

  while (switching) {
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n].innerText.toLowerCase();
      y = rows[i + 1].getElementsByTagName("TD")[n].innerText.toLowerCase();

      if (n === 2) { // Handling salary sorting properly
        x = parseInt(x.replace(/[$,]/g, ""));
        y = parseInt(y.replace(/[$,]/g, ""));
      }

      if ((dir === "asc" && x > y) || (dir === "desc" && x < y)) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else {
      if (switchcount === 0 && dir === "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function filterTable() {
  const jobFilter = document.getElementById("filterJob").value.toLowerCase();
  const locationFilter = document.getElementById("filterLocation").value.toLowerCase();
  const table = document.getElementById("jobsTable");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const tdJob = tr[i].getElementsByTagName("TD")[0];
    const tdLoc = tr[i].getElementsByTagName("TD")[1];

    if (tdJob && tdLoc) {
      const jobText = tdJob.innerText.toLowerCase();
      const locText = tdLoc.innerText.toLowerCase();
      tr[i].style.display = (jobText.includes(jobFilter) && locText.includes(locationFilter)) ? "" : "none";
    }
  }
}
</script>

</body>
</html>
