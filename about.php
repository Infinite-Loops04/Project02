<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- Ensures proper rendering and touch zooming on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team behind Cloudspire Technologies</title>
  <link rel="stylesheet" type="text/css" href="styles/Project1.css">
</head>
<?php include("header.inc"); ?>
<body id="about_body">
  <!-- Introduction section with company description -->
  <section class="intro">
    <h1>We Are <span id="cloudspire">Cloudspire</span></h1> <!-- Heading with colored company name -->
    <p>Providing you the gateway to your next big gig.</p> <!-- Tagline -->
    <p id="about_welcome"> <!-- Limited width paragraph for readability, centered -->
        Welcome to Cloudspire, your ultimate destination for IT career advancement. We are a dedicated platform designed to connect innovative IT professionals with top-tier job opportunities through our partnership with Infinite Loops. Our mission is to empower tech enthusiasts to navigate their career paths with ease, by providing a user-friendly hub that features diverse job listings, valuable resources, and a supportive community. At Cloudspire, we believe in fostering talent and facilitating meaningful connections in the ever-evolving world of technology. Join us on your journey towards your next great gig!
    </p>
  </section>
  
  <!-- Leadership section showing team members -->
  <section class="leadership">
    <h2>Meet the <span id="infinte_loops">Infinite Loops</span></h2> <!-- Section heading with colored team name -->
    <div class="team-grid"> <!-- Grid container for team members -->
      <!-- Individual team member cards with images and names -->
      <div class="team-member">
        <img src="images/Ishita-01.png" alt="Ishita"> <!-- Placeholder image -->
        <h3>Ishita</h3> <!-- Team member name -->
      </div>
      <div class="team-member">
        <img src="images/Manroop-02.png" alt="Manroop"> <!-- Placeholder image -->
        <h3>Manroop</h3> <!-- Team member name -->
      </div>
      <div class="team-member">
        <img src="images/Viresh-03.png" alt="Viresh"> <!-- Team member image -->
        <h3>Viresh</h3> <!-- Team member name -->
      </div>
      <div class="team-member">
        <img src="images/Zainab-04.png" alt="Zainab"> <!-- Team member image -->
        <h3>Zainab</h3> <!-- Team member name -->
      </div>
    </div>
  </section>
  

  <main>
    
    <section class="about-intro">
        <h1>About Our Team</h1>           
        <ul class="student-id-list"> <!-- Sidebar with student information -->
            <li><strong>Group Name:</strong> Infinite Loops</li> <!-- Group name with bold label -->
            <li><strong>Class:</strong> Wednesday 4:30-6:30 pm</li> <!-- Class time with bold label -->
            <li><strong>Student IDs:</strong> <!-- Student IDs with nested list -->
                <ul>
                    <li>Ishita - 105517194</li> <!-- Individual student ID -->
                    <li>Manroop - 105534960</li> <!-- Individual student ID -->
                    <li>Viresh - 105910175</li> <!-- Individual student ID -->
                    <li>Zainab - 106087436</li> <!-- Individual student ID -->
                </ul>
            </li>
            <li><strong>Tutor:</strong> Rahul Raghavan </li> <!-- Tutor name with bold label -->
        </ul>
    </section>

    <!-- Team contributions section with definition list -->
    <section class="team-contributions">
        <h3>Team Contributions</h3> <!-- Section heading -->
        <dl id="contributors"> <!-- Definition list for team contributions -->
            <dt class="contributer_name">Manroop</dt> <!-- Team member name (term) -->
            <dd class="contribution">Developed the apply.html page with form validation, contributed to CSS styling for form elements</dd> <!-- Team member contribution (description) -->
            
            <dt class="contributer_name">Viresh</dt> <!-- Team member name (term) -->
            <dd class="contribution">Created the home page with company branding, implemented navigation menu and coordinated team meetings</dd> <!-- Team member contribution (description) -->
            
            <dt class="contributer_name">Ishita</dt> <!-- Team member name (term) -->
            <dd class="contribution">Developed the jobs.html page with detailed job descriptions, implemented semantic HTML structure</dd> <!-- Team member contribution (description) -->
            
            <dt class="contributer_name">Zainab</dt> <!-- Team member name (term) -->
            <dd class="contribution">Created the about.html page, managed Jira project tracking and designed the logo</dd> <!-- Team member contribution (description) -->
        </dl>
    </section>
    
    <!-- Team interests section with table and image -->
    <section class="team-interests">
        <h3>Our Interests & Skills</h3> <!-- Section heading -->
        
        <!-- Table showing team member interests and skills -->
        <table class="interests-table">
            <caption>Team Member Skills and Interests</caption> <!-- Table caption -->
            <thead> 
                <tr>
                    <th>Member</th> 
                    <th>Hobbies</th> 
                    <th>Career Goals</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Manroop</td> 
                    <td>Gaming, Photography</td> 
                    <td>Game Developer</td> 
                </tr>
                <tr>
                    <td>Viresh</td>
                    <td>Programming, Chess</td> 
                    <td>Full-stack Developer</td>
                </tr>
                <tr> <!-- Table row -->
                    <td>Ishita</td> <!-- Table cell with member name -->
                    <td rowspan="2">Travelling, Music</td> 
                    <td>Cybersecurity Analyst</td> 
                </tr>
                <tr> 
                    <td>Zainab</td>
                    <td>Software Engineer</td> 
                </tr>
            </tbody>
        </table>
        
        <!-- Figure containing team photo with caption -->
        <figure id="group_photo">
          <img src="images/Group-photo.png" alt="Group Photo"> <!-- Team photo with alt text -->
          <figcaption id="group_caption">Group Members (Left to Right): Manroop, Zainab, Ishita, and Viresh</figcaption> <!-- Caption identifying members -->
        </figure>
    </section>
    
    <!-- About section with project description -->
    <section class="about">
      <h2>A brief insight to our journey and the creation on this website</h2> <!-- Section heading -->
      <p>Cloudspire is an innovative web development project crafted by our dedicated team, Infinite Loops, under the guidance of Mr. Rahul. Our team comprises four talented individuals: Ishita, Viresh, Manroop, and Zainab, each contributing their unique skills to ensure a seamless collaboration. Ishita, serving as the project lead, has been key in initiating team discussions and fostering accountability, while also enhancing the visual aesthetics and developing the jobs.html page. Manroop, proficient in CSS, has focused on creating an engaging style.css and made significant contributions to the apply.html page, along with managing project pages on GitHub and Jira for effective teamwork. Viresh has laid the groundwork by creating a comprehensive blueprint of the project requirements, leading the development of the index.html page, and drafting the group agreement template. Lastly, Zainab has led the organization of scrum sprints and timelines on Jira, designed the logo for our website, and developed the about.html page. Together, our team has worked collaboratively to bring Cloudspire to life, showcasing our commitment to excellence and innovation in web development.</p> <!-- Detailed project description paragraph -->
      <p> In part 2 of the Project Viresh focused on modularising the website using PHP, included and developed the database connection settings to support dynamic content. Manroop created and structured the EOI (Expressions of Interest) table and implemented `process_eoi.php` to handle and validate application submissions with secure server-side logic. Zainab developed the HR manager interface through `manage.php`, enabling job application queries, updates, and secure login functionality, and also updated the team contribution section. Ishita implemented job descriptions dynamically from a MySQL database using PHP and documented additional feature enhancements in `enhancements.php`. Together, we brought Cloudspire to life with robust database interaction, form handling, and dynamic functionality, demonstrating our growth in full-stack web development.</p>
    </section>
  </main>
  
 <?php include("footer.inc"); ?>
</body>
</html>