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

const getPrice = (product) => {
  const tiers = ["Premie", "Newborn", "Extra Small", "Small", "Medium", "Large", "Extra Large"];
  for (const tier of tiers) {
    if (product[tier]) {
      return product[tier];
    }
  }
  return "unknown";
}

const showProducts = (products) => {
  showItems(products, ".products", "products", (item) => {
    $(".products").append(`<div class="product hidden fade">
      <img src="${item.image}">
      <h4>${item.name}</h4>
      <h4>From ${getPrice(item)}</h4>
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
      $(".adminReset").addClass("hidden");
      if (selection.value === "hat") {
        $(".adminHat").removeClass("hidden");
      } else if (selection.value === "figure") {
        $(".adminCollectable").removeClass("hidden");
      } else {
        $(".adminEvent").removeClass("hidden");
      }
    }
    let name = document.querySelector(".nameOfProduct").value;
    let pricingTier = document.querySelector(".pricingTier");
    pricingTier.onchange = () => {
      if (pricingTier.value === "platinum") {
        $(".platinumPricing").removeClass("hidden");
      } else {
        $(".platinumPricing").addClass("hidden");
      }
    }
  }
});
