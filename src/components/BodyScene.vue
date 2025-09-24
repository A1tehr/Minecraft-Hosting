<template>
  <div class="scene-wrapper">
    <canvas id="bgCanvas"></canvas>

    <div class="mountains-container">
      <img src="/mountains_edit.png" alt="mountains" class="mountains-img">
    </div>

    <div class="center-content">
      <div class="onest-black">
        <h1>Создавай собственные сервера Minecraft</h1>
        <h1>
        <span class="green-underline" style="position: relative; display: inline-block;">
          {{ displayedText }}
          <span class="cursor"></span>
        </span>
        </h1>
      </div>

      <div class="container">
        <div class="row cards g-4">
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sparkles"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 18a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm0 -12a2 2 0 0 1 2 2a2 2 0 0 1 2 -2a2 2 0 0 1 -2 -2a2 2 0 0 1 -2 2zm-7 12a6 6 0 0 1 6 -6a6 6 0 0 1 -6 -6a6 6 0 0 1 -6 6a6 6 0 0 1 6 6z" /></svg>
                </span>
                Простая настройка
              </h2>
              <p>Настройка сервера и плагинов в пару кликов, разберется даже новичок</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-puzzle-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M12 4v2.5a.5 .5 0 0 1 -.5 .5a1.5 1.5 0 0 0 0 3a.5 .5 0 0 1 .5 .5v1.5" /><path d="M12 12v1.5a.5 .5 0 0 0 .5 .5a1.5 1.5 0 0 1 0 3a.5 .5 0 0 0 -.5 .5v2.5" /><path d="M20 12h-2.5a.5 .5 0 0 1 -.5 -.5a1.5 1.5 0 0 0 -3 0a.5 .5 0 0 1 -.5 .5h-1.5" /><path d="M12 12h-1.5a.5 .5 0 0 0 -.5 .5a1.5 1.5 0 0 1 -3 0a.5 .5 0 0 0 -.5 -.5h-2.5" /></svg>
                </span>
                Готовые плагины
              </h2>
              <p>Популярные моды и плагины доступны сразу, без сложных установок</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                Монетизация
              </h2>
              <p>Подключай донаты, зарабатывай прямо на своем сервере</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                  </svg>
                </span>
                Вывод денег
              </h2>
              <p>Средства выводятся удобно и быстро, ты реально зарабатываешь на игре</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-rocket"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 13a8 8 0 0 1 7 7a6 6 0 0 0 3 -5a9 9 0 0 0 6 -8a3 3 0 0 0 -3 -3a9 9 0 0 0 -8 6a6 6 0 0 0 -5 3" /><path d="M7 14a6 6 0 0 0 -3 6a6 6 0 0 0 6 -3" /><path d="M15 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                </span>
                Производительность
              </h2>
              <p>У нас самое современное железо: SSD-диски, выделенные ресурсы и оптимизация под любое количество игроков</p>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4"> <!-- ← Было col-lg-3, стало col-lg-4 -->
            <div class="card h-100">
              <h2 class="title d-flex align-items-center onest-bold">
                <span class="card-icon">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-lock"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 18a3.5 3.5 0 0 0 0 -7h-1c.397 -1.768 -.285 -3.593 -1.788 -4.787c-1.503 -1.193 -3.6 -1.575 -5.5 -1s-3.315 2.019 -3.712 3.787c-2.199 -.088 -4.155 1.326 -4.666 3.373c-.512 2.047 .564 4.154 2.566 5.027" /><path d="M8 15m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" /><path d="M10 15v-2a2 2 0 1 1 4 0v2" /></svg>
                </span>
                DDoS защита
              </h2>
              <p>
                Многоуровневая защита инфраструктуры от сетевых атак.
                Фильтрация трафика в реальном времени, автоматическое поглощение атак до 500+ Гбит/с
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import {onMounted, onUnmounted, ref} from "vue";

let resizeCanvas;


const fullText = "и зарабатывай на этом!";
const displayedText = ref("");
const hideCursor = ref(false);

let index = 0;
let typingInterval;
let cursorInterval;



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
      }, 530); // Примерно полсекунды
    }
  }, 100); // Каждые 100 мс — одна буква


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
      height = sceneWrapper.offsetHeight; // ← Берём высоту контейнера!

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
    // this is used so the shooting stars arent constant
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

      bgCtx.drawImage(moonImg, width - 200, 140, 100, 100); // x, y, ширина, высота

      bgCtx.fillStyle = '#ffffff';
      bgCtx.strokeStyle = '#ffffff';

      // Звёзды и метеоры поверх луны
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

    // Очистим и перерисуем фон (если нужно)
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

<style scoped>

.card-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  margin-right: 8px; /* отступ от текста */
}

.card-icon svg {
  font-weight: normal;
  width: 100%;
  height: 100%;
  /* Убираем лишние атрибуты, если нужно — они переопределяются CSS */
  stroke: currentColor; /* для outline-иконок */
}

.scene-wrapper {
  position: relative;
  width: 100%;
  height: 110vh;
  overflow: hidden;
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

.cards {
  margin-top: 100px;
  /* Убираем display: flex — Bootstrap сам управляет сеткой */
}

.card {
  text-align: left;
  padding: 1.2em;
  padding-bottom: 0;
  background: rgba(255, 255, 255, 0.1); /* полупрозрачный белый фон */
  backdrop-filter: blur(10px);          /* размытие фона за карточкой */
  -webkit-backdrop-filter: blur(10px);  /* для Safari и старых версий */
  box-shadow: inset 0 0 10px 5px rgba(255, 255, 255, 0.5);
  border-radius: 30px;
  border: 1px solid rgba(255, 255, 255, 0.2); /* тонкая белая обводка для контраста */
}

.card h2 {
  font-size: 1.7em;
  margin-bottom: 20px;
}
.card p {
  font-size: 1.2em;
}

#bgCanvas {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1; /* Под горами */
  width: 100%;
  height: 100%;
  display: block;
}

.mountains-container {
  user-select: none;
  position: absolute;
  bottom: 0;
  width: 100%;
  z-index: 10; /* Поверх canvas */
}

.mountains-img {
  filter: drop-shadow(0 4px 12px rgba(0,0,0,0.4));
  opacity: 0.95;
  width: 100%;
  display: block;
  /* Можно добавить тень или прозрачность для реалистичности */
  /* filter: drop-shadow(0 2px 8px rgba(0,0,0,0.5)); */
}

.center-content {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  z-index: 15; /* Между canvas (z-index: 1) и горами (z-index: 10) */
  margin-top: 12%;
}

/* Если внутри слота будут кликабельные элементы — сбрось pointer-events */
.center-content * {
  pointer-events: auto;
}
.green-underline {
  text-decoration: underline #00cc66 solid 3px;
  text-underline-offset: 4px;
}

.green-underline {
  text-decoration: underline #00cc66 solid 3px;
  text-underline-offset: 4px;
}

.green-underline {
  text-decoration: underline #00cc66 solid 3px;
  text-underline-offset: 4px;
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
  pointer-events: none; /* чтобы не мешал кликам */
}

@keyframes blinkSmooth {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}

@keyframes blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}
</style>
