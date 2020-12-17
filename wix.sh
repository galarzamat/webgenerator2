echo "==> iniciando"

mkdir $1

echo cat > $1/index.php 

mkdir $1/css

mkdir $1/css/user

echo cat > $1/css/user/estilo.css

mkdir $1/css/admin
 
echo cat > $1/css/admin/estilo.css 

mkdir $1/img
mkdir $1/img/avatars 

mkdir $1/img/buttons

mkdir $1/img/products 

mkdir $1/img/pets

mkdir $1/js
 
mkdir $1/js/validations 

echo cat > $1/js/validations/login.js 

echo cat > $1/js/validations/register.js 

mkdir $1/js/effects

echo cat > $1/js/effects/panels.js 

mkdir $1/tpl

echo cat > $1/tpl/main.tpl 

echo cat > $1/tpl/login.tpl
 
echo cat > $1/tpl/register.tpl 

echo cat > $1/tpl/panel.tpl
 
echo cat > $1/tpl/profile.tpl
 
echo cat > $1/tpl/crud.tpl 

mkdir $1/php
 
echo cat > $1/php/create.php
 
echo cat > $1/php/read.php 

echo cat > $1/php/update.php 

echo cat > $1/php/delete.php
 
echo cat > $1/php/dbconect.php

echo $2 | cat > index.php

echo "==> finalizando"