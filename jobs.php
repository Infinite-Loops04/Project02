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
$table_check_query = "SHOW TABLES LIKE 'jobs'";
$check_result = mysqli_query($conn, $table_check_query);
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
// Create the jobs table
$create_table_jobs = "CREATE TABLE IF NOT EXISTS jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
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
    image VARCHAR(255),
    salary_entry VARCHAR(50),
    salary_mid VARCHAR(50),
    salary_senior VARCHAR(50)
)";

if (mysqli_query($conn, $create_table_jobs)) {
    echo "Jobs table created successfully.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Insert sample job data
$insert_job = "INSERT INTO jobs (
    title, description, responsibilities_1, responsibilities_2, responsibilities_3,
    skill_1, skill_2, skill_3, skill_4, skill_5,
    education_1, education_2, education_3,
    image, salary_entry, salary_mid, salary_senior
) VALUES (
    'Cybersecurity Analyst',
    'Protects systems and networks from digital attacks and unauthorized access.',
    'Monitor network traffic for suspicious activity.',
    'Conduct vulnerability assessments and penetration testing.',
    'Implement security measures to protect sensitive data.',
    'Strong understanding of network protocols and security technologies.',
    'Experience with security tools such as firewalls, intrusion detection systems, and antivirus software.',
    'Knowledge of programming languages such as Python, Java, or C++',
    'Excellent problem-solving and analytical skills',
    'Strong communication and teamwork abilities',
    'Bachelor's degree in Computer Science, Information Technology, or a related field',
    '2+ years of experience in cybersecurity or a related field',
    'Relevant certifications such as CISSP, CEH, or CompTIA Security+ are a plus',
    'images/cybersecurity_analyst.png',
    '$60,000',
    '$75,000',
    '$90,000'
);
INSERT INTO jobs (
    title, description,
    responsibilities_1, responsibilities_2, responsibilities_3, responsibilities_4, responsibilities_5,
    skill_1, skill_2, skill_3, skill_4, skill_5,
    education_1, education_2, education_3,
    image, salary_entry, salary_mid, salary_senior
) VALUES
(
    'Ethical Hacker',
    'Ethical hackers, or penetration testers, are hired to hack into systems and networks to find vulnerabilities before malicious hackers do.',
    'Perform penetration testing on systems and networks',
    'Discover and document vulnerabilities',
    'Provide recommendations for improving security posture',
    'Stay up-to-date with hacking tools and techniques',
    'Collaborate with IT teams to implement security measures',
    'Proficiency in Python, Java, or C++',
    'In-depth knowledge of hacking techniques and tools',
    'Familiarity with security frameworks and protocols',
    'Strong analytical and problem-solving skills',
    'Excellent communication and teamwork abilities',
    'Bachelor''s degree in Computer Science or IT',
    '2+ years experience in ethical hacking',
    'Certifications: CEH, OSCP, GPEN',
    'images/ethicalhacker.png',
    '$70,000 - $85,000',
    '$80,000 - $120,000',
    '$120,000 - $160,000'
),
INSERT INTO jobs (
    title, description,
    responsibilities_1, responsibilities_2, responsibilities_3, responsibilities_4, responsibilities_5,
    skill_1, skill_2, skill_3, skill_4, skill_5,
    education_1, education_2, education_3,
    image, salary_entry, salary_mid, salary_senior
) VALUES
(
    'Computer Forensic Analyst',
    'Investigates cybercrimes and recovers digital evidence from electronic devices.',
    'Collect and analyze digital evidence',
    'Preserve integrity of evidence',
    'Investigate cybercrimes and incidents',
    'Analyze evidence and report findings',
    'Stay current with forensic tools and techniques',
    'Understanding of computer systems and networks',
    'Experience with tools like EnCase, FTK, Autopsy',
    'Knowledge of data recovery and encryption',
    'Analytical and problem-solving skills',
    'Communication and teamwork',
    'Bachelor''s degree in Computer Science or IT',
    '2+ years in computer forensics',
    'Certifications: CCE, CFCE, EnCE',
    'images/computerforensicanalyst.png',
    '$60,000 - $75,000',
    '$70,000 - $100,000',
    '$100,000 - $120,000'
),
INSERT INTO jobs (
    title, description,
    responsibilities_1, responsibilities_2, responsibilities_3, responsibilities_4, responsibilities_5,
    skill_1, skill_2, skill_3, skill_4, skill_5,
    education_1, education_2, education_3,
    image, salary_entry, salary_mid, salary_senior
) VALUES
(
    'IT Security Engineer',
    'Designs and implements robust security systems to protect IT infrastructure.',
    'Design and implement security systems',
    'Monitor traffic for suspicious activity',
    'Manage firewalls, IDS/IPS, VPNs',
    'Conduct security audits and assessments',
    'Collaborate with IT teams',
    'Understanding of network protocols and systems',
    'Experience with security tools',
    'Knowledge of Python, Java, or C++',
    'Proficiency in OS and networking',
    'Strong communication and teamwork',
    'Bachelor''s degree in Computer Science or IT',
    '2+ years in IT security',
    'Certifications: CISSP, CISM, CEH',
    'images/itsecurity.png',
    '$70,000 - $85,000',
    '$80,000 - $120,000',
    '$120,000 - $160,000'
);
";
if (mysqli_query($conn, $insert_job)) {
    echo "Sample job data inserted successfully.<br>";
} else {
    echo "Error inserting sample data: " . mysqli_error($conn);
}

mysqli_close($conn);
    include 'footer.inc';
?>
</body>
</html>
