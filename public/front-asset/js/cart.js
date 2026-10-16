$(document).ready(function(){

    $('.addToCart').click(function(){
        let id = $(this).data('id');
        let name = $(this).data('name');
        let price = $(this).data('price');
        let discount = $(this).data('discount');
        let image = $(this).data('image');
        let qty = $('.qty').val();


        console.log(id, name, price);

        let items = {
            id: id,
            name: name,
            price: price,
            discount: discount,
            image: image,
            qty: qty
        }

        let itemString = localStorage.getItem('zayban');
        let itemArray;
        if(itemString == null){
            itemArray = [];
        }else {
            itemArray = JSON.parse(itemString);
        }

        let status = false;
        $.each(itemArray,function(i,v){
            if(v.id == id) {
                v.qty = Number(v.qty) + Number(qty);
                status = true;
            }
        })

        if(status == false) {
            itemArray.push(items);
        }

        let itemData = JSON.stringify(itemArray);
        localStorage.setItem('zayban',itemData);
        count();
    })
    
    count();
    function count() {
        let itemString = localStorage.getItem('zayban');
        if(itemString) {
            let itemArray = JSON.parse(itemString);

            let count = 0;
            $.each(itemArray, function(i,v){
                if(itemArray != 0) {
                    count += Number(v.qty);
                    $('#item-count').text(count)
                }else {
                    $('#item-count').text('0');
                }
            })

        }
    }

    getData();
    function getData() {
        let itemString = localStorage.getItem('zayban');
        if(itemString) {
            let itemArray = JSON.parse(itemString);
            let data = '';
            let j = 1;
            let total = 0;
            $.each(itemArray, function(i,v){
                let name = v.name;
                let image = v.image;
                let price = v.price;
                let discount = v.discount;
                let qty = v.qty;

                data += `<tr>
                            <td>${j++}</td>
                            <td>${name}</td>
                            <td><img src="${image}" width="50"></td>
                            <td>${price} MMK</td>
                            <td>${discount} MMK</td>
                            <td>
                                <button class="min" data-key="${i}"> - </button>
                                ${qty}
                                <button class="max" data-key="${i}"> + </button>
                            </td>
                            <td>${Math.round((price - (price*(discount/100))) * qty)} MMK</td>
                        </tr>`;

                        total += Math.round((price - (price*(discount/100))) * qty);
            })
            data += `<tr>
                        <td colspan="6" align="center">Total</td>
                        <td>${total} MMK</td>
                    </tr>`;
            $('#tbody').html(data);
        }
    }

    // for max 
    $('#tbody').on('click','.max',function(){
        let key = $(this).data('key');
        console.log(key);
        
        let itemString = localStorage.getItem('zayban');
        if(itemString) {
            let itemArray = JSON.parse(itemString);

            $.each(itemArray, function(i, v){
                if(key == i) {
                    v.qty++;
                }
            })

            let itemData = JSON.stringify(itemArray);
            localStorage.setItem('zayban',itemData);

            getData();
            count();
        }
    })

    // for min 
    $('#tbody').on('click','.min',function(){
        let key = $(this).data('key');
        console.log(key);
        
        let itemString = localStorage.getItem('zayban');
        if(itemString) {
            let itemArray = JSON.parse(itemString);

            $.each(itemArray, function(i, v){
                if(key == i) {
                    v.qty--;
                    if(v.qty == 0) {
                        let ans = confirm("Are you sure remove?");
                        if(ans){
                            itemArray.splice(key,1);
                        }else {
                            v.qty = 1;
                        }
                    }
                }
            })
            let itemData = JSON.stringify(itemArray);
            localStorage.setItem('zayban',itemData);

            getData();
            count();
        }
    })

    $('#order').click(function(){
        let ans = confirm('Are you sure order?');
        if(ans) {
            localStorage.clear('zayban');
            window.location.href = 'index.html';
        }
    })

})