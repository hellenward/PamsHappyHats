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


const showFigures = (figures) => {
  $(".figures").empty();
  if(figures.length === 0) {
    $(".figures").append('<div class="hidden fade">Sorry, there are no figures here!</div>');
  }
  figures.forEach((figure) => {
    $(".figures").append(`<div class="product hidden fade">
      <img src="${figure.image}">
      <h4>${figure.name}</h4>
      <h4>${figure.price}</h4>
    </div>`);
  });
  $(".fade").each((i, figure) => {
    setTimeout(() => {
      $(figure).removeClass("hidden").addClass("shown");
    }, i*stepTime)
  });
};


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

  let figures = [];
  $.ajax({url: "./collectableFigures.json", dataType: "json", success: (data) => {
    figures = data;
    showFigures(data);
  }});

  $(".searchButton").on('click', () => {
    const searchTerm = $(".search").val().toLowerCase();
    const filteredFigures = figures.filter((figure) => {
      if(figure.name.toLowerCase().includes(searchTerm)) {
        return true;
      } else {
        return false;
      }
    })
    showFigures(filteredFigures);
  })
});

//Slideshow for commissions page
var i = 0;
var images = []
var time = 3000;

images[0] = "./Thumbs/Commissions/animalblue.jpg";
images[1] = "./Thumbs/Commissions/blue octo.jpg";
images[3] = "./Thumbs/Commissions/Facehugger2.jpg";
images[4] = "./Thumbs/Commissions/Dog Hat Rasta.jpg";
images[5] = "./Thumbs/Commissions/Pink Dalek.jpg";

function changeImg() {
  document.slide.src = images;
  if(i < images.length-1) {
    i++
  } else {
    i = 0;
  }

  setTimeOut("changeImg()", time)
}
