export PGUSER=postgres
export PGPASSWORD=postgres
#pg_dump -i -h 192.168.3.92 -p 5432 -F c -b -v -f "/home/jhoan/respaldos/sima.backup" SIMA

pg_dump -i -h 192.168.3.43 -p 5432 -U postgres -F c -b -v -f "/home/jhoan/respaldos/sigefirrhh.backup" sigefirrhh

export PGUSER=postgres
export PGPASSWORD=..*t3l35ur*..
pg_dump -i -h 192.168.3.60 -p 5432 -F c -b -v -f "/home/jhoan/respaldos/telesur.backup" Telesur

export PGUSER=postgres
export PGPASSWORD=..*t3l35ur*..
pg_dump -i -h 192.168.3.139 -p 5432 -F c -b -v -f "/home/jhoan/respaldos/sait.backup" sait

cd /home/jhoan/respaldos/

#tar -zcvf sima_$(date +%d-%m-%y).tgz sima.backup
tar -zcvf sigefirrhh_$(date +%d-%m-%y).tgz sigefirrhh.backup
tar -zcvf telesur_$(date +%d-%m-%y).tgz telesur.backup
tar -zcvf sait_$(date +%d-%m-%y).tgz sait.backup

#borrar archivos con 30 dias de antiguedad
find /home/jhoan/respaldos/*.tgz -mtime +30 -exec rm {} \;


