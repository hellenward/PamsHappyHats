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
  });

});

const carousel = () => {
  var box = document.querySelector('.carouselbox');
  var next = box.querySelector('.next');
  var prev = box.querySelector('.prev');
  var items = box.querySelector('.content li');
  var counter = 0;
  var amount = items.length;
  var current = items[0];
  box.classList.add('active');
  function navigate(direction) {
    current.classList.remove('current');
    counter = counter + direction;
    if (direction === -1 && counter < 0) {
      counter = amount -1;
    }
    if (direction === 1 && !items[counter]) {
      counter = 0;
    }
    next.addEventListener('click', function(ev) {
      navigate(1);
    });
    prev.addEventListener('click', function(ev) {
      navigate(-1);
    });
    navigate(0);
  }
})();
