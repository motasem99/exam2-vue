<template>
    <div>
        <div class="container">
        <form>
            <div class="input-content">
                <label class="input-content_label" for="prod_name" >product name:</label>
                <input class="input-content_input" v-model="prod_name" required  type="text" name="prod_name"/>
            </div>
            <div class="input-content">
                <label class="input-content_label" for="prod_num">product number:</label>
                <input class="input-content_input" v-model="prod_num" required type="number" name="prod_num" />
            </div>
            <div class="input-content">
                <label class="input-content_label" for="price_box">price one box:</label>
                <input class="input-content_input" v-model="price_box" required type="number" name="price_box" />
            </div>
            <div class="input-content">
                <label class="input-content_label" for="count_box">count of boxes:</label>
                <input class="input-content_input" v-model="count_box" required type="number" name="count_box" />
            </div>
            <div class="input-content">
                <label class="input-content_label" for="total_price">total price:</label>
                <input class="input-content_input" v-model="total_price" disabled required type="text" name="total_price" />
            </div>
            <div class="input-content">
                <label class="input-content_label" for="price_payment">price payment:</label>
                <input class="input-content_input" v-model="price_payment" required type="number" name="price_payment" />
            </div>
            <div class="input-content">
                <label class="input-content_label" for="price_unless">price unless:</label>
                <input class="input-content_input" v-model="price_unless" disabled required type="text" name="price_unless" />
            </div>
      </form>

      <div class="buttons">
        <button @click="totalPrice()" type="button">total price</button>
        <button @click="totalUnless()" type="button">total unless</button>
        <button @click="saveInfo()" type="button">save the info</button>
      </div>
    </div>

        <table align="center">
            <thead>
                <tr>
                    <td>product name</td>
                    <td>product number</td>
                    <td>price one box</td>
                    <td>count boxes</td>
                    <td>total price</td>
                    <td>total payment</td>
                    <td>price unless</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="value in product_name">
                        <td>{{ value.prod_name }}</td>
                        <td>{{ value.prod_num }}</td>
                        <td>{{ value.price_box}}</td>
                        <td>{{ value.count_box }}</td>
                        <td>{{ value.total_price }}</td>
                        <td>{{ value.price_payment }}</td>
                        <td>{{ value.price_unless }}</td>
                    </tr>
                <tr>
                    <td colspan="2"><button class="buttons" @click="sumTotal()">Sum the total</button> </td>
                    <td colspan="2">total</td>
                    <td>{{ sumTotalPrice }}</td>
                    <td>{{ sumTotalPayment }}</td>
                    <td>{{ sumPriceUnless }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                prod_name:'',
                prod_num:'',
                price_box:'',
                count_box:'',
                total_price:'',
                price_payment:'',
                price_unless:'',
                sumTotalPrice:0,
                sumTotalPayment:0,
                sumPriceUnless:0,
                product_name: [
                    ],
                }
            },
            methods:{
                saveInfo(){
                    var obj = {
                        prod_name:this.prod_name,
                        prod_num:this.prod_num,
                        price_box:this.price_box,
                        count_box:this.count_box,
                        total_price:this.total_price,
                        price_payment:this.price_payment,
                        price_unless:this.price_unless,
                    }
                    if(!this.prod_name){
                        return alert('please enter the product name')
                    }
                    if(!this.prod_num){
                        return alert('please enter the product number')
                    }
                    if(!this.price_box){
                        return alert('please enter the price box')
                    }
                    if(!this.count_box){
                        return alert('please enter the count box')
                    }
                    if(!this.total_price){
                        return alert('please enter the total prise')
                    }
                    if(!this.price_payment){
                        return alert('please enter the price payment')
                    }
                    if(!this.price_unless){
                        return alert('please enter the price unless')
                    }
                    this.product_name.push(obj);
                    const objKeys = Object.keys(obj);
                    objKeys.forEach(key=> this[key]= "")
                },
                totalPrice(){
                    if(!this.price_box){
                        return alert('please enter the price box')
                    }
                    if(!this.count_box){
                        return alert('please enter the count box')
                    }
                    var totalPrice = this.price_box * this.count_box
                    this.total_price = totalPrice
                },
                totalUnless(){
                    if(!this.total_price){
                        return alert('please enter the total price')
                    }
                    var totalUnless =  this.total_price - this.price_payment
                    this.price_unless = totalUnless
                },
                sumTotal(){
                    let sumTPrice = 0
                    for(let i = 0 ; i < this.product_name.length ; i++){
                        sumTPrice += +this.product_name[i].total_price;
                    }
                    this.sumTotalPrice = sumTPrice

                    let sumTPayment = 0
                    for(let i = 0 ; i < this.product_name.length ; i++){
                        sumTPayment += +this.product_name[i].price_payment
                    }
                    this.sumTotalPayment = sumTPayment

                    let sumTUnless = 0
                    for(let i = 0 ; i < this.product_name.length ; i++){
                        sumTUnless += +this.product_name[i].price_unless
                    }
                    this.sumPriceUnless = sumTUnless
                },
            },
    }

</script>

