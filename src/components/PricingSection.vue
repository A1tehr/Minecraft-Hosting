<template>
  <section id="pricing" class="pricing-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold">{{ t('pricing.title') }}</h2>
        <p class="section-subtitle">{{ t('pricing.subtitle') }}</p>
      </div>

      <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4" v-for="(plan, key) in plans" :key="key">
          <div class="pricing-card" :class="{ 'popular': plan.popular }">
            <div class="card-header">
              <h3 class="plan-name onest-bold">{{ t(`pricing.${key}.name`) }}</h3>
              <div class="price">
                <span class="currency">₽</span>
                <span class="amount">{{ t(`pricing.${key}.price`) }}</span>
                <span class="period">/{{ t('pricing.monthly') }}</span>
              </div>
            </div>
            <div class="card-body">
              <ul class="features-list">
                <li v-for="(feature, index) in getFeatures(key)" :key="index">
                  <svg class="check-icon" viewBox="0 0 24 24">
                    <path d="M20 6L9 17l-5-5"/>
                  </svg>
                  {{ feature }}
                </li>
              </ul>
            </div>
            <div class="card-footer">
              <button class="plan-button" :class="{ 'popular-button': plan.popular }">
                {{ t('pricing.choose_plan') }}
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <button class="configurator-btn" @click="showConfigurator = !showConfigurator">
          <svg class="btn-icon" viewBox="0 0 24 24">
            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"/>
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/>
          </svg>
          {{ t('pricing.configure') }}
        </button>
      </div>
    </div>

    <!-- Configurator Modal -->
    <div v-if="showConfigurator" class="configurator-modal" @click.self="showConfigurator = false">
      <div class="configurator-content">
        <div class="modal-header">
          <h3 class="onest-bold">{{ t('configurator.title') }}</h3>
          <button @click="showConfigurator = false" class="close-btn">
            <svg viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center mb-4">{{ t('configurator.subtitle') }}</p>
          
          <div class="config-option">
            <label>{{ t('configurator.players') }}</label>
            <input type="range" v-model="config.players" min="5" max="100" step="5" class="config-slider">
            <span class="value">{{ config.players }}</span>
          </div>

          <div class="config-option">
            <label>{{ t('configurator.ram') }}</label>
            <input type="range" v-model="config.ram" min="1" max="16" step="1" class="config-slider">
            <span class="value">{{ config.ram }} ГБ</span>
          </div>

          <div class="config-option">
            <label>{{ t('configurator.storage') }}</label>
            <input type="range" v-model="config.storage" min="5" max="100" step="5" class="config-slider">
            <span class="value">{{ config.storage }} ГБ</span>
          </div>

          <div class="config-option">
            <label>{{ t('configurator.plugins') }}</label>
            <select v-model="config.plugins" class="config-select">
              <option value="basic">Базовые</option>
              <option value="all">Все плагины</option>
              <option value="custom">Все + кастомные</option>
            </select>
          </div>

          <div class="price-estimate">
            <h4 class="onest-bold">{{ t('configurator.estimated_price') }}</h4>
            <div class="estimated-price">
              <span class="price">₽{{ calculatePrice() }}</span>
              <span class="period">{{ t('configurator.per_month') }}</span>
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
</script>

<style scoped>
.pricing-section {
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(13, 17, 60, 0.9) 0%, rgba(25, 31, 55, 0.8) 100%);
  position: relative;
}

.pricing-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="rgba(255,255,255,0.03)"><path d="M0 .5H32V32"/></svg>');
  opacity: 0.5;
}

.section-title {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: white;
  text-align: center;
}

.section-subtitle {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.8);
  margin-bottom: 3rem;
}

.pricing-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 20px;
  padding: 2rem;
  text-align: center;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.pricing-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.05) 0%, rgba(83, 91, 242, 0.05) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.pricing-card:hover::before {
  opacity: 1;
}

.pricing-card:hover {
  transform: translateY(-10px);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow: 0 20px 40px rgba(0, 255, 136, 0.1);
}

.pricing-card.popular {
  border-color: rgba(0, 255, 136, 0.5);
  background: rgba(0, 255, 136, 0.08);
}

.pricing-card.popular::after {
  content: 'Популярный';
  position: absolute;
  top: 15px;
  right: -30px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  color: white;
  padding: 5px 40px;
  font-size: 0.8rem;
  font-weight: 600;
  transform: rotate(45deg);
  text-transform: uppercase;
}

.card-header {
  margin-bottom: 2rem;
}

.plan-name {
  font-size: 1.5rem;
  color: white;
  margin-bottom: 1rem;
}

