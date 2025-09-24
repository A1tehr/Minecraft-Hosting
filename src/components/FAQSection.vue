<template>
  <section id="support" class="faq-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold">{{ t('faq.title') }}</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
          <div class="faq-list">
            <div class="faq-item" v-for="(faq, index) in faqs" :key="index">
              <div 
                class="faq-question" 
                @click="toggleFAQ(index)"
                :class="{ 'active': faq.isOpen }"
              >
                <h4 class="question-text onest-bold">{{ faq.question }}</h4>
                <div class="toggle-icon" :class="{ 'rotated': faq.isOpen }">
                  <svg viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                  </svg>
                </div>
              </div>
              <div class="faq-answer" :class="{ 'open': faq.isOpen }">
                <div class="answer-content">
                  <p>{{ faq.answer }}</p>
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
    isOpen: false
  },
  {
    question: t('faq.q2'),
    answer: t('faq.a2'),
    isOpen: false
  },
  {
    question: t('faq.q3'),
    answer: t('faq.a3'),
    isOpen: false
  },
  {
    question: t('faq.q4'),
    answer: t('faq.a4'),
    isOpen: false
  }
])

const toggleFAQ = (index) => {
  faqs[index].isOpen = !faqs[index].isOpen
  
  // Закрываем остальные FAQ
  faqs.forEach((faq, i) => {
    if (i !== index) {
      faq.isOpen = false
    }
  })
}
</script>

<style scoped>
.faq-section {
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(25, 31, 55, 0.9) 0%, rgba(13, 17, 60, 0.95) 100%);
  position: relative;
}

.faq-section::after {
  content: '';
  position: absolute;
  bottom: 20%;
  left: -5%;
  width: 200px;
  height: 200px;
  background: radial-gradient(circle, rgba(0, 255, 136, 0.1) 0%, transparent 70%);
  border-radius: 50%;
  filter: blur(80px);
}

.section-title {
  font-size: 2.5rem;
  color: white;
  margin-bottom: 1rem;
}

.faq-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.faq-item {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 15px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.faq-item:hover {
  border-color: rgba(0, 255, 136, 0.2);
  background: rgba(255, 255, 255, 0.08);
}

.faq-question {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem 2rem;
  cursor: pointer;
  transition: all 0.3s ease;
  user-select: none;
}

.faq-question:hover {
  background: rgba(0, 255, 136, 0.05);
}

.faq-question.active {
  background: rgba(0, 255, 136, 0.1);
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.question-text {
  color: white;
  font-size: 1.1rem;
  margin: 0;
  flex: 1;
  text-align: left;
}

.toggle-icon {
  width: 24px;
  height: 24px;
  transition: transform 0.3s ease;
  flex-shrink: 0;
  margin-left: 1rem;
}

.toggle-icon.rotated {
  transform: rotate(180deg);
}

.toggle-icon svg {
  width: 100%;
  height: 100%;
  stroke: rgba(255, 255, 255, 0.7);
  stroke-width: 2;
  fill: none;
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, padding 0.3s ease;
}

.faq-answer.open {
  max-height: 200px;
  padding: 0 2rem 1.5rem 2rem;
}

.answer-content {
  padding-top: 0.5rem;
}

.answer-content p {
  color: rgba(255, 255, 255, 0.8);
  font-size: 1rem;
  line-height: 1.6;
  margin: 0;
}

/* Light theme */
:global(.light) .faq-section {
  background: linear-gradient(135deg, rgba(240, 244, 248, 0.9) 0%, rgba(255, 255, 255, 0.95) 100%);
}

:global(.light) .section-title {
  color: #333;
}

:global(.light) .faq-item {
  background: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.1);
}

:global(.light) .faq-question {
  color: #333;
}

:global(.light) .question-text {
  color: #333;
}

:global(.light) .toggle-icon svg {
  stroke: rgba(0, 0, 0, 0.7);
}

:global(.light) .answer-content p {
  color: rgba(0, 0, 0, 0.7);
}

:global(.light) .faq-question:hover {
  background: rgba(0, 102, 204, 0.05);
}

:global(.light) .faq-question.active {
  background: rgba(0, 102, 204, 0.1);
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .faq-question {
    padding: 1.2rem 1.5rem;
  }
  
  .question-text {
    font-size: 1rem;
  }
  
  .faq-answer.open {
    padding: 0 1.5rem 1.2rem 1.5rem;
  }
}
</style>