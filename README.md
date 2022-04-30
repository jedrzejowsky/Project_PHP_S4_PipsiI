# Project_PHP_S4_PipsiI
Projekt na Projektowanie i programowanie systemów internetowych, 4 semestr

# Installation

## 1. Clone repository
`git clone https://github.com/jedrzejowsky/Project_PHP_S4_PipsiI your_dir_name`

## 2. Move into directory you've created
`cd your_dir_name`

## 3. Install dependencies
`docker run --rm -v $(pwd):/app composer install`
### Change the ownership of directory to non root user
`sudo chown -R $USER:$USER your_dir_name`

## 4. Create .env file based on .env.example
`cp .env.example .env`

## 5. Run containers
`./vendor/bin/sail up`

## 6. Generate key
`./vendor/bin/sail artisan key:generate`
