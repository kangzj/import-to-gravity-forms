# ImportToGravityForms
I have a vps rent from linode.com on which the test will be done.
## Task 1：Set up an empty WordPress
- Download the latest stable release of wordpress(version 4.6)
- Make a directory and unzip the source code into it
- Chown of the directory to the www user (the one wich used by the web server)
- Create a database and grant all privileges to a user which will be used by wordpress
- Set up a virtual host on Nginx/Apache
- Install wordpress throughout the wizard
- Then you'll get a new wordpress blog
- Database operations are as follows, 
  mysql> create database adroit;
  mysql> grant all privileges on adroit.* to adroit@'localhost' identified by 'adroit!123';
  mysql> flush privileges;
  
## Task 2: Install plugins
- To install plugins in wordpress is easy. Go to the plugins tab and click add plugin. And one can install a plugin from local computer or wordpress plugins market.
- Install Gravity Forms, GravityView and GravityView Import Entries
- Gravity Forms and Gravity Views seems to be a commercial software but I found the source code on GitHub, kind of wired.
- And I didnot find GravityView Import Entries. I think this may be developed by ADROIT? :)

## Task 3: Create a simple report using GravityView based on Gravity Form entries. 
