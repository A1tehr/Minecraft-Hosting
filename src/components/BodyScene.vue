<template>
  <div class="scene-wrapper" id="home">
    <canvas id="bgCanvas"></canvas>

    <div class="mountains-container">
      <img src="/mountains_edit.png" alt="mountains" class="mountains-img">
    </div>

    <div class="center-content">
      <div class="hero-text onest-black">
        <h1 class="main-title">{{ t('hero.title') }}</h1>
        <h1 class="animated-title">
        <span class="green-underline" style="position: relative; display: inline-block;">
          {{ displayedText }}
          <span class="cursor"></span>
        </span>
        </h1>
        
        <div class="hero-buttons">
          <button class="cta-primary" data-testid="hero-cta-button">
            <svg class="btn-icon" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
            {{ t('hero.cta') }}
          </button>
          <button class="cta-secondary" data-testid="hero-demo-button">
            <svg class="btn-icon" viewBox="0 0 24 24">
              <polygon points="5 3 19 12 5 21 5 3"/>
            </svg>
            {{ t('hero.demo') }}
          </button>
        </div>
      </div>

      <div class="container">
        <div class="row cards g-4">
          <div class="col-12 col-md-6 col-lg-4" v-for="(feature, key) in features" :key="key">
            <div class="card h-100" data-testid="`feature-card-${key}`">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <component :is="feature.icon" />
                </span>
                {{ t(`features.${key}.title`) }}
              </h2>
              <p>{{ t(`features.${key}.description`) }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Floating elements -->
    <div class="floating-elements">
      <div class="float-cube float-1">■</div>
      <div class="float-cube float-2">■</div>
      <div class="float-cube float-3">■</div>
    </div>
  </div>
</template>

<script setup>
import {onMounted, onUnmounted, ref} from "vue";
import { useI18n } from 'vue-i18n'

const { t } = useI18n()

let resizeCanvas;

const fullText = t('hero.subtitle');
const displayedText = ref("");
const hideCursor = ref(false);

let index = 0;
let typingInterval;
let cursorInterval;

const features = {
  easy_setup: { icon: 'SparkleIcon' },
  plugins: { icon: 'PuzzleIcon' },
  monetization: { icon: 'MoneyIcon' },
  withdraw: { icon: 'WithdrawIcon' },
  performance: { icon: 'RocketIcon' },
  ddos_protection: { icon: 'ShieldIcon' }
}

onMounted(() => {
  // Анимация печатания текста
  typingInterval = setInterval(() => {
    if (index < fullText.length) {
      displayedText.value += fullText[index];
      index++;
    } else {
      clearInterval(typingInterval);
      // Запускаем мигание курсора после окончания печати
      cursorInterval = setInterval(() => {
        hideCursor.value = !hideCursor.value;
      }, 530);
    }
  }, 100);

  const sceneWrapper = document.querySelector('.scene-wrapper');
  if (!sceneWrapper) {
    console.error('Элемент .scene-wrapper не найден');
    return;
  }

  var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
    window.setTimeout(callback, 1000 / 60);
  };
  window.requestAnimationFrame = requestAnimationFrame;

  var background = document.getElementById("bgCanvas"),
      bgCtx = background.getContext("2d"),
      width = window.innerWidth,
      height = sceneWrapper.offsetHeight;

  (height < 400) ? height = 400 : height;

  background.width = width;
  background.height = height;

  // Second canvas used for the stars
  bgCtx.fillStyle = '#05004c';
  bgCtx.fillRect(0, 0, width, height);

  // stars
  function Star(options) {
    this.size = Math.random() * 2;
    this.speed = Math.random() * .05;
    this.x = options.x;
    this.y = options.y;
  }

  Star.prototype.reset = function () {
    this.size = Math.random() * 2;
    this.speed = Math.random() * .05;
    this.x = width;
    this.y = Math.random() * height;
  }

  Star.prototype.update = function () {
    this.x -= this.speed;
    if (this.x < 0) {
      this.reset();
    } else {
      bgCtx.fillRect(this.x, this.y, this.size, this.size);
    }
  }

  function ShootingStar() {
    this.reset();
  }

  ShootingStar.prototype.reset = function () {
    this.x = Math.random() * width;
    this.y = 0;
    this.len = (Math.random() * 80) + 10;
    this.speed = (Math.random() * 10) + 6;
    this.size = (Math.random() * 1) + 0.1;
    this.waitTime = new Date().getTime() + (Math.random() * 3000) + 500;
    this.active = false;
  }

  ShootingStar.prototype.update = function () {
    if (this.active) {
      this.x -= this.speed;
      this.y += this.speed;
      if (this.x < 0 || this.y >= height) {
        this.reset();
      } else {
        bgCtx.lineWidth = this.size;
        bgCtx.beginPath();
        bgCtx.moveTo(this.x, this.y);
        bgCtx.lineTo(this.x + this.len, this.y - this.len);
        bgCtx.stroke();
      }
    } else {
      if (this.waitTime < new Date().getTime()) {
        this.active = true;
      }
    }
  }

  var entities = [];

  // init the stars
  for (var i = 0; i < height; i++) {
    entities.push(new Star({
      x: Math.random() * width,
      y: Math.random() * height
    }));
  }

  // Add 2 shooting stars that just cycle.
  entities.push(new ShootingStar());
  entities.push(new ShootingStar());

  const moonImg = new Image();
  moonImg.src = '/moon.png';

  moonImg.onload = () => {
    function animate() {
      const angleRad = 37 * Math.PI / 180;
      const diagonal = Math.sqrt(width * width + height * height);
      const x1 = Math.cos(angleRad) * diagonal;
      const y1 = Math.sin(angleRad) * diagonal;

      const gradient = bgCtx.createLinearGradient(0, 0, x1, y1);
      gradient.addColorStop(0, 'rgba(25, 31, 55, 1)');
      gradient.addColorStop(0.66, 'rgba(95, 105, 137, 1)');
      gradient.addColorStop(1, 'rgba(88, 89, 103, 1)');

      bgCtx.fillStyle = gradient;
      bgCtx.fillRect(0, 0, width, height);

      bgCtx.drawImage(moonImg, width - 200, 140, 100, 100);

      bgCtx.fillStyle = '#ffffff';
      bgCtx.strokeStyle = '#ffffff';

      var entLen = entities.length;
      while (entLen--) {
        entities[entLen].update();
      }

      requestAnimationFrame(animate);
    }
    animate();
  }

  resizeCanvas = () => {
    width = window.innerWidth;
    height = sceneWrapper.offsetHeight;
    if (height < 400) height = 400;

    background.width = width;
    background.height = height;

    bgCtx.fillStyle = '#05004c';
    bgCtx.fillRect(0, 0, width, height);
  }

  window.addEventListener('resize', resizeCanvas);

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    background.style.transform = `translateY(${scrollY * 0.4}px)`;
  });
})

