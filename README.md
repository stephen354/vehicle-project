-   HOW TO INSTALL -

1. Install Composer, Node.js : Please install latest version of Node.js from: https://nodejs.org
2. Copy laravel folder and extract to your suitable directory or folder
3. Open terminal or command prompt with installation directory/folder.
4. Install PHP dependencies: composer install
5. Create new .env file from copying .env.example
6. Generate laravel app key php artisan key:generate
7. Install node dependencies: npm install
8. Run command npm run dev to start vite development.
9. Run command npm run build to build for production.
10. Run command php artisan serve to start php server which will run laravel or if you are using other server apps like WAMP, XAMP or MAMP, you can follow that guide.
11. Run command php artisan migrate
12. Import Database

Database Version 8.0.39 MYSQL

Laravel Framework 10.48.22

-   MENU APP -

VEHICLE : Manage Vehicle
USERS : Manage User
APPROVAL PROCESS: Approval from the manager / superior.
VEHICLE ORDER : Vehicle reservation order

-   For Order -

1. Fill out the request form with required information, such as the purpose of use, rental date, and duration. (in Vehicle Order)
2. After submitting the form, the request is sent to the manager or supervisor for approval. (in Approval Procces)
3. The manager reviews the request to ensure that the vehicle use aligns with work needs and checks for vehicle availability.(can use Note for information)
4. If approved, the employee will receive a confirmation.

Email / Password : FOTO PNG email_pass.png

Database Name : monitor_project.sql
