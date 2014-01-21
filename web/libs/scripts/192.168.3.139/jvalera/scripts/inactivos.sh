#!/bin/bash
php /home/jvalera/scripts/usuarios/inactivos.php | tee /home/jvalera/logs/inactivos_$(date +%d%m%y).log

