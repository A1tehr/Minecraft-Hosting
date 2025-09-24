<template>
  <div id="app">
    <Header />
    <BodyScene />
    <UniqueFeature />
    <PricingSection />
    <TestimonialsSection />
    <FAQSection />
    <Footer />
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import Header from './components/Header.vue'
import BodyScene from './components/BodyScene.vue'
import UniqueFeature from './components/UniqueFeature.vue'
import PricingSection from './components/PricingSection.vue'
import TestimonialsSection from './components/TestimonialsSection.vue'
import FAQSection from './components/FAQSection.vue'
import Footer from './components/Footer.vue'
import { useTheme } from './composables/useTheme'

const { isDark } = useTheme()

onMounted(() => {
  // Initialize theme on app load
  if (isDark.value) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.add('light')
  }
})
</script>

<style>
/* Global theme styles */
:root {
  --primary-color: #00ff88;
  --secondary-color: #00ccff;
  --accent-color: #535bf2;
}

.light {
  --primary-color: #0066cc;
  --secondary-color: #0099ff;
  --accent-color: #535bf2;
}

/* Smooth transitions for theme changes */
* {
  transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
}

/* Scrollbar styling */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1);
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
}

/* Light theme scrollbar */
.light ::-webkit-scrollbar-track {
  background: rgba(0, 0, 0, 0.1);
}

/* Selection styling */
::selection {
  background: var(--primary-color);
  color: white;
}

/* Focus outline styling */
*:focus {
  outline: 2px solid var(--primary-color);
  outline-offset: 2px;
}

/* Smooth scroll behavior */
html {
  scroll-behavior: smooth;
}

/* Loading animation keyframes */
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Utility classes */
.animate-fade-in {
  animation: fadeInUp 0.6s ease forwards;
}

.animate-pulse {
  animation: pulse 2s infinite;
}
</style>