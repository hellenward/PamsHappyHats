const stepTime = 100;

$(document).ready(() => {
  $.ajax({url: "./hats.json", dataType: "json", success: (data) => {
    console.log(data);
    data.forEach((hat) => {
      $(".products").append(`<div class="product hidden">
        <img src="${hat.image}">
        <h4>${hat.name}</h4>
        <h4>${hat.price}</h4>
      </div>`);
    });

    $(".product").each((i, product) => {
      setTimeout(() => {
        $(product).removeClass("hidden").addClass("shown");
      }, i*stepTime)
    })

  }});
});
