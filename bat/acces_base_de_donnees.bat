@echo off
echo "BIENVENUE DANS LA BASE DE DONNEES DU SITE Leasing Vroooom"
docker exec -it  vroooom-db-1 bash -c "psql -U vroooom"