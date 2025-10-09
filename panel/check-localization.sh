#!/bin/bash

echo "========================================="
echo "ПРОВЕРКА ЛОКАЛИЗАЦИИ"
echo "========================================="
echo ""

echo "1. Проверка конфигурации i18n.ts..."
if grep -q "I18NextHttpBackend" /app/panel/resources/scripts/i18n.ts; then
    echo "   ✅ Используется I18NextHttpBackend"
else
    echo "   ❌ НЕ используется I18NextHttpBackend"
fi

if grep -q "load: 'currentOnly'" /app/panel/resources/scripts/i18n.ts; then
    echo "   ✅ Параметр load: 'currentOnly' установлен"
else
    echo "   ⚠️  Параметр load: 'currentOnly' не найден"
fi

if grep -q "allowMultiLoading" /app/panel/resources/scripts/i18n.ts; then
    echo "   ⚠️  Найден allowMultiLoading (должен быть удален или false)"
else
    echo "   ✅ allowMultiLoading не используется"
fi

echo ""
echo "2. Проверка собранных JavaScript файлов..."
if [ -f "/app/panel/public/assets/bundle.02aef580.js" ]; then
    SIZE=$(du -h /app/panel/public/assets/bundle.02aef580.js | cut -f1)
    echo "   ✅ Новый bundle найден: bundle.02aef580.js ($SIZE)"
else
    echo "   ❌ Новый bundle НЕ найден: bundle.02aef580.js"
fi

echo ""
echo "3. Проверка manifest.json..."
if grep -q "bundle.02aef580.js" /app/panel/public/assets/manifest.json; then
    echo "   ✅ Manifest содержит новый bundle"
else
    echo "   ❌ Manifest НЕ содержит новый bundle"
fi

echo ""
echo "4. Проверка файлов локализации..."
for lang in ru en; do
    for ns in navigation "dashboard/account" "dashboard/api" "dashboard/ssh" "dashboard/activity" "dashboard/index"; do
        file="/app/panel/resources/lang/${lang}/${ns}.php"
        if [ -f "$file" ]; then
            echo "   ✅ $file"
        else
            echo "   ❌ $file НЕ НАЙДЕН"
        fi
    done
done

echo ""
echo "5. Проверка роута локализации..."
if grep -q "locale.json" /app/panel/routes/base.php; then
    echo "   ✅ Роут локализации зарегистрирован"
else
    echo "   ❌ Роут локализации НЕ найден"
fi

echo ""
echo "========================================="
echo "ПРОВЕРКА ЗАВЕРШЕНА"
echo "========================================="
echo ""
echo "Следующие шаги:"
echo "1. Перезапустите Docker контейнеры: docker-compose restart"
echo "2. Очистите кэш браузера (Ctrl+Shift+R или Cmd+Shift+R)"
echo "3. Откройте приложение и проверьте консоль браузера (F12)"
echo ""
