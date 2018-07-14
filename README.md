# Load Balancing with Nginx and Docker (proof of concept)

Inspired by this article: https://www.sep.com/sep-blog/2017/02/28/load-balancing-with-nginx-and-docker/

Four containers with PHP 7.2 / Lumen / Swoole are started and load balanced by another container with NGINX configured as reverse proxy.

# Start 
    $ cd dockers
    $ docker-compose build
    $ docker-compose up --scale app=4
    
# Check    
    $ curl "http://localhost:80/"

Every container is initialized with a random number 1..10, thus invoking curl multiple times you should see different numbers returned depending on the container that receives the request.
    
# Stop
    $ docker-compose down
    
