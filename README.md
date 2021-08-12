# Scraper Api to get all products from websites

This api will return json object will all products options in format:
```json
[
    {
        "Title": "Option 3600 Mins",
        "Description": "Up to 3600 minutes talk time per year including 480 SMS(5p / minute and 4p / SMS thereafter)",
        "Price": "£174.00",
        "Discount": "Save £18 on the monthly price"
    },
    {
        "Title": "Option 2000 Mins",
        "Description": "Up to 2000 minutes talk time per year including 420 SMS(5p / minute and 4p / SMS thereafter)",
        "Price": "£108.00",
        "Discount": "Save £12 on the monthly price"
    }
]
```

## RUN aplication 

### Requirements
* install docker from [Docker](https://docs.docker.com/)
* install git

### Steps to run application

1. pull this repo `git clone `
2. cd into project
3. run `docker-compose up -d --build`
4. run `docker exec -it php-8 bin/bash`
5. run `composer install` we need compser vendor folder

To run tests you need to be inside container and cd to app folder then run `php ./vendor/bin/phpunit`

To see outcome I'm using postman but if you using any other api that's fine just enter `http://localhost:8080/api/videx/products`
or you can go to [localhost](http://localhost:8080/api/videx/products)

To reuse on other webiste just create new controller and then create class ScraperPackage with https address of the website and set all paths to Title, Description, Price, Discount and just call `$scraperPackage->getScraperPackages($company, $pathNameOfProducts)` look at VidexController as example. 
