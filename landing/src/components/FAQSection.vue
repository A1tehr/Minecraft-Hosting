<template>
  <section id="support" class="faq-section section-transition">
    <div class="faq-background">
      <div class="question-marks">
        <div class="question-mark mark-1">❓</div>
        <div class="question-mark mark-2">❓</div>
        <div class="question-mark mark-3">❓</div>
      </div>
      <div class="faq-waves">
        <div class="wave wave-1"></div>
        <div class="wave wave-2"></div>
        <div class="wave wave-3"></div>
      </div>
    </div>
    
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold animate-fade-in">{{ t('faq.title') }}</h2>
        <p class="section-subtitle animate-fade-in">Найдите ответы на самые частые вопросы</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="faq-container">
            <div class="faq-list">
              <div class="faq-item glass-effect" 
                   v-for="(faq, index) in faqs" 
                   :key="index"
                   :style="{ 'animation-delay': `${index * 0.1}s` }">
                <div 
                  class="faq-question" 
                  @click="toggleFAQ(index)"
                  :class="{ 'active': faq.isOpen }"
                >
                  <div class="question-content">
                    <div class="question-icon">
                      <svg class="help-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                        <point cx="12" cy="17"/>
                      </svg>
                    </div>
                    <h4 class="question-text onest-bold">{{ faq.question }}</h4>
                  </div>
                  <div class="toggle-container">
                    <div class="toggle-icon" :class="{ 'rotated': faq.isOpen }">
                      <svg viewBox="0 0 24 24">
                        <path d="M6 9l6 6 6-6"/>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="faq-answer" :class="{ 'open': faq.isOpen }">
                  <div class="answer-content">
                    <div class="answer-decoration"></div>
                    <p>{{ faq.answer }}</p>
                    <div class="answer-actions">
                      <button class="helpful-btn" @click="markHelpful(index)">
                        <span class="btn-icon">👍</span>
                        Полезно
                      </button>
                      <button class="contact-btn" @click="contactSupport">
                        <span class="btn-icon">💬</span>
                        Связаться с поддержкой
                      </button>
                    </div>
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

const faqs = reactive([
  {
    question: t('faq.q1'),
    answer: t('faq.a1'),
    isOpen: false,
    helpful: 0
  },
  {
    question: t('faq.q2'),
    answer: t('faq.a2'),
    isOpen: false,
    helpful: 0
  },
  {
    question: t('faq.q3'),
    answer: t('faq.a3'),
    isOpen: false,
    helpful: 0
  },
  {
    question: t('faq.q4'),
    answer: t('faq.a4'),
    isOpen: false,
    helpful: 0
  }
])

const toggleFAQ = (index) => {
  faqs[index].isOpen = !faqs[index].isOpen
  
  // Можно оставить несколько FAQ открытыми для лучшего UX
  // Но при желании можно раскомментировать код ниже для закрытия остальных
  /*
  faqs.forEach((faq, i) => {
    if (i !== index) {
      faq.isOpen = false
    }
  })
  */
}

const markHelpful = (index) => {
  faqs[index].helpful++
  // Можно добавить анимацию или отправить аналитику
}

const contactSupport = () => {
  // Здесь можно открыть чат поддержки или форму обратной связи
  console.log('Контакт с поддержкой')
}
</script>

<style scoped>
.faq-section {
  padding: 120px 0;
  position: relative;
  overflow: hidden;
}

.faq-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.question-marks {
  position: absolute;
  width: 100%;
  height: 100%;
}

.question-mark {
  position: absolute;
  font-size: 3rem;
  opacity: 0.03;
  animation: floatQuestion 20s ease-in-out infinite;
}

.mark-1 {
  top: 15%;
  left: 10%;
  animation-delay: 0s;
}

.mark-2 {
  top: 70%;
  right: 15%;
  animation-delay: 7s;
}

.mark-3 {
  bottom: 20%;
  left: 70%;
  animation-delay: 14s;
}

@keyframes floatQuestion {
  0%, 100% {
    transform: translate(0, 0) rotate(0deg);
    opacity: 0.03;
  }
  50% {
    transform: translate(50px, -30px) rotate(15deg);
    opacity: 0.08;
  }
}

.faq-waves {
  position: absolute;
  width: 100%;
  height: 100%;
}

.wave {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0, 255, 136, 0.03) 0%, transparent 70%);
  animation: waveExpand 12s ease-in-out infinite;
}

.wave-1 {
  width: 200px;
  height: 200px;
  top: 30%;
  left: 20%;
  animation-delay: 0s;
}

.wave-2 {
  width: 150px;
  height: 150px;
  bottom: 40%;
  right: 30%;
  animation-delay: 4s;
}

.wave-3 {
  width: 100px;
  height: 100px;
  top: 60%;
  left: 60%;
  animation-delay: 8s;
}

@keyframes waveExpand {
  0%, 100% {
    transform: scale(1);
    opacity: 0.3;
  }
  50% {
    transform: scale(1.5);
    opacity: 0.1;
  }
}

