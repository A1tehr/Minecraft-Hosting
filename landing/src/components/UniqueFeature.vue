<template>
  <section class="unique-feature-section section-transition">
<!--    <div class="decorative-elements">-->
<!--      <div class="glow-orb orb-1"></div>-->
<!--      <div class="glow-orb orb-2"></div>-->
<!--      <div class="floating-grid"></div>-->
<!--    </div>-->
    
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="feature-content animate-fade-in">
            <h2 class="section-title onest-bold">{{ t('unique_feature.title') }}</h2>
            <p class="section-subtitle">{{ t('unique_feature.subtitle') }}</p>
            
            <div class="features-grid">
              <div class="feature-item glass-effect" 
                   v-for="(feature, index) in features" 
                   :key="index"
                   :style="{ 'animation-delay': `${index * 0.2}s` }">
                <div class="feature-icon">
                  <component :is="feature.icon" />
                </div>
                <div class="feature-text">
                  <h4 class="feature-title onest-bold">{{ feature.title }}</h4>
                  <p class="feature-description">{{ feature.description }}</p>
                </div>
                <div class="feature-hover-effect"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="demo-container animate-slide-right">
            <div class="demo-window">
              <div class="window-header">
                <div class="window-controls">
                  <span class="control close"></span>
                  <span class="control minimize"></span>
                  <span class="control maximize"></span>
                </div>
                <div class="window-title">
                  <span class="title-icon">⚡</span>
                  Plugin Manager
                </div>
              </div>
              <div class="window-content">
                <div class="search-bar">
                  <svg class="search-icon" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>
                  </svg>
                  <input type="text" placeholder="Поиск плагинов..." class="search-input">
                </div>
                
                <div class="plugin-item" 
                     v-for="plugin in demoPlugins" 
                     :key="plugin.id" 
                     :class="{ 'installing': plugin.installing, 'installed': plugin.installed }">
                  <div class="plugin-info">
                    <div class="plugin-icon">{{ plugin.icon }}</div>
                    <div class="plugin-details">
                      <div class="plugin-name">{{ plugin.name }}</div>
                      <div class="plugin-description">{{ plugin.description }}</div>
                      <div class="plugin-stats">
                        <span class="stat">⭐ {{ plugin.rating }}</span>
                        <span class="stat">⬇ {{ plugin.downloads }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="plugin-actions">
                    <button 
                      class="install-btn" 
                      :class="{ 'installed': plugin.installed, 'installing': plugin.installing }"
                      @click="togglePlugin(plugin)"
                    >
                      <span v-if="plugin.installed">✓</span>
                      <span v-else-if="plugin.installing" class="spinner">⟳</span>
                      <span v-else>+</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const features = [
  {
    title: t('unique_feature.plugin_manager'),
    description: t('unique_feature.plugin_manager_desc'),
    icon: 'PluginIcon'
  },
  {
    title: t('unique_feature.donation_system'),
    description: t('unique_feature.donation_system_desc'),
    icon: 'DonationIcon'
  },
  {
    title: t('unique_feature.real_time_config'),
    description: t('unique_feature.real_time_config_desc'),
    icon: 'ConfigIcon'
  }
]

const demoPlugins = reactive([
  {
    id: 1,
    name: 'EssentialsX',
    description: 'Основные команды сервера',
    icon: '⚡',
    rating: '4.9',
    downloads: '12M+',
    installed: true,
    installing: false
  },
  {
    id: 2,
    name: 'WorldEdit',
    description: 'Редактирование мира',
    icon: '🔨',
    rating: '4.8',
    downloads: '8.5M+',
    installed: false,
    installing: false
  },
  {
    id: 3,
    name: 'Citizens',
    description: 'NPC система',
    icon: '👤',
    rating: '4.7',
    downloads: '3.2M+',
    installed: false,
    installing: false
  },
  {
    id: 4,
    name: 'Vault',
    description: 'Экономика и разрешения',
    icon: '💰',
    rating: '4.9',
    downloads: '15M+',
    installed: true,
    installing: false
  }
])

const togglePlugin = (plugin) => {
  if (plugin.installing) return
  
  if (plugin.installed) {
    plugin.installed = false
  } else {
    plugin.installing = true
    setTimeout(() => {
      plugin.installing = false
      plugin.installed = true
    }, 1500)
  }
}

onMounted(() => {
  // Добавляем анимации при скролле
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-fade-in')
      }
    })
  })

  const featureItems = document.querySelectorAll('.feature-item')
  featureItems.forEach(item => observer.observe(item))
})
</script>

