<template>
  <section id="pricing" class="pricing-section section-transition">
    <div class="pricing-background">
      <div class="animated-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
      </div>
    </div>
    
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold animate-fade-in">{{ t('pricing.title') }}</h2>
        <p class="section-subtitle animate-fade-in">{{ t('pricing.subtitle') }}</p>
      </div>

      <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4" 
             v-for="(plan, key) in plans" 
             :key="key">
          <div class="pricing-card glass-effect glow" 
               :class="{ 'popular': plan.popular }"
               :style="{ 'animation-delay': `${Object.keys(plans).indexOf(key) * 0.2}s` }">
            <div class="card-header">
              <h3 class="plan-name onest-bold">{{ t(`pricing.${key}.name`) }}</h3>
              <div class="price">
                <div class="price-display">
                  <span class="currency">₽</span>
                  <span class="amount">{{ t(`pricing.${key}.price`) }}</span>
                  <span class="period">/{{ t('pricing.monthly') }}</span>
                </div>
                <div class="price-pulse"></div>
              </div>
            </div>
            <div class="card-body">
              <ul class="features-list">
                <li v-for="(feature, index) in getFeatures(key)" 
                    :key="index"
                    :style="{ 'animation-delay': `${(Object.keys(plans).indexOf(key) * 0.2) + (index * 0.1)}s` }">
                  <div class="check-container">
                    <svg class="check-icon" viewBox="0 0 24 24">
                      <path d="M20 6L9 17l-5-5"/>
                    </svg>
                  </div>
                  {{ feature }}
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <button class="plan-button" 
                      :class="{ 'popular-button': plan.popular }"
                      @click="selectPlan(key)">
                <span class="button-text">{{ t('pricing.choose_plan') }}</span>
                <svg class="arrow-icon" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
            <div class="card-glow"></div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <button class="configurator-btn glass-effect" 
                @click="showConfigurator = !showConfigurator">
          <svg class="btn-icon" viewBox="0 0 24 24">
            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/>
          </svg>
          {{ t('pricing.configure') }}
          <div class="button-shimmer"></div>
        </button>
      </div>
    </div>

    <!-- Enhanced Configurator Modal -->
    <div v-if="showConfigurator" class="configurator-modal" @click.self="showConfigurator = false">
      <div class="configurator-content glass-effect">
        <div class="modal-header">
          <h3 class="onest-bold">
            <span class="config-icon">⚙️</span>
            {{ t('configurator.title') }}
          </h3>
          <button @click="showConfigurator = false" class="close-btn">
            <svg viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center mb-4">{{ t('configurator.subtitle') }}</p>
          
          <div class="config-grid">
            <div class="config-option">
              <label>{{ t('configurator.players') }}</label>
              <div class="range-container">
                <input type="range" v-model="config.players" min="5" max="100" step="5" class="config-slider">
                <div class="range-track"></div>
                <div class="range-thumb" :style="{ left: ((config.players - 5) / 95) * 100 + '%' }"></div>
              </div>
              <span class="value">{{ config.players }} игроков</span>
            </div>

            <div class="config-option">
              <label>{{ t('configurator.ram') }}</label>
              <div class="range-container">
                <input type="range" v-model="config.ram" min="1" max="16" step="1" class="config-slider">
                <div class="range-track"></div>
                <div class="range-thumb" :style="{ left: ((config.ram - 1) / 15) * 100 + '%' }"></div>
              </div>
              <span class="value">{{ config.ram }} ГБ</span>
            </div>

            <div class="config-option">
              <label>{{ t('configurator.storage') }}</label>
              <div class="range-container">
                <input type="range" v-model="config.storage" min="5" max="100" step="5" class="config-slider">
                <div class="range-track"></div>
                <div class="range-thumb" :style="{ left: ((config.storage - 5) / 95) * 100 + '%' }"></div>
              </div>
              <span class="value">{{ config.storage }} ГБ</span>
            </div>

            <div class="config-option">
              <label>{{ t('configurator.plugins') }}</label>
              <div class="select-container">
                <select v-model="config.plugins" class="config-select">
                  <option value="basic">Базовые плагины</option>
                  <option value="all">Все плагины</option>
                  <option value="custom">Все + кастомные</option>
                </select>
                <svg class="select-arrow" viewBox="0 0 24 24">
                  <path d="M7 10l5 5 5-5"/>
                </svg>
              </div>
            </div>
          </div>

          <div class="price-estimate glass-effect">
            <div class="estimate-header">
              <h4 class="onest-bold">{{ t('configurator.estimated_price') }}</h4>
              <div class="price-badge">Рекомендуемо</div>
            </div>
            <div class="estimated-price">
              <span class="price">₽{{ calculatePrice() }}</span>
              <span class="period">{{ t('configurator.per_month') }}</span>
            </div>
            <div class="price-breakdown">
              <div class="breakdown-item">
                <span>Базовая стоимость</span>
                <span>₽200</span>
              </div>
              <div class="breakdown-item">
                <span>За игроков ({{ config.players }})</span>
                <span>₽{{ config.players * 15 }}</span>
              </div>
              <div class="breakdown-item">
                <span>За RAM ({{ config.ram }}ГБ)</span>
                <span>₽{{ config.ram * 80 }}</span>
              </div>
              <div class="breakdown-item">
                <span>За хранилище ({{ config.storage }}ГБ)</span>
                <span>₽{{ config.storage * 8 }}</span>
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

