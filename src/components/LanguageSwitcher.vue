<template>
  <div class="language-switcher">
    <button
        v-for="lang in languages"
        :key="lang.code"
        @click="switchLanguage(lang.code)"
        :class="{ active: currentLocale === lang.code }"
    >
      {{ lang.name }}
    </button>
  </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n'

const { locale } = useI18n()
const currentLocale = locale

const languages = [
  { code: 'en', name: 'English' },
  { code: 'ru', name: 'Русский' }
]

const switchLanguage = (lang) => {
  locale.value = lang
  localStorage.setItem('locale', lang)
}
</script>

<style scoped>
.language-switcher button {
  margin: 0 5px;
  padding: 5px 10px;
  cursor: pointer;
}

.language-switcher button.active {
  background: #007bff;
  color: white;
}
</style>