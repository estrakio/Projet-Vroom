cd ..
docker build -t backendvroooom  ./docker
docker run -v %cd%:/var/www/html --rm -it -p 80:80 php:apache