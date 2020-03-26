# By Manfred047
## [Website](https://laravel-quasar.manfred047.com/)

## Español

## Versiones
* Laravel 6.0
* Quasar 1.5.9

## Comandos
En el directorio raiz, ejecuta los siguientes comandos:

1. npm install
2. composer install
3. cp .env.example .env
4. cp .env.quasar.development.example .env.quasar.development
5. cp .env.quasar.development.example .env.quasar.production
6. Crear base de datos y configurarlo en el archivo `.env`
7. php artisan key:generate
8. php artisan migrate
9. php artisan passport:install
9.1 php artisan passport:client --password

10. https://packagist.org/packages/barryvdh/laravel-cors
"fruitcake/laravel-cors": "^1.0",

11. Add this to composser.json
  "repositories": [
    {
      "type": "composer",
      "url": "https://packagist.org"
    },
    {
      "packagist": false
    }
  ]

12. Run: composer update
  if not work:
  sudo sh -c "echo 'precedence ::ffff:0:0/96 100' >> /etc/gai.conf"

Copia los tokens generados (Password grant client) y agrega/actualiza las siguientes llaves en tu archivo .env:\
 `PASSWORD_GRANT_CLIENT_ID` \
 `PASSWORD_GRANT_CLIENT_SECRET`
 
 #### Asumiendo que todo esta configurado
 Comandos de desarrollo (trabajan con el CLI de Quasar).
 1. Modo dev: `npm run-script q-spa-dev`
 2. Compilación (producción): `npm run-script q-spa-build`
 
 #### Importante
 * El CLI de Quasar implementa el ESLint, asegurate de que tu entorno lea el archivo de configuración: `.eslintrc.js`
 * El modo SSR no está probado, solo el modo SPA.
 
 ## Valores de .env
 #### .env (de Laravel)
 1. `SESSION_DOMAIN`: Fija el dominio para las cookies.
 2. `SESSION_SECURE_COOKIE`: Establece si se envian las cookies de forma segura (https).
 3. `LANG_COOKIE_NAME`: Establece el nombre de la cookie de idiomas (se recomienda implementar desde js).
 4. `TOKEN_LIFE_TIME`: Establece el tiempo de vida de los tokens de API.
 
 #### .env.quasar.development | .env.quasar.production (de Quasar)
 1. `API_URL`: Url del api a la cual Axios enviará las peticiones.
 2. `AUTH_TOKEN_NAME`: Nombre de la variable que será almacenada en el storage (contiene el bearer token).
 3. `LANG_COOKIE_NAME`: Nombre de la cookie de idioma (javascript controla esta parte, valores "es, en").

## Configurar v-host
En esta actualización se trabaja con el CLI de Quasar, por lo cual se requiere configurar el v-host de apache

#### Xampp con Windows

1. Abrir "httpd-vhosts.conf" que está en: `"C:\xampp\apache\conf\extra"`
2. Agregar la siguiente información:
```
<VirtualHost *:80>
    ServerAdmin manfred@manfred047.com
    DocumentRoot "C:/xampp/htdocs/laravel-quasar/public"
    ServerName lq-test
    ServerAlias lq.test
</VirtualHost>
```

a2enmod headers

systemctl restart apache2

##### 3. Reiniciar Apache

#### Modificar archivo host en Windows
1. Ejecutar notepad como administrador.
2. Abrir el archivo `hosts`que esta en:
`C:\Windows\System32\drivers\etc`
3. Opcional: en caso de no ver el archivo `hosts` seleccione la opcion `todos los archivos`. 
4. Agregar los siguientes valores y guardar los cambios:
```
# LOCALHOST
127.0.0.1       localhost
::1             localhost

# Laravel Quasar
127.0.0.1       lq.test
::1             lq.test
```

