<?php
    require_once 'settings.php';
    // Connect to the database
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($conn, $query);
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height">
        <meta name="description" content="Jobs at CloudSpire Technologies">
        <meta name="keywords" content="HTML5, information technology, IT, company, cloudspire">
        <meta name="author" content="InfiniteLoops">
        <link rel="stylesheet" type="text/css" href="styles/Project1.css">
        <title>CloudSpire Careers | pursue your dreams</title>
    </head>
    <body>
        <header id="header">
              <?php include("header.inc"); ?>
           <img id="logo" src="images/cloudspire_logo.png" alt="CloudSpire Logo">
            <h1 class="tagline">Securing Tomorrow's Digital Landscape, Today.</h1>
            <p class="tagline">Pursue your dreams with CloudSpire Technologies</p>
           <h1 id="page_title">CloudSpire Technologies</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="apply.php">Services</a></li>
                </ul>
            </nav>
        </header>
        <main id="welcome">
            <aside class="jobsimage">
                <img src="images/careers.png" alt="CloudSpire Technologies">
            </aside>
            <h1>Welcome to CloudSpire Technologies Careers</h1>
            <p>At CloudSpire Technologies, we are committed to providing our employees with a dynamic and rewarding work environment. We believe in fostering innovation, collaboration, and professional growth.</p>
            <p>Our team is made up of talented individuals who are passionate about technology and dedicated to delivering exceptional results for our clients. We offer a range of career opportunities in various fields, including Ethical Hacker, Cybersecurity Analyst, and more.</p>
            <p>We are proud to be an equal opportunity employer and welcome applicants from all backgrounds. If you are looking for a challenging and fulfilling career in the tech industry, we invite you to explore our current job openings.</p>
            <p>Join us in our mission to provide innovative solutions and exceptional service to our clients. Together, we can make a difference in the world of technology.</p>
            <p>Thank you for considering a career with CloudSpire Technologies. We look forward to hearing from you!</p>
        </main>
        <section>
            <aside class="jobsimage">
                <img src="images/ourteam.png" alt="CloudSpire Technologies">
            </aside>
            <h2>Why Work with Us?</h2>
            <p>At CloudSpire Technologies, we value our employees and strive to create a positive work environment. Here are some reasons why you should consider joining our team:</p>
            <ul>
                <li>Competitive salary and benefits</li>
                <li>Opportunities for professional development and growth</li>
                <li>Collaborative and inclusive work culture</li>
                <li>Access to cutting-edge technology and tools</li>
                <li>Work-life balance and flexible work arrangements</li>
            </ul>
        </section>
        <section id="join">
            <aside class="jobsimage">
                <img src="images/joinourteam.png" alt="CloudSpire Technologies">
            </aside>
            <h2>Join Our Team</h2>
            <p>At CloudSpire Technologies, we are always looking for talented individuals to join our team. If you are passionate about technology and want to work in a dynamic environment, we would love to hear from you!</p>
            <h2>Current Openings</h2>
            <ul>
                <li>Cybersecurity Analyst</li>
                <li>Ethical Hacker</li>
                <li>Computer Forensic Analyst</li>
                <li>IT Security Engineer</li>
            </ul>
</section>
<?php 
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    $imgpath =  htmlspecialchars($row['image']);
    echo "<section>";
    echo "<figure>";
    echo "<aside class='jobsimage'>";
    echo "<img src = \"$imgpath\" alt = \"Job Image\">";
    echo "<figure>";
    echo "</aside>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>"; // Job Title
    echo "<p>" . htmlspecialchars($row['description']) . "</p>"; // Job Description

    // Key Responsibilities (assuming columns: responsibility1, responsibility2, ...)
    echo "<h3>Key Responsibilities</h3>";
    echo "<ul>";
    echo "<li>" . htmlspecialchars($row['responsibilities_1']) . "</li>";
    echo "<li>" . htmlspecialchars($row['responsibilities_2']) . "</li>";
    echo "<li>" . htmlspecialchars($row['responsibilities_3']) . "</li>";
    echo "</ul>";
      // Required Skills (assuming columns: skill1, skill2, ...)
    echo "<h3>Required Skills</h3>";
    echo "<ul>";
    echo "<li>" . htmlspecialchars($row['skill_1']) . "</li>";
    echo "<li>" . htmlspecialchars($row['skill_2']) . "</li>";
    echo "<li>" . htmlspecialchars($row['skill_3']) . "</li>";
    echo "<li>" . htmlspecialchars($row['skill_4']) . "</li>";
    echo "<li>" . htmlspecialchars($row['skill_5']) . "</li>";
    echo "</ul>";

    // Education and Experience (assuming columns: education1, education2, ...)
    echo "<h3>Education and Experience</h3>";
    echo "<ul>";
    echo "<li>" . htmlspecialchars($row['education_1']) . "</li>";
    echo "<li>" . htmlspecialchars($row['education_2']) . "</li>";
    echo "<li>" . htmlspecialchars($row['education_3']) . "</li>";
    echo "</ul>";

    // Salary Range
    echo "<h3>Salary Range</h3>";
    echo "<ul>";
    echo "<li>Entry-level: " . $row['salary_entry'] . "</li>";
    echo "<li>Mid-level: " . $row['salary_mid'] . "</li>";
    echo "<li>Senior-level: " . $row['salary_senior'] . "</li>";
    echo "</ul>";
    echo "<a href='apply.php'>Apply Now</a>";
    echo "</section>";
    }
}
mysqli_close($conn);
?>
        include 'footer.inc';
</body>
</html>