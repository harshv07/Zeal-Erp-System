# Zeal-Erp-System

The College Management System is a comprehensive web application developed using HTML, CSS, JavaScript, PHP Laravel, Bootstrap, and other technologies. It provides various functionalities to efficiently manage different aspects of a college, including student information, communication, file sharing, social networking, and more.

## Features

The College Management System offers the following key features:

1. Landing Page: The landing page serves as the entry point to the application. It provides an overview of the system's capabilities and allows users to log in or register for an account.

2. Personal Dashboard: Once logged in, each user is presented with a personalized dashboard. The dashboard acts as a central hub for managing personal information, academic records, and other relevant data.

3. Chat Application with Hybrid Cryptography: The system includes a secure chat application that facilitates communication between students and faculty members. Hybrid cryptography techniques are employed to ensure the confidentiality and integrity of the exchanged messages.

4. Social Media App: The system includes a social media component similar to popular platforms like Instagram. Students can create profiles, post updates, share photos, follow other users, and engage with their peers within the college community.

5. Notes Section: The system incorporates a file directory system dedicated to notes. Students can upload their own notes, categorize them by subjects or courses, and share them with others. Additionally, users have the ability to browse and download notes uploaded by their peers.

6. Notice Board: The system features a real-time notice board where important announcements, events, and notices are displayed. This ensures that students and faculty members stay informed about the latest happenings in the college.

7. Multiple User Accounts: The system provides seven types of user accounts with different privileges and functionalities:

   - Super Admin: Has full control over the system, including the ability to create and delete any user account.
   - Admin: Manages student class/sections, view student marksheets, create and manage user accounts, exams, grades, subjects, notice board, and system settings.
   - Teacher: Manages their own class/section, exam records for their subjects, timetable (if assigned as a class teacher), profile, and uploads study materials.
   - Student: Views teacher profiles, own class subjects, marks, class timetable, payments, library and book status, notice board, and manages their own profile.
8. There are 4 types of user accounts. They include:

    Administrators (Super Admin & Admin)
    
    - Teacher
    - Student

## Account Functions
The College Management System provides different account types with specific functions and privileges to cater to various roles within the college. Here's an overview of the functions associated with each account type:

&#9675; **Super Admin**

The Super Admin is the highest authority in the system and possesses the following functions:

- Exclusive permission to delete any record within the system.
- Ability to create user accounts, granting access to the system.
- Complete control over system settings and configurations.
  
&#9675; **Administrators (Super Admin & Admin)**

Administrators, including both Super Admin and Admin accounts, have a range of functions, including:

- Management of student classes and sections.
- Access to students' mark sheets for evaluation and analysis.
- Creation, editing, and management of all user accounts and profiles.
- Creation, editing, and management of exams and grading systems.
- Creation, editing, and management of subjects offered in the college.
- Management of the school's notice board, with notices conveniently visible on the calendar within the dashboard.
- Editing system settings to customize the system to meet specific college requirements.
- Management of payments and fees.

&#9675; **Teacher**

Teachers play a crucial role in the educational process. Their functions include:

- Management of their respective classes and sections.
- Management of exam records for the subjects they teach.
- Timetable management, particularly if assigned as a class teacher.
- Access to their own profile, allowing them to update personal information.
- Uploading study materials for students' reference.
- 
&#9675; **Student**

Students have access to various functions and information related to their academic journey. These include:

- Viewing teacher profiles to gather information about their instructors.
- Accessing information about the subjects in which they are enrolled.
- Checking their own marks and class timetable.
- Viewing payments and fee-related details.
- Checking the availability and status of books in the library.
- Accessing the notice board and keeping up-to-date with school events through the calendar.
- Managing their own profile, updating personal information as needed.

## Installation

To set up the College Management System on your local machine, follow these steps:

1. Clone the repository:

   ```
   git clone https://github.com/your-username/college-management-system.git
   ```

2. Navigate to the project directory:

   ```
   cd college-management-system
   ```

3. Install the dependencies using Composer:

   ```
   composer install
   ```

4. Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary configuration details, such as the database credentials.

5. Generate an application key:

   ```
   php artisan key:generate
   ```

6. Run the database migrations to set up the required database tables:

   ```
   php artisan migrate
   ```

7. Seed the database with initial data:

   ```
   php artisan db:seed
   ```

8. After seeding, you can use the following login credentials for testing:

   | Account Type | Username | Email                      | Password |
   | ------------ | -------- | -------------------------- | -------- |
   | Super Admin  | cj       | cj@cj.com                  | cj       | 
   | Admin        | admin    | admin@admin.com            | cj       |
   | Teacher      | teacher  | teacher@teacher.com        | cj       |
   | Student      | student  | student@student.com        | cj       |

## Contributing

Contributions and suggestions for improvement are welcomed. If you would like to contribute, please submit a pull request with your proposed changes.

## Security Vulnerabilities

If you discover any security vulnerabilities within the College Management System, please contact CJ Inspired via email at cjay.pub@gmail.com. We take security seriously and will address any vulnerabilities promptly.

## Work-in-Progress

Please note that some sections of the project are still in the work-in-progress stage and will be updated soon. These include:

- Librarian/Accountant user pages.
- Library Management System.

We appreciate your patience as we continue to enhance these features.
