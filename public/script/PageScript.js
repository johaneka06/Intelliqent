function onLoad() {
    var location = window.location.pathname

    if(location == '/') {
        var element = document.getElementById('home')
        element.classList.add("active")
    } else if(location == '/login') {
        var element = document.getElementById('login')
        element.classList.add("active")
    } else if(location.includes('/member')){
        var element = document.getElementById('member')
        element.classList.add("active")
    } else if(location.includes('course')) {
        var element = document.getElementById('learn')
        element.classList.add("active")
    }
    
}