.price {
  display: flex;
  align-items: baseline;
  justify-content: center;
  gap: 0.2rem;
  margin-bottom: 2rem;
}

.currency {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.8);
}

.amount {
  font-size: 3rem;
  font-weight: 700;
  color: #00ff88;
}

.period {
  font-size: 1rem;
  color: rgba(255, 255, 255, 0.6);
}

.card-body {
  flex: 1;
  margin-bottom: 2rem;
}

.features-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.features-list li {
  display: flex;
  align-items: center;
  gap: 0.8rem;
  padding: 0.5rem 0;
  color: rgba(255, 255, 255, 0.9);
  font-size: 1rem;
}

.check-icon {
  width: 20px;
  height: 20px;
  stroke: #00ff88;
  stroke-width: 2;
  fill: none;
  flex-shrink: 0;
}

.plan-button {
  width: 100%;
  padding: 1rem 2rem;
  background: rgba(255, 255, 255, 0.1);
  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 50px;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.plan-button:hover {
  background: rgba(0, 255, 136, 0.2);
  border-color: #00ff88;
  transform: translateY(-2px);
}

.popular-button {
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-color: transparent;
  color: white;
}

.popular-button:hover {
  background: linear-gradient(45deg, #00cc66, #0099cc);
}

.configurator-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  background: linear-gradient(45deg, #535bf2, #00ff88);
  border: none;
  border-radius: 50px;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-top: 2rem;
}

.configurator-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 25px rgba(83, 91, 242, 0.3);
}

.btn-icon {
  width: 20px;
  height: 20px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
}

/* Configurator Modal */
.configurator-modal {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2000;
  backdrop-filter: blur(10px);
}

.configurator-content {
  background: rgba(13, 17, 60, 0.95);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 20px;
  padding: 2rem;
  width: 90%;
  max-width: 500px;
  max-height: 80vh;
  overflow-y: auto;
  backdrop-filter: blur(20px);
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.modal-header h3 {
  color: white;
  margin: 0;
  font-size: 1.5rem;
}

.close-btn {
  background: none;
  border: none;
  color: rgba(255, 255, 255, 0.6);
  cursor: pointer;
  padding: 0.5rem;
  border-radius: 50%;
  transition: all 0.3s ease;
}

.close-btn:hover {
  color: white;
  background: rgba(255, 255, 255, 0.1);
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
}

.config-option {
  margin-bottom: 2rem;
}

.config-option label {
  display: block;
  color: white;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.config-slider {
  width: 100%;
  height: 6px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 3px;
  outline: none;
  margin-bottom: 0.5rem;
}

.config-slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 50%;
  cursor: pointer;
}

.config-slider::-moz-range-thumb {
  width: 20px;
  height: 20px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 50%;
  cursor: pointer;
  border: none;
}

.config-select {
  width: 100%;
  padding: 0.8rem;
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 8px;
  color: white;
  font-size: 1rem;
}

.config-select option {
  background: #1a1a2e;
  color: white;
}

.value {
  color: #00ff88;
  font-weight: 600;
  float: right;
}

.price-estimate {
  background: rgba(0, 255, 136, 0.1);
  border: 1px solid rgba(0, 255, 136, 0.2);
  border-radius: 15px;
  padding: 1.5rem;
  text-align: center;
  margin-top: 2rem;
}

.price-estimate h4 {
  color: white;
  margin-bottom: 1rem;
}

.estimated-price {
  display: flex;
  align-items: baseline;
  justify-content: center;
  gap: 0.3rem;
}

.estimated-price .price {
  font-size: 2.5rem;
  font-weight: 700;
  color: #00ff88;
}

.estimated-price .period {
  color: rgba(255, 255, 255, 0.7);
  font-size: 1rem;
}

/* Light theme */
:global(.light) .pricing-section {
  background: linear-gradient(135deg, rgba(240, 244, 248, 0.9) 0%, rgba(255, 255, 255, 0.8) 100%);
}

:global(.light) .section-title {
  color: #333;
}

:global(.light) .section-subtitle {
  color: rgba(0, 0, 0, 0.6);
}

:global(.light) .pricing-card {
  background: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.1);
  color: #333;
}

:global(.light) .plan-name {
  color: #333;
}

:global(.light) .features-list li {
  color: #555;
}

:global(.light) .configurator-content {
  background: rgba(255, 255, 255, 0.95);
  color: #333;
}

:global(.light) .modal-header h3 {
  color: #333;
}

:global(.light) .config-option label {
  color: #333;
}
</style>