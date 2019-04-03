const stepTime = 100; //Global variable for fade in on hats and figures pages
let commissionsArray;  //Global variable for carouselbox
let commissionIndex = 1; //Global variable for carouselbox

//Function to show products on hats page, includes scenario where we're using the search box
const showItems = (items, container, emptyMessage, callback) => {
  $(container).empty();
  if(items.length === 0) {
    $(container).append(`<div class="hidden fade">Sorry, there are no ${emptyMessage} here!</div>`);
  }
  items.forEach((item, index) => {
    callback(item, index);
  });
  $(".fade").each((i, item) => {
    setTimeout(() => {
      $(item).removeClass("hidden").addClass("shown");
    }, i*stepTime)
  });
}

const showProducts = (products) => {
  showItems(products, ".products", "products", (item) => {
    $(".products").append(`<div class="product hidden fade">
      <img src="${item.image}">
      <h4>${item.name}</h4>
      <h4>${item.price}</h4>
    </div>`);
  });
}

//*Function to show events on contact page
const showEvents = (events) => {
  showItems(events, ".events", "events", (item, index) => {
    $(".events").append(`  <div class="event ${index%2 === 0 ? "event1" : "event2"}">
        <img src="${item.image}">
        <a href="${item.url}">${item.name}</a>
        <p class="date">${item.startDate} - ${item.endDate}</p>
        <p class="venue">${item.address}</p>
      </div>`);
  });
}

//Function to show figures on figures page, includes scenario where we're using the search box
const showFigures = (figures) => {
  showItems(figures, ".figures", "figures", (item) => {
    $(".figures").append(`<div class="product hidden fade">
      <img src="${item.image}">
      <h4>${item.name}</h4>
      <h4>${item.price}</h4>
    </div>`);
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


$(document).ready(() => {
  const currentPage = $("body").attr("class");
  if (currentPage === "hatsPage") {
    let hats = [];
    $.ajax({url: "./products.php?type=hat", dataType: "json", success: (data) => {
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
  }

  if (currentPage === "collectableFiguresPage") {
    let figures = [];
    $.ajax({url: "./products.php?type=collectableFigure", dataType: "json", success: (data) => {
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
  }

  if (currentPage === "commissionsPage") {
    let commissions = [];
    $.ajax({url: "./products.php?type=commission", dataType: "json", success: (data) => {
      commissions = data;
      showCommissions(data);
    }});
  }

  if (currentPage === "contactPage") {
    let events = [];
    $.ajax({url: "./products.php?type=event", dataType: "json", success: (data) => {
      events = data;
      console.log(events);
      showEvents(data);
    }});
  }

  //*Admin Form

  if (currentPage === "adminForm") {
    let selection = document.querySelector(".adminList");
    selection.onchange = () => {
      if (selection.value === "hat") {
        let hideMe = document.querySelectorAll(".adminReset");
        hideMe.forEach((elementToHide) => {
          elementToHide.classList.add("hidden");
        });
        let elements = document.querySelectorAll(".adminHat");
        elements.forEach((element) => {
          element.classList.remove("hidden");
        });
      } else if (selection.value === "commission") {
        let hideMe = document.querySelectorAll(".adminReset");
        hideMe.forEach((elementToHide) => {
          elementToHide.classList.add("hidden");
        });
          let elements = document.querySelectorAll(".adminCommission");
          elements.forEach((element) => {
              element.classList.remove("hidden");
            });
          } else if (selection.value === "figure") {
            let hideMe = document.querySelectorAll(".adminReset");
            hideMe.forEach((elementToHide) => {
              elementToHide.classList.add("hidden");
            });
            let elements = document.querySelectorAll(".adminCollectable");
            elements.forEach((element) => {
              element.classList.remove("hidden");
            });
          } else {
            let hideMe = document.querySelectorAll(".adminReset");
            hideMe.forEach((elementToHide) => {
              elementToHide.classList.add("hidden");
            });
            let elements = document.querySelectorAll(".adminEvent");
            elements.forEach((element) => {
              element.classList.remove("hidden");
            });
          }
        }
        let name = document.querySelector(".nameOfProduct").value;
        let pricingTier = document.querySelector(".pricingTier");
        pricingTier.onchange = () => {
        if (pricingTier.value === "bronze") {
          let newHat = {
            Name: name,
            Premie: "£7.00",
            Newborn: "£8.00",
            ExtraSmall: "£9.00",
            Small: "£10.00",
            Medium: "£11.00",
            Large: "£12.00",
            ExtraLarge: "£13.00"
          }
        console.log(newHat);
        } else if (pricingTier.value === "silver") {
            let newHat = {
              Name: name,
              Premie: "£8.00",
              Newborn: "£9.00",
              ExtraSmall: "£10.00",
              Small: "£11.00",
              Medium: "£12.00",
              Large: "£13.00",
              ExtraLarge: "£14.00"
            }
            console.log(newHat);
        } else if (pricingTier.value === "gold") {
            let newHat = {
              Name: name,
              Newborn: "£10.00",
              ExtraSmall: "£11.00",
              Small: "£12.00",
              Medium: "£13.00",
              Large: "£14.00",
              ExtraLarge: "£15.00"
            }
            console.log(newHat);
        } else {
            let elements = document.querySelectorAll(".platinumPricing");
            elements.forEach((element) => {
              element.classList.remove("hidden");
            });
          }
        }

  }
});
