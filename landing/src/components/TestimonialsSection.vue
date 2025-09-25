<template>
  <section class="testimonials-section section-transition">
    <div class="testimonials-background">
      <div class="floating-testimonials">
        <div class="testimonial-particle particle-1">💬</div>
        <div class="testimonial-particle particle-2">⭐</div>
        <div class="testimonial-particle particle-3">👍</div>
        <div class="testimonial-particle particle-4">🎮</div>
      </div>
    </div>
    
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title onest-bold animate-fade-in">{{ t('testimonials.title') }}</h2>
        <div class="title-decoration">
          <div class="decoration-line"></div>
          <div class="decoration-star">⭐</div>
          <div class="decoration-line"></div>
        </div>
      </div>

      <div class="testimonials-carousel">
        <div class="row g-4">
          <div class="col-12 col-md-6 col-lg-4" 
               v-for="(testimonial, key, index) in testimonials" 
               :key="key">
            <div class="testimonial-card glass-effect glow" 
                 :style="{ 'animation-delay': `${index * 0.2}s` }">
              <div class="card-header">
                <div class="testimonial-rating">
                  <span class="star" v-for="i in 5" :key="i">⭐</span>
                </div>
                <div class="quote-icon">
                  <svg viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-10zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                  </svg>
                </div>
              </div>
              
              <div class="testimonial-content">
                <p class="testimonial-text">{{ t(`testimonials.${key}.text`) }}</p>
              </div>
              
              <div class="testimonial-author">
                <div class="author-avatar">
                  <div class="avatar-inner">
                    {{ getInitial(t(`testimonials.${key}.name`)) }}
                  </div>
                  <div class="avatar-ring"></div>
                </div>
                <div class="author-info">
                  <div class="author-name">{{ t(`testimonials.${key}.name`) }}</div>
                  <div class="author-role">
                    <span class="role-icon">👑</span>
                    Владелец сервера
                  </div>
                  <div class="author-stats">
                    <span class="stat">
                      <span class="stat-icon">🎮</span>
                      {{ getRandomPlayers() }} игроков
                    </span>
                  </div>
                </div>
              </div>
              
              <div class="card-shine"></div>
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

const getRandomPlayers = () => {
  const players = [45, 67, 89, 123, 156, 234]
  return players[Math.floor(Math.random() * players.length)]
}
</script>

<style scoped>
.testimonials-section {
  padding: 120px 0;
  position: relative;
  overflow: hidden;
}

.testimonials-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.floating-testimonials {
  position: absolute;
  width: 100%;
  height: 100%;
}

.testimonial-particle {
  position: absolute;
  font-size: 2rem;
  opacity: 0.1;
  animation: floatParticle 15s ease-in-out infinite;
}

.particle-1 {
  top: 20%;
  left: 15%;
  animation-delay: 0s;
}

.particle-2 {
  top: 60%;
  right: 20%;
  animation-delay: 3s;
}

.particle-3 {
  bottom: 30%;
  left: 10%;
  animation-delay: 6s;
}

.particle-4 {
  top: 40%;
  right: 10%;
  animation-delay: 9s;
}

@keyframes floatParticle {
  0%, 100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    opacity: 0.1;
  }
  25% {
    transform: translate(20px, -30px) rotate(90deg) scale(1.2);
    opacity: 0.3;
  }
  50% {
    transform: translate(-10px, -20px) rotate(180deg) scale(0.8);
    opacity: 0.2;
  }
  75% {
    transform: translate(30px, 10px) rotate(270deg) scale(1.1);
    opacity: 0.25;
  }
}

