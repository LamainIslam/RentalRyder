document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('heroVideo');
    const sources = [
        'Video_Ready_London_Delivery_Driver.mp4',
        'Video_Ready_Accountant_s_Return.mp4'
    ];
    let currentSource = 0;

    function playNextVideo() {
        currentSource = (currentSource + 1) % sources.length;
        video.src = sources[currentSource];
        video.load();
        video.play();
    }

    video.addEventListener('ended', playNextVideo);
    
    // Initial setup
    video.src = sources[0];
    video.load();
    video.play();
}); 