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

const showEvents = (events) => {
  $(".events").empty();
  if(events.length === 0) {
    $(".events").append(('div class="hidden fade">Sorry, there are no upcoming events. Check back later!</div>'));
  }
  events.forEach((event, index) => {
    $(".events").append(`  <div class="event ${index%2 === 0 ? "event1" : "event2"}">
        <img src="${event.image}">
        <a href="${event.url}">${event.name}</a>
        <p class="date">${event.startDate} - ${event.endDate}</p>
        <p class="venue">${event.address}</p>
      </div>`);
  });
  $(".fade").each((i, event) => {
    setTimeout(() => {
      $(event).removeClass("hidden").addClass("shown");
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


$(document).ready(() => {
  const currentPage = $("body").attr("class");
  if (currentPage === "hatsPage") {
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
  }

  if (currentPage === "collectableFiguresPage") {
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
  }

  if (currentPage === "commissionsPage") {
    let commissions = [];
    $.ajax({url: "./commissions.json", dataType: "json", success: (data) => {
      commissions = data;
      showCommissions(data);
    }});
  }

  if (currentPage === "contactPage") {
    let events = [];
    $.ajax({url: "./events.json", dataType: "json", success: (data) => {
      events = data;
      console.log(events);
      showEvents(data);
    }});
  }
});