.section-title {
  font-size: 3rem;
  color: white;
  margin-bottom: 2rem;
  background: linear-gradient(135deg, #ffffff 0%, #00ff88 50%, #00ccff 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  position: relative;
  z-index: 2;
}

.title-decoration {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 2rem;
}

.decoration-line {
  width: 60px;
  height: 2px;
  background: linear-gradient(45deg, #00ff88, #00ccff);
  border-radius: 1px;
}

.decoration-star {
  font-size: 1.5rem;
  color: #00ff88;
  animation: twinkle 2s ease-in-out infinite;
}

@keyframes twinkle {
  0%, 100% { 
    opacity: 0.6; 
    transform: scale(1);
  }
  50% { 
    opacity: 1; 
    transform: scale(1.2);
  }
}

.testimonials-carousel {
  position: relative;
  z-index: 2;
}

.testimonial-card {
  background: rgba(255, 255, 255, 0.03);
  backdrop-filter: blur(40px);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 24px;
  padding: 2.5rem;
  height: 100%;
  display: flex;
  flex-direction: column;
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
  transform: translateY(30px);
  opacity: 0;
  animation: slideUpFade 0.8s ease forwards;
}

@keyframes slideUpFade {
  to {
    transform: translateY(0);
    opacity: 1;
  }
}

.testimonial-card::before {
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

.testimonial-card:hover::before {
  opacity: 1;
}

.testimonial-card:hover {
  transform: translateY(-10px) scale(1.02);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow: 
    0 25px 50px rgba(0, 255, 136, 0.15),
    0 0 0 1px rgba(0, 255, 136, 0.1);
}

.card-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 1.5rem;
}

.testimonial-rating {
  display: flex;
  gap: 0.2rem;
}

.star {
  font-size: 1rem;
  opacity: 0.9;
  animation: starShine 3s ease-in-out infinite;
}

.star:nth-child(2) { animation-delay: 0.2s; }
.star:nth-child(3) { animation-delay: 0.4s; }
.star:nth-child(4) { animation-delay: 0.6s; }
.star:nth-child(5) { animation-delay: 0.8s; }

@keyframes starShine {
  0%, 80%, 100% { 
    opacity: 0.9; 
    transform: scale(1);
  }
  90% { 
    opacity: 1; 
    transform: scale(1.1);
  }
}

.quote-icon {
  width: 32px;
  height: 32px;
  opacity: 0.3;
  transition: all 0.3s ease;
}

.testimonial-card:hover .quote-icon {
  opacity: 0.6;
  transform: scale(1.1);
}

.quote-icon svg {
  width: 100%;
  height: 100%;
  fill: #00ff88;
}

.testimonial-content {
  flex: 1;
  margin-bottom: 2rem;
}

.testimonial-text {
  color: rgba(255, 255, 255, 0.9);
  font-size: 1.1rem;
  line-height: 1.7;
  margin: 0;
  font-style: italic;
  position: relative;
  padding-left: 1rem;
}

.testimonial-text::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 2px;
}

.testimonial-author {
  display: flex;
  align-items: center;
  gap: 1.2rem;
}

.author-avatar {
  position: relative;
  flex-shrink: 0;
}

.avatar-inner {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #00ff88, #00ccff);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 700;
  font-size: 1.5rem;
  position: relative;
  z-index: 2;
}

.avatar-ring {
  position: absolute;
  top: -3px;
  left: -3px;
  right: -3px;
  bottom: -3px;
  border: 2px solid transparent;
  background: linear-gradient(135deg, #00ff88, #00ccff) border-box;
  border-radius: 50%;
  mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
  mask-composite: exclude;
  opacity: 0;
  animation: ringPulse 3s ease-in-out infinite;
}

@keyframes ringPulse {
  0%, 90%, 100% {
    opacity: 0;
    transform: scale(1);
  }
  50% {
    opacity: 0.8;
    transform: scale(1.1);
  }
}

.author-info {
  flex: 1;
}

.author-name {
  color: white;
  font-weight: 700;
  font-size: 1.2rem;
  margin-bottom: 0.3rem;
}

.author-role {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.role-icon {
  font-size: 0.8rem;
}

.author-stats {
  display: flex;
  gap: 1rem;
}

.stat {
  color: rgba(255, 255, 255, 0.6);
  font-size: 0.8rem;
  display: flex;
  align-items: center;
  gap: 0.3rem;
}

.stat-icon {
  font-size: 0.7rem;
}

.card-shine {
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, 
    transparent, 
    rgba(255, 255, 255, 0.1), 
    transparent);
  transition: left 0.6s ease;
  pointer-events: none;
}

.testimonial-card:hover .card-shine {
  left: 100%;
}

/* Responsive Design */
@media (max-width: 768px) {
  .section-title {
    font-size: 2.2rem;
  }
  
  .testimonial-card {
    padding: 2rem;
  }
  
  .testimonial-text {
    font-size: 1rem;
  }
  
  .author-name {
    font-size: 1.1rem;
  }
  
  .testimonials-section {
    padding: 80px 0;
  }
  
  .decoration-line {
    width: 40px;
  }
  
  .testimonial-particle {
    font-size: 1.5rem;
  }
}

@media (max-width: 576px) {
  .testimonial-card {
    padding: 1.5rem;
  }
  
  .card-header {
    flex-direction: column;
    gap: 1rem;
  }
  
  .testimonial-rating {
    align-self: flex-start;
  }
  
  .author-stats {
    flex-direction: column;
    gap: 0.3rem;
  }
}
</style>