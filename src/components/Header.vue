<template>
  <header class="text-white header">
    <div class="container d-flex justify-content-between align-items-center justify-content-center">
      <div>
        <h2 class="brand-name">Melenium</h2>
      </div>
      <div class="d-flex flex-row align-items-center topbar"
           :class="['topbar', isScrolled ? 'topbar-active' : 'topbar-unactive']"
      >
        <p class="mb-0 nav-item" @click="scrollToSection('home')">{{ t('navigation.home') }}</p>
        <p class="mb-0 nav-item" @click="scrollToSection('pricing')">{{ t('navigation.pricing') }}</p>
        <p class="mb-0 nav-item" @click="scrollToSection('features')">{{ t('navigation.features') }}</p>
        <p class="mb-0 nav-item" @click="scrollToSection('support')">{{ t('navigation.support') }}</p>
      </div>
      <div class="controls-section d-flex align-items-center gap-3">
        <!-- Theme Toggle -->
        <div class="theme-toggle" @click="toggleTheme" :title="isDark ? t('theme.light') : t('theme.dark')">
          <div class="toggle-switch" :class="{ 'dark': isDark }">
            <div class="toggle-circle">
              <svg v-if="isDark" class="icon" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
              </svg>
              <svg v-else class="icon" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="5"/>
                <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
              </svg>
            </div>
          </div>
        </div>
        
        <!-- Language Switcher -->
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
    </div>
  </header>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted} from 'vue'
import { useI18n } from 'vue-i18n'
import { useTheme } from '../composables/useTheme'

const { t, locale } = useI18n()
const { isDark, toggleTheme } = useTheme()

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

const scrollToSection = (sectionId) => {
  const element = document.getElementById(sectionId)
  if (element) {
    element.scrollIntoView({ behavior: 'smooth' })
  }
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
  z-index: 1000;
  padding: 1rem;
  transition: all 0.3s ease;
}

.brand-name {
  font-weight: 700;
  margin: 0;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.controls-section {
  gap: 1rem;
}

.theme-toggle {
  cursor: pointer;
  user-select: none;
}

.toggle-switch {
  width: 50px;
  height: 24px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  position: relative;
  transition: background 0.3s ease;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.toggle-switch.dark {
  background: rgba(0, 255, 136, 0.3);
}

.toggle-circle {
  width: 20px;
  height: 20px;
  background: white;
  border-radius: 50%;
  position: absolute;
  top: 1px;
  left: 1px;
  transition: transform 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.toggle-switch.dark .toggle-circle {
  transform: translateX(26px);
  background: #00ff88;
}

.toggle-circle .icon {
  width: 12px;
  height: 12px;
  fill: #333;
  stroke: #333;
  stroke-width: 1;
}

.toggle-switch.dark .toggle-circle .icon {
  fill: white;
  stroke: white;
}

.language-switcher .form-select {
  min-width: 120px;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.3);
  color: white;
}

.language-switcher .form-select option {
  background: #2a2a2a;
  color: white;
}

.topbar {
  background: rgba(83, 91, 242, 0.8);
  padding: 15px 35px;
  gap: 50px;
  transition: all 0.3s ease;
}

.nav-item {
  cursor: pointer;
  transition: color 0.3s ease;
  position: relative;
}

.nav-item:hover {
  color: #00ff88;
}

.nav-item::after {
  content: '';
  position: absolute;
  bottom: -5px;
  left: 0;
  width: 0;
  height: 2px;
  background: #00ff88;
  transition: width 0.3s ease;
}

.nav-item:hover::after {
  width: 100%;
}

.topbar-active, .topbar-unactive {
  -webkit-backdrop-filter: blur(20px);
  backdrop-filter: blur(20px);
}

.topbar-unactive {
  border-radius: 100px;
  border: 1px solid rgba(255, 255, 255, 0);
  background: transparent;
  box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0);
}

.topbar-active {
  border-radius: 100px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.1);
}

/* Light theme styles */
:global(.light) .header {
  color: #333;
}

:global(.light) .brand-name {
  background: linear-gradient(45deg, #0066cc, #0099ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

:global(.light) .topbar {
  background: rgba(255, 255, 255, 0.9);
  color: #333;
}

:global(.light) .nav-item {
  color: #333;
}

:global(.light) .nav-item:hover {
  color: #0066cc;
}

:global(.light) .nav-item::after {
  background: #0066cc;
}

:global(.light) .toggle-switch {
  background: rgba(0, 0, 0, 0.2);
  border: 1px solid rgba(0, 0, 0, 0.3);
}

:global(.light) .language-switcher .form-select {
  background: rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(0, 0, 0, 0.3);
  color: #333;
}

:global(.light) .language-switcher .form-select option {
  background: white;
  color: #333;
}
</style>