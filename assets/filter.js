document.filterform.search.addEventListener("click", filter);

function filter() {
    let products = document.getElementsByClassName("review__items");
    let search = document.getElementsByName("filter")[0].value.toLowerCase();
  
    for (let i = 0; i < products.length; i++) {
        let title = products[i].querySelector("h3").textContent.toLowerCase();
        if (title.includes(search)) {
            products[i].style.display = "block";
        } else {
            products[i].style.display = "none";
        }
    }
  
    filter.arguments[0].preventDefault();
  }
  