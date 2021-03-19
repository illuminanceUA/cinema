let inCartArr = [];



function  deleteFromProductCart(id) {
    inCartArr = inCartArr.filter(el => el.place != id);
    document.querySelector(`.place[data-place="${id}"]`).classList.remove('place-in-cart');
    renderProductCart(inCartArr);
}

function addToCart() {
    fetch('/cart/add.php' , {
        method : 'post',
        body: JSON.stringify(inCartArr)
    })

    inCartArr.forEach(el => {
        const place = document.querySelector(`.place[data-place="${el.place}"]`);
        place.classList.remove('place-in-cart');
        place.classList.add('place-is-ordered');
        place.innerHTML = '&times;';
    })


    inCartArr = [];

    renderProductCart(inCartArr)

}

function renderProductCart(data) {
    const addToCartBtn = document.createElement('button');
    addToCartBtn.setAttribute('onclick' , 'addToCart()');
    addToCartBtn.classList.add('add-to-cart');

    const priceArr = [];
    data.forEach(el => {
        priceArr.push(parseInt(el.price));
    })

    let priceSum;

    if(priceArr.length > 0){
        priceSum = priceArr.reduce((prev , next) => prev + next);
    } else {
        priceSum = 0;
    }

    addToCartBtn.innerHTML =
        `
            <p>Додати до кошика </p>
            <p>
                ${priceSum} <span>грн</span>
            </p>
        `

    const wrapper = document.querySelector('.movie-info-cart');
    wrapper.innerHTML = '';

    data.forEach(el => {
        const item = document.createElement('div');
        item.classList.add('cart-movie');
        item.innerHTML =
            `
               <p class="cart-movie-name">
                   ${el.name}
               </p>
               <div class="cart-info-number">
                <span>
                    ${el.row}
                </span>
                   <p>ряд</p>
               </div>
               <div class="cart-info-number">
                <span>
                    ${el.place}
                </span>
                   <p>місце</p>
               </div>
               <p class="cart-movies-price">
                   ${el.price} <span>грн</span>
               </p>
               <div onclick="deleteFromProductCart(${el.place})" class="remove-movie">
                   &times;
               </div>
         
            `
        wrapper.append(item);
    })
    if(data.length > 0) {
        wrapper.append(addToCartBtn);
    }
}

function deleteFromCart(id) {
    fetch(`/cart/delete.php?id=${id}`)
        .then(data => {
            renderCart()
        })
}

function renderCart() {
    const wrapper = document.querySelector('.cart-movies');
    wrapper.innerHTML = '';

    fetch('/cart/view.php')
        .then(response => response.json())
        .then(data=> {
            console.log(data);
            data.forEach((el , i) => {
                const item = document.createElement('div');
                item.classList.add('cart-movie')
                item.innerHTML =
                    `
                        <p class="cart-movie-name">
                            ${el.name}
                        </p>
                        <div class="cart-info-number">
                            <span>
                                ${el.row}
                            </span>
                            <p>ряд</p>
                        </div>
                        <div class="cart-info-number">
                            <span>
                                ${el.place}
                            </span>
                            <p>місце</p>
                        </div>
                        <div class="movie-info-time">14:00</div>
                        <p class="cart-movies-price">
                           ${el.price} <span>грн</span>
                        </p>
                        <div onclick="deleteFromCart('${i}')" class="remove-movie">
                            &times;
                        </div>
        
                    `
                wrapper.append(item);
            })
            if (data.length == 0){
                wrapper.innerText = "Кошик порожній";
            }

        })

}

function placesBtn (el , place , row) {
    el.classList.toggle('place-in-cart');
    const price = document.querySelector('.movie-price').getAttribute('data-price');
    const name = document.querySelector('.movie-info-subtitle').innerText.trim();
    const date  = document.querySelector('.movie-info-date').innerText.trim();
    const time = document.querySelector('.movie-info-time').innerText.trim();
    const obj = {
        place, row , name , price , date , time
    }
    if(inCartArr.some(el => el.place == obj.place)){
        inCartArr = inCartArr.filter(el => el.place !== obj.place)
    } else {
        inCartArr.push(obj);
    }

    renderProductCart(inCartArr)
}

function renderOrderedPlaces (data) {
    const name = document.querySelector('.movie-info-subtitle').innerText.trim();
    const date  = document.querySelector('.movie-info-date').innerText.trim();
    const time = document.querySelector('.movie-info-time').innerText.trim();
    data.forEach(item => {
        if(item.name == name && item.date == date && item.time == time){
            const place = document.querySelector(`.place[data-place="${item.place}"]`);
            place.classList.add('place-is-ordered');
            place.innerHTML = '&times;'
        }
    })
}