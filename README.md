## Установка и запуск приложения  


- **Laravel Framework** 12
- **PHP** 8
- **MySQLSQL** 16.8

## Шаги по установке

### 1. Клонирование репозитория

Для начала клонируйте проект с GitHub:

```bash
git clone https://github.com/Serega4x4/chat-api
```  
### 2. Установка зависимостей

Перейдите в директорию проекта:  
```bash
cd chat-api
```  

### 3. Создание .env файла

Скопируйте файл .env.example и создайте свой .env файл:  
```bash
cp .env.example .env
```  

### 4. Настройка базы данных

Откройте файл .env и настройте параметры подключения к вашей базе данных MySQL:  
```bash
DB_CONNECTION=mysql
DB_HOST=mysql-db
DB_PORT=3306
DB_DATABASE=chat_db
DB_USERNAME=root
DB_PASSWORD=СВОЙ_ПАРОЛЬ
```  
Замените *СВОЙ_ПАРОЛЬ* на пароль пользователя MySQL.  

Откройте файл docker-compose.yml и настройте параметры подключения к вашей базе данных MySQL:  
```bash
MYSQL_ROOT_PASSWORD: ТВОЙ_ПАРОЛЬ
```  
Замените *СВОЙ_ПАРОЛЬ* на пароль пользователя MySQL.  

### 5. Создаем Docker:  
```bash
docker-compose up -d --build
```  


Теперь вы можете перейти по адресу http://127.0.0.1:8000 и увидеть работу вашего приложения, которая перенаправит по ссылке http://127.0.0.1:8000/api/cars/available  



