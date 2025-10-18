# Laravel Boilerplate 🚀

A **production-ready Laravel Starter Kit with Docker support** built with **SOLID principles** and a clean architecture. 
This starter kit helps you kickstart scalable, maintainable applications with **best practices from day one**.  

---

## ✨ Features
- ✅ Pre-configured **SOLID architecture**
- ✅ Ready-to-use **Docker setup** for fast local development
- ✅ **Repository & Service layers** for clean code separation
- ✅ **DTOs & Transformers** for structured responses
- ✅ Ready-to-use **API scaffolding** 

---

## 📦 Installation
Clone the repository and set up your environment:  

```bash
git clone https://github.com/ArashAbedii/laravel-solid-boilerplate.git
cd laravel-solid-boilerplate
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 🐳 Development With Docker
This project is fully Dockerized. You don’t need PHP, Composer, MySQL, or Redis installed on your host 

### Start the containers
```bash
docker compose up -d --build
```
#### Containers included
```bash
app   → PHP-FPM (Laravel backend)
web   → Nginx (serves app on port 8080)
db    → MySQL 8.0
redis → Redis for cache/queue
```
### Install dependencies
```bash
docker compose exec app composer install
docker compose exec app npm install
docker compose exec app npm run dev
```
##### Always run Composer inside the container
```bash
docker compose exec app composer require vendor/package
```

---

## 🚀 Usage Example
Creating a new user using **Repository + DTO pattern**:

- App/Http/Controllers/UserController.php
```php
public function register(RegisterUserRequest $request)
{
    //prepare data object
    $data=new UserRegisterDTO(name:$request->name,email: $request->email,password:bcrypt($request->password));

    //use service
    $user=$this->authService->register($data);

    //transform data
    $user=new UserResource($user);

    //return response
    return ApiResponser::success($user);

}
```

## 🛠️ Tech Stack
- **Laravel 12**
- **PHP 8.2+**
- **SOLID Principles**
---


## 🤝 Contributing
Contributions are welcome!  

1. Fork the repo  
2. Create your feature branch (`git checkout -b feature/awesome-thing`)  
3. Commit your changes (`git commit -m 'Add awesome thing'`)  
4. Push to the branch (`git push origin feature/awesome-thing`)  
5. Open a Pull Request  
 

---

## 📜 License
This project is open-source and available under the [MIT License]().  

---

## 🌍 Connect
👨‍💻 Author: [Arash Abedi](https://linkedin.com/in/arash-abedi)  
⭐ GitHub: [@arashabedii](https://github.com/arashabedii)  

If you find this project useful, don’t forget to **give it a star ⭐** — it helps the project grow and supports open-source development.  
