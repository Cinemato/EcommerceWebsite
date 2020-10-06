//Product Front Image Change Script

var productImg = document.getElementById('product-img');
var smallImgs = document.getElementsByClassName('small-img');

for(let i = 0; i < smallImgs.length; i++)
{
    smallImgs[i].onclick = function()
    {
         productImg.src = smallImgs[i].src;
    }
}

//-------------------- Done
