document.addEventListener('DOMContentLoaded', function () {
    function showPopup() {
        var overlay = document.createElement('div');
        overlay.className = 'popup-overlay';
        document.body.appendChild(overlay);

        var popup = document.createElement('div');
        popup.className = 'popup';
        overlay.appendChild(popup);

        var iframe = document.createElement('iframe');
        iframe.src = '../../view/pages/settings.php';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        popup.appendChild(iframe);
    }

    document.getElementById('settings').addEventListener('click', showPopup);
});