<script>
// Icon components
const PluginIcon = {
  template: `
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M12 2L2 7l10 5 10-5-10-5z"/>
      <path d="M2 17l10 5 10-5"/>
      <path d="M2 12l10 5 10-5"/>
    </svg>
  `
}

const DonationIcon = {
  template: `
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
    </svg>
  `
}

const ConfigIcon = {
  template: `
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <circle cx="12" cy="12" r="3"/>
      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1 1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
    </svg>
  `
}

export default {
  components: {
    PluginIcon,
    DonationIcon,
    ConfigIcon
  }
}
</script>

<style scoped>
.unique-feature-section {
  padding: 120px 0;
  position: relative;
  overflow: hidden;
}

/* Decorative Elements */
.decorative-elements {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.glow-orb {
  position: absolute;
  border-radius: 50%;
  filter: blur(80px);
  animation: float 8s ease-in-out infinite;
}

.orb-1 {
  width: 300px;
  height: 300px;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.15), rgba(0, 204, 255, 0.1));
  top: 10%;
  right: -5%;
  animation-delay: 0s;
}

.orb-2 {
  width: 250px;
  height: 250px;
  background: linear-gradient(135deg, rgba(139, 95, 255, 0.1), rgba(83, 91, 242, 0.15));
  bottom: 20%;
  left: -10%;
  animation-delay: 4s;
}

.floating-grid {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: 
    radial-gradient(circle at 25% 25%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 75% 75%, rgba(139, 95, 255, 0.08) 0%, transparent 50%);
  background-size: 200px 200px;
  animation: gridShift 15s linear infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0) scale(1);
    opacity: 0.6;
  }
  50% {
    transform: translateY(-20px) scale(1.05);
    opacity: 0.8;
  }
}

@keyframes gridShift {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(200px, 200px);
  }
}

.section-title {
  font-size: 2.8rem;
  color: white;
  margin-bottom: 1.5rem;
  line-height: 1.2;
  background: linear-gradient(135deg, #ffffff, #00ff88);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.section-subtitle {
  font-size: 1.3rem;
  color: rgba(255, 255, 255, 0.85);
  margin-bottom: 3rem;
  line-height: 1.6;
}

.features-grid {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  position: relative;
  z-index: 2;
}

.feature-item {
  display: flex;
  align-items: flex-start;
  gap: 1.2rem;
  padding: 2rem;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  transition: all 0.4s ease;
  backdrop-filter: blur(20px);
  position: relative;
  overflow: hidden;
  transform: translateX(-30px);
  opacity: 0;
}

.feature-item:hover {
  transform: translateX(10px) scale(1.02);
  background: rgba(0, 255, 136, 0.05);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow:
    0 10px 30px rgba(0, 255, 136, 0.15),
    inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.feature-hover-effect {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg,
    transparent,
    rgba(0, 255, 136, 0.1),
    transparent);
  transition: left 0.6s ease;
}

.feature-item:hover .feature-hover-effect {
  left: 100%;
}

.feature-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  position: relative;
  box-shadow: 0 8px 20px rgba(0, 255, 136, 0.3);
}

