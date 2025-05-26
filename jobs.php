<?php
include 'settings.php';
$sql = "SELECT title, description, responsibilities, skills, education_experience, salary_range, image FROM jobs";
$result = $conn->query($sql);
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="apply.html">Services</a></li>
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
            
            <section>
            <aside class="jobsimage">
            <img src="images/cybersecurity_analyst.png" alt ="CloudSpire Technologies">
            </aside>

            <h2>Cybersecurity Analyst</h2>
            <p>Cybersecurity Analysts are responsible for monitoring and defending an organizations IT infrastructure from security threats. They assess vulnerabilities, implement security measures, and respond to potential breaches.</p>
            <h3>key Responsibilities</h3> 
                <ul>
                    <li>Monitor network traffic for suspicious activity</li>
                    <li>Conduct vulnerability assessments and penetration testing</li>
                    <li>Implement security measures to protect sensitive data</li>
                    <li>Respond to security incidents and breaches</li>
                    <li>Develop and maintain security policies and procedures</li>
                </ul>
           <h3>Required skills</h3>
                <ul>
                    <li>Strong understanding of network protocols and security technologies</li>
                    <li>Experience with security tools such as firewalls, intrusion detection systems, and antivirus software</li>
                    <li>Knowledge of programming languages such as Python, Java, or C++</li>
                    <li>Excellent problem-solving and analytical skills</li>
                    <li>Strong communication and teamwork abilities</li>
                </ul>
            <h3>Education and Experience</h3>
                <ul>
                    <li>Bachelor's degree in Computer Science, Information Technology, or a related field</li>
                    <li>2+ years of experience in cybersecurity or a related field</li>
                    <li>Relevant certifications such as CISSP, CEH, or CompTIA Security+ are a plus</li>
                </ul>
            <h3>Salary range</h3>
            <p>The salary for this position ranges from $70,000 to $90,000 per year, depending on experience and qualifications.</p>
                    <ul>
                        <li>Average Salary: $70,000 - $110,000 per year</li>
                        <li>Entry-level: $60,000 - $75,000 per year</li>
                        <li>Senior-level: $110,000 - $140,000 per year</li>
                    </ul>
            <a href="apply.html">Apply Now</a>
        </section>
        
        <section>
             <!-- The following job description for Ethical Hacker was generated using ChatGPT on 6 April 2025. 
         I chose this job type because it reflects my passion for ethical hacking and securing systems. -->
            <aside class="jobsimage">
            <img src="images/ethicalhacker.png" alt ="CloudSpire Technologies">
            </aside>
            <h2>Ethical Hacker</h2>
            <p>Ethical hackers, or penetration testers, are hired to attempt to hack into systems and networks to identify vulnerabilities before malicious hackers can exploit them. This role requires advanced knowledge of hacking techniques.</p>
            <h3>key Responsibilities</h3>
                <ul>
                    <li>Perform penetration testing on systems and networks</li>
                    <li>Discover and document vulnerabilities</li>
                    <li>Provide recommendations for improving security posture</li>
                    <li>Stay up-to-date with the latest hacking tools and techniques</li>
                    <li>Collaborate with IT teams to implement security measures</li>
                </ul>
            <h3>Required skills</h3>
                <ul>
                    <li>Proficiency in programming languages like Python, Java, or C++</li>
                    <li>In-depth knowledge of hacking techniques and tools</li>
                    <li>Familiarity with security frameworks and protocols</li>
                    <li>Strong analytical and problem-solving skills</li>
                    <li>Excellent communication and teamwork abilities</li>
                </ul>
            <h3>Education and Experience</h3>
                <ul>
                    <li>Bachelor's degree in Computer Science, Information Technology, or a related field</li>
                    <li>2+ years of experience in ethical hacking or a related field</li>
                    <li>Relevant certifications such as CEH, OSCP, or GPEN are a plus</li>
                </ul>
            <h3>Salary range</h3>
            <p>The salary for this position ranges from $80,000 to $120,000 per year, depending on experience and qualifications.</p>
                <ul>
                    <li>Average Salary: $80,000 - $120,000 per year</li>
                    <li>Entry-level: $70,000 - $85,000 per year</li>
                    <li>Senior-level: $120,000 - $160,000 per year</li>
                </ul>
            <a href="apply.html">Apply Now</a>
        </section>
        
        <section> 
         <!-- The following job description for Computer Forensic Analyst was generated using ChatGPT on 6 April 2025. 
         I chose this job type because I am interested in investigating cybercrimes and digital forensics. this mainly because i wanna go for forensics want to get more information about that. -->
            <aside class="jobsimage">
            <img src="images/computerforensicanalyst.png" alt ="CloudSpire Technologies">
            </aside>
            <h2>Computer Forensic Analyst</h2>
            <p>Computer Forensic Analysts investigate cybercrimes and recover digital evidence from electronic devices. They often collaborate with law enforcement to analyze and preserve evidence that can be used in court.</p>
            <h3>key Responsibilities</h3>
                <ul>
                   <li>Collect and analyze digital evidence from computers and networks</li>
                   <li>Preserve the integrity of evidence for legal proceedings</li>
                   <li>Investigate cybercrimes and digital incidents</li>
                   <li>Analyze evidence and provide reports for legal purposes</li>
                   <li>Stay current with the latest forensic tools and techniques</li>
               </ul>
            <h3>Required skills</h3>
                <ul>
                    <li>Strong understanding of computer systems and networks</li>
                    <li>Experience with forensic tools and techniques such as EnCase, FTK, or Autopsy</li>
                    <li>Knowledge of data recovery and encryption</li>
                    <li>Excellent analytical and problem-solving skills</li>
                    <li>Strong communication and teamwork abilities</li>
                </ul>
            <h3>Education and Experience</h3>
                <ul>
                    <li>Bachelor's degree in Computer Science, Information Technology, or a related field</li>
                    <li>2+ years of experience in computer forensics or a related field</li>
                    <li>Relevant certifications such as CCE, CFCE, or EnCE are a plus</li>
                </ul>
            <h3>Salary range</h3>
            <p>The salary for this position ranges from $70,000 to $100,000 per year, depending on experience and qualifications.</p>
                <ul>
                    <li>Average Salary: $70,000 - $100,000 per year</li>
                    <li>Entry-level: $60,000 - $75,000 per year</li>
                    <li>Senior-level: $100,000 - $120,000 per year</li>
                </ul>
            <a href="apply.html">Apply Now</a>
        </section>

        <section>
            <!-- The following job description for IT Security Engineer was generated using ChatGPT on 6 April 2025. 
         I chose this job type because I am passionate about designing and implementing secure IT systems. -->
         <aside class="jobsimage">
            <img src="images/Itsecurity.png" alt ="CloudSpire Technologies">
        </aside>
            <h2>IT Security Engineer</h2>
            <p>IT Security Engineers design and implement robust security systems to protect an organization's IT infrastructure. This includes developing security protocols, managing firewalls, and responding to security breaches.</p>
            <h3>key Responsibilities</h3>
                <ul>
                    <li>Design and implement security systems and protocols</li>
                    <li>Monitor network traffic for suspicious activity</li>
                    <li>Manage firewalls, intrusion detection/prevention systems, and VPNs</li>
                    <li>Conduct regular security audits and assessments</li>
                    <li>Collaborate with IT teams to improve security posture</li>
                    <li>Stay up-to-date with the latest security threats and technologies</li>
                </ul>
            <h3>Required skills</h3>
                <ul>
                    <li>Strong understanding of network protocols and systems administration</li>
                    <li>Experience with security tools such as firewalls, IDS/IPS, and VPNs</li>
                    <li>Knowledge of programming languages such as Python, Java, or C++</li>
                    <li>Proficiency in operating systems and networking protocols</li>
                    <li>Strong communication and teamwork abilities</li>
                </ul>
            <h3>Education and Experience</h3>
                <ul>
                    <li>Bachelor's degree in Computer Science, Information Technology, or a related field</li>
                    <li>2+ years of experience in IT security or a related field</li>
                    <li>Relevant certifications such as CISSP, CISM, or CEH are a plus</li>
                </ul>
            <h3>Salary range</h3>
            <p>The salary for this position ranges from $80,000 to $120,000 per year, depending on experience and qualifications.</p>
                <ul>
                    <li>Average Salary: $80,000 - $120,000 per year</li>
                    <li>Entry-level: $70,000 - $85,000 per year</li>
                    <li>Senior-level: $120,000 - $160,000 per year</li>
                </ul>
            <a href="apply.html">Apply Now</a>
        </section>
         <?php include("footer.inc"); ?>
</body>
</html>