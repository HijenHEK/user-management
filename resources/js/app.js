require('./bootstrap');
var Turbolinks = require("turbolinks")
window.turbo = Turbolinks.start()




document.querySelector('.param .color').addEventListener('click',()=>{
    document.querySelector('.table.users-table').classList.toggle('table-dark');
    document.querySelector('.param .color').classList.toggle('bg-dark');
});


document.querySelector('.param .size').addEventListener('click',()=>{
    document.querySelector('.table.users-table').classList.toggle('table-sm');
    document.querySelector('.param .size').classList.toggle('short');
});