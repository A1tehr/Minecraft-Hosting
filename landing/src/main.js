import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import i18n from './i18n'
import './assets/css/font.css'

const app = createApp(App);
app.use(i18n)
app.mount('#app');

// Initialize theme on app start - ONLY dark theme
document.documentElement.classList.add('dark')
document.documentElement.classList.remove('light')

// Remove any saved light theme preference
localStorage.removeItem('theme')
localStorage.setItem('theme', 'dark')