const showConfigurator = ref(false)

const plans = {
  starter: { popular: false },
  pro: { popular: true },
  business: { popular: false }
}

const config = reactive({
  players: 10,
  ram: 2,
  storage: 10,
  plugins: 'basic'
})

const getFeatures = (planKey) => {
  return [
    t(`pricing.${planKey}.players`),
    t(`pricing.${planKey}.ram`),
    t(`pricing.${planKey}.storage`),
    t(`pricing.${planKey}.plugins`),
    t(`pricing.${planKey}.support`)
  ]
}

const calculatePrice = () => {
  let basePrice = 200
  basePrice += config.players * 15
  basePrice += config.ram * 80
  basePrice += config.storage * 8
  
  const pluginMultipliers = {
    basic: 1,
    all: 1.5,
    custom: 2
  }
  
  basePrice *= pluginMultipliers[config.plugins]
  return Math.round(basePrice)
}

const selectPlan = (planKey) => {
  console.log('Selected plan:', planKey)
  // Здесь можно добавить логику выбора плана
}

onMounted(() => {
  // Анимация карточек при загрузке
  const cards = document.querySelectorAll('.pricing-card')
  cards.forEach((card, index) => {
    setTimeout(() => {
      card.classList.add('animate-fade-in')
    }, index * 200)
  })
})
</script>

<style scoped>
.pricing-section {
  padding: 120px 0;
  background: linear-gradient(135deg, 
    rgba(0, 0, 0, 0.98) 0%, 
    rgba(13, 13, 26, 0.95) 25%, 
    rgba(26, 26, 46, 0.9) 50%, 
    rgba(22, 33, 62, 0.95) 75%, 
    rgba(15, 52, 96, 0.98) 100%);
  position: relative;
  overflow: hidden;
}

.pricing-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.animated-shapes {
  position: absolute;
  width: 100%;
  height: 100%;
}

.shape {
  position: absolute;
  border-radius: 50%;
  filter: blur(60px);
  animation: shapeFloat 12s ease-in-out infinite;
}

.shape-1 {
  width: 200px;
  height: 200px;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.1), rgba(0, 204, 255, 0.08));
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 300px;
  height: 300px;
  background: linear-gradient(135deg, rgba(139, 95, 255, 0.08), rgba(83, 91, 242, 0.12));
  top: 60%;
  right: 15%;
  animation-delay: 4s;
}

.shape-3 {
  width: 150px;
  height: 150px;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(0, 255, 136, 0.08));
  bottom: 30%;
  left: 60%;
  animation-delay: 8s;
}

@keyframes shapeFloat {
  0%, 100% {
    transform: translate(0, 0) scale(1);
    opacity: 0.4;
  }
  33% {
    transform: translate(30px, -20px) scale(1.1);
    opacity: 0.6;
  }
  66% {
    transform: translate(-20px, 30px) scale(0.9);
    opacity: 0.5;
  }
}

.section-title {
  font-size: 3.2rem;
  margin-bottom: 1.5rem;
  color: white;
  text-align: center;
  background: linear-gradient(135deg, #ffffff 0%, #00ff88 50%, #00ccff 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
  z-index: 2;
}

.section-subtitle {
  font-size: 1.3rem;
  color: rgba(255, 255, 255, 0.8);
  margin-bottom: 4rem;
  position: relative;
  z-index: 2;
}

.pricing-card {
  background: rgba(255, 255, 255, 0.02);
  backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 24px;
  padding: 2.5rem;
  text-align: center;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  z-index: 2;
  transform: translateY(30px);
  opacity: 0;
}

.pricing-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, 
    rgba(0, 255, 136, 0.02) 0%, 
    rgba(83, 91, 242, 0.02) 50%, 
    rgba(139, 95, 255, 0.02) 100%);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.pricing-card:hover::before {
  opacity: 1;
}

.pricing-card:hover {
  transform: translateY(-15px) scale(1.02);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow: 
    0 25px 50px rgba(0, 255, 136, 0.15),
    0 0 0 1px rgba(0, 255, 136, 0.1);
}

