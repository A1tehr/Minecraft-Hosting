# Melenium Project

## Описание

Melenium - это современная платформа с красивым дизайном, состоящая из:
- **Landing Page** (Vue 3) - главная страница с современным дизайном
- **Admin Panel** (Laravel + React) - панель управления в стилистике landing'а

## Цветовая схема

- **Черный фон**: #000000, #1a1a1a, #0a0a0a
- **Голубые акценты**: #00baff, #0099cc, #66d9ff
- **Зеленые детали**: #00ff88, #00cc66
- **Белый текст**: #ffffff, #f0f0f0, rgba(255,255,255,0.9)

## Запуск через Docker

### Предварительные требования
- Docker
- Docker Compose

### Быстрый старт

1. **Клонируйте репозиторий**
   ```bash
   git clone <repository-url>
   cd melenium
   ```

2. **Настройте переменные окружения**
   ```bash
   # Для Laravel панели
   cp panel/.env.example panel/.env
   
   # Для Vue landing
   cp landing/.env.example landing/.env
   ```

3. **Запустите проект**
   ```bash
   docker-compose up -d
   ```

4. **Установите зависимости Laravel**
   ```bash
   docker-compose exec php-fpm composer install
   docker-compose exec php-fmp php artisan key:generate
   docker-compose exec php-fpm php artisan migrate
   ```

### Доступ к сервисам

- **Landing Page**: http://localhost
- **Admin Panel**: http://panel.localhost или http://admin.localhost
- **MySQL**: localhost:3306
- **Redis**: localhost:6379

### Структура проекта

```
/
├── docker/              # Docker конфигурация
│   ├── nginx/          # Nginx конфигурация
│   ├── php/            # PHP-FPM конфигурация
│   ├── node/           # Node.js конфигурация
│   └── mysql/          # MySQL конфигурация
├── landing/            # Vue 3 Landing Page
├── panel/              # Laravel Admin Panel
├── docker-compose.yml  # Docker Compose конфигурация
└── README.md          # Данная документация
```

## Разработка

### Разработка Landing Page (Vue 3)

```bash
cd landing
npm install
npm run dev
```

### Разработка Panel (Laravel + React)

```bash
cd panel

# Установка PHP зависимостей
composer install

# Установка Node.js зависимостей  
npm install

# Сборка фронтенда
npm run build:production

# Разработка фронтенда
npm run watch
```

## Сервисы Docker

### Nginx
- **Порт**: 80, 443
- **Конфигурация**: `/docker/nginx/`
- **Роль**: Reverse proxy для всех сервисов

### PHP-FPM  
- **Порт**: 9000
- **Версия**: PHP 8.2
- **Роль**: Laravel backend

### Node.js
- **Порты**: 3000 (Vue dev), 8080 (React dev)
- **Версия**: Node 18
- **Роль**: Сборка фронтенда

### MySQL
- **Порт**: 3306
- **База данных**: melenium_panel
- **Пользователь**: melenium_user

### Redis
- **Порт**: 6379
- **Роль**: Кеширование и сессии

## Полезные команды

### Docker
```bash
# Запуск всех сервисов
docker-compose up -d

# Остановка всех сервисов
docker-compose down

# Просмотр логов
docker-compose logs -f

# Пересборка образов
docker-compose build --no-cache
```

### Laravel
```bash
# Вход в контейнер PHP
docker-compose exec php-fpm bash

# Запуск миграций
docker-compose exec php-fpm php artisan migrate

# Очистка кеша
docker-compose exec php-fpm php artisan cache:clear
docker-compose exec php-fmp php artisan config:clear
docker-compose exec php-fpm php artisan view:clear
```

## Особенности дизайна

### Стилистика Melenium
- Темная тема с градиентными фоновыми
- Glassmorphism эффекты
- Анимации и переходы
- Звездный фон
- Современная типографика
- Эффекты свечения (glow)

### Компоненты
- Навигационная панель с градиентным логотипом
- Карточки серверов с glassmorphism
- Современные кнопки с эффектами
- Улучшенная прокрутка
- Адаптивный дизайн

## Лицензия

© 2024 Melenium. Все права защищены.