## Documentación de Quasar
+ [Quasar Framework](https://quasar.dev/)

 ## Estructura de Quasar
 
 + Se conserva la estructura para el CLI, las carpetas estan en la raiz con los siguientes nombres:
 `src` y `src-ssr`
 
 # Laravel
 
#### Libreria Maestra para Laravel
##### Esta es una libreria de tipo Singleton static class

* Libreria maestra: "Master.php" en "App/Library/Master.php"

#### Middlewares
##### Api middlewares ("App/Http/Middleware").
##### Estos middlewares estan registrados en "App/Http/Kernel.php"

* "InjectGrantClientDetails.php"
* "VerifyGrantType.php"
* "VerifyAjaxRequest.php"

#### Router (Laravel Api)

* Api router: "api.php" en "routes/api/api.php" 
* Mapa de rutas (si maneja archivos individuales) en: "app/Providers/RouteServiceProvider.php"

##### Generar ID de aplicativo para obtener barer token 
1 - Ejecutar 9.1 para cada instancia de aplicativo que se vaya a utilizar para obtener:
php artisan passport:client --password

 What should we name the password grant client? [Laravel Quasar Framework Password Grant Client]:
 > 
Password grant client created successfully.
* "Client ID: 1"
* "Client secret: xekTJZU3jE8scq3TAWLDgb11zoIMzLnO9R1YVBX8"

2 - Executar POST para: "http://lq.test/api/v1/oauth/token" para obtener:
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...",
    "refresh_token": "def50200c5efaf9661c...",
    "user_data": {
        "id": 1,
        "email": "albertord84@gmail.com",
        "username": "alberto"
    }
}

2.1 Parametros para el Postman (Body.Params):
client_id:1
client_secret:xekTJZU3jE8scq3TAWLDgb11zoIMzLnO9R1YVBX8
username:alberto
password:12341234
grant_type:password

3 - Usar "access_token" no aplicativo que se ira a conectar en cada peticion al servidor



#

## Building APK

### Configure cordova for androis on linux
https://codeburst.io/configuring-cordova-for-android-development-on-linux-6ee4a28cd432

### downloas jdk 8
https://gist.github.com/hgomez/9650687
$ wget --no-cookies \
--no-check-certificate \
--header "Cookie: oraclelicense=accept-securebackup-cookie" \
http://download.oracle.com/otn-pub/java/jdk/8u241-b07/1f5b5a70bf22433b84d0e960903adac8/jdk-8u241-linux-x64.tar.gz

$ cd /usr/local
$ sudo mkdir java && cd java
$ sudo tar xzvf ~/Downloads/jdk-8u241-linux-x64.tar.gz

Add these two lines to the bottom of the file 
$ cd ~
$ vim .bashrc

export JAVA_HOME="/usr/local/java/jdk1.8.0_241"
PATH=$PATH:$JAVA_HOME/bin

$ source .bashrc
$ javac -version      # should print 'javac 1.8.0_***'


### Android Studio
https://developer.android.com/studio/index.html
Linux	commandlinetools-linux-6200805_latest.zip dwonload this

unzim into ~/Android/Sdk/
or copy the tools folder to  ~/Android/Sdk/

no Move back to the desired location, unzip the files, and execute the script.
no $ cd /usr/local
no $ sudo tar xzvf ~/Downloads/android-studio-ide-192.6241897-linux.tar.gz
no $ cd android-studio/bin
no $ ./studio.sh




The Android Studio Wizard will open and you can click Next on everything. Now, this one really is going to take a long time.
When the download finishes, click Finish. On the next screen click Configure > SDK Manager in the bottom right. 
Select the top three or four SDKs and then click next (you can choose less if you’re running low on storage).
Again, you’re going to wait. When it finishes, close the Android Studio window. This will also kill the terminal instance.
We are going to update ~/.bashrc again to add Android to the system path.

Add these three lines to the bottom of the file
$ cd ~
$ vim .bashrc
export ANDROID_HOME="$HOME/Android/Sdk"
PATH=$PATH:$ANDROID_HOME/tools
PATH=$PATH:$ANDROID_HOME/platform-tools

### Gradle
Install with:
$ sudo apt install gradle

### Cordova
Install with:
$ npm install -g cordova

#### Test Cordova
Create a new temporary Cordova project:
$ cordova create reqTest
$ cd reqTest
Add Android to the list of platforms:
$ cordova platform add android

Type one final command into the terminal:
$ cordova requirements

Correct response:
Android Studio project detected
Requirements check results for android:
Java JDK: installed 1.8.0
Android SDK: installed true
Android target: installed android-27,android-26
Gradle: installed /usr/share/gradle/bin/gradle

$ cd ..
$ rm -r reqTest


### Quasar cordova 
quasar dev -m cordova -T android

cordova platform add android

cordova build --release

### Testing APK

List devices:
adb devices

Run android:
cordova run android

### Building PWA
npm run-script q-pwa-dev

### Building APK
npm run-script q-apk-dev

### Building iOS
npm run-script q-ios-dev


## English

#### Coming soon
