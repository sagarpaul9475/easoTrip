const api = {
    key: "fcc8de7015bbb202209bbf0261babf4c",
    base: "https://api.openweathermap.org/data/2.5/"
}

// Automatically fetch weather for Ladakh when the page loads
document.addEventListener('DOMContentLoaded', () => {
    getWeather('Ladakh');
});

function getWeather(query) {
    fetch(`${api.base}weather?q=${query}&units=metric&APPID=${api.key}`)
        .then(response => response.json())
        .then(displayWeather)
        .catch(err => console.error("Error fetching weather data:", err));
}

function displayWeather(weather) {
    const cityElement = document.querySelector('.weather-info .city');
    cityElement.innerText = `${weather.name}, ${weather.sys.country}`;

    const tempElement = document.querySelector('.weather-info .temp');
    tempElement.innerText = `${Math.round(weather.main.temp)}°C`;

    const conditionElement = document.querySelector('.weather-info .condition');
    conditionElement.innerText = weather.weather[0].main;

    const humidityElement = document.querySelector('.weather-info .humidity');
    humidityElement.innerText = `${weather.main.humidity}%`;

    const windSpeedElement = document.querySelector('.weather-info .wind-speed');
    windSpeedElement.innerText = `${Math.round(weather.wind.speed * 3.6)} km/h`; // Convert from m/s to km/h
}