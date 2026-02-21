TeamHub is a simplified collaborative project management tool, similar to Trello or Asana.  
Users can create teams, projects, tasks, assign tasks to members, and track status (To Do, In Progress, Done).

• Framework: CodeIgniter
• Database: MySQL
• Authentication: session-based

**Setup Instructions**

1. Clone the repo
git clone https://github.com/vrishanka/teamhub.git
cd teamhub

2.Install dependencies
Composer install

3. Create database
Run database_schema.sql in MySQL

4. Run the application
php spark serve


**Architecture Overview**
Folder structure 
/app
  /Controllers
    AuthController.php
    TeamController.php
    ProjectController.php
    TaskController.php
  /Models
    UserModel.php
    TeamModel.php
    TeamUserModel.php
    ProjectModel.php
    TaskModel.php
  /Views
    /auth
      login.php
      register.php
    /teams
      create.php
      show.php
    /projects
      create.php
      board.php
    layout.php


**ER Diagram:**

