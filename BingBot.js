// ==UserScript==
// @name         Bing Bot
// @namespace    http://tampermonkey.net/
// @version      0.1
// @description  Bot for Bing
// @author       Alexey Makarov
// @match        https://www.bing.com/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none.
// ==/UserScript==

let links = document.links;
let search = document.getElementsByName("search")[0];
let keywords = ["купля-продажа авто", "каталог автомобилей", "автомобили купить"];
let keyword = keywords[getRandom(0, keywords.length)];



if (search !== undefined) {
  document.getElementsByName("q")[0].value = keyword;
  search.click();
} else {
  for(let i = 0; i < links.length; i++) {
    if (links[i].href.indexOf("auto.ru") !== -1) {

      let link = links[i];
      console.log("Нашол строку" + link);
      link.click();
      break;
    }
  }
}
function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}
