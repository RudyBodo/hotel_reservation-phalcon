<p><h1>List Hotel</h1></p>

{% for hotels in hotel %}
    <ul>
        <li>{{ link_to('hotel/detail/' ~ hotels.id, hotels.name) }}</li>
    </ul>
{% endfor %}



