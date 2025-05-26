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
if (mysqli_num_rows($result) == 0) {
    $creat_table_jobs = "CREATE TABLE IF NOT EXISTS jobs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        responsibilities_1 VARCHAR(255),
        responsibilities_2 VARCHAR(255),
        responsibilities_3 VARCHAR(255),
        skill_1 VARCHAR(255),
        skill_2 VARCHAR(255),
        skill_3 VARCHAR(255),
        skill_4 VARCHAR(255),
        skill_5 VARCHAR(255),
        education_1 VARCHAR(255),
        education_2 VARCHAR(255),
        education_3 VARCHAR(255),
        salary_entry VARCHAR(50),
        salary_mid VARCHAR(50),
        salary_senior VARCHAR(50),
        image VARCHAR(255)
    )";
    if (mysqli_query($conn, $creat_table_jobs)) {
        echo "<p>Jobs table created successfully.</p>";
    } else {
        echo "<p>Error creating jobs table: " . mysqli_error($conn) . "</p>";
    }
    $insert_jobs = "INSERT INTO jobs (title, description, responsibilities_1, responsibilities_2, responsibilities_3, skill_1, skill_2, skill_3, skill_4, skill_5, education_1, education_2, education_3, salary_entry, salary_mid, salary_senior, image) VALUES
    ('Cybersecurity Analyst', 'Responsible for protecting an organization\'s computer systems and networks from cyber threats.', 'Monitor network traffic for suspicious activity', 'Conduct vulnerability assessments and penetration testing', 'Develop and implement security policies and procedures', 'Knowledge of network protocols and security technologies', 'Experience with security information and event management (SIEM) tools', 'Strong analytical and problem-solving skills', 'Excellent communication skills', 'Bachelor\'s degree in Computer Science or related field', '2+ years of experience in cybersecurity', 'Certified Information Systems Security Professional (CISSP) preferred', '$60,000 - $80,000', '$80,000 - $100,000', '$100,000 - $120,000', 'images/cybersecurity_analyst.png'),
    ('Ethical Hacker', 'Responsible for testing and evaluating the security of an organization\'s systems and networks.', 'Perform penetration testing to identify vulnerabilities', 'Develop and implement security measures to protect against cyber threats', 'Conduct security audits and assessments', 'Strong knowledge of network protocols and security technologies', 'Experience with penetration testing tools and techniques', 'Excellent problem-solving skills', 'Strong communication skills', 'Bachelor\'s degree in Computer Science or related field', '2+ years of experience in ethical hacking or cybersecurity', 'Certified Ethical Hacker (CEH) preferred', '$70,000 - $90,000', '$90,000 - $110,000', '$110,000 - $130,000', 'images/ethical_hacker.png'),
    ('Computer Forensic Analyst', 'Responsible for investigating and analyzing digital evidence to support legal cases.', 'Collect and preserve digital evidence from computers and networks', 'Analyze data to identify patterns and trends', 'Prepare detailed reports and presentations for legal proceedings', 'Strong knowledge of computer forensics tools and techniques', 'Experience with data recovery and analysis', 'Excellent analytical and problem-solving skills', 'Strong attention to detail', 'Bachelor\'s degree in Computer Science or related field', '2+ years of experience in computer forensics or cybersecurity', 'Certified Computer Forensics Examiner (CCFE) preferred', '$65,000 - $85,000', '$85,000 - $105,000', '$105,000 - $125,000', 'images/computer_forensic_analyst.png'),
    ('IT Security Engineer', 'Responsible for designing and implementing security solutions to protect an organization\'s IT infrastructure.', 'Develop and implement security policies and procedures', 'Design and implement security solutions for networks and systems', 'Monitor and respond to security incidents', 'Strong knowledge of network protocols and security technologies', 'Experience with firewalls, intrusion detection systems, and encryption technologies', 'Excellent problem-solving skills', 'Strong communication skills', 'Bachelor\'s degree in Computer Science or related field', '2+ years of experience in IT security or cybersecurity', 'Certified Information Systems Security Professional (CISSP) preferred', '$75,000 - $95,000', '$95,000 - $115,000', '$115,000 - $135,000', 'images/it_security_engineer.png')";
    if (mysqli_query($conn, $insert_jobs)) {
        echo "<p>Sample job data inserted successfully.</p>";
    } else {
        echo "<p>Error inserting sample job data: " . mysqli_error($conn) . "</p>";
    }  
} 
    mysqli_close($conn);
    include 'footer.inc';
?>
</body>
</html>
