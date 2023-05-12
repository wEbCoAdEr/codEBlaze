![codEBlaze](https://github.com/wEbCoAdEr/codEBlaze/blob/master/public/logo.png)
# codEBlaze
codEBlaze is an open-source PHP web application development MVC framework designed for professional web application developers who require a lightweight, customizable, and scalable framework. Unlike many other frameworks, codEBlaze is easy to set up, intuitive to use, and does not rely on 3rd party resources or heavy dependencies.

## Installation

1.  Clone the repository by running the following command in your terminal or command prompt:
    
    `git clone https://github.com/wEbCoAdEr/codEBlaze.git` 
    
2.  After cloning the repository, a folder named `codEBlaze` will be created. This is the root directory of the framework, and contains three main folders:
    
    -   `app`: This folder contains all the application-specific code.
    -   `core`: This folder contains the framework's core files and libraries.
    -   `public`: This folder contains the publicly accessible files of your application.
3.  In codEBlaze, all requests are served from the `public` directory. The `index.php` and `.htaccess` files in this directory are used to handle all incoming requests. Therefore, you need to consider the `public` directory as the root directory for your web server. You can rename this directory to any name you want, but the overall directory structure of the framework should remain the same.
    
    For example, if your local web root directory is `/home/user/www`, and your `codEBlaze` directory is located in `/home/user/www/codEBlaze`, you should access your project via `http://localhost/codEBlaze/public`.
    
4.  In the development environment, you can run codEBlaze using the built-in PHP web server. Navigate to the `public` directory in the command line and run the following command to start the server:
    
    `cd /home/user/www/codEBlaze/public
    php -S localhost:420` 
    
    You can choose any available port that you want.
    

## Usage

codEBlaze is designed to be easy to use and highly customizable. You can modify and extend the framework to meet the specific needs of your application.

The framework offers the following features out-of-the-box:

-   **MVC Architecture:** codEBlaze follows the Model-View-Controller (MVC) architecture pattern, which separates the application logic, user interface, and data storage into three distinct components.
-   **Routing:** codEBlaze comes with a powerful routing system that allows you to easily define custom URL routes for your application.

The framework is currently in the development phase, and I am committed to achieving its full functionality as soon as possible.

## Contributing

We welcome contributions to the codEBlaze framework! If you would like to contribute, please follow the guidelines outlined in the `CONTRIBUTING.md` file.

## License

codEBlaze is open-source software licensed under the MIT license. Please see the `LICENSE` file for more details.
