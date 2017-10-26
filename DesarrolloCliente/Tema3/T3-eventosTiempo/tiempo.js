(function () {

  console.log('inicio');

  setTimeout(function cb() {
    console.log('mensaje desde el call back');
  },1000);

  console.log('solo un mensaje');

  setTimeout(function cb1() {
    console.log('mensaje desde el call back 1');
  }, 0);

  console.log('fin');

})();