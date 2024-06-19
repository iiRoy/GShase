function openChat() {
    if (window.botpressWebChat) {
        window.botpressWebChat.sendEvent({ type: 'show' });
    } else {
        console.error('Botpress WebChat no está cargado.');
    }
}