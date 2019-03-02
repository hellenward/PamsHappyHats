const stepTime = 100;
const showProducts = (products) => {
  $(".products").empty();
  if(products.length === 0) {
    $(".products").append('<div class="hidden fade">Sorry, there are no hats here!</div>');
  }

  products.forEach((hat) => {
    $(".products").append(`<div class="product hidden fade">
      <img src="${hat.image}">
      <h4>${hat.name}</h4>
      <h4>${hat.price}</h4>
    </div>`);
  });

  $(".fade").each((i, product) => {
    setTimeout(() => {
      $(product).removeClass("hidden").addClass("shown");
    }, i*stepTime)
  });
}

$(document).ready(() => {
  let hats = [];
  $.ajax({url: "./hats.json", dataType: "json", success: (data) => {
    hats = data;
    showProducts(data);

    $(".searchButton").on('click', () => {
      const searchTerm = $(".search").val().toLowerCase();
      const filteredHats = hats.filter((hat) => {
        if(hat.name.toLowerCase().includes(searchTerm)) {
          return true;
        } else {
          return false;
        }
      })
      showProducts(filteredHats);

    })

  }});
});
