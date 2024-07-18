function loader() {
    document.querySelector('.preloader').classList.add("enter_pre");
}

function fadeout() {
    setInterval(loader, 1);
}

window.onload = fadeout();