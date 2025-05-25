<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device_width, height=device_height">
        <meta name="description" content="CloudSpire Technologies Application Form">
        <meta name="keywords" content="HTML5, information technology, IT, company, cloudspire,">
        <meta name="author" content="InfinteLoops">
        <link rel="stylesheet" type="text/css" href="styles/Project1.css">
        <title>CloudSpire Technologies | step towards your new life</title>
    </head>
    <body id="apply_body">
        <header id="apply_header">
            <h1>CloudSpire Technologies</h1>
            <!--menu to go to other pages of the website-->
            <nav id="apply_nav">
                <ul>
                    <li><a class="menu" href="index.html">Home</a></li>
                    <li><a class="menu" href="jobs.html">Jobs</a></li>
                    <li><a class="menu" href="about.html">About Us</a></li>
                </ul>
            </nav>
        </header>
        <main id="form_body">
            <!--sending the entered information to the below address-->
            <form action="process_eoi.php" method="POST" novalidate>
                <!--collects the personal information of the applicant-->
                <div id="applicant_details">
                    <h2>Applicant Details</h2>
                    <p><label for ="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" maxlength="20" pattern="[A-Za-z]+" title="Please enter a valid first name" required="required"><!--collects the first name of the applicant-->
                        <label for ="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" maxlength="20" pattern="[A-Za-z]+" title="Please enter a valid last name" required="required"><!--collect the last name of the applicant-->
                    </p>
                    <p><label for="dob">Date of Birth</label>
                        <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" title="date should be in dd/mm/yyyy format"><!--collect the date of birth of applicant-->
                    </p>
                    <fieldset id="gender"><!--collect the gender of applicant in terms of a radio input-->
                        <legend>Gender</legend>
                        <p>
                            <input type="radio" name="gender" id="male" value="male" required="required">
                            <label for="male">Male</label>
                        </p>
                        <p>
                            <input type="radio" name="gender" id="female" value="female" required="required">
                            <label for="female">Female</label>
                        </p>
                        <p>
                            <input type="radio" name="gender" id="other" value="other" required="required">
                            <label for="other">Other</label>
                        </p>
                        <p>
                            <input type="radio" name="gender" id="prefer_not" value="prefer_not" required="required">
                            <label for="prefer_not">Prefer not to say</label>
                        </p>
                    </fieldset>
                </div >
                <!--collects the address of the applicant-->
                <div id="applicant_address">
                    <h2>Applicant Address</h2>
                    <p>
                        <label for ="street_address">Street Address</label>
                        <input type="text" name="street_address" id="street_address" maxlength="40" required="required"><!--collect the street address of the applicant-->
                    </p>
                    <label for ="suburb">Suburb/Town</label>
                    <input type="text" name="suburb" id="suburb" maxlength="40" required="required"><!--collect the suburb or town of applicant-->
                    <p>
                        <label for="state">State</label>
                        <select name="state" id="state" required="required"><!--collect the state of the applicant out of the given options-->
                            <option value="">Please select your State</option>
                            <option value="act">ACT</option>
                            <option value="nsw">NSW</option>
                            <option value="nt">NT</option>
                            <option value="qld">QLD</option>
                            <option value="sa">SA</option>
                            <option value="tas">TAS</option>
                            <option value="vic">VIC</option>
                            <option value="wa">WA</option>
                        </select>
                    </p>
                    <label for ="postcode">Postcode</label>
                    <input type="text" name="postcode" id="postcode" pattern="\d{4}" title="Please enter a valid Postcode" required="required"><!--collect the postcode of the applicant-->
                </div>
                <!--collect the contact details of the applicant-->
                <div id="contact_details">
                    <h2>Contact Details</h2>
                    <label for ="email_address">Email Address</label>
                    <input type="email" name="email_address" id="email_address" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required="required"><!--collect the email adress of the applicant-->
                    <p>
                        <label for ="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" pattern="(\d\s?){8,12}" required="required"><!--collect the phone number of the applicant-->
                    </p>
                </div>
                <!--collect the job details the applicant wants-->
                <div id="job_details">
                    <h2>Job Details</h2>
                    <h3>Job Position</h3>
                    <select name="job_ref_no" id="job_ref_no" required="required"><!--collect the job reference number of the favored job position-->
                        <option value="">Please select your preferred Position</option>
                        <option value="cfa-2025-63">Computer Forensic Analyst(CFA-2025-63)</option>
                        <option value="css-2025-21">Cyber Security Specialist(CSS-2025-21)</option>
                        <option value="eha-2025-86">Ethical Hacker(EHA-2025-86)</option>
                        <option value="ise-2025-26">IT Security Engineer(ISE-2025-26)</option>
                    </select>
                    <br>
                    <!--this list was generated using chatGPT-->
                    <h3>Select the Technical Skills you're Familiar with:</h3><!--collect the technical skills the applicant has-->
                    <label><input type="checkbox" id="skill1" name="skill1" value="wireshark" checked><strong>Wireshark</strong> - Analyze and inspect network traffic</label>
                    <label><input type="checkbox" id="skill2" name="skill2" value="nmap"><strong>Nmap</strong> - Scan networks and detect open ports</label>
                    <label><input type="checkbox" id="skill3" name="skill3" value="burp_suite"><strong>Burp Suite</strong> - Test for web application vulnerabilities</label>
                    <label><input type="checkbox" id="skill4" name="skill4" value="basic_linux"><strong>Basic Linux Commands</strong> - Navigation, permissions, user management</label>
                    <label><input type="checkbox" id="skill5" name="skill5" value="win_security_basics"><strong>Windows Security Basics</strong> - File permissions, user roles, AD overview</label>                    
                    <label><input type="checkbox" id="skill6" name="skill6" value="basic_networking"><strong>Basic Networking</strong> - Understand TCP/IP, DNS, ports, VPN</label>
                    <label><input type="checkbox" id="skill7" name="skill7" value="firewall_rules"><strong>Firewall Rules & Access Control</strong> - Basic concepts of traffic control</label>
                    <label><input type="checkbox" id="skill8" name="skill8" value="siem_tools"><strong>SIEM Tools (e.g., Splunk)</strong> - Basic log searching and alerting</label>
                    <label><input type="checkbox" id="skill9" name="skill9" value="owasp_awareness"><strong>OWASP Top 10 Awareness</strong> - Common web security issues</label>
                    <label><input type="checkbox" id="skill10" name="skill10" value="incident_response_steps"><strong>Incident Response Steps</strong> - Know the phases of handling a security event</label>
                    <label><input type="checkbox" id="skill11" name="skill11" value="cloud_security_fundamentals"><strong>Cloud Security Fundamentals</strong> - Understand AWS/Azure basic security controls</label>
                    <label><input type="checkbox" id="skill12" name="skill12" value="python_powershell_scripting"><strong>Python or PowerShell Scripting</strong> - Write simple automation scripts</label>
                    <h3>Other Skills</h3>
                    <textarea name="other_skills" id="other_skills" rows="5" cols="40"></textarea><!--collect any other skills the applicant may have-->
                </div>
                <br>
                <input type="submit" value="Apply">
                <input type="reset" value="Reset form">
            </form>
        </main>
        <hr>
        <footer id="apply_footer">
            <p id="copyright">&copy; 2023 CloudSpire Technologies. All rights reserved.</p>
            <p id="follow_us">Follow us on:
                <a href="https://www.facebook.com/cloudspiretech">Facebook</a> |
                <a href="https://www.twitter.com/cloudspiretech">Twitter</a> |
                <a href="https://www.linkedin.com/company/cloudspiretech">LinkedIn</a>
            </p>
        </footer>
    </body>
</html>