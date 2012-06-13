Geekcamp.SG
===========

## Geekcamp.SG's code

The code could probably be used for other unconferences that allow for user submission and voting before the unconference happens. Making it open source so that others can use, but not customising alot because this is a bare MVP for Geekcamp.SG. So you'll probably need to hack abit of stuff to make it work for your unconference (Logos, partners, email-to address). 

Anyone wanting to submit pull requests are welcomed to do so :) Would appreciate if anyone spots security flaws to at least come forward and let me know about it too.

Stack: PHP/Codeigniter and MongoDB

MongoDB chosen because I already have a HA infrastructure for it readily available.

Setup
Required!
Edit the .htaccess file such that it points to your root dir

Optional
If you are using mongodb with username and passwords and replica sets. Edit correspondingly

**applications/config/custom_constants.php**

*  define('MONGO_DB_NAME',     'mongo db name'); 
*  define('MONGO_REPLICA_SET', 'replicaset name. if you are using replica sets');
*  define('MONGO_USERNAME',    'your mongo username');
*  define('MONGO_PASSWORD',    'your mongo password for your mongo db');
*  define('MONGO_CONNECTION', 'connect to your mongo instance');
*  define('MONGO_OPTIONS', array('db' => MONGO_DB_NAME, 'replicaSet' => MONGO_REPLICA_SET));

**applications/models/core_model.php**

edit the connection such that it fits your use case.

**applications/views/core.php**

change the logo and the title as per your needs.
and the partners too.


###Core code concepts walkthrough
####Models

All model classes connect to the database by first loading core_model, and running the connect_to_db() function.

All model classes have a function at the top, called choose_collection(). This function returns a MongoCollection (pardon me if I'm wrong, coding this while on holiday with no internet connection), which they get by calling the connect_to_db() in core_model. For the SQL peeps, it's the same as a table.

Once collection is chosen, you can start doing what you want with the collection.

Note! For writes to database that are very important, remember to call it with the fsync setting set to true. It has been done for all existing database writes.



####Views
core.php basically contains the skeleton of all the pages, and has a variable called $content that it echos. $content typically contains the contents of the page.

All the views are based on the Twitter Bootstrap framework.


####Controllers

3 main controllers, pages, user, admin

Pages displays all the public facing pages, including the talk submission page.

User handles all user registration functions. Hide user/signup() when you do not want new users by adding a '_' before the name of signup(). signup is deactivated by default.

Admin handles the admin backend, and allow users to edit existing talks.


####Custom libraries

User_lib and Hash_lib

Hasb_lib contains 1 function to generate a random string. This function is mainly used to generate the salt in the user password

User_lib contains is_logged_in to basically check if a existing user is logged in. is_admin() is not in use.