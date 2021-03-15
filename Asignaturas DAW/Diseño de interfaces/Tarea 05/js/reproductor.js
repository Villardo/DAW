init();

function init() {
    var multimedia = document.getElementById('video');
    var playlist = document.getElementById('playlist');
    var tracks = playlist.getElementsByTagName('a');
    multimedia.volume = 0.10;
    multimedia.play();

    for (var track in tracks) {
        var link = tracks[track];
        if (typeof link === "function" || typeof link === "number") continue;
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var song = this.getAttribute('href');
            run(song, multimedia, this);
        });
    }

    multimedia.addEventListener('ended', function (e) {
        for (var track in tracks) {
            var link = tracks[track];
            var nextTrack = parseInt(track) + 1;
            if (typeof link === "function" || typeof link === "number") continue;
            if (!this.src) this.src = tracks[0];
            if (track == (tracks.length - 1)) nextTrack = 0;
            console.log(nextTrack);
            if (link.getAttribute('href') === this.src) {
                var nextLink = tracks[nextTrack];
                run(nextLink.getAttribute('href'), multimedia, nextLink);
                break;
            }
        }
    });
}

function run(song, multimedia, link) {
    var parent = link.parentElement;

    var items = parent.parentElement.getElementsByTagName('li');
    for (var item in items) {
        if (items[item].classList)
            items[item].classList.remove("active");
    }

    parent.classList.add("active");

    multimedia.src = song;
    multimedia.load();
    multimedia.play();
}
