document.addEventListener('DOMContentLoaded', function () {
    const darkButton = document.getElementById('dark');
    const darkButtonMobile = document.querySelector('.mobile-menu .dark button');

    const storedDarkMode = localStorage.getItem('darkMode');
    if (storedDarkMode === 'true') {
        document.body.classList.add('darkmode');
    }

    function toggleDarkMode() {
        document.body.classList.toggle('darkmode');
        const isDarkMode = document.body.classList.contains('darkmode');
        localStorage.setItem('darkMode', isDarkMode);
        console.log(`Modo escuro ativado: ${isDarkMode}`);
    }

    // Ouvinte de clique para o botão de modo escuro na versão do computador
    if (darkButton) {
        darkButton.addEventListener('click', toggleDarkMode);
    }
    
    // Ouvinte de clique para o botão de modo escuro na versão mobile
    if (darkButtonMobile) {
        darkButtonMobile.addEventListener('click', toggleDarkMode);
    }

    // Ouvinte para detectar mudanças na orientação do dispositivo
    window.addEventListener('orientationchange', function () {
        // Lidar com a rotação do dispositivo, se necessário
        console.log('Orientação do dispositivo alterada.');
    });

    console.log('Script Darkmode.js carregado com sucesso.');
});