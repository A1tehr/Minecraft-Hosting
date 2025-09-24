import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import i18n from './i18n'
import './assets/css/font.css'

const app = createApp(App);
app.use(i18n)
app.mount('#app');

// Initialize theme on app start
const savedTheme = localStorage.getItem('theme')
if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
  document.documentElement.classList.add('dark')
} else {
  document.documentElement.classList.add('light')
}
