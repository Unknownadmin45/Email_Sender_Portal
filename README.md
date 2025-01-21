# Email_Sender_Portal

#### *Project Description*  
The *Email Sender Portal* is a web application that provides a seamless platform for composing and sending emails. Users can add recipient details, attach files, and customize messages in a user-friendly interface. The application integrates with Gmail to send emails and includes success notifications for smooth communication.

---

#### *Features*  
- *Compose Emails*: Add recipient address, subject, and custom messages.  
- *File Attachments*: Upload and attach files to your email.  
- *Seamless Integration*: Redirect to Gmail for email sending.  
- *Alerts and Notifications*: Get success alerts using SweetAlert2.  
- *Responsive Design*: Optimized for devices of all sizes.  

---

#### *Technologies Used*  
- *Frontend*: HTML5, CSS3, Bootstrap, JavaScript  
- *Backend*: PHP, PHPMailer (v6.9)  
- *Server*: XAMPP (Apache, MySQL)  

---

#### *Installation Instructions*  
1. Clone the repository:  
   bash
   git clone <repository-url>
     
2. Install and start XAMPP:  
   - Launch Apache and MySQL from the XAMPP Control Panel.  
3. Install PHPMailer using Composer:  
   bash
   composer install
     
4. Update the SMTP settings and email credentials in send_email.php.  
5. Place the project folder in the htdocs directory of XAMPP.  
6. Open the portal in your browser: http://localhost/<project-folder>.  

---

#### *Usage Instructions*  
1. Navigate to the Email Sender Portal.  
2. Fill out the recipient's email address, subject, and message.  
3. Attach files (optional).  
4. Click Send Email to process the request.  
5. Confirm the email delivery via the success alert.  

---

#### *Project Structure*  
- index.php: Main page for composing emails.  
- send_email.php: Backend logic for email sending.  
- composer.json and composer.lock: Manage PHPMailer dependencies.  

---

#### *Future Enhancements*  
- Add user authentication for secure access.  
- Support bulk email sending.  
- Integration with APIs for advanced email tracking.  
- Optimize SMTP configurations for performance.  

---

#### Credits
- Developers:
  - Harsh Ramdhani Mishra  
  - Ketan Rajendra Mande 
- *Frameworks and Libraries*: PHPMailer, Bootstrap, SweetAlert2  

---

#### *License*  
This project is licensed under the MIT License.
