<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Job Listings</title>
<style>
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }
  th {
    cursor: pointer; /* Indicate sortable columns */
  }
</style>
</head>
<body>

<h2>Job Listings</h2>

<!-- Filter by Job Title -->
<label for="filterJob">Filter by Job Title:</label>
<input type="text" id="filterJob" placeholder="Enter job title" onkeyup="filterTable()">

<!-- Filter by Location -->
<label for="filterLocation">Filter by Location:</label>
<input type="text" id="filterLocation" placeholder="Enter location" onkeyup="filterTable()">

<!-- Table with job data -->
<table id="jobsTable">
  <thead>
    <tr>
      <th onclick="sortTable(0)">Job Title</th>
      <th onclick="sortTable(1)">Location</th>
      <th onclick="sortTable(2)">Posting Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Software Developer</td>
      <td>New York</td>
      <td>2025-04-01</td>
    </tr>
    <tr>
      <td>Data Analyst</td>
      <td>San Francisco</td>
      <td>2025-03-15</td>
    </tr>
    <tr>
      <td>UI Designer</td>
      <td>Chicago</td>
      <td>2025-04-05</td>
    </tr>
    <tr>
      <td>Product Manager</td>
      <td>New York</td>
      <td>2025-03-20</td>
    </tr>
  </tbody>
</table>

<script>
// Sorting function
function sortTable(n) {
  const table = document.getElementById("jobsTable");
  let switching = true;
  let dir = "asc"; 
  while (switching) {
    switching = false;
    const rows = table.rows;
    for (let i = 1; i < (rows.length - 1); i++) {
      let shouldSwitch = false;
      let x = rows[i].getElementsByTagName("TD")[n];
      let y = rows[i + 1].getElementsByTagName("TD")[n];

      // For date sorting, we convert to Date objects
      if (n === 2) {
        x = new Date(x.innerHTML);
        y = new Date(y.innerHTML);
      } else {
        x = x.innerHTML.toLowerCase();
        y = y.innerHTML.toLowerCase();
      }

      if (dir === "asc") {
        if (x > y) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (x < y) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    } else {
      if (dir === "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

// Filter function
function filterTable() {
  const inputJob = document.getElementById("filterJob").value.toLowerCase();
  const inputLoc = document.getElementById("filterLocation").value.toLowerCase();
  const table = document.getElementById("jobsTable");
  const tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const tdJob = tr[i].getElementsByTagName("TD")[0];
    const tdLoc = tr[i].getElementsByTagName("TD")[1];
    if (tdJob && tdLoc) {
      const jobText = tdJob.innerHTML.toLowerCase();
      const locText = tdLoc.innerHTML.toLowerCase();

      if (
        jobText.includes(inputJob) && 
        locText.includes(inputLoc)
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>
<html>
<head>
    <title>Apply for Position</title>
</head>
<body>
<h2>Apply for a Position</h2>
<form action="submit_application.php" method="post" enctype="multipart/form-data">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <!-- File Upload for Resume or Document -->
    <label for="attachment">Upload Your Resume or Document:</label>
    <input type="file" id="attachment" name="attachment" accept=".pdf,.doc,.docx" required><br><br>

    <!-- Image Upload (Optional) -->
    <label for="photo">Upload Your Photo:</label>
    <input type="file" id="photo" name="photo" accept="image/*"><br><br>

    <input type="submit" value="Submit Application">
</form>
</body>
</html>
