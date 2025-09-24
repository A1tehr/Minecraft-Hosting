<template>
  <section class="unique-feature-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="feature-content">
            <h2 class="section-title onest-bold">{{ t('unique_feature.title') }}</h2>
            <p class="section-subtitle">{{ t('unique_feature.subtitle') }}</p>
            
            <div class="features-grid">
              <div class="feature-item" v-for="(feature, index) in features" :key="index">
                <div class="feature-icon">
                  <component :is="feature.icon" />
                </div>
                <div class="feature-text">
                  <h4 class="feature-title onest-bold">{{ feature.title }}</h4>
                  <p class="feature-description">{{ feature.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="demo-container">
            <div class="demo-window">
              <div class="window-header">
                <div class="window-controls">
                  <span class="control close"></span>
                  <span class="control minimize"></span>
                  <span class="control maximize"></span>
                </div>
                <div class="window-title">Plugin Manager</div>
              </div>
              <div class="window-content">
                <div class="plugin-item" v-for="plugin in demoPlugins" :key="plugin.id" :class="{ 'installing': plugin.installing }">
                  <div class="plugin-info">
                    <div class="plugin-icon">{{ plugin.icon }}</div>
                    <div class="plugin-details">
                      <div class="plugin-name">{{ plugin.name }}</div>
                      <div class="plugin-description">{{ plugin.description }}</div>
                    </div>
                  </div>
                  <div class="plugin-actions">
                    <button 
                      class="install-btn" 
                      :class="{ 'installed': plugin.installed, 'installing': plugin.installing }"
                      @click="togglePlugin(plugin)"
                    >
                      <span v-if="plugin.installed">✓</span>
                      <span v-else-if="plugin.installing">⟳</span>
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
import { ref, reactive } from 'vue'
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
    installed: true,
    installing: false
  },
  {
    id: 2,
    name: 'WorldEdit',
    description: 'Редактирование мира',
    icon: '🔨',
    installed: false,
    installing: false
  },
  {
    id: 3,
    name: 'Citizens',
    description: 'NPC система',
    icon: '👤',
    installed: false,
    installing: false
  },
  {
    id: 4,
    name: 'Vault',
    description: 'Экономика и разрешения',
    icon: '💰',
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
      <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
      <rect x="2" y="9" width="4" height="12"/>
      <circle cx="4" cy="4" r="2"/>
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
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(25, 31, 55, 0.9) 0%, rgba(13, 17, 60, 0.8) 100%);
  position: relative;
  overflow: hidden;
}

.unique-feature-section::before {
  content: '';
  position: absolute;
  top: 20%;
  right: -10%;
  width: 300px;
  height: 300px;
  background: linear-gradient(45deg, rgba(0, 255, 136, 0.1), rgba(83, 91, 242, 0.1));
  border-radius: 50%;
  filter: blur(100px);
}

.section-title {
  font-size: 2.5rem;
  color: white;
  margin-bottom: 1rem;
  line-height: 1.2;
}

.section-subtitle {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.8);
  margin-bottom: 3rem;
  line-height: 1.6;
}

.features-grid {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.feature-item {
  display: flex;
  align-items: flex-start;
  gap: 1rem;
  padding: 1.5rem;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.feature-item:hover {
  transform: translateX(10px);
  background: rgba(0, 255, 136, 0.05);
  border-color: rgba(0, 255, 136, 0.2);
}

.feature-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.feature-icon svg {
  width: 24px;
  height: 24px;
  color: white;
}

.feature-text {
  flex: 1;
}

.feature-title {
  color: white;
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
}

.feature-description {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.95rem;
  line-height: 1.5;
  margin: 0;
}

.demo-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.demo-window {
  width: 100%;
  max-width: 450px;
  background: rgba(15, 15, 25, 0.9);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(20px);
}

.window-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem;
  background: rgba(30, 30, 40, 0.8);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.window-controls {
  display: flex;
  gap: 0.5rem;
}

.control {
  width: 12px;
  height: 12px;
  border-radius: 50%;
}

.control.close { background: #ff5f56; }
.control.minimize { background: #ffbd2e; }
.control.maximize { background: #27ca3f; }

.window-title {
  color: white;
  font-weight: 600;
  font-size: 0.9rem;
}

.window-content {
  padding: 1rem;
  max-height: 300px;
  overflow-y: auto;
}

.plugin-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem;
  margin-bottom: 0.8rem;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 10px;
  transition: all 0.3s ease;
}

.plugin-item:hover {
  background: rgba(255, 255, 255, 0.05);
}

.plugin-item.installing {
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.2);
}

.plugin-info {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex: 1;
}

.plugin-icon {
  font-size: 1.5rem;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 8px;
}

.plugin-name {
  color: white;
  font-weight: 600;
  font-size: 0.95rem;
}

.plugin-description {
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.8rem;
}

.install-btn {
  width: 32px;
  height: 32px;
  border: 1px solid rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.05);
  color: white;
  border-radius: 6px;
  cursor: pointer;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
}

.install-btn:hover {
  background: rgba(0, 255, 136, 0.2);
  border-color: #00ff88;
}

.install-btn.installed {
  background: rgba(0, 255, 136, 0.2);
  border-color: #00ff88;
  color: #00ff88;
}

.install-btn.installing {
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.3);
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Light theme */
:global(.light) .unique-feature-section {
  background: linear-gradient(135deg, rgba(240, 244, 248, 0.9) 0%, rgba(255, 255, 255, 0.8) 100%);
}

:global(.light) .section-title {
  color: #333;
}

:global(.light) .section-subtitle {
  color: rgba(0, 0, 0, 0.6);
}

:global(.light) .feature-item {
  background: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.1);
}

:global(.light) .feature-title {
  color: #333;
}

:global(.light) .feature-description {
  color: rgba(0, 0, 0, 0.6);
}

:global(.light) .demo-window {
  background: rgba(255, 255, 255, 0.9);
}

:global(.light) .window-header {
  background: rgba(240, 240, 240, 0.8);
}

:global(.light) .window-title {
  color: #333;
}

:global(.light) .plugin-item {
  background: rgba(0, 0, 0, 0.03);
  border: 1px solid rgba(0, 0, 0, 0.08);
}

:global(.light) .plugin-name {
  color: #333;
}

:global(.light) .plugin-description {
  color: rgba(0, 0, 0, 0.6);
}

:global(.light) .install-btn {
  border: 1px solid rgba(0, 0, 0, 0.2);
  background: rgba(0, 0, 0, 0.05);
  color: #333;
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .features-grid {
    gap: 1.5rem;
  }
  
  .feature-item {
    padding: 1rem;
  }
  
  .demo-window {
    margin-top: 2rem;
  }
}
</style>