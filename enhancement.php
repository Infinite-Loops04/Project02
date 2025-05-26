<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Job Listings</title>
<link rel="stylesheet" type="text/css" href="styles/Project1.css">
<style>
  table {
    background-color: #f2f2f2;
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }
  th {
    cursor: pointer;
    background-color: #0073e6;
    color: white;
  }
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  a {
    color: #0073e6;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }
  #jobsTable {
    display: none
  }
</style>
</head>
<body>

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
      <th onclick="sortTable(2)">Salary Range</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><a href="jobs.php?title=Cybersecurity%20Analyst">Cybersecurity Analyst</a></td>
      <td><a href="jobs.php?title=Cybersecurity%20Analyst">Melbourne</a></td>
      <td>$60,000-$90,000</td>
    </tr>
    <tr>
      <td><a href="jobs.php?title=Ethical%20Hacker">Ethical Hacker</a></td>
      <td><a href="jobs.php?title=Ethical%20Hacker">Sydney</a></td>
      <td>$80,000 - $120,000</td>
    </tr>
    <tr>
      <td><a href="jobs.php?title=Computer%20Forensic%20Analyst">Computer Forensic Analyst</a></td>
      <td><a href="jobs.php?title=Computer%20Forensic%20Analyst">Brisbane</a></td>
      <td>$70,000 - $100,000</td>
    </tr>
    <tr>
      <td><a href="jobs.php?title=IT%20Security%20Engineer">IT Security Engineer</a></td>
      <td><a href="jobs.php?title=IT%20Security%20Engineer">Work from home</a></td>
      <td>$120,000 - $160,000</td>
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
      let xVal = x.innerText.toLowerCase();
      let yVal = y.innerText.toLowerCase();
      if (dir === "asc") {
        if (xVal > yVal) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (xVal < yVal) {
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
      const jobText = tdJob.innerText.toLowerCase();
      const locText = tdLoc.innerText.toLowerCase();
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