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

products.forEach((el) => {
  const div = document.createElement("div");
  const title = document.createElement("p");
  const price = document.createElement("span");

  title.textContent = el.title;
  price.textContent = el.price;

  div.appendChild(title);
  div.appendChild(price);

  document.querySelector(".search-results").appendChild(div);
});
