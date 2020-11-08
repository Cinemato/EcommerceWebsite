//Product Front Image Change Script

var productImg = document.getElementById('product-img');
var smallImgs = document.getElementsByClassName('small-img');

for(let i = 0; i < smallImgs.length; i++)
{
    smallImgs[i].onclick = function()
    {
        for(let j = 0; j < smallImgs.length; j++)
        {
            smallImgs[j].parentNode.style.borderColor = "#E7E7E7";
        }
        
        productImg.src = smallImgs[i].src;
        smallImgs[i].parentNode.style.borderColor = "#FFA20C";
    }
}

//-------------------- Done
