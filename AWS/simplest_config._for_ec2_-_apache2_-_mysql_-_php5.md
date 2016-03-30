###Simplest Config. for EC2 - Apache2 - mySQL - PHP5

1. Create a new instance (preferrable Ubuntu 14.04) for this tutorial
2. Leave all default settings, except: for secruity group, you set rules for ssh(portal 22) and http(portal 80).
3. ssh your EC2 (Follow the instructions on AWS and you'll be fine)
4. First of all make sure your packages on Ubuntu are up to date:
> sudo apt-get update
5. Now install the necessary packages for our web hosting
> sudo apt-get install apache2 libapache2-mod-php5 php5 mysql-server mysql-php5

6. Enter the passcode you like for mySQL, after all packages are sucessfully installed, you can choose to reboot your EC2 instance.
> default for our project

7. To make sure apache server is working properly, restart
> sudo service apache2 restart
8. Install mysql
> mysql_secure_installation
9. Test if you can command into your mysql query
> mysql -u root -p