onUnmounted(() => {
  if (resizeCanvas) {
    window.removeEventListener('resize', resizeCanvas);
  }
  clearInterval(typingInterval);
  clearInterval(cursorInterval);
});

</script>

<script>
// Icon components
const SparkleIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z" />
    </svg>
  `
}

const PuzzleIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
      <path d="M12 4v2.5a.5 .5 0 0 1 -.5 .5a1.5 1.5 0 0 0 0 3a.5 .5 0 0 1 .5 .5v1.5" />
      <path d="M12 12v1.5a.5 .5 0 0 0 .5 .5a1.5 1.5 0 0 1 0 3a.5 .5 0 0 0 -.5 .5v2.5" />
      <path d="M20 12h-2.5a.5 .5 0 0 1 -.5 -.5a1.5 1.5 0 0 0 -3 0a.5 .5 0 0 1 -.5 .5h-1.5" />
      <path d="M12 12h-1.5a.5 .5 0 0 0 -.5 .5a1.5 1.5 0 0 1 -3 0a.5 .5 0 0 0 -.5 -.5h-2.5" />
    </svg>
  `
}

const MoneyIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
  `
}

const WithdrawIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
    </svg>
  `
}

const RocketIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3" />
      <path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3" />
      <path d="M15 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
    </svg>
  `
}

const ShieldIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1c.397 -1.768 -.285 -3.593 -1.788 -4.787c-1.503 -1.193 -3.6 -1.575 -5.5 -1s-3.315 2.019 -3.712 3.787c-2.199 -.088 -4.155 1.326 -4.666 3.373c-.512 2.047 .564 4.154 2.566 5.027" />
      <path d="M8 15m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
      <path d="M10 15v-2a2 2 0 1 1 4 0v2" />
    </svg>
  `
}

export default {
  components: {
    SparkleIcon,
    PuzzleIcon,
    MoneyIcon,
    WithdrawIcon,
    RocketIcon,
    ShieldIcon
  }
}
</script>

<style scoped>
.scene-wrapper {
  position: relative;
  width: 100%;
  height: 110vh;
  overflow: hidden;
}

.floating-elements {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  pointer-events: none;
  z-index: 5;
}

.float-cube {
  position: absolute;
  color: rgba(0, 255, 136, 0.1);
  font-size: 20px;
  animation-duration: 20s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}

.float-1 {
  top: 20%;
  left: 10%;
  animation-name: float1;
  animation-delay: 0s;
}

.float-2 {
  top: 60%;
  right: 15%;
  animation-name: float2;
  animation-delay: 5s;
}

.float-3 {
  bottom: 30%;
  left: 20%;
  animation-name: float3;
  animation-delay: 10s;
}

@keyframes float1 {
  0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
  25% { transform: translate(30px, -20px) rotate(90deg); opacity: 0.3; }
  50% { transform: translate(10px, -40px) rotate(180deg); opacity: 0.1; }
  75% { transform: translate(-20px, -10px) rotate(270deg); opacity: 0.3; }
}

@keyframes float2 {
  0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
  33% { transform: translate(-25px, 30px) rotate(120deg); opacity: 0.2; }
  66% { transform: translate(-10px, -25px) rotate(240deg); opacity: 0.3; }
}

