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
        <!-- Modern Language Switcher with Flags -->
        <div class="language-switcher">
          <div class="language-dropdown" :class="{ 'active': showLanguageMenu }" @click="toggleLanguageMenu">
            <div class="current-language">
              <img :src="getCurrentFlag()" :alt="getCurrentLanguageName()" class="flag-icon">
              <span class="language-text">{{ getCurrentLanguageCode() }}</span>
              <svg class="dropdown-arrow" :class="{ 'rotated': showLanguageMenu }" viewBox="0 0 24 24">
                <path d="M7 10L12 15L17 10H7Z"/>
              </svg>
            </div>
            <div class="language-menu" v-if="showLanguageMenu">
              <div 
                v-for="lang in languages" 
                :key="lang.code" 
                class="language-option"
                :class="{ 'active': currentLocale === lang.code }"
                @click.stop="selectLanguage(lang.code)"
              >
                <img :src="lang.flag" :alt="lang.name" class="flag-icon">
                <span>{{ lang.name }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted, onBeforeUnmount} from 'vue'
import { useI18n } from 'vue-i18n'

const { t, locale } = useI18n()

// Список языков с флагами
const languages = [
  { 
    code: 'ru', 
    name: 'Русский', 
    flag: 'https://flagcdn.com/w40/ru.png'
  },
  { 
    code: 'en', 
    name: 'English', 
    flag: 'https://flagcdn.com/w40/gb.png'
  }
]

// Состояние меню языков
const showLanguageMenu = ref(false)
const currentLocale = ref(locale.value)

// Функции для работы с языком
const getCurrentFlag = () => {
  const lang = languages.find(l => l.code === currentLocale.value)
  return lang ? lang.flag : languages[0].flag
}

const getCurrentLanguageName = () => {
  const lang = languages.find(l => l.code === currentLocale.value)
  return lang ? lang.name : languages[0].name
}

const getCurrentLanguageCode = () => {
  return currentLocale.value.toUpperCase()
}

const toggleLanguageMenu = () => {
  showLanguageMenu.value = !showLanguageMenu.value
}

const selectLanguage = (langCode) => {
  currentLocale.value = langCode
  locale.value = langCode
  localStorage.setItem('locale', langCode)
  showLanguageMenu.value = false
}

// Закрытие меню при клике вне его
const closeLanguageMenu = (event) => {
  if (!event.target.closest('.language-dropdown')) {
    showLanguageMenu.value = false
  }
}

// При изменении языка извне
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
  document.addEventListener('click', closeLanguageMenu)
  handleScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  document.removeEventListener('click', closeLanguageMenu)
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

/* Modern Language Switcher */
.language-switcher {
  position: relative;
}

.language-dropdown {
  position: relative;
  cursor: pointer;
  user-select: none;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  padding: 8px 16px;
  transition: all 0.3s ease;
  min-width: 120px;
}

.language-dropdown:hover {
  background: rgba(255, 255, 255, 0.15);
  border-color: rgba(0, 255, 136, 0.5);
  transform: translateY(-1px);
}

.language-dropdown.active {
  background: rgba(0, 255, 136, 0.2);
  border-color: #00ff88;
}

.current-language {
  display: flex;
  align-items: center;
  gap: 8px;
  justify-content: space-between;
}

.flag-icon {
  width: 20px;
  height: 15px;
  object-fit: cover;
  border-radius: 2px;
  flex-shrink: 0;
}

.language-text {
  font-size: 0.9rem;
  font-weight: 500;
  color: white;
  flex-grow: 1;
}

.dropdown-arrow {
  width: 16px;
  height: 16px;
  fill: white;
  transition: transform 0.3s ease;
  flex-shrink: 0;
}

.dropdown-arrow.rotated {
  transform: rotate(180deg);
}

.language-menu {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: rgba(26, 26, 46, 0.95);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 12px;
  margin-top: 8px;
  overflow: hidden;
  animation: slideDown 0.3s ease;
}

.language-option {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px;
  cursor: pointer;
  transition: all 0.2s ease;
  color: white;
}

.language-option:hover {
  background: rgba(0, 255, 136, 0.1);
}

.language-option.active {
  background: rgba(0, 255, 136, 0.2);
  color: #00ff88;
}

.language-option:not(:last-child) {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
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
</style>