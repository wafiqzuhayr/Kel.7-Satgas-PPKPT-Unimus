<!-- Global Toast Notification Container (Tengah Atas) -->
<div id="toast-container" style="position: fixed; top: 24px; left: 50%; transform: translateX(-50%); z-index: 999999; display: flex; flex-direction: column; align-items: center; gap: 10px; max-width: 520px; width: calc(100% - 32px); pointer-events: none;"></div>

<style>
#toast-container {
    pointer-events: none !important;
}

@keyframes toastSlideIn {
    0% {
        opacity: 0;
        transform: translateY(-24px) scale(0.94);
    }
    60% {
        opacity: 1;
        transform: translateY(3px) scale(1.01);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes toastSlideOut {
    0% {
        opacity: 1;
        transform: translateY(0) scale(1);
        max-height: 120px;
        margin-bottom: 0.5rem;
    }
    100% {
        opacity: 0;
        transform: translateY(-20px) scale(0.92);
        max-height: 0;
        margin-bottom: 0;
        padding-top: 0;
        padding-bottom: 0;
    }
}

@keyframes toastProgress {
    0% { width: 100%; }
    100% { width: 0%; }
}

.toast-item {
    animation: toastSlideIn 0.32s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    pointer-events: auto !important;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    width: 100%;
}

.toast-item.removing {
    animation: toastSlideOut 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.toast-progress-bar {
    animation: toastProgress linear forwards;
}
</style>

<script>
(function() {
    // Definisi helper notifikasi global (Tengah Atas)
    window.showToast = function(message, type = 'success', title = 'Pemberitahuan', duration = 4500) {
        if (!message) return;
        const container = document.getElementById('toast-container');
        if (!container) return;

        // Tipe notifikasi config (Premium Dark UI)
        const configs = {
            success: {
                title: title || 'Pemberitahuan',
                iconBg: 'bg-gradient-to-br from-emerald-400 to-emerald-600',
                progressBg: 'bg-emerald-500',
                border: 'border-slate-700',
                shadow: 'shadow-[0_20px_40px_-10px_rgba(16,185,129,0.25)]',
                icon: `<svg class="w-5 h-5 text-white shrink-0 drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`
            },
            error: {
                title: title || 'Pemberitahuan',
                iconBg: 'bg-gradient-to-br from-rose-400 to-rose-600',
                progressBg: 'bg-rose-500',
                border: 'border-slate-700',
                shadow: 'shadow-[0_20px_40px_-10px_rgba(244,63,94,0.25)]',
                icon: `<svg class="w-5 h-5 text-white shrink-0 drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`
            },
            warning: {
                title: title || 'Pemberitahuan',
                iconBg: 'bg-gradient-to-br from-amber-400 to-amber-600',
                progressBg: 'bg-amber-500',
                border: 'border-slate-700',
                shadow: 'shadow-[0_20px_40px_-10px_rgba(245,158,11,0.25)]',
                icon: `<svg class="w-5 h-5 text-white shrink-0 drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
            },
            info: {
                title: title || 'Pemberitahuan',
                iconBg: 'bg-gradient-to-br from-blue-400 to-blue-600',
                progressBg: 'bg-blue-500',
                border: 'border-slate-700',
                shadow: 'shadow-[0_20px_40px_-10px_rgba(37,99,235,0.25)]',
                icon: `<svg class="w-5 h-5 text-white shrink-0 drop-shadow-sm" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>`
            }
        };

        const config = configs[type] || configs.success;

        const toast = document.createElement('div');
        toast.className = `toast-item relative overflow-hidden rounded-2xl flex flex-col select-none bg-slate-900 border border-slate-700/80 ${config.shadow}`;
        toast.style.backdropFilter = 'blur(16px)';
        toast.style.WebkitBackdropFilter = 'blur(16px)';

        toast.innerHTML = `
            <div class="flex items-start gap-4 p-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full shadow-lg ${config.iconBg}">
                    ${config.icon}
                </div>
                <div class="flex-1 min-w-0 pt-0.5">
                    <h4 class="text-[13px] font-bold text-white tracking-wide">${config.title}</h4>
                    <p class="text-[12px] font-medium text-slate-300 mt-1 leading-relaxed break-words">${message}</p>
                </div>
                <button type="button" class="toast-close-btn shrink-0 p-1.5 text-slate-400 hover:text-white hover:bg-slate-800 transition-colors rounded-lg" aria-label="Tutup">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="h-1 w-full bg-slate-800">
                <div class="toast-progress-bar h-full ${config.progressBg}" style="animation-duration: ${duration}ms;"></div>
            </div>
        `;

        container.appendChild(toast);

        let timeoutId;

        const removeToast = () => {
            if (toast.classList.contains('removing')) return;
            toast.classList.add('removing');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        };

        timeoutId = setTimeout(removeToast, duration);

        const closeBtn = toast.querySelector('.toast-close-btn');
        if (closeBtn) {
            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                clearTimeout(timeoutId);
                removeToast();
            });
        }

        // Pause countdown saat hover
        toast.addEventListener('mouseenter', () => {
            const progressBar = toast.querySelector('.toast-progress-bar');
            if (progressBar) progressBar.style.animationPlayState = 'paused';
            clearTimeout(timeoutId);
        });

        toast.addEventListener('mouseleave', () => {
            const progressBar = toast.querySelector('.toast-progress-bar');
            if (progressBar) progressBar.style.animationPlayState = 'running';
            timeoutId = setTimeout(removeToast, 2000);
        });
    };

    window.notifySuccess = (msg, title = 'Pemberitahuan') => window.showToast(msg, 'success', title);
    window.notifyError = (msg, title = 'Pemberitahuan') => window.showToast(msg, 'error', title);
    window.notifyWarning = (msg, title = 'Pemberitahuan') => window.showToast(msg, 'warning', title);
    window.notifyInfo = (msg, title = 'Pemberitahuan') => window.showToast(msg, 'info', title);

    // Salin ke Clipboard helper yang tangguh
    window.copyToClipboard = function(text, successMessage = 'Anda telah berhasil menyalin ke clipboard!') {
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text).then(() => {
                window.notifySuccess(successMessage, 'Pemberitahuan');
            }).catch(() => {
                fallbackCopy(text, successMessage);
            });
            return;
        }
        fallbackCopy(text, successMessage);
    };

    function fallbackCopy(text, successMessage) {
        try {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            textarea.style.position = 'fixed';
            textarea.style.left = '-9999px';
            textarea.style.top = '0';
            textarea.setAttribute('readonly', '');
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            window.notifySuccess(successMessage, 'Pemberitahuan');
        } catch (e) {
            window.notifySuccess(successMessage, 'Pemberitahuan');
        }
    }

    // Event listener global untuk elemen interaktif (data-notify, data-toast, data-copy, data-download)
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Session Flash message handler otomatis
        @if(session('success'))
            window.notifySuccess(@json(session('success')), 'Pemberitahuan');
        @endif

        @if(session('error'))
            window.notifyError(@json(session('error')), 'Pemberitahuan');
        @endif

        @if(session('warning'))
            window.notifyWarning(@json(session('warning')), 'Pemberitahuan');
        @endif

        @if(session('info'))
            window.notifyInfo(@json(session('info')), 'Pemberitahuan');
        @endif

        @if(session('status'))
            window.notifyInfo(@json(session('status')), 'Pemberitahuan');
        @endif

        @if(isset($errors) && $errors->any())
            window.notifyError(@json($errors->first()), 'Pemberitahuan');
        @endif

        // 2. Intercept click pada tombol dengan atribut khusus
        document.body.addEventListener('click', function(e) {
            // Check for data-notify or data-toast
            const notifyEl = e.target.closest('[data-notify], [data-toast]');
            if (notifyEl) {
                const message = notifyEl.getAttribute('data-notify') || notifyEl.getAttribute('data-toast');
                const type = notifyEl.getAttribute('data-notify-type') || 'success';
                const title = notifyEl.getAttribute('data-notify-title') || 'Pemberitahuan';
                if (message) {
                    window.showToast(message, type, title);
                }
            }

            // Check for data-copy
            const copyEl = e.target.closest('[data-copy]');
            if (copyEl) {
                const textToCopy = copyEl.getAttribute('data-copy');
                const copyMsg = copyEl.getAttribute('data-copy-msg') || 'Anda telah berhasil menyalin ke clipboard!';
                if (textToCopy) {
                    window.copyToClipboard(textToCopy, copyMsg);
                }
            }

            // Check for data-download or download triggers
            const downloadEl = e.target.closest('[data-download]');
            if (downloadEl) {
                const docTitle = downloadEl.getAttribute('data-download') || 'Dokumen';
                window.notifyInfo(`Anda telah berhasil membuka / mengunduh: ${docTitle}`, 'Pemberitahuan');
            }
        });
    });
})();
</script>
