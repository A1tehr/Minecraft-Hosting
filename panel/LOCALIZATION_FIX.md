# Исправление локализации в JavaScript файлах

## 🎯 Проблема
Локализация не работала в JS/React файлах - в браузере отображались только ключи переводов (например, `dashboard`, `admin`, `sign_out` вместо фактических переводов).

## 🔍 Корневая причина
В файле `/app/panel/resources/scripts/i18n.ts` использовался `i18next-multiload-backend-adapter` с опцией `allowMultiLoading: true`. Это приводило к тому, что i18next пытался загрузить все языки и namespace одним запросом, формируя неправильный URL:

```
/locales/ru+en/navigation+dashboard/account+dashboard/api+...+dashboard/index.json
```

Но Laravel контроллер `LocaleController` ожидает запросы по одному языку и одному namespace за раз:

```
/locales/locale.json?locale=ru&namespace=navigation
```

## ✅ Решение

### Изменения в `/app/panel/resources/scripts/i18n.ts`:

1. **Убран** `import I18NextMultiloadBackendAdapter from 'i18next-multiload-backend-adapter';`
2. **Изменено**: `.use(I18NextMultiloadBackendAdapter)` → `.use(I18NextHttpBackend)`
3. **Упрощена конфигурация backend**:
   ```typescript
   backend: {
       loadPath: '/locales/locale.json?locale={{lng}}&namespace={{ns}}',
       queryStringParams: { hash },
       allowMultiLoading: false,  // ← Ключевое изменение
   } as BackendOptions,
   ```

## 🧪 Как проверить исправление

### 1. Откройте браузер и перейдите на страницу приложения

### 2. Откройте консоль разработчика (F12)

### 3. Проверьте, что:
   - ✅ Нет ошибок типа `i18next::translator: missingKey`
   - ✅ Нет ошибок типа `failed parsing /locales/ru+en/...`
   - ✅ В консоли должно быть: `i18next: initialized`

### 4. Проверьте вкладку Network (Сеть)
   - ✅ Должны быть успешные запросы к `/locales/locale.json?locale=ru&namespace=navigation`
   - ✅ Должны возвращаться JSON ответы со статусом 200

### 5. Визуальная проверка
   - ✅ В навигационной панели должны отображаться переведенные тексты:
     - Русский: "Панель управления", "Администрирование", "Настройки аккаунта", "Выйти"
     - English: "Dashboard", "Admin", "Account Settings", "Sign Out"
   - ✅ На главной странице должны отображаться переведенные заголовки и тексты

## 📝 Дополнительная информация

### Смена языка вручную
Если нужно вручную сменить язык, выполните в консоли браузера:

```javascript
// Переключить на русский
window.i18n.changeLanguage('ru');

// Переключить на английский
window.i18n.changeLanguage('en');
```

Выбранный язык автоматически сохраняется в localStorage.

### Как работает автоопределение языка

1. Сначала проверяется localStorage (`i18nextLng`)
2. Если там нет сохраненного языка, определяется из настроек браузера
3. Поддерживаются только `en` и `ru`, по умолчанию `en`

## 🚀 Сборка проекта

После любых изменений в TypeScript/React файлах нужно пересобрать проект:

```bash
cd /app/panel

# Для разработки
yarn build

# Для production
yarn build:production
```

## 📋 Файлы, которые были изменены

1. `/app/panel/resources/scripts/i18n.ts` - основное исправление конфигурации i18next
2. `/app/panel/LOCALIZATION_GUIDE.md` - обновлена документация
3. `/app/panel/public/assets/` - пересобранные JavaScript файлы

## ⚠️ Примечание

Пакет `i18next-multiload-backend-adapter` остался в `package.json` (не удален), но больше не используется в коде. Его можно безопасно удалить, если нужно уменьшить размер зависимостей:

```bash
cd /app/panel
yarn remove i18next-multiload-backend-adapter
yarn build
```

Но это не обязательно - неиспользуемые пакеты не попадают в финальную сборку благодаря tree-shaking в webpack.
