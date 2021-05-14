
function userDropDown() {
    document.getElementById("userDrop").classList.toggle("show")
};

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        let dropdowns = document.getElementsByClassName("dropdownContent");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};
function categoryDropDown() {
    document.getElementById("categoryDrop").classList.toggle("show")
};

window.onclick = function(event) {
    if (!event.target.matches('.dropCategoryBtn')) {
        let dropdowns = document.getElementsByClassName("dropdown-content");
        let i;
        for (i = 0; i < dropdowns.length; i++) {
            let openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

function myFunction() {
    let x = document.getElementById("myTopnav");
    if (x.className === "top-header") {
    x.className += " responsive";
} else {
    x.className = "top-header";
    }
}

let sideBar = document.getElementById('sideBarMenu');
function openSideBar() {
    sideBar.classList.add('activeSideBar');
}
function close(){
    let dropdowns = document.getElementsByClassName("sidebar");
    let i;
    for (i = 0; i < dropdowns.length; i++) {
        let openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('activeSideBar')) {
            openDropdown.classList.remove('activeSideBar');
        }
    }
}

let filterContain = document.getElementById('filterContainer');

function openFilter() {
    filterContain.classList.add('filterBoxActive')
}

function closeFilter(){
    let sideFilter = document.getElementsByClassName("filterBox");
    let i;
    for (i = 0; i < sideFilter.length; i++) {
        let openSideFilter = sideFilter[i];
        if (openSideFilter.classList.contains('filterBoxActive')) {
            openSideFilter.classList.remove('filterBoxActive');
        }
    }
}