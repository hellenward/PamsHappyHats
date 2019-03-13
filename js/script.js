const stepTime = 100; //Global variable for fade in on hats and figures pages
let commissionsArray;  //Global variable for carouselbox
let commissionIndex = 1; //Global variable for carouselbox

//Function to show products on hats page, includes scenario where we're using the search box
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

//Function to show figures on figures page, includes scenario where we're using the search box
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

//Function to get commissions from the commissions json library and be able to use search box
const showCommissions = (commissions) => {
  $(".commissions").empty();
  if(commissions.length === 0) {
    $(".figures").append(`<div class="hidden fade">Sorry, nothing matches your search</div>`);
  }
  commissions.forEach((commission) => {
    $(".commissions").append(`<div class="commission commissionHide">
    <img src="${commission.image}">
    <h4>${commission.name}</h4>
    <h4>${commission.price}</h4>
  </div>`);
  });

  //Code for carouselbox / slideshow
  let container = document.querySelector(".commissions");
  commissionsArray = container.querySelectorAll(".commission");
  commissionsArray[0].classList.remove("commissionHide");
  setInterval(() => {
    commissionsArray[commissionIndex].classList.remove("commissionHide");
    let lastSlide = commissionIndex-1;
    if (commissionIndex === 0) {
      lastSlide = commissionsArray.length-1;
    }
    commissionsArray[lastSlide].classList.add("commissionHide");
    commissionIndex++;
    if (commissionIndex === commissionsArray.length) {
      commissionIndex = 0;
    }
  }, 3000);

};



/*
const runCarousel = () => {
  const content = $(".carouselbox .content");
  setInterval(()=> {
    content.addClass("transitioning");
    content.css("margin-left", "-400px");
    setTimeout(() => {
      const firstImage = content.find("li").first();
      const secondImage = firstImage.next();
      const lastImage = secondImage.next();
      const firstImageSource = firstImage.find("img").attr("src");
      const secondImageSource = secondImage.find("img").attr("src");
      const lastImageSource = lastImage.find("img").attr("src");
      firstImage.find("img").attr("src", secondImageSource);
      secondImage.find("img").attr("src", lastImageSource);
      lastImage.find("img").attr("src", firstImageSource);
      content.removeClass("transitioning");
      content.css("margin-left", "0px");
    }, 2000)
  }, 4000);
}
*/

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

  let commissions = [];
  $.ajax({url: "./commissions.json", dataType: "json", success: (data) => {
    commissions = data;
    console.log(commissions);
    showCommissions(data);
  }});
});