.pricing-card.popular {
  border-color: rgba(0, 255, 136, 0.4);
  background: rgba(0, 255, 136, 0.03);
  transform: translateY(20px) scale(1.05);
}

.pricing-card.popular::after {
  content: 'Популярный';
  position: absolute;
  top: 20px;
  right: -35px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  color: white;
  padding: 8px 45px;
  font-size: 0.8rem;
  font-weight: 700;
  transform: rotate(45deg);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
}

.card-header {
  margin-bottom: 2.5rem;
  position: relative;
}

.plan-name {
  font-size: 1.8rem;
  color: white;
  margin-bottom: 1.5rem;
  font-weight: 800;
}

.price {
  position: relative;
  margin-bottom: 2rem;
}

.price-display {
  display: flex;
  align-items: baseline;
  justify-content: center;
  gap: 0.3rem;
}

.currency {
  font-size: 1.3rem;
  color: rgba(255, 255, 255, 0.7);
  font-weight: 600;
}

.amount {
  font-size: 3.5rem;
  font-weight: 800;
  color: #00ff88;
  text-shadow: 0 0 20px rgba(0, 255, 136, 0.5);
}

.period {
  font-size: 1.1rem;
  color: rgba(255, 255, 255, 0.6);
  font-weight: 500;
}

.price-pulse {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100px;
  height: 100px;
  border: 2px solid rgba(0, 255, 136, 0.3);
  border-radius: 50%;
  animation: pulse 2s ease-in-out infinite;
  pointer-events: none;
}

@keyframes pulse {
  0% {
    transform: translate(-50%, -50%) scale(0.8);
    opacity: 0.8;
  }
  50% {
    transform: translate(-50%, -50%) scale(1.2);
    opacity: 0.3;
  }
  100% {
    transform: translate(-50%, -50%) scale(0.8);
    opacity: 0.8;
  }
}

.card-body {
  flex: 1;
  margin-bottom: 2.5rem;
}

.features-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.features-list li {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.8rem 0;
  color: rgba(255, 255, 255, 0.9);
  font-size: 1rem;
  transform: translateX(-20px);
  opacity: 0;
  animation: slideInLeft 0.6s ease forwards;
}

.check-container {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 24px;
  height: 24px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 50%;
  flex-shrink: 0;
}

.check-icon {
  width: 14px;
  height: 14px;
  stroke: white;
  stroke-width: 3;
  fill: none;
}

.plan-button {
  width: 100%;
  padding: 1.2rem 2rem;
  background: rgba(255, 255, 255, 0.05);
  border: 2px solid rgba(255, 255, 255, 0.15);
  border-radius: 60px;
  color: white;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.4s ease;
  backdrop-filter: blur(20px);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  position: relative;
  overflow: hidden;
}

.plan-button::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
  transition: left 0.6s ease;
}

.plan-button:hover::before {
  left: 100%;
}

.plan-button:hover {
  background: rgba(0, 255, 136, 0.15);
  border-color: #00ff88;
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0, 255, 136, 0.2);
}

.popular-button {
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-color: transparent;
  color: white;
  box-shadow: 0 8px 25px rgba(0, 255, 136, 0.3);
}

.popular-button:hover {
  background: linear-gradient(135deg, #00cc66, #0099cc);
  box-shadow: 0 15px 35px rgba(0, 255, 136, 0.4);
}

.button-text {
  font-size: 1rem;
}

.arrow-icon {
  width: 16px;
  height: 16px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
  transition: transform 0.3s ease;
}

.plan-button:hover .arrow-icon {
  transform: translateX(5px);
}

.configurator-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.8rem;
  padding: 1.2rem 2.5rem;
  background: linear-gradient(135deg, rgba(83, 91, 242, 0.8), rgba(0, 255, 136, 0.6));
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 60px;
  color: white;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.4s ease;
  margin-top: 3rem;
  position: relative;
  overflow: hidden;
  z-index: 2;
}

.configurator-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 15px 35px rgba(83, 91, 242, 0.4);
  border-color: rgba(255, 255, 255, 0.4);
}

.btn-icon {
  width: 20px;
  height: 20px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
}

.button-shimmer {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.6s ease;
}

.configurator-btn:hover .button-shimmer {
  left: 100%;
}

/* Enhanced Modal Styles */
.configurator-modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.85);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 3000;
  backdrop-filter: blur(20px);
  animation: modalFadeIn 0.3s ease;
}

@keyframes modalFadeIn {
  from {
    opacity: 0;
    backdrop-filter: blur(0);
  }
  to {
    opacity: 1;
    backdrop-filter: blur(20px);
  }
}

