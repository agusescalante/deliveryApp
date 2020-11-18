# deliveryApp TUPAR
![Laravel](https://github.com/agusescalante/deliveryApp/workflows/Laravel/badge.svg)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/c2112681b3784f2d8de49b12fc48e8d4)](https://app.codacy.com/gh/agusescalante/deliveryApp?utm_source=github.com&utm_medium=referral&utm_content=agusescalante/deliveryApp&utm_campaign=Badge_Grade)
[![codecov](https://codecov.io/gh/agusescalante/deliveryApp/branch/master/graph/badge.svg)](https://codecov.io/gh/agusescalante/deliveryApp)
![Static Code Analysis](https://github.com/agusescalante/deliveryApp/workflows/Static%20Code%20Analysis/badge.svg)
![Dusk Tests](https://github.com/agusescalante/deliveryApp/workflows/Dusk%20Tests/badge.svg)
![Deploy](https://github.com/agusescalante/deliveryApp/workflows/Deploy/badge.svg)
App prog. Web ll


[Deploy in heroku](https://deliveryapp-project.herokuapp.com/)

## Steps to run the project locally



### Install docker

For more information visit [Docker install ](https://docs.docker.com/engine/install/).


### Clone the repository

```bash
git clone https://github.com/agusescalante/deliveryApp.git
```

### Configuration
Create an .env file in the project, with the following environment variables.




- DB_CONNECTION=pgsql
- DB_HOST=database
- DB_PORT=5432
- DB_DATABASE=mydb
- DB_USERNAME=myuser
- DB_PASSWORD=thisisasecretpassword


 ### Composer install


In the project directory we need to install the dependencies, since in the repository they are ignored

```bash
sudo docker run --rm -v $ (pwd): / app composer install
```
 ### Generate key
We need to create a key in the .env file

```bash
php artisan key: generate
```
 ### Lift containers
```bash
docker-compose up -d
```
 
If everything went well, in the browser with the address localhost: 8080, we see the application 