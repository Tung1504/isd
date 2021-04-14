function dropDownHeader() {
    document.getElementById("dropAdmin").classList.toggle("showHeader");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropAdminBtn')) {
        let dropdowns = document.getElementsByClassName("dropdownContent");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('showHeader')) {
                openDropdown.classList.remove('showHeader');
            }
        }
    }
}

window.onscroll = function() {scrollControl()};

let navbar = document.getElementById("control-bar");
let sticky = navbar.offsetTop;

function scrollControl() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