.configurator-content {
  background: rgba(15, 15, 25, 0.98);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 24px;
  padding: 2.5rem;
  width: 95%;
  max-width: 600px;
  max-height: 85vh;
  overflow-y: auto;
  backdrop-filter: blur(40px);
  animation: modalSlideIn 0.4s ease;
}

@keyframes modalSlideIn {
  from {
    transform: translateY(50px) scale(0.95);
    opacity: 0;
  }
  to {
    transform: translateY(0) scale(1);
    opacity: 1;
  }
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
  padding-bottom: 1.5rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.modal-header h3 {
  color: white;
  margin: 0;
  font-size: 1.8rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.config-icon {
  font-size: 1.5rem;
}

.close-btn {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.6);
  cursor: pointer;
  padding: 0.6rem;
  border-radius: 12px;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.close-btn:hover {
  color: white;
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.3);
}

.close-btn svg {
  width: 20px;
  height: 20px;
  stroke: currentColor;
  stroke-width: 2;
}

.modal-body p {
  color: rgba(255, 255, 255, 0.8);
  text-align: center;
  font-size: 1.1rem;
}

.config-grid {
  display: grid;
  gap: 2rem;
}

.config-option {
  position: relative;
}

.config-option label {
  display: block;
  color: white;
  font-weight: 700;
  margin-bottom: 1rem;
  font-size: 1.1rem;
}

.range-container {
  position: relative;
  margin-bottom: 1rem;
}

.config-slider {
  width: 100%;
  height: 8px;
  background: transparent;
  border-radius: 4px;
  outline: none;
  position: relative;
  -webkit-appearance: none;
  cursor: pointer;
}

.range-track {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  height: 8px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 4px;
  transform: translateY(-50%);
  pointer-events: none;
}

.range-thumb {
  position: absolute;
  top: 50%;
  width: 24px;
  height: 24px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
  transition: all 0.3s ease;
  pointer-events: none;
}

.config-slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 24px;
  height: 24px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(0, 255, 136, 0.4);
}

.select-container {
  position: relative;
}

.config-select {
  width: 100%;
  padding: 1rem 1.5rem;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 12px;
  color: white;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  appearance: none;
  backdrop-filter: blur(10px);
}

.config-select:focus {
  outline: none;
  border-color: #00ff88;
  box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
}

.select-arrow {
  position: absolute;
  right: 1rem;
  top: 50%;
  transform: translateY(-50%);
  width: 20px;
  height: 20px;
  stroke: rgba(255, 255, 255, 0.6);
  stroke-width: 2;
  fill: none;
  pointer-events: none;
}

.config-select option {
  background: #1a1a2e;
  color: white;
  padding: 0.5rem;
}

.value {
  color: #00ff88;
  font-weight: 700;
  font-size: 1.1rem;
  text-align: right;
  display: block;
}

.price-estimate {
  background: linear-gradient(135deg, 
    rgba(0, 255, 136, 0.08), 
    rgba(83, 91, 242, 0.05));
  border: 1px solid rgba(0, 255, 136, 0.2);
  border-radius: 20px;
  padding: 2rem;
  margin-top: 2.5rem;
}

.estimate-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
}

.estimate-header h4 {
  color: white;
  margin: 0;
  font-size: 1.3rem;
}

.price-badge {
  background: linear-gradient(135deg, #00ff88, #00ccff);
  color: white;
  padding: 0.3rem 0.8rem;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 700;
}

.estimated-price {
  display: flex;
  align-items: baseline;
  justify-content: center;
  gap: 0.5rem;
  margin-bottom: 1.5rem;
}

.estimated-price .price {
  font-size: 2.8rem;
  font-weight: 800;
  color: #00ff88;
  text-shadow: 0 0 20px rgba(0, 255, 136, 0.5);
}

.estimated-price .period {
  color: rgba(255, 255, 255, 0.7);
  font-size: 1.1rem;
  font-weight: 600;
}

.price-breakdown {
  background: rgba(255, 255, 255, 0.02);
  border-radius: 12px;
  padding: 1rem;
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.breakdown-item {
  display: flex;
  justify-content: space-between;
  padding: 0.5rem 0;
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.9rem;
}

.breakdown-item:not(:last-child) {
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

/* Responsive Design */
@media (max-width: 768px) {
  .section-title {
    font-size: 2.5rem;
  }
  
  .pricing-card {
    padding: 2rem;
  }
  
  .amount {
    font-size: 2.8rem;
  }
  
  .configurator-content {
    padding: 2rem;
    margin: 1rem;
  }
  
  .config-grid {
    gap: 1.5rem;
  }
  
  .estimate-header {
    flex-direction: column;
    gap: 0.5rem;
    text-align: center;
  }
  
  .pricing-section {
    padding: 80px 0;
  }
}
</style>