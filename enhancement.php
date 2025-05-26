<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Job Listings</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 20px;
  }
  h2 {
    text-align: center;
  }
  .filter-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 20px;
  }
  select, button {
    padding: 8px;
    font-size: 16px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: left;
  }
  th {
    cursor: pointer;
    background-color: #0073e6;
    color: white;
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
    <button onclick="filterTable()">Filter</button>
</div>
<?php
require_once 'settings.php';
$query = "SELECT title, location_1, salary_entry FROM jobs";
$result = mysqli_query($conn, $query);
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