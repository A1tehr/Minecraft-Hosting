<template>
  <div id="app">
    <Header />
    <BodyScene />
    <div class="sections">
      <UniqueFeature />
      <PricingSection />
      <TestimonialsSection />
      <FAQSection />
    </div>

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

onMounted(() => {
  // Всегда устанавливаем темную тему (зафиксировано)
  document.documentElement.classList.add('dark')
  document.documentElement.classList.remove('light')
})
</script>

<style>
/* Global theme styles - только темная тема */
:root {
  --primary-color: #00ff88;
  --secondary-color: #00ccff;
  --accent-color: #8B5FFF;
  --background-primary: #000000;
  --background-secondary: #0d0d1a;
  --text-primary: #ffffff;
  --text-secondary: rgba(255, 255, 255, 0.8);
}

/* Smooth transitions for all elements */
* {
  //transition: background-color 0.4s ease, color 0.4s ease, border-color 0.4s ease, transform 0.3s ease;
}

/* Improved scrollbar styling */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(45deg, var(--secondary-color), var(--accent-color));
}

/* Enhanced selection styling */
::selection {
  background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
  color: white;
}

/* Better focus outline styling */
*:focus {
  outline: 2px solid var(--primary-color);
  outline-offset: 2px;
}

/* Smooth scroll behavior */
html {
  scroll-behavior: smooth;
}

/* Enhanced animation keyframes */
@keyframes pulse {
  0%, 100% { 
    opacity: 1; 
    transform: scale(1);
  }
  50% { 
    opacity: 0.7; 
    transform: scale(1.05);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-40px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(40px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

/* Utility classes for animations */
.animate-fade-in {
  animation: fadeInUp 0.8s ease forwards;
}

.animate-slide-left {
  animation: slideInLeft 0.8s ease forwards;
}

.animate-slide-right {
  animation: slideInRight 0.8s ease forwards;
}

.animate-pulse {
  animation: pulse 3s infinite;
}

/* Enhanced glassmorphism effects */
.glass-effect {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 16px;
}

.glass-effect:hover {
  background: rgba(255, 255, 255, 0.15);
  border-color: rgba(0, 255, 136, 0.5);
}

/* Improved glow effects */
.glow {
  box-shadow: 0 0 20px rgba(0, 255, 136, 0.3);
}

.glow:hover {
  box-shadow: 0 0 30px rgba(0, 255, 136, 0.5);
}

.sections {
  background-image: linear-gradient(
      180deg,
      hsl(0deg 0% 0%) 1%,
      hsl(245deg 20% 12%) 62%,
      hsl(245deg 49% 20%) 80%,
      hsl(245deg 74% 20%) 91%,
      hsl(245deg 84% 17%) 97%,
      hsl(246deg 94% 14%) 100%
  );
}
</style>