.section-title {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: white;
  background: linear-gradient(135deg, #ffffff 0%, #00ff88 50%, #00ccff 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
  z-index: 2;
}

.section-subtitle {
  font-size: 1.2rem;
  color: rgba(255, 255, 255, 0.7);
  margin-bottom: 3rem;
  position: relative;
  z-index: 2;
}

.faq-container {
  position: relative;
  z-index: 2;
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.faq-item {
  background: rgba(255, 255, 255, 0.02);
  backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 20px;
  overflow: hidden;
  transition: all 0.4s ease;
  position: relative;
  transform: translateY(20px);
  opacity: 0;
  animation: slideUpFade 0.6s ease forwards;
}

@keyframes slideUpFade {
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.faq-item::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, 
    rgba(0, 255, 136, 0.02) 0%, 
    rgba(83, 91, 242, 0.02) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.faq-item:hover::before {
  opacity: 1;
}

.faq-item:hover {
  border-color: rgba(0, 255, 136, 0.2);
  background: rgba(255, 255, 255, 0.04);
  transform: translateY(-2px);
  box-shadow: 0 10px 30px rgba(0, 255, 136, 0.1);
}

.faq-question {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 2rem;
  cursor: pointer;
  transition: all 0.3s ease;
  user-select: none;
  position: relative;
  z-index: 2;
}

.faq-question:hover {
  background: rgba(0, 255, 136, 0.03);
}

.faq-question.active {
  background: rgba(0, 255, 136, 0.05);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}

.question-content {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex: 1;
}

.question-icon {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.1), rgba(0, 204, 255, 0.1));
  border: 1px solid rgba(0, 255, 136, 0.2);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  flex-shrink: 0;
}

.faq-question:hover .question-icon {
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.15), rgba(0, 204, 255, 0.15));
  border-color: rgba(0, 255, 136, 0.3);
  transform: scale(1.05);
}

.help-icon {
  width: 20px;
  height: 20px;
  stroke: #00ff88;
  stroke-width: 2;
  fill: none;
}

.question-text {
  color: white;
  font-size: 1.2rem;
  margin: 0;
  text-align: left;
  font-weight: 700;
}

.toggle-container {
  display: flex;
  align-items: center;
  margin-left: 1rem;
}

.toggle-icon {
  width: 28px;
  height: 28px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  flex-shrink: 0;
}

.toggle-icon.rotated {
  transform: rotate(180deg);
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.3);
}

.toggle-icon svg {
  width: 16px;
  height: 16px;
  stroke: rgba(255, 255, 255, 0.7);
  stroke-width: 2;
  fill: none;
  transition: stroke 0.3s ease;
}

.toggle-icon.rotated svg {
  stroke: #00ff88;
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: all 0.4s ease;
}

.faq-answer.open {
  max-height: 300px;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.answer-content {
  padding: 2rem;
  padding-top: 1.5rem;
  position: relative;
}

.answer-decoration {
  position: absolute;
  top: 0;
  left: 2rem;
  right: 2rem;
  height: 2px;
  background: linear-gradient(90deg, transparent, rgba(0, 255, 136, 0.3), transparent);
  border-radius: 1px;
}

.answer-content p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1.05rem;
  line-height: 1.7;
  margin: 0 0 1.5rem 0;
  padding-left: 1rem;
  position: relative;
}

.answer-content p::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0.5rem;
  width: 3px;
  height: calc(100% - 1rem);
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 2px;
}

.answer-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
}

.helpful-btn,
.contact-btn {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.6rem 1.2rem;
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 25px;
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

.helpful-btn:hover {
  background: rgba(0, 255, 136, 0.1);
  border-color: rgba(0, 255, 136, 0.3);
  color: #00ff88;
  transform: translateY(-1px);
}

.contact-btn:hover {
  background: rgba(83, 91, 242, 0.1);
  border-color: rgba(83, 91, 242, 0.3);
  color: #535bf2;
  transform: translateY(-1px);
}

.btn-icon {
  font-size: 0.8rem;
}

/* Responsive Design */
@media (max-width: 768px) {
  .section-title {
    font-size: 2.2rem;
  }
  
  .faq-question {
    padding: 1.5rem;
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
  }
  
  .question-content {
    width: 100%;
  }
  
  .toggle-container {
    margin-left: 0;
    align-self: flex-end;
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
  }
  
  .question-text {
    font-size: 1.1rem;
    padding-right: 3rem;
  }
  
  .answer-content {
    padding: 1.5rem;
    padding-top: 1rem;
  }
  
  .answer-actions {
    flex-direction: column;
    gap: 0.8rem;
  }
  
  .helpful-btn,
  .contact-btn {
    justify-content: center;
  }
  
  .faq-section {
    padding: 80px 0;
  }
}

@media (max-width: 576px) {
  .question-icon {
    width: 35px;
    height: 35px;
  }
  
  .help-icon {
    width: 18px;
    height: 18px;
  }
  
  .question-text {
    font-size: 1rem;
  }
  
  .answer-content p {
    font-size: 1rem;
    padding-left: 0.8rem;
  }
  
  .question-mark {
    font-size: 2rem;
  }
}
</style>