.feature-icon::before {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 18px;
  z-index: -1;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.feature-item:hover .feature-icon::before {
  opacity: 0.5;
}

.feature-icon svg {
  width: 28px;
  height: 28px;
  color: white;
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.feature-text {
  flex: 1;
}

.feature-title {
  color: white;
  font-size: 1.3rem;
  margin-bottom: 0.8rem;
  font-weight: 700;
}

.feature-description {
  color: rgba(255, 255, 255, 0.75);
  font-size: 1rem;
  line-height: 1.6;
  margin: 0;
}

.demo-container {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 2;
}

.demo-window {
  width: 100%;
  max-width: 480px;
  background: rgba(15, 15, 25, 0.95);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 20px;
  overflow: hidden;
  box-shadow:
    0 25px 50px rgba(0, 0, 0, 0.5),
    0 0 0 1px rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(40px);
}

.window-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.2rem;
  background: linear-gradient(135deg, 
    rgba(30, 30, 40, 0.9), 
    rgba(45, 45, 55, 0.8));
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.window-controls {
  display: flex;
  gap: 0.6rem;
}

.control {
  width: 14px;
  height: 14px;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.2s ease;
}

.control:hover {
  transform: scale(1.1);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

.control.close { background: #ff5f56; }
.control.minimize { background: #ffbd2e; }
.control.maximize { background: #27ca3f; }

.window-title {
  color: white;
  font-weight: 600;
  font-size: 1rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.title-icon {
  font-size: 1.2rem;
}

.window-content {
  padding: 1.5rem;
  max-height: 350px;
  overflow-y: auto;
}

.search-bar {
  position: relative;
  margin-bottom: 1.5rem;
}

.search-input {
  width: 100%;
  padding: 0.8rem 1rem 0.8rem 2.5rem;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  color: white;
  font-size: 0.9rem;
  transition: all 0.3s ease;
}

.search-input:focus {
  outline: none;
  border-color: #00ff88;
  background: rgba(255, 255, 255, 0.08);
  box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
}

.search-input::placeholder {
  color: rgba(255, 255, 255, 0.5);
}

.search-icon {
  position: absolute;
  left: 0.8rem;
  top: 50%;
  transform: translateY(-50%);
  width: 16px;
  height: 16px;
  stroke: rgba(255, 255, 255, 0.4);
  stroke-width: 2;
  fill: none;
}

.plugin-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.2rem;
  margin-bottom: 1rem;
  background: rgba(255, 255, 255, 0.02);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 16px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.plugin-item:hover {
  background: rgba(255, 255, 255, 0.05);
  transform: translateY(-2px);
  border-color: rgba(255, 255, 255, 0.15);
}

.plugin-item.installing {
  background: rgba(0, 255, 136, 0.08);
  border-color: rgba(0, 255, 136, 0.25);
}

.plugin-item.installed {
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.3);
}

.plugin-info {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex: 1;
}

.plugin-icon {
  font-size: 1.6rem;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, 
    rgba(255, 255, 255, 0.08), 
    rgba(255, 255, 255, 0.04));
  border-radius: 12px;
  backdrop-filter: blur(10px);
}

.plugin-name {
  color: white;
  font-weight: 600;
  font-size: 1rem;
  margin-bottom: 0.2rem;
}

.plugin-description {
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.85rem;
  margin-bottom: 0.4rem;
}

.plugin-stats {
  display: flex;
  gap: 1rem;
}

.stat {
  color: rgba(255, 255, 255, 0.5);
  font-size: 0.75rem;
  display: flex;
  align-items: center;
  gap: 0.2rem;
}

.install-btn {
  width: 40px;
  height: 40px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.05);
  color: white;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
  position: relative;
}

.install-btn:hover {
  background: rgba(0, 255, 136, 0.15);
  border-color: #00ff88;
  transform: scale(1.05);
}

.install-btn.installed {
  background: rgba(0, 255, 136, 0.2);
  border-color: #00ff88;
  color: #00ff88;
}

.install-btn.installing {
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.3);
}

.spinner {
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Анимации */
.animate-fade-in {
  animation: fadeInUp 0.8s ease forwards;
}

.animate-slide-right {
  animation: slideInRight 1s ease forwards;
}

/* Responsive */
@media (max-width: 768px) {
  .section-title {
    font-size: 2.2rem;
  }
  
  .features-grid {
    gap: 1rem;
  }
  
  .feature-item {
    padding: 1.5rem;
  }
  
  .feature-item:hover {
    transform: translateX(5px) scale(1.01);
  }
  
  .demo-window {
    margin-top: 2rem;
  }
  
  .window-content {
    padding: 1rem;
    max-height: 300px;
  }
  
  .unique-feature-section {
    padding: 80px 0;
  }
}

/* Custom scrollbar для window-content */
.window-content::-webkit-scrollbar {
  width: 6px;
}

.window-content::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.05);
  border-radius: 3px;
}

.window-content::-webkit-scrollbar-thumb {
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 3px;
}
</style>