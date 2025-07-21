#Project: Student Portal System

Design and develop a basic student portal that allows:

<!-- New student registration -->

Collect user details (Name, Age, Email, Admission Number, Password)

Validate all inputs (server-side)

Store them securely in a MySQL database

<!-- Student login/logout system -->

Authenticate using email + password

Use password_hash() and password_verify()

Start a session on successful login

Redirect to a dashboard after login

<!-- Dashboard access -->

Show student’s info after login

Display only if session is active (protect route)

<!-- Logout functionality -->

Destroy session and redirect to login

<!-- 📦 Deliverables -->

Functional registration form with validation

Login page with proper session handling

Dashboard page (only accessible after login)

Logout mechanism

students table in MySQL to store records

<!-- 💡 Skills Tested -->

PHP form handling

MySQL CRUD (Create & Read)

Sessions & Auth

Hashing & security

Conditionals & redirects

<!-- 🔧 Bonus Challenges (Optional) -->

Show a list of all registered students (admin view)

Add client-side validation using JS

Prevent duplicate email or admission number

Implement a flash message system (e.g., login failed, logout success)
