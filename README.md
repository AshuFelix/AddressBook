# AddressBook
1. download project from github
2. Change to project Dir 
	$ cd AddressBook/
3. Run composer to install all dependencies 
	$ composer install 
4. Create a Database Directory 
	$ create dir /var/databases/ 
5. Prepared the Databse 
	$ php bin/console doctrine:migrations:migrate
6. Start the server
	$ php bin/console server:run
7. navigate to website and enjoy
	http://localhost:8000/address/book/

NOTE:
	The site is on debug mode, there you can see the server specifications
	this depends also on the different softwares you have install. 
	I develope this using "xampp-win32-7.0.33-0-VC14-installer" package