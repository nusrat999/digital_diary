# Digital Diary app

This is a modern day journal to share your thoughts with others and see how others are thinking. It is a digital diary that puts no boundaries and keep all data for public to view. This was a university database project and demo of this app is available at this link:
https://drive.google.com/file/d/1ZsEZTMlH4XCiq0t-H_gBRK3XDMqPx6dW/view


![Alt text](/public/images/Digital_Diary.png "DigitalDiary")

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env


## Install Xampp
Install Xampp from https://www.apachefriends.org/index.html

- Run the Xampp installer and open the Xampp control panel
- Make sure that you enable the Apache and MySQL services
- On mac you need to click "Start" on the Home tab, "Enable" on the Network tab and "Mount" on the Location Tab. Click "Explore" on the location tab to open your Xampp/Lampp folder

## Install Composer
Go to https://getcomposer.org/download

- On Windows, download and run the installer
- On Mac, copy the php commands and run in the terminal. Then copy the mv command and run in terminal. You can also install composer with Homebrew

## Create a New Laravel Project With Composer

Open a terminal in the htdocs folder. htdocs is where all of your local projects go.

htdocs folder location:
- **Windows** - C:\Xampp\htdocs
- **Mac** - /opt/lampp/htdocs

```
composer create-project --prefer-dist laravel/laravel digital_diary
```
## Virtual Host Setup

We now need to create a virtual host for our project

## Edit Hosts File

- **Windows** - C:/Windows/System32/drivers/etc/hosts
- **Mac** - /etc/hosts

Add these lines

```
127.0.0.1	localhost
127.0.0.1	digital_diary.test

```

## Edit Virtual Hosts File

- **Windows** - C:/xampp/apache/conf/extra/httpd-vhosts.conf
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/digital_diary/public"
    ServerName digital_diary.test
 </VirtualHost>
```

- **Mac** - /opt/lampp/etc/extra/httpd-vhosts.conf
```
<VirtualHost *:80>
    DocumentRoot /opt/lampp/htdocs
    ServerName localhost
    ServerAlias www.localhost
</VirtualHost>


<VirtualHost *:80>
    DocumentRoot /opt/lampp/htdocs/digital_diary/public
    ServerName digital_diary.test
    ServerAlias www.digital_diary.test
</VirtualHost>
```

### Restart Apache with the Xampp panel

Now visit http://digital_diary.test ot htttp://digital_diary.test:8080 on Mac


### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```
### Manual

If migration does not work, please use below commands in Command Prompt and setup database manually.

```
mysql -u root
```
If your computer does not recognize mysql, then you will need to add mysql path in Environment Variables. Here is a how to video on that from YouTube:
https://www.youtube.com/watch?v=BB3v1K6TL5c
```
CREATE USER 'nusrat'@'localhost' IDENTIFIED BY 'password';
```
For password, it it recommeneded to use 'password'. If you are using different password then this, make sure to update the .env file of the project where it says 'DB_PASSWORD'.
```
GRANT ALL PRIVILEGES ON * . * TO 'nusrat'@'localhost';
```
```
FLUSH PRIVILEGES;
```
```
exit
```
```
mysql -u nusrat -p
```
```
CREATE DATABASE diaries;
```


### Seeding The Database
To add the dummy diariers with a single user, run the following
```
php artisan db:seed
```
or to refresh seed (This will delete everything and redo the seed. Not recommended for production database)
```
php artisan migrate:refresh --seed
```
### File Uploading
When uploading diary image, they go to "storage/app/public". Create a symlink with the following command to make them publicly accessible.
```
php artisan storage:link
```
If error occours on above command, delete the storage folder (if availabe) and rerun: 
C:\xampp\htdocs\digital_diary\public\storage

### Running Then App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```

