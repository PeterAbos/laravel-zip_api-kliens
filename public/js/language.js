document.getElementById('lang-switcher').addEventListener('change', function() {
    window.location.href = '/set-locale/' + this.value;
});