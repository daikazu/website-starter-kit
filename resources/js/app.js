import './bootstrap';
document.addEventListener('alpine:init', () => {
    Alpine.data('DarkModeToggle', () => {
        return {
            mode: 'dark',
            init() {
                this.setInitialMode();
            },
            setInitialMode() {
                const storedTheme = window.localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
                    this.enableDarkMode();
                } else {
                    this.disableDarkMode();
                }
            },
            toggleDarkMode() {
                if (this.mode === 'dark') {
                    this.disableDarkMode();
                } else {
                    this.enableDarkMode();
                }
            },
            enableDarkMode() {
                document.documentElement.classList.add('dark');
                window.localStorage.setItem('theme', 'dark');
                this.mode = 'dark';
            },
            disableDarkMode() {
                document.documentElement.classList.remove('dark');
                window.localStorage.setItem('theme', 'light');
                this.mode = 'light';
            },
        };
    });

    Alpine.data('DropDown', () => {
        return {
            open: false,
            toggle() {
                if (this.open) {
                    return this.close();
                }

                this.$refs.button.focus();

                this.open = true;
            },
            close(focusAfter) {
                if (!this.open) return;

                this.open = false;

                focusAfter && focusAfter.focus();
            },
        };
    });
});

(function (listenerName = 'app:scroll-to') {
    window.addEventListener(
        listenerName,
        (ev) => {
            ev.stopPropagation();
            const selector = ev?.detail?.query;
            if (!selector) return;
            const el = document.querySelector(selector);
            if (!el) return;
            try {
                el.scrollIntoView({
                    behavior: 'smooth',
                });
            } catch (error) {
                console.error('Error scrolling to element:', error);
            }
        },
        false,
    );
})();
