<template>
  <section class="testimonials-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold">{{ t('testimonials.title') }}</h2>
      </div>

      <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4" v-for="(testimonial, key) in testimonials" :key="key">
          <div class="testimonial-card">
            <div class="testimonial-content">
              <div class="quote-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-10zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                </svg>
              </div>
              <p class="testimonial-text">{{ t(`testimonials.${key}.text`) }}</p>
            </div>
            <div class="testimonial-author">
              <div class="author-avatar">
                {{ getInitial(t(`testimonials.${key}.name`)) }}
              </div>
              <div class="author-info">
                <div class="author-name">{{ t(`testimonials.${key}.name`) }}</div>
                <div class="author-role">Владелец сервера</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

const testimonials = {
  alex: {},
  maria: {},
  dmitry: {}
}

const getInitial = (name) => {
  return name.charAt(0).toUpperCase()
}
</script>

<style scoped>
.testimonials-section {
  padding: 100px 0;
  background: linear-gradient(135deg, rgba(13, 17, 60, 0.95) 0%, rgba(25, 31, 55, 0.9) 100%);
  position: relative;
}

.testimonials-section::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.02)"/><circle cx="75" cy="25" r="1" fill="rgba(255,255,255,0.02)"/><circle cx="25" cy="75" r="1" fill="rgba(255,255,255,0.02)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.02)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
  opacity: 0.5;
}

.section-title {
  font-size: 2.5rem;
  color: white;
  margin-bottom: 1rem;
}

.testimonial-card {
  background: rgba(255, 255, 255, 0.05);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 20px;
  padding: 2rem;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.testimonial-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.02) 0%, rgba(83, 91, 242, 0.02) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.testimonial-card:hover::before {
  opacity: 1;
}

.testimonial-card:hover {
  transform: translateY(-5px);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow: 0 15px 30px rgba(0, 255, 136, 0.1);
}

.testimonial-content {
  flex: 1;
  margin-bottom: 1.5rem;
}

.quote-icon {
  width: 30px;
  height: 30px;
  margin-bottom: 1rem;
  opacity: 0.6;
}

.quote-icon svg {
  width: 100%;
  height: 100%;
  fill: #00ff88;
}

.testimonial-text {
  color: rgba(255, 255, 255, 0.9);
  font-size: 1rem;
  line-height: 1.6;
  margin: 0;
  font-style: italic;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.author-avatar {
  width: 50px;
  height: 50px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 700;
  font-size: 1.2rem;
  flex-shrink: 0;
}

.author-info {
  flex: 1;
}

.author-name {
  color: white;
  font-weight: 600;
  font-size: 1.1rem;
  margin-bottom: 0.2rem;
}

.author-role {
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.9rem;
}

/* Light theme */
:global(.light) .testimonials-section {
  background: linear-gradient(135deg, rgba(240, 244, 248, 0.95) 0%, rgba(255, 255, 255, 0.9) 100%);
}

:global(.light) .section-title {
  color: #333;
}

:global(.light) .testimonial-card {
  background: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.1);
}

:global(.light) .testimonial-text {
  color: rgba(0, 0, 0, 0.8);
}

:global(.light) .author-name {
  color: #333;
}

:global(.light) .author-role {
  color: rgba(0, 0, 0, 0.6);
}

@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .testimonial-card {
    padding: 1.5rem;
  }
}
</style>