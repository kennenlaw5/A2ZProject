@if($errors->any())
    <div id="errors" class="notification is-danger" style="margin-top: 1em">
        <button class="delete" type="button" onclick="var element = document.getElementById('errors'); element.parentNode.removeChild(element);"></button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif