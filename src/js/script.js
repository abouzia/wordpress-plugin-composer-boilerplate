window.addEventListener("load", function () {
  // Store tabs variables
  const tabs = document.querySelectorAll("ul.nav-tabs > li");

  for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener("click", switchTab);
  }

  function switchTab(event) {
    event.preventDefault();
    console.log(event);

    document.querySelector("ul.nav-tabs li.active").classList.remove("active");
    document.querySelector(".tab-pane.active").classList.remove("active");

    var clickedTab = event.currentTarget;
    var anchor = event.target;
    var activePaneId = anchor.getAttribute("href");

    clickedTab.classList.add("active");
    document.querySelector(activePaneId).classList.add("active");
  }
});
