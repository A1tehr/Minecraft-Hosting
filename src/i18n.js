// src/i18n.js
import { createI18n } from 'vue-i18n'
import en from './locales/en.json'
import ru from './locales/ru.json'

// Читаем сохранённый язык или используем 'ru' по умолчанию
const savedLocale = localStorage.getItem('locale') || 'ru'

const i18n = createI18n({
    legacy: false,
    locale: savedLocale,
    fallbackLocale: 'en',
    messages: {
        en,
        ru
    }
})

// Сохраняем язык при изменении
i18n.global.locale.value = savedLocale
i18n.global.onBeforeLanguageSwitch = (oldLocale, newLocale) => {
    localStorage.setItem('locale', newLocale)
}

export default i18n