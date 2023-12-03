document.addEventListener("DOMContentLoaded", function () {
  const starsContainer = document.querySelector(".stars");

  function createStar() {
    const star = document.createElement("div");
    star.className = "star";
    star.style.width = `${Math.random() * 3}px`;
    star.style.height = star.style.width;
    star.style.top = `${Math.random() * 100}vh`;
    star.style.left = `${Math.random() * 100}vw`;
    starsContainer.appendChild(star);

    // Remove the star once it goes out of the view
    star.addEventListener("animationiteration", function () {
      star.remove();
      setTimeout(createStar, Math.random() * 500); // Create a new star with a delay
    });
  }

  // Create stars initially to fill the screen
  for (let i = 0; i < 100; i++) {
    createStar();
  }
});
