<p><h1>List Hotel</h1></p>
{% if msg %}
<div class="alert alert-success">
    <strong>Success</strong>{{ msg }}
</div>
{% endif %}
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>

    {% for hotels in hotel %}
    <tbody>
        <td>{{ hotels.name }}</td>
        <td>
            {% if session.has('auth-admin') %}
                {{ link_to('hotel/detail/' ~ hotels.id, 'Detail') }} |
                {{ link_to('/hotel/edit/' ~ hotels.id, 'Edit') }} |
                {{ link_to('/hotel/delete/' ~ hotels.id, 'Delete') }}
            {% else %}
            {{ link_to('hotel/detail/' ~ hotels.id, 'Detail') }}
            {% endif %}
        </td>
    </tbody>
    {% endfor %}
</table>


