const key = "0b08b721368c8048e2cfe0d2ea146852";
const imgApi = `https://image.tmdb.org/t/p/w1280`;
const url = `https://api.themoviedb.org/3/search/movie?api_key=${key}&query=`;

const cardsContainer = document.querySelector(".cards-container");
const input = document.querySelector(".search-input");
const searchBtn = document.querySelector(".search-btn");
const loadmoreBtn = document.querySelector(".loadmore-btn")

let page = 1;

async function fetchData(url) {;

  try {
    const response = await fetch(url);
    data = await response.json();
    console.log(data);
    return data.results;
  } catch(error) {
    console.log("something went wrong: " + error);
    return [];
  }
}

async function displayCards(data) {
  const msg = document.querySelectorAll("msg");
  if (data.length === 0) {
    cardsContainer.innerHTML += '<p class="msg">No more results found.</p>';
  }

  data.map((data) => {
    const card = createCard(data);
    cardsContainer.innerHTML += card;
  })
}

function createCard(data) {
  const title = data.title;
  const releaseDate = data.release_date;
  const overview = data.overview || "No overview yet...";
  const posterPath = data.poster_path;
  const imagePath = posterPath ? imgApi + posterPath : "assets/images/no-image.png";
  const formattedTitle = title.length > 15 ? title.slice(0, 15) + "..." : title;
  const formattedDate = releaseDate || "No release date yet...";
  const card = 
          `<td class="card-wrapper">
          <div class="card">
            <img width="100%" src="${imagePath}" alt="poster-image">
            <div class="card__content">
              <div class="movie-info">
                <div>
                  <h3 class="movie-title">${formattedTitle}</h3>
                  <span class="movie-release">${formattedDate} </span>
                </div>
                <a href="#" target="_blank" class="movie-link">See more</a>
              </div>
              <p class="movie-overview">${overview}</p>
            </div>
          </div>
          </td>`

  return card;
}

function clearResults() {
  cardsContainer.innerHTML = "";
}

async function loadMore() {
    page++
    const query = input.value;
    const newUrl = query ? `${url}${query}&page=${page}` : `https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=${key}&page=${page}`;
    await fetchDataAndDisplayCards(newUrl);
}

async function fetchDataAndDisplayCards(url) {
  const data = await fetchData(url);
  displayCards(data);
}

async function searchMovie() {
  page = 1;
  const query = input.value;
  if(query) {
    clearResults();
    const newUrl = `${url}${query}&page=${page}`;
    await fetchDataAndDisplayCards(newUrl);
  }
}

async function initialize() {
  clearResults();
  const url = `https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=${key}&page=${page}`;
  await fetchDataAndDisplayCards(url);
}

document.addEventListener('DOMContentLoaded', initialize);
searchBtn.addEventListener('click', searchMovie);
loadmoreBtn.addEventListener('click', loadMore);