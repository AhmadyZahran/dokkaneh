
sidebar = document.querySelector('nav');
toggle = document.querySelector(".toggle");
users = document.querySelector(".users-link");
product = document.querySelector(".product-link");
order = document.querySelector(".order-link");
modeText = document.querySelector(".mode-text");
userSection=document.getElementById('user');
productSection=document.getElementById('product');
OrderSection=document.getElementById('orders');


users.addEventListener("click" , () =>{
    userSection.classList.toggle("active");

	productSection.classList.remove("active");
    OrderSection.classList.remove("active");
});

product.addEventListener("click" , () =>{
    productSection.classList.toggle("active");
	userSection.classList.remove("active");
    OrderSection.classList.remove("active");
});

order.addEventListener("click" , () =>{
    OrderSection.classList.toggle("active");
	productSection.classList.remove("active");
   userSection.classList.remove("active");
});

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

