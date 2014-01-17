#!/bin/bash
php /home/jvalera/scripts/usuarios/usuarios.php | tee /home/jvalera/logs/usuario_$(date +%d%m%y).log

