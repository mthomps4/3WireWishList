# 3WireWishList
A resource wish list for woodworking (Books, Tools, Other)

## Instructions to Run
### Pull Folder and Create Root
Move folder to root or change DocumentRoot in Apache Httpd.config.


Changed Apache Document Root for local testing

> DocumentRoot: The directory out of which you will serve your documents. By default, all requests are taken from this
directory, but symbolic links and aliases may be used to point to other locations.

> DocumentRoot "C:/xampp/htdocs/3WireWishList"

### PHPMyAdmin Load SQL Data
Connect to localhost/PHPMyAdmin
- Select Import
- Choose File
- Navigate to 3WireWishList/Inc/seed.sql
- Click "GO"

A new database should be created labeled "3wirewish"
Within this database are two tables: admin-user and wishlist.

### Admin-User Table
The application uses an Admin Dashboard for all 'CRUD' like features. You may add a new username and password to this table or simply use the default 'Admin' 'Password' for local testing.

### Wishlist Table
This is where all data lies for the wish list application.
- Name (STRING)
- TYPE (STRING)
  - Books
  - Tools
  - Other
- IMAGE(STRING) -- Image URL .com/image.jpg
- URL (STRING) -- Source URL Website
- PRICE (DECIMAL)
- SOURCE (STIRNG) -- Maker/Author
- NOTES (TEXT)
- OBTAINED (BOOL)

### Updating SQL Credentials
You will need to create a database-specific user for the database '3wirewish'.
- Click on the database name
- Click 'Privileges'
- Add User Account

Here you will create a username, set host name to localhost, and generate a password.

These credentials will be entered into the file located in ../inc/credentials.php.

### Test Run
If all went well.
Navigate to localhost/ and have a test run.

- Home (User View and Sort)
- Details (User View)
- Admin Login -- Pages below check for session 'logged_in'
  - Admin Dashboard
  - Edit (Per Id)
  - Delete (Confirmation Delete by Id)
  - Add Item
  - Logout

> *Amount of Dashboard information available changes based on screen resolution (Desktop1, Desktop2, Tablet, Phone)*



![Desktop Image](https://github.com/mthomps4/3WireWishList/blob/master/inc/TestShot.PNG?raw=true)
