// data
const products = [
    {id: 1, description: "Quartz Luxe", price: 12, img: 'assets/img/quarz-luxe.JPG'},
    {id: 2, description: 'Curren Business', price: 20, img: 'assets/img/curren-business.JPG'},
    {id: 3, description: 'Curren Sport', price: 5, img: 'assets/img/curren-sport.JPG'},
    {id: 4, description: 'Jaragar Racing', price: 8, img: 'assets/img/jaragar-racing.JPG'},
    {id: 5, description: 'Liges Hommes', price: 3, img: 'assets/img/liges-hommes.JPG'},
    {id: 6, description: 'Maserati Mechanical', price: 65, img: 'assets/img/maserati-mechanical.JPG'},
    {id: 7, description: 'Montre Mecanique', price: 25, img: 'assets/img/montre-mecanique.JPG'},
    {id: 8, description: 'Brand Designer', price: 28, img: 'assets/img/brand-designer.JPG'},
    {id: 9, description: 'Relogio Masculino', price: 4, img: 'assets/img/relogio-masculino.JPG'},
    {id: 10, description: 'Tissot Multifunction', price: 29, img: 'assets/img/tissot-multifunction.JPG'},
    {id: 11, description: 'Hip Hop Gold', price: 87, img: 'assets/img/hiphop-gold.JPG'},
    {id: 12, description: 'Mesh Genova', price: 6, img: 'assets/img/mesh-genova.JPG'},
];

const Home = {
    template: '#home',
    // template: '<h2>HomePage</h2>',
    name: 'Home',
    data: () => {
        return {
            // products: products
            products,
            searchKey: '',
            liked: [],
            cart: []
        }
    },
    computed: {
        filteredList() {
            return this.products.filter((product) => {
                return product.description.toLowerCase().includes(this.searchKey);
            })
        },
        getLikeCookie() {
            let cookieValue = JSON.parse($cookies.get('like'));
            cookieValue == null ? this.liked = [] : this.liked = cookieValue
            console.log(this.liked)
        },
        cartTotalAmount(){
                 let total = 0;
                 for (let item in this.cart){
                   total = total + (this.cart[item].quantity * this.cart[item].price)
                 }
                 return total;
               },
        itemTotalAmount(){
                 let itemTotal = 0;
                 for (let item in this.cart){
                   itemTotal = itemTotal + (this.cart[item].quantity);
                 }
                 return itemTotal;
               }
    },
    methods: {
        setLikeCookie() {
            document.addEventListener('input', () => {
                setTimeout(() => {
                    $cookies.set('like', JSON.stringify(this.liked));
                }, 300);
            })
        },
        addToCart(product) {
            //     // check if already in array
            for (let i = 0; i < this.cart.length; i++) {
                if (this.cart[i].id === product.id) {
                    return this.cart[i].quantity++
                }
            }
            this.cart.push(
                {
                    id: product.id,
                    img: product.img,
                    description: product.description,
                    price: product.price,
                    quantity: 1
                }
            )
            /*if (this.cart.length > 2) {
                console.log(this.cart[2]);
            }*/
        },
        cartPlusOne(product) {
            product.quantity = product.quantity + 1;
        },
        cartMinusOne(product, id) {
            if (product.quantity == 1) {
                //console.log(this.cart);
                 this.cartRemoveItem(id);
            } else {
                product.quantity = product.quantity - 1;
            }
        },
        cartRemoveItem(id) {
            if(confirm('supprimer?')){
                if (id !== -1) {
                    this.cart.splice(id, 1)
                }
            }
        }
    },
    mounted: () => {
        this.getLikeCookie;
    }

}
const UserSettings = {
    // template: '<h1>User Settings</h1>'
    template: '<h2>UserSettings</h2>',
    name: 'UserSettings'
}
const WishList = {
    // template: '<h1>Wish List</h1>',
    template: '<h2>Wish List</h2>',

    name: 'WishList'
}
const ShoppingCart = {
    // template: '<h1>Shopping Cart</h1>',
    template: '<h2>Shopping Cart</h2>',

    name: 'ShoppingCart'
}


const routes = [
    {path: '/', component: Home, name: 'Home'},
    {path: '/user-settings', component: UserSettings, name: 'UserSettings'},
    {path: '/wish-list', component: WishList, name: 'WishList'},
    {path: '/shopping-cart', component: ShoppingCart, name: 'ShoppingCart'},
]


const router = VueRouter.createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: VueRouter.createWebHashHistory(),
    routes, // short for `routes: routes`
})

// router
// const router = new VueRouter({
//   routes: [
//     { path: '/', component: Home, name: 'Home' },
//     { path: '/user-settings', component: UserSettings, name : 'UserSettings' },
//     { path: '/wish-list', component: WishList, name: 'WishList' },
//     { path: '/shopping-cart', component: ShoppingCart, name: 'ShoppingCart' },
//   ]
// })

// const vue = new Vue({
//   //router
// }).$mount('#app');

const App = Vue.createApp({
    data() {
        return {
            message: 'Hello Vue!'
        }
    }
})

App.use(router)
App.mount('#app')

//.mount('#app')