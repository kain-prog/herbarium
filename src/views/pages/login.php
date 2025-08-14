<?php $this->renderPartial('head'); ?>

<?php $this->renderPartial('header-login'); ?>

<div class="w-full max-w-xl mx-auto">

    <section
        class="login-card bg-white rounded-2xl shadow-sm border border-zinc-200 overflow-hidden"
        aria-labelledby="form-title"
      >
        <div class="bg-zinc-100 p-4 sm:p-5">
          <span class="inline-block bg-[#2a895c] text-white text-sm font-semibold px-4 py-2 rounded-tl-2xl rounded-br-2xl">
            Acesso restrito
          </span>
        </div>

        <form id="loginForm" class="p-6 sm:p-8 space-y-6" novalidate>
          <div>
            <label for="username" class="block text-sm font-semibold text-[#2a895c]">E-mail</label>
            <div class="mt-2 relative">
              <input
                type="text"
                id="username"
                name="username"
                placeholder="herbarium"
                class="w-full bg-white text-zinc-700 text-sm border border-[#6bc16a] rounded pl-10 pr-3 py-3 transition duration-200 focus-soft focus:border-[#6bc16a] placeholder:text-zinc-400"
                required
              />
              <i class="fa-solid fa-user absolute left-3 top-1/2 -translate-y-1/2 text-[#2a895c]"></i>
            </div>
            <p id="usernameError" class="mt-1 text-xs text-red-600 hidden">O nome de usuário não pode ser vazio.</p>
          </div>

          <div>
            <label for="password" class="block text-sm font-semibold text-[#2a895c]">Senha</label>
            <div class="mt-2 relative">
              <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                class="w-full bg-white text-zinc-700 text-sm border border-[#6bc16a] rounded pl-10 pr-10 py-3 transition duration-200 focus-soft focus:border-[#6bc16a] placeholder:text-zinc-400"
                required
                minlength="6"
              />
              <i class="fa-solid fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-[#2a895c]"></i>
              <button
                type="button"
                id="togglePassword"
                class="absolute right-3 top-1/2 -translate-y-1/2 text-[#2a895c] hover:opacity-80"
                aria-label="Mostrar ou ocultar senha"
              >
                <i class="fa-regular fa-eye"></i>
              </button>
            </div>
            <p id="passwordError" class="mt-1 text-xs text-red-600 hidden">A senha deve ter ao menos 6 caracteres.</p>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <label class="inline-flex items-center gap-2 text-sm cursor-pointer select-none">
              <input type="checkbox" id="remember" class="accent-[#2a895c]" />
              Lembrar meu acesso
            </label>
            <!-- <a href="#" class="text-sm text-[#2a895c] hover:text-[#6bc16a] font-medium">Esqueci minha senha</a> -->
          </div>

          <div id="feedback" class="hidden text-sm font-medium px-4 py-3 rounded border"></div>

          <div>
            <button
              type="submit"
              id="submitBtn"
              class="w-full bg-[#2a895c] cursor-pointer text-white font-semibold py-4 rounded-none rounded-tl-2xl rounded-br-2xl hover:bg-[#6bc16a] transition duration-300 ease flex items-center justify-center gap-2"
            >
              <span>Entrar</span>
              <span id="spinner" class="hidden w-4 h-4 border-2 border-white/60 border-t-white rounded-full animate-spin"></span>
            </button>
          </div>
        </form>
      </section>

      <p class="text-center text-xs text-zinc-400 mt-6">
        © <?= date('Y'); ?> Herbarium. Todos os direitos reservados.
      </p>
</div>

<script>
    gsap.from(".logo", { duration: 0.8, y: -12, opacity: 0, ease: "power2.out" });
    gsap.from(".login-card", { duration: 0.9, y: 24, opacity: 0, ease: "power2.out", delay: 0.1 });

    const togglePassword = document.getElementById('togglePassword');
    const passwordInput  = document.getElementById('password');
    togglePassword.addEventListener('click', () => {
      const isHidden = passwordInput.type === 'password';
      passwordInput.type = isHidden ? 'text' : 'password';
      togglePassword.innerHTML = isHidden
        ? '<i class="fa-regular fa-eye-slash"></i>'
        : '<i class="fa-regular fa-eye"></i>';
    });

    const usernameInput   = document.getElementById('username');
    const usernameError   = document.getElementById('usernameError');
    const passError    = document.getElementById('passwordError');
    const loginForm    = document.getElementById('loginForm');
    const feedback     = document.getElementById('feedback');
    const submitBtn    = document.getElementById('submitBtn');
    const spinner      = document.getElementById('spinner');

    function showFeedback(type, msg) {
      feedback.classList.remove('hidden', 'text-red-700', 'bg-red-50', 'border-red-200', 'text-green-700', 'bg-green-50', 'border-green-200');
      if (type === 'error') {
        feedback.classList.add('text-red-700', 'bg-red-50', 'border-red-200');
      } else {
        feedback.classList.add('text-green-700', 'bg-green-50', 'border-green-200');
      }
      feedback.textContent = msg;
    }

    loginForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      usernameError.classList.add('hidden');
      passError.classList.add('hidden');
      feedback.classList.add('hidden');

      const username = usernameInput.value.trim();
      const password = passwordInput.value.trim();
      let hasError = false;

      if(!username){
        usernameError.classList.remove('hidden');
        hasError = true;
      }

      if (!password || password.length < 6) {
        passError.classList.remove('hidden');
        hasError = true;
      }

      if (hasError) return;

      submitBtn.setAttribute('disabled', 'disabled');
      spinner.classList.remove('hidden');

      try {
        const resp = await fetch('/login', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, password, remember: document.getElementById('remember').checked })
        });

        const json = await resp.json();

        if (!resp.ok) {
          showFeedback('error', json.error || 'Não foi possível entrar. Verifique suas credenciais.');
        } else {
          showFeedback('success', 'Login realizado com sucesso! Redirecionando...');

          setTimeout(() => { window.location.href = '/atendente'; }, 600);
        }
      } catch (err) {
        showFeedback('error', 'Erro de conexão. Tente novamente.');
        console.error(err);
      } finally {
        submitBtn.removeAttribute('disabled');
        spinner.classList.add('hidden');
      }
    });
</script>


<?php $this->renderPartial('footer'); ?>