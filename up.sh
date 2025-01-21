php product-service/artisan serve --port=8000 & \
php price-service/artisan serve --port=8001 & \
php -S localhost:8002 -t shop-service/public