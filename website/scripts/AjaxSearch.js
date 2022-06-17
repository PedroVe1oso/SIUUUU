const searchRestaurant = document.querySelector('#searchrestaurant')
if (searchRestaurant) {
    searchRestaurant.addEventListener('input', async function() {
        const response = await fetch('../api/api_restaurants.php?search=' + this.value)
        const restaurants = await response.json()

        const section = document.querySelector('#restaurants')
        section.innerHTML = ''

        for (const restaurant of restaurants) {
            const link = document.createElement('a')
            link.href = '#'
            const article = document.createElement('article')
            const img = document.createElement('img')
            img.src = '../assets/images/thumbnails/restaurants/' + restaurant.thumbnail
            const p = document.createElement('p')
            p.textContent = restaurant.name
            article.appendChild(img)
            article.appendChild(p)
            link.appendChild(article)
            section.appendChild(link)
        }
    })
}