const products = [
  {
    title: "Kanapka ze smalcem",
    price: 6.99,
    url: "?page=appetizers&menuType=product&id=1",
  },
  {
    title: "4 plastry kiełbasy",
    price: 4,
    url: "?page=appetizers&menuType=product&id=2",
  },
  {
    title: "2 jajka z majonezem",
    price: 2.99,
    url: "?page=appetizers&menuType=product&id=3",
  },
  {
    title: "Schabowy z ziemniakami",
    price: 13.99,
    url: "?page=appetizers&menuType=product&id=3",
  },
  {
    title: "Pierogi z kapusta i grzybami",
    price: 11.25,
    url: "?page=main-dishes&menuType=product&id=2",
  },
  {
    title: "Bigos",
    price: 10.0,
    url: "?page=main-dishes&menuType=product&id=3",
  },
  {
    title: "Kompocik",
    price: 4.0,
    url: "?page=drinks&menuType=product&id=1",
  },
  {
    title: "Ciepła herbatka",
    price: 3.0,
    url: "?page=drinks&menuType=product&id=2",
  },
];

const searchInput = document.querySelector(".search-input");
const searchResults = document.querySelector(".search-results");

searchInput.addEventListener("focus", () => {
  document.querySelector(".search-results").classList.add("active");
});

searchInput.addEventListener("blur", () => {
  document.querySelector(".search-results").classList.remove("active");
});

searchResults.addEventListener("mouseover", () => {
  document.querySelector(".search-results").classList.add("active");
});

searchInput.addEventListener("input", ({ target: { value } }) => {
  const filteredArray = filteredProducts(value);
  renderResults(filteredArray);
});

function renderResults(filteredProducts) {
  searchResults.textContent = "";
  filteredProducts.forEach((el) => {
    const div = document.createElement("div");
    const title = document.createElement("p");
    const price = document.createElement("span");

    title.textContent = el.title;
    price.textContent = el.price + " zł";

    title.classList.add("search-result-title");
    price.classList.add("search-result-prize");

    div.appendChild(title);
    div.appendChild(price);
    div.classList.add("search-result");

    document.querySelector(".search-results").appendChild(div);
    div.addEventListener("mousedown", () => {
      window.location.replace(el.url);
    });
  });
}

function filteredProducts(value) {
  return products.filter((item) =>
    item.title.toLowerCase().startsWith(value.toLowerCase())
  );
}

renderResults(products);

function fetchChristmasDishes() {
  const url = "http://localhost:3000/christmasDishes";

  fetch(url)
    .then((res) => res.json())
    .then((data) => renderChristmasDishes(data))
    .catch((err) => {
      const dishesContainer = document.querySelector(
        ".christmas-dishes-container"
      );

      dishesContainer.textContent =
        "Wymagany json-server uruchoiony na porcie 3000";
    });
}

fetchChristmasDishes();

function renderChristmasDishes(dishes) {
  const dishesContainer = document.querySelector(".christmas-dishes-container");

  dishes.forEach((dish) => {
    const div = document.createElement("div");
    div.classList.add("christmas-dish");
    const title = document.createElement("h4");
    title.classList.add("christmas-dish-title");
    title.textContent = dish.title;
    const desc = document.createElement("p");
    desc.classList.add("christmas-dish-desc");
    desc.textContent = dish.desc;
    const image = new Image();
    image.classList.add("christmas-dish-image");
    image.src = dish.image;
    console.log(image);

    div.appendChild(image);
    div.appendChild(title);
    div.appendChild(desc);

    dishesContainer.appendChild(div);
  });
}
