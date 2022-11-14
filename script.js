const starWrapper = document.querySelectorAll(".stars");
const stars = document.querySelectorAll(".stars a");
const starRating = document.getElementById("starRating");
const tags = document.querySelectorAll(".tagButton");
const tagValue = document.getElementById("tagValue");
const nameOfKitchen = document.getElementById("nameOfKitchen");
const nameValue = document.getElementById("nameValue");
const tagsArray = [];
const submit = document.getElementById("submitButton");
const commentInputValue = document.getElementById("commentInput");
const ratingModal = document.getElementById("ratingModal");
const openModal = document.querySelectorAll(".openModal");


for (let i = 0; i < openModal.length; i++) {
    openModal[i].addEventListener("click", () => {
        ratingModal.style.display = "block";
        nameOfKitchen.innerHTML = openModal[i].parentElement.childNodes[1].innerHTML;
        nameValue.value = nameOfKitchen.innerHTML;
    })
};


stars.forEach((star, clickedIdx) => {
    star.addEventListener("click", () => {
        stars.forEach((otherStar, otherIdx) => {
            if (otherIdx <= clickedIdx){
                otherStar.classList.add("active");
            } else {
                otherStar.classList.remove("active");
            }
        });
        starRating.value = clickedIdx + 1;
    });
});


tags.forEach((tag) => {
    tag.addEventListener("click", () => {
        
        if(tag.classList.contains("tagActive")) {
            const index = tagsArray.indexOf(tag.value);
            tagsArray.splice(index, 1);
            tag.classList.remove("tagActive")

        } else {
            tag.classList.add("tagActive")
            tagsArray.push(tag.value);
        }
        tagValue.value = tagsArray.toString(); 
    })
});

function validateMyForm() {
  if(commentInputValue.value = "") { 
    alert("validation failed false");
    return false;
  } 
      alert("validations passed");
      return true;
}