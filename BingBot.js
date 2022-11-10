// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Alexey Makarov
// @match        https://www.bing.com/*
// @match        https://auto.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

let links = document.links;
let search = document.getElementsByName("search")[0];
let keywords = ["купля-продажа авто", "каталог автомобилей", "автомобили купить"];
let keyword = keywords[getRandom(0, keywords.length)];
let searchInput = document.getElementsByName("q")[0];
let nextPg = document.getElementsByClassName("sb_pagN")[0]


if (search !== undefined) {
  let i = 0;
  let timerId = setInterval (()=>{
    searchInput.value += keyword[i];
    i++;
    if (i == keyword.length) {
      clearInterval(timerId);
      search.click();
    }
  }, 500);


} else if (location.hostname == "auto.ru"){
  console.log("Ma на цулувом сайте")
  setInterval(() => {
    let index = getRandom(0, links.length);
    if (getRandom(0, 101) > 70) {
      location.href = "https://www.bing.com/";
    }
    else if (links[index].href.indexOf("auto.ru") !== -1) links[index].click();
  }, getRandom(3000, 5000));

} else {
  let nextPage = true;
  for(let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("auto.ru") !== -1) {

      let link = links[i];
      nextPage = false;
      console.log("Нашол строку" + link);
      setTimeout(()=>{
        link.click();
      }, getRandom(2000, 3000));
      break;
    }
  }
  
  if (document.querySelector(".sb_pagS").innerText == "5") {
    nextPage = false;
    location.href = "https://www.bing.com/";
  }
  if (nextPage) {
    setTimeout(()=>{
      nextPg.click();
    }, getRandom(2000, 4000));

  }
}

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
