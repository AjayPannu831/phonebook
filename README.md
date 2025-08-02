# 📞 Phonebook Web Application

A simple PHP-based phonebook application that allows users to **sign up**, view a **welcome screen**, and **add new contacts** to their personal phonebook stored in the system.

---

## 🚀 Features

- 🔐 User Signup & Login
- 🙋‍♂️ Welcome Screen After Login
- ➕ Add New Contacts
- 🗂️ Contact Storage in Database
- 🔓 Logout Functionality

---

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL (via XAMPP)
- **Local Server**: XAMPP (Apache & MySQL)

---

## 📂 Folder Structure

phonebook/
│
├── conponent/
│ ├── _connect.php # Database connection
│ └── _nav.php # Navigation bar
│
├── signup.php # User signup page
├── login.php # User login page
├── welcome.php # Welcome screen after login
├── profile.php # Add/view contacts
├── logout.php # Logout user
├── database.php # Contact database logic
└── README.md # Project documentation



---

## 🧑‍💻 How It Works

### First run database.php file

### 1. Sign Up

- New users must register using the **signup form**.
- Data is saved in the users table in MySQL.

### 2. Login

- Registered users log in via `login.php`.
- PHP sessions are used to track authenticated users.

### 3. Welcome Screen

- After login, the user is redirected to `welcome.php`.
- Displays a greeting and a link to manage contacts.

### 4. Add Contacts

- In `profile.php`, users can **add new contacts** (name, phone, email, etc.).
- These are stored in the database for that specific user.

### 5. Logout

- Ends the session and redirects the user to the login page.

---

## 🧪 Local Setup

1. **Clone the project** or place it in your `htdocs` folder:
   ```bash
   C:\xampp\htdocs\new_project\phonebook