@keyframes float3 {
  0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
  40% { transform: translate(20px, 25px) rotate(144deg); opacity: 0.2; }
  80% { transform: translate(-15px, -30px) rotate(288deg); opacity: 0.3; }
}

.mountains-container::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40vh;
  background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.6) 50%, black 100%);
  pointer-events: none;
  z-index: 20;
}

.hero-text {
  text-align: center;
  margin-bottom: 4rem;
}

.main-title {
  font-size: 3.2rem;
  line-height: 1.1;
  margin-bottom: 1rem;
}

.animated-title {
  font-size: 3.2rem;
  line-height: 1.1;
  margin-bottom: 3rem;
}

.hero-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.cta-primary, .cta-secondary {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 1rem 2rem;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1.1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  border: none;
}

.cta-primary {
  background: linear-gradient(45deg, #00ff88, #00ccff);
  color: white;
  box-shadow: 0 4px 15px rgba(0, 255, 136, 0.3);
}

.cta-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0, 255, 136, 0.4);
}

.cta-secondary {
  background: rgba(255, 255, 255, 0.1);
  color: white;
  border: 2px solid rgba(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
}

.cta-secondary:hover {
  background: rgba(255, 255, 255, 0.2);
  border-color: rgba(255, 255, 255, 0.5);
  transform: translateY(-2px);
}

.btn-icon {
  width: 20px;
  height: 20px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
}

.cards {
  margin-top: 100px;
}

.card {
  text-align: left;
  padding: 1.5rem;
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(15px);
  -webkit-backdrop-filter: blur(15px);
  box-shadow: inset 0 0 10px 5px rgba(255, 255, 255, 0.05);
  border-radius: 25px;
  border: 1px solid rgba(255, 255, 255, 0.15);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(0, 255, 136, 0.03) 0%, rgba(83, 91, 242, 0.03) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover::before {
  opacity: 1;
}

.card:hover {
  transform: translateY(-8px);
  border-color: rgba(0, 255, 136, 0.3);
  box-shadow: 0 15px 40px rgba(0, 255, 136, 0.1);
}

.card-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 35px;
  height: 35px;
  margin-right: 10px;
  background: rgba(0, 255, 136, 0.1);
  border-radius: 10px;
  transition: all 0.3s ease;
}

.card:hover .card-icon {
  background: rgba(0, 255, 136, 0.2);
  transform: scale(1.1);
}

.card-icon svg {
  width: 20px;
  height: 20px;
  stroke: #00ff88;
  stroke-width: 2;
}

.card h2 {
  font-size: 1.5rem;
  margin-bottom: 1rem;
  color: white;
}

.card p {
  font-size: 1rem;
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.85);
  margin: 0;
}

#bgCanvas {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  display: block;
}

.mountains-container {
  user-select: none;
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 10;
}

.mountains-img {
  filter: drop-shadow(0 4px 12px rgba(0,0,0,0.4));
  opacity: 0.95;
  width: 100%;
  display: block;
}

.center-content {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  z-index: 15;
  margin-top: 8%;
}

.center-content * {
  pointer-events: auto;
}

.green-underline {
  text-decoration: underline #00ff88 solid 3px;
  text-underline-offset: 6px;
}

.cursor {
  position: absolute;
  top: 0;
  right: -8px;
  width: 3px;
  height: 100%;
  background-color: white;
  animation: blinkSmooth 1.2s ease-in-out infinite;
  opacity: 1;
  pointer-events: none;
}

@keyframes blinkSmooth {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}

/* Light theme */
:global(.light) .scene-wrapper {
  background: linear-gradient(135deg, rgba(240, 244, 248, 1) 0%, rgba(255, 255, 255, 0.9) 100%);
}

:global(.light) .card {
  background: rgba(255, 255, 255, 0.9);
  border: 1px solid rgba(0, 0, 0, 0.1);
  color: #333;
}

:global(.light) .card h2 {
  color: #333;
}

:global(.light) .card p {
  color: rgba(0, 0, 0, 0.7);
}

:global(.light) .main-title,
:global(.light) .animated-title {
  color: #333;
}

:global(.light) .green-underline {
  text-decoration: underline #0066cc solid 3px;
}

:global(.light) .cursor {
  background-color: #333;
}

:global(.light) .cta-secondary {
  background: rgba(0, 0, 0, 0.05);
  color: #333;
  border: 2px solid rgba(0, 0, 0, 0.1);
}

:global(.light) .cta-secondary:hover {
  background: rgba(0, 0, 0, 0.1);
  border-color: rgba(0, 0, 0, 0.2);
}

:global(.light) .float-cube {
  color: rgba(0, 102, 204, 0.1);
}

@media (max-width: 768px) {
  .main-title,
  .animated-title {
    font-size: 2.2rem;
  }
  
  .hero-buttons {
    flex-direction: column;
    gap: 0.8rem;
  }
  
  .cta-primary,
  .cta-secondary {
    width: 100%;
    max-width: 280px;
    justify-content: center;
  }
  
  .cards {
    margin-top: 60px;
  }
  
  .card {
    padding: 1.2rem;
  }
  
  .center-content {
    margin-top: 15%;
  }
}
</style>