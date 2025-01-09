# alex-interview-test
## Running the Docker Environment

To set up and run the Docker environment for this project, follow these steps:

### Prerequisites

Ensure you have the following installed on your system:
- Docker
- Docker Compose

### Steps

1. **Clone the repository**:
    ```sh
    git clone <repository-url>
    cd <repository-directory>
    ```

2. **Create a `.env` file**:
    Create a `.env` file in the root directory of the project with the following content:
    ```dotenv
    MYSQL_ROOT_PASSWORD=root_password
    MYSQL_DATABASE=wordpress
    MYSQL_USER=wordpress_user
    MYSQL_PASSWORD=wordpress_password
    ```
3. **Create config file for mysql**:
    ```sh
    cp mysql/my.cnf.example mysql/my.cnf
    ```
    Update the file with the following content:
    ```cnf
    [mysqld]
    collation-server = utf8mb4_unicode_ci
    character-set-server = utf8mb4
    ```
   
4. **Create config file for wordpress**:
    ```sh
    touch wordpress/wp-config.php
    ```
    Update the file with the following content:
    ```php
    <?php
    define( 'DB_NAME', 'wordpress' );
    define( 'DB_USER', 'wordpress_user' );
    define( 'DB_PASSWORD', 'wordpress_password' );
    define( 'DB_HOST', 'db' );
    define( 'DB_CHARSET', 'utf8mb4' );
    define( 'DB_COLLATE
    ```
   
5. **Create php config**:
    ```sh
    touch wordpress/php.ini
    ```
    Update the file with the following content:
    ```ini
    memory_limit = 256M
    upload_max_filesize = 64M
    post_max_size = 64M
    max_execution_time = 600
    max_input_time = 600
    ```

3. **Build and start the containers**:
    ```sh
    docker-compose up --build
    ```

4. **Access the application**:
    Open your web browser and navigate to `http://localhost:8080` to access the WordPress site.

### Stopping the Environment

To stop the Docker environment, run:
```sh
docker-compose down