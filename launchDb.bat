docker pull postgres
docker run --name bddPostGre -e POSTGRES_USER=estrakio -e POSTGRES_PASSWORD=bonjour -p 5432:5432 -v %cd%\postgres_data:/var/lib/postgresql/data --rm -it postgres 