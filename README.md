# User Management (CRUD) Web Application.
![image](https://github.com/xignp/laravel10-vue3-inertia-example/assets/51684013/e3d634ff-86c5-4186-88ee-900d80da8ba4)

To see other previews, look at the bottom.

## Features
- Laravel10
- Vue3
- Inertia
- Tailwind

- Authentication(Login/Register)
- View UserList(DB)
- Save User(DB)
- Edit User(DB)
- Delete User(DB)

## How to use

#### 1.Install packages
```
composer install
```

```
npm install
```

#### 2.Generate key
```
php artisan key:generate
```
you need create .env from .env.example if not exists .env file

#### 3.Edit DB config(.env)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YourDBName
DB_USERNAME=YourDBUserName
DB_PASSWORD=YourDBPassword
```

#### 4.Migration and Run Seeder
```
php artisan migrate
```

```
php artisan db:seed --class=DummyDataSeeder
```

DummyDataSeeder will generate user data(100 records)

#### 5.Run local server
```
php artisan serve
```

```
npm run dev
```

#### 6.Access page
```
http://127.0.0.1:8000/login
```

You can log in with the following information:
```
E-mail:
test@example.com
Password:
password 
```

## Preview
![image](https://github.com/xignp/laravel10-vue3-inertia-example/assets/51684013/a0ba25ab-e70c-44e1-ae94-f92280672301)
![image](https://github.com/xignp/laravel10-vue3-inertia-example/assets/51684013/fc053f71-648f-455c-a828-88b9004eb94b)



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
