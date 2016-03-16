<p><h1>List Hotel</h1></p>

<p><a href="/hotel/add">Add Entry</a></p>
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
            {{ link_to('hotel/detail/' ~ hotels.id, 'Detail') }} |
            {{ link_to('/hotel/edit/' ~ hotels.id, 'Edit') }} |
            {{ link_to('/hotel/delete/' ~ hotels.id, 'Delete') }}
        </td>
    </tbody>
    {% endfor %}
</table>


