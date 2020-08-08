# codEBlaze
codEBlaze is an open-source PHP web application development MVC framework. This framework is developed for professional web application developers who don't want to be very dependent on other frameworks or 3rd party resources for their projects which are heavy, large, and not easy to customize. codEBlaze is simple, powerful, easy to customize, and scalable. 

# Installation
1) Clone the repository by running the following command
git clone https://github.com/wEbCoAdEr/codEBlaze.git

2) After cloning the repository a folder named codEBlaze will be created and that is the folder of codEBlaze.
There you will get three folders listed below
app 
core
public

3) In codEBlaze all the requests are served from the public directory where the index.php and .htaccess file is located.
The public folder is like your web hosting public_html dir. So in order to run codEBlaze or your codEBlaze project,
you need to consider the public dir as your project root directory for the web server from where all the requests will
be served by the web server. you can rename the public dir to any name. Bt the overall directory strcuture of the 
framework should be same as the default. Suppose your local web root dir is /home/user/www. If your codEBlaze path is
/home/user/www/codEBlaze then you might consider that if you access http://localhost/codEBlaze then codEBlaze will run.
But as I said earlier that all the requests are handled from the public dir so you need to navigate public dir in order
to run codEBlaze. So now if you go to http://localhost/codEBlaze/public then you will see the codEBlaze successful 
installation page. So we can understand that the public folder is the root of the codEBlaze. 

4) In the development environment you can run codEBlaze by built in PHP webserver. Navigate to the codEBlaze public dir
in the command-line. 
cd /home/user/www/codEBlaze/public
then run the following command which will start the server which will serve from the codEBlaze public directory
php -S localhost:420
You can set any available port according to your wish. 


