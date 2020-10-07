var MenuItems = document.getElementById('menuItems');

MenuItems.style.maxHeight = '0px';

function toggleMenu(){
    if(MenuItems.style.maxHeight == '0px'){
        MenuItems.style.maxHeight = '200px';
    }
    else{
        MenuItems.style.maxHeight = '0px';
    }
}
