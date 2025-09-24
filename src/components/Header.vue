<template>
  <header class="text-white header">
    <div class="container d-flex justify-content-between align-items-center justify-content-center">
      <div>
        <h2>Melenium</h2>
      </div>
      <div class="d-flex flex-row align-items-center topbar"
           :class="['topbar', isScrolled ? 'topbar-active' : 'topbar-unactive']"
      >
        <p class="mb-0">Главная</p>
        <p class="mb-0">Test</p>
        <p class="mb-0">Test</p>
        <p class="mb-0">Test</p>
      </div>
      <div class="language-switcher">
        <label for="lang-select" class="form-label text-white me-2 mb-0">
          {{ t('language.label') }}
        </label>
        <select
            id="lang-select"
            v-model="currentLocale"
            class="form-select form-select-sm d-inline-block w-auto"
            @change="switchLanguage"
            aria-label="Выберите язык"
        >
          <option v-for="lang in languages" :key="lang.code" :value="lang.code">
            {{ lang.name }}
          </option>
        </select>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted} from 'vue'
import { useI18n } from 'vue-i18n'
const { t, locale } = useI18n()

// Список языков
const languages = [
  { code: 'en', name: 'English' },
  { code: 'ru', name: 'Русский' }
]

// Реактивная переменная для v-model
const currentLocale = ref(locale.value)

// При изменении языка через select
const switchLanguage = () => {
  locale.value = currentLocale.value
  localStorage.setItem('locale', currentLocale.value)
}

// Если язык изменён извне (например, в другом компоненте) — обновляем select
watch(locale, (newLocale) => {
  currentLocale.value = newLocale
})

const isScrolled = ref(false)

const handleScroll = () => {
  isScrolled.value = window.scrollY > 0
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll)
  // Инициализируем состояние при монтировании
  handleScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})

</script>

<style scoped>
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000; /* чтобы был поверх контента */
  padding: 1rem;
}
.language-switcher .form-select {
  min-width: 120px;
}
.topbar {
  background: #535bf2;
  padding: 15px 35px;
  gap: 50px;
}
.topbar-active, .topbar-unactive {
  -webkit-backdrop-filter: blur(20px);
  backdrop-filter: blur(20px);
}
.topbar-unactive {
  border-radius: 100px;
  border: 1px solid var(--stroke, hsla(0, 0%, 100%, 0));
  background: transparent;
  box-shadow: 0 0 20px 0 hsla(0, 0%, 100%, 0);
  backdrop-filter: blur(20px);
}
.topbar-active {
  border-radius: 100px;
  border: 1px solid var(--stroke, hsla(0, 0%, 100%, .2));
  background: rgba(0, 0, 0, .1);
  box-shadow: 0 0 20px 0 hsla(0, 0%, 100%, .1);
}
</style>