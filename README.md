# Quasi Connectivity website

## Setup

- Install docker [documentation](https://docs.docker.com/install/linux/docker-ce/ubuntu/#set-up-the-repository)
- Make sure docker is running in rootless mode [documentation](https://docs.docker.com/install/linux/linux-postinstall/)
- Install docker-compose [documentation](https://docs.docker.com/compose/install/)
- :warning: **MAKE SURE .env IS SET UP CORRECTLY** or sail will create a broken database
    - Copy .env.example to .env for default config
        ```bash
        cp .env.example .env 
        ```
- Bootstrap sail
    - Install composer and dependencies 
        ```bash
        docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v $(pwd):/var/www/html \
            -w /var/www/html \
            laravelsail/php81-composer:latest \
            composer install --ignore-platform-reqs
        ```
- Create an alias for sail, that alias can be added to your `~/.bashrc` or `~/.zshrc` to have it on terminal startup
    -   ```bash
        alias sail='./vendor/bin/sail'
        ```
    -   ```bash
        echo "alias sail='./vendor/bin/sail'" >> ~/.bashrc
        source ~/.bashrc
        ```	
- Run sail
    ```bash
    sail up -d
    ```
- Run key generation
    ```bash
    sail artisan key:generate
    ```
- Run migration
    ```bash
    sail artisan migrate
    ```
- Run seeding
    ```bash
    sail artisan db:seed
    ```
- Run npm install
    ```bash
    sail npm install
    ```



