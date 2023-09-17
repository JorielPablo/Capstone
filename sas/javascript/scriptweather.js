// Weather API endpoint
const apiUrl = 'https://api.openweathermap.org/data/2.5/forecast?';
const apiKey = '16be09582ee536033d94a80d541235be'; // Replace with your OpenWeatherMap API key
const city = 'Babatngon';

// Fetch weather data from API
fetch(`${apiUrl}q=${city}&appid=${apiKey}`)
  .then(response => response.json())
  .then(data => {
    const weatherContainer = document.getElementById('weather-container');
    const forecasts = data.list;

    // Filter and display only one entry per day
    const uniqueDates = new Set();
    forecasts.forEach(forecast => {
      const date = forecast.dt_txt.split(' ')[0];
      if (!uniqueDates.has(date)) {
        uniqueDates.add(date);

        const time = forecast.dt_txt.split(' ')[1];
        const icon = forecast.weather[0].icon;
        const description = forecast.weather[0].description;
        const temperature = forecast.main.temp - 273.15; // Convert to Celsius
        const feelsLike = forecast.main.feels_like - 273.15; // Convert to Celsius
        const rainfall = forecast.rain ? forecast.rain['3h'] : 0; // Get rainfall amount (if available)

        const weatherCard = document.createElement('div');
        weatherCard.classList.add('weather-card');

        const weatherIcon = document.createElement('img');
        weatherIcon.src = `https://openweathermap.org/img/w/${icon}.png`;
        weatherIcon.classList.add('weather-icon');

        const weatherInfo = document.createElement('div');
        weatherInfo.classList.add('weather-info');

        const weatherDate = document.createElement('div');
        weatherDate.classList.add('weather-date');
        weatherDate.textContent = date;

        const weatherDescription = document.createElement('div');
        weatherDescription.classList.add('weather-description');
        weatherDescription.textContent = description;

        const weatherTemperature = document.createElement('div');
        weatherTemperature.classList.add('weather-temperature');
        weatherTemperature.textContent = `Temperature: ${temperature.toFixed(1)}°C`; // Round to 1 decimal place

        const weatherFeelsLike = document.createElement('div');
        weatherFeelsLike.classList.add('weather-feels-like');
        weatherFeelsLike.textContent = `Feels like: ${feelsLike.toFixed(1)}°C`; // Round to 1 decimal place

        const weatherRainfall = document.createElement('div');
        weatherRainfall.classList.add('weather-rainfall');
        weatherRainfall.textContent = `Rainfall: ${rainfall.toFixed(1)} mm`; // Round to 1 decimal place

        weatherInfo.appendChild(weatherDate);
        weatherInfo.appendChild(weatherDescription);
        weatherInfo.appendChild(weatherTemperature);
        weatherInfo.appendChild(weatherFeelsLike);
        weatherInfo.appendChild(weatherRainfall);

        weatherCard.appendChild(weatherIcon);
        weatherCard.appendChild(weatherInfo);

      // Add click event listener to show/hide 3-hour forecast details
// weatherCard.addEventListener('click', () => {
//     const dropdown = document.createElement('div');
//     dropdown.classList.add('weather-dropdown');
//     dropdown.classList.add('forecast-row');
//     // Check if the dropdown is already open
//     const isDropdownOpen = weatherCard.querySelector('.weather-dropdown');
//     if (isDropdownOpen) {
//       // If dropdown is open, remove it
//       isDropdownOpen.remove();
//     } else {
//       // If dropdown is closed, populate it with forecast details
//       forecasts.forEach(forecast => {
//         if (forecast.dt_txt.startsWith(date)) {
//           const time = forecast.dt_txt.split(' ')[1];
//           const icon = forecast.weather[0].icon;
//           const description = forecast.weather[0].description;
//           const temperature = forecast.main.temp - 273.15; // Convert to Celsius
//           const feelsLike = forecast.main.feels_like - 273.15; // Convert to Celsius
//           const rainfall = forecast.rain ? forecast.rain['3h'] : 0; // Get rainfall amount (if available)
  
//           const forecastCard = document.createElement('div');
//           forecastCard.classList.add('forecast-card');
  
//           const forecastTime = document.createElement('div');
//           forecastTime.classList.add('forecast-time');
//           forecastTime.textContent = time;
  
//           const forecastIcon = document.createElement('img');
//           forecastIcon.src = `https://openweathermap.org/img/w/${icon}.png`;
//           forecastIcon.classList.add('forecast-icon');
  
//           const forecastDescription = document.createElement('div');
//           forecastDescription.classList.add('forecast-description');
//           forecastDescription.textContent = description;
  
//           const forecastTemperature = document.createElement('div');
//           forecastTemperature.classList.add('forecast-temperature');
//           forecastTemperature.textContent = `Temperature: ${temperature.toFixed(1)}°C`; // Round to 1 decimal place
  
//           const forecastFeelsLike = document.createElement('div');
//           forecastFeelsLike.classList.add('forecast-feels-like');
//           forecastFeelsLike.textContent = `Feels like: ${feelsLike.toFixed(1)}°C`; // Round to 1 decimal place
  
//           const forecastRainfall = document.createElement('div');
//           forecastRainfall.classList.add('forecast-rainfall');
//           forecastRainfall.textContent = `Rainfall: ${rainfall.toFixed(1)} mm`; // Round to 1 decimal place
  
//           forecastCard.appendChild(forecastTime);
//           forecastCard.appendChild(forecastIcon);
//           forecastCard.appendChild(forecastDescription);
//           forecastCard.appendChild(forecastTemperature);
//           forecastCard.appendChild(forecastFeelsLike);
//           forecastCard.appendChild(forecastRainfall);
  
//           dropdown.appendChild(forecastCard);
//         }
//       });
  
//       // Remove any existing dropdowns
//       const existingDropdown = weatherContainer.querySelector('.weather-dropdown');
//       if (existingDropdown) {
//         existingDropdown.remove();
//       }
  
//       // Add the new dropdown
//       weatherCard.appendChild(dropdown);
//     }
//   });
  
        weatherContainer.appendChild(weatherCard);
      }
    });
})
.catch(error => console.